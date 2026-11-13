<?php

namespace App\Http\Controllers;

use App\BuyerRegistration;
use App\Support\JipremiumEvent;
use App\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class VisitorOnsiteController extends Controller
{
    // const EVENT_ID = 'HWGJAIGYJNQPYBVMN321';
    // const EVENT_ID = 'HJUQPPJEBJGJNSOBH299';
    // const TICKET_ID = 'ULPVHQQBZZFSYKKSM489';
    // const TICKET_ID = 'MWTDIHYJJJWLQFBTF943';
    // Event & ticket IDs are set in app/Support/JipremiumEvent.php
    const EVENT_ID = JipremiumEvent::VISITOR_EVENT_ID;
    const TICKET_ID = JipremiumEvent::VISITOR_ONSITE_TICKET_ID;

    public function getOrderFormData()
    {
        // $url = 'https://www.kreen.id/kreenapi/event/listQuestionOrderForm';
        // $apiSecretKey = '[removed: old kreen.id key]';

        $url = 'https://kreenconnect.com/kreenapi/event/listQuestionOrderForm';
        $apiSecretKey = config('services.kreen.api_secret_key');

        $payload = [
            'id_event' => self::EVENT_ID
        ];

        $headers = [
            'API-Secret-Key' => $apiSecretKey,
            'Content-Type' => 'application/json'
        ];

        $response = Http::withHeaders($headers)->post($url, $payload);

        if ($response->successful()) {
            return $response->json()['data'];
        } else {
            Log::error('Failed to fetch order form data: ' . $response->body());
            return null;
        }
    }

    public function visitorOnsiteCreate()
    {
        $fields = $this->getOrderFormData();

        if (!$fields) {
            return view('frontend.registration.visitor_onsite_form')->withErrors(['api_error' => 'Failed to fetch form data']);
        }

        return view('frontend.registration.visitor_onsite_form', compact('fields'));
    }

    public function visitorOnsiteCreateTest()
    {
        $fields = $this->getOrderFormData();

        if (!$fields) {
            return view('frontend.registration.visitor_onsite_form')->withErrors(['api_error' => 'Failed to fetch form data']);
        }

        return view('frontend.registration.visitor_onsite_form', compact('fields'));
    }

// 	public function visitorOnsiteCreate()
// {
//     return redirect('https://kreenconnect.com/id/ticket-event/visitor-registration--jipremium-2026');
// }

	private function getJipremiumOrderDetailId($firstName, $email, $phone)
	{
    	$url = 'https://kreenconnect.com/kreenapi/order/event-jipremium';
    	$apiSecretKey = config('services.kreen.api_secret_key');

    	$payload = [
        	'id_event'   => self::EVENT_ID,
        	'first_name' => $firstName,
        	'email'      => $email,
        	'phone'      => $phone,
    	];
    	
    	$headers = [
            'API-Secret-Key' => $apiSecretKey,
            'Content-Type' => 'application/json'
        ];

   		try {
        	$response = Http::withHeaders($headers)->post($url, $payload);

        	if ($response->successful()) {
            	$json = $response->json();

            	if (
                	isset($json['success']) && $json['success'] === true &&
                	!empty($json['data']['event_order_detail'][0]['id_order_detail'])
            	) {
               	 return $json['data']['event_order_detail'][0]['id_order_detail'];
            	}
        	}

        	return null;

    	} catch (\Exception $e) {
        	return null;
    	}
	}

    public function visitorOnsiteStore(Request $request)
    {
        $request->validate([
            'tickets' => 'required|array|min:1|max:5',
            'tickets.*.first_name' => 'required|string',
            'tickets.*.last_name' => 'required|string',
            'tickets.*.email' => 'required|email',
            'tickets.*.phone' => 'required|string',
        ]);

        $uniqueId = random_int(100000000, 999999999);
        $allBuyerData = [];
        $allAddformData = [];
        $addformByTicket = [];

        $fields = $this->getOrderFormData();

        // Kreen form API unavailable: stop here instead of crashing on a null field list.
        if (!$fields) {
            return back()->withInput()->withErrors(['api_error' => 'Failed to fetch form data']);
        }

        foreach ($request->tickets as $index => $ticketData) {
            $buyerData = $this->prepareBuyerData($ticketData, $index, $uniqueId);
            $allBuyerData[] = $buyerData;

            $dataAddform = $this->generateDataAddform($ticketData, $buyerData['id'], $fields);
            $allAddformData = array_merge($allAddformData, $dataAddform);
            $addformByTicket[$index] = $dataAddform;
        }

        // $apiData = $this->prepareApiData($uniqueId, $allBuyerData, $allAddformData, $request->tickets[0]);
    
    	$ticketsPayload = $this->buildTickets($request->tickets, $fields);
    
    	$apiData = $this->prepareApiData(
    		$uniqueId,
    		$ticketsPayload,
    		$request->id_user ?? '',
    		$request->latitude ?? null,
    		$request->longitude ?? null,
    		$request->payment_method ?? []
		);

        DB::beginTransaction();

        try {
            $apiResponse = $this->sendToApi($apiData);

            if (!isset($apiResponse['success']) || !$apiResponse['success']) {
                Log::error('API submission failed: ' . json_encode($apiResponse));
            	
            	$this->saveOrderLog($uniqueId, 'failed', $apiData, $apiResponse);
                return back()->withErrors(['api_error' => 'Registration failed. Please try again.']);
            }

            foreach ($request->tickets as $index => $ticketData) {
                $buyerData = $allBuyerData[$index];

                $buyer = new BuyerRegistration;
                $buyer->fill([
                    'id_order' => $uniqueId,
                    'id_event' => self::EVENT_ID,
                    'tag' => 'visitor_onsite',
                    'first_name' => $ticketData['first_name'],
                    'last_name' => $ticketData['last_name'],
                    'email' => $ticketData['email'],
                    'phone' => $ticketData['phone'],
                    'platform' => 'web',
                    'discount' => 0,
                    'total_payment' => 0,
                    'data_buyer' => json_encode([$buyerData]),
                    // 'data_addform' => json_encode($dataAddform),
                    // Each ticket keeps its own form answers (was: last ticket's / all tickets' answers on every row).
                    'data_addform' => json_encode($addformByTicket[$index]),
                    'type' => "Visitor Onsite Registration",
                ]);
            
            	$orderDetailId = $this->getJipremiumOrderDetailId(
                	$ticketData['first_name'],
                	$ticketData['email'],
                	$ticketData['phone']
            	);
            
            	if ($orderDetailId) {
                	$buyerData['id'] = $orderDetailId;
                	#$buyer['id_order'] = $orderDetailId;
                	#$uniqueId = $orderDetailId;// ganti id yang dipakai order_detail
            	} else {
                	Log::error('Failed to get id_order_detail from JIPREMIUM API for: ' . $ticketData['email']);
            	}

                $buyer->save();

                $this->saveOrderDetails($buyer, $buyerData);
            }

            DB::commit();
        
        	// $this->saveOrderLog($uniqueId, 'success', $apiData, $apiResponse);

            return redirect()->route('thank_you', ['id_order' => $uniqueId]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction failed: ' . $e->getMessage());
            return back()->withErrors(['transaction_error' => 'Registration failed. Please try again.']);
        }
    }

    private function prepareBuyerData($ticketData, $index, $uniqueId)
    {
        return [
            'disc' => 0,
            'email' => $ticketData['email'],
            'first_name' => $ticketData['first_name'],
            'id' => $index === 0 ? $uniqueId : random_int(100000000, 999999999),
            'id_event_ticket' => self::TICKET_ID,
            'last_name' => $ticketData['last_name'],
            'phone' => $ticketData['phone'],
            'price' => 0,
            'qty' => 1
        ];
    }

    private function generateDataAddform($ticketData, $idOrderDetail, $fields)
    {
        $dataAddform = [];

        foreach ($fields as $field) {
            $fieldId = $field['id_order_form_detail'];
            if (isset($ticketData[$fieldId])) {
                $answer = $ticketData[$fieldId];
                $dataAddform[] = [
                    'answer' => is_array($answer) ? implode(', ', $answer) : $answer, 
                    'id' => Str::random(20),
                    'id_event' => self::EVENT_ID,
                    'id_order_detail' => $idOrderDetail,
                    'id_question' => $field['id_order_form_master'],
                    'id_question_detail' => $fieldId,
                ];
            }
        }

        return $dataAddform;
    }

    private function saveOrderDetails($buyer, $buyerData)
    {
        $orderDetail = new order_detail();
        $orderDetail->id = $buyerData['id'];
        $orderDetail->id_order = $buyer->id_order;
        $orderDetail->id_event_ticket = self::TICKET_ID;
        $orderDetail->first_name = $buyerData['first_name'];
        $orderDetail->last_name = $buyerData['last_name'];
        $orderDetail->email = $buyerData['email'];
        $orderDetail->phone = $buyerData['phone'];
        $orderDetail->qty = 1;
        $orderDetail->type = "Visitor Onsite Registration";
        $orderDetail->save();
    }

    // private function prepareApiData($uniqueId, $allBuyerData, $allAddformData, $firstBuyer)
    // {
    //     return [
    //         'id_order' => $uniqueId,
    //         'id_event' => self::EVENT_ID,
    //         'first_name' => $firstBuyer['first_name'],
    //         'last_name' => $firstBuyer['last_name'],
    //         'email' => $firstBuyer['email'],
    //         'phone' => $firstBuyer['phone'],
    //         'discount' => 0,
    //         'total_payment' => 0,
    //         'data_buyer' => json_encode($allBuyerData),
    //         'data_addform' => json_encode($allAddformData),
    //         'platform' => 'web'
    //     ];
    // }

	private function prepareApiData($uniqueId, $tickets, $userId = '', $latitude = null, $longitude = null, $paymentMethod = [])
	{
    	return [
        	'id_event'      => self::EVENT_ID,
        	'id_user'       => $userId,
        	'platform'      => 'web',
        	'latitude'      => $latitude,
        	'longitude'     => $longitude,
        	'tickets'       => $tickets, // array nested, lihat buildTickets()
        	'payment_method' => [],
    	];
	}

	private function buildTickets($ticketsInput, $fields)
  {
      $tickets = [];

      foreach ($ticketsInput as $ticketData) {
          $orderFormAnswers = [];

          foreach ($fields as $field) {
              $fieldId = $field['id_order_form_detail'];
              $answer = $ticketData[$fieldId] ?? null;

              $orderFormAnswers[] = [
                  'id_order_form_master' => $field['id_order_form_master'],
                  'id_order_form_detail' => $fieldId,
                  'answer' => json_encode($answer),
              ];
          }

          $tickets[] = [
              'id_ticket'  => self::TICKET_ID,
              'first_name' => $ticketData['first_name'],
              'email'      => $ticketData['email'],
              'phone'      => $ticketData['phone'],
              'gender'     => $ticketData['gender'] ?? '',
              'order_form_answers' => $orderFormAnswers,
          ];
      }

      return $tickets;
  }

    private function sendToApi($data)
    {
        // $url = 'https://apismartererp.ayrtonware.com/kreen/kreenapi_dev_up2/v1/event_booking_free2';
        // $url = 'https://apismartererp.ayrtonware.com/kreen/kreenapi_dev_up_dev/v1/event_booking_free2';
    	$url = 'https://kreenconnect.com/kreenapi/order/event/checkout';

        try {
            $apiSecretKey = config('services.kreen.api_secret_key');
        
        	$response = Http::withHeaders(['Content-Type' => 'application/json', 'API-Secret-Key' => $apiSecretKey])->post($url, $data);
            // Log::info('API Response Status: ' . $response->status());
            // Log::info('API Response Body: ' . $response->body());
            return $response->json();
        } catch (\Exception $e) {
            // Log::error('API request failed: ' . $e->getMessage());
            // Log::error('API request failed with data: ' . json_encode($data));
            return ['error' => 'API request failed'];
        }
    }

private function saveOrderLog($uniqueId, $status, $requestData, $responseData = null, $errorMessage = null)
{
    try {
        $logData = [
            'timestamp' => now('Asia/Jakarta')->format('Y-m-d H:i:s'),
            'id_order'  => $uniqueId,
            'status'    => $status,
            'request'   => $requestData,
            'response'  => $responseData,
            'error'     => $errorMessage,
        ];

        $logText = "===== ORDER LOG =====" . PHP_EOL;
        $logText .= "Timestamp   : " . $logData['timestamp'] . PHP_EOL;
        $logText .= "ID Order    : " . $logData['id_order'] . PHP_EOL;
        $logText .= "Status      : " . $logData['status'] . PHP_EOL;
        $logText .= "Request     : " . json_encode($logData['request'], JSON_PRETTY_PRINT) . PHP_EOL;
        $logText .= "Response    : " . json_encode($logData['response'], JSON_PRETTY_PRINT) . PHP_EOL;
        if ($errorMessage) {
            $logText .= "Error       : " . $errorMessage . PHP_EOL;
        }
        $logText .= "======================" . PHP_EOL . PHP_EOL;

        $fileName = 'order_log_' . now('Asia/Jakarta')->format('Y-m-d') . '.txt';
        $filePath = storage_path('logs/' . $fileName);

        // append ke file, bikin baru kalau belum ada
        file_put_contents($filePath, $logText, FILE_APPEND | LOCK_EX);

        Log::info('Order log saved to: ' . $filePath);
    } catch (\Exception $e) {
        Log::error('Failed to save order log: ' . $e->getMessage());
    }
}
}
