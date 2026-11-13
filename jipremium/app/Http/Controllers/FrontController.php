<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partners;
use App\inquiries;
use App\news;
use App\exhibition;
use App\PartnerAsset;
use App\notice;
use App\brand;
use App\category;
use App\product;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Response;

class FrontController extends Controller
{
    public function inquiries(){
        return view('frontend.inquiries');
    }

    public function inquiriesIndo(){
        return view('frontend.id.inquiries');
    }

    public function inquiriesKorea(){
        return view('frontend.kor.inquiries');
    }

    public function home(){
        // $partners = partners::all();
    	$partners = partners::query()
    		->where('isActive', 1)
    		->get();
        $exhibition = exhibition::all();
        $partnerAsset = PartnerAsset::latest()->get();
        $bestProducts = Product::with('brand')
            ->where('is_best_product', 'Y')
            ->whereHas('brand', function ($query) {
                $query->where('status', '1');
            })
            ->orderBy('display_order', 'asc')
            ->take(9)
            ->get();

        return view('frontend.welcome', 
            compact(
                'partners',
                'exhibition',
                'partnerAsset', 
                'bestProducts'
            )
        );
    }

    public function homeIndo(){
        $partners = partners::all();
        $exhibition = exhibition::all();
        $partnerAsset = PartnerAsset::latest()->get();
        return view('frontend.id.welcome', 
            compact(
                'partners',
                'exhibition',
                'partnerAsset'
            )
        );
    }

    public function homeKorea(){
        $partners = partners::all();
        $exhibition = exhibition::all();
        $partnerAsset = PartnerAsset::latest()->get();
        return view('frontend.kor.welcome', 
            compact(
                'partners',
                'exhibition',
                'partnerAsset'
            )
        );
    }

    public function brands(Request $request){
        $categories = Category::all();
        $products = Product::with('brand')
            ->when($request->has('category') && $request->input('category') !== 'all', function ($query) use ($request) {
                // $query->whereHas('category', function ($subQuery) use ($request) {
                //     $subQuery->where('id', $request->input('category'));
                // });
            	$query->where('category_id', $request->input('category'));
            })
            ->when($request->has('search'), function ($query) use ($request) {
                $query->whereHas('brand', function ($subQuery) use ($request) {
                    $subQuery->where('brand_name', 'like', '%' . $request->input('search') . '%');
                });
            })
            ->whereHas('brand', function ($query) {
                $query->where('status', '1');
            	// $query->whereRaw('YEAR(created_at) = ?', [date('Y')]);
            	$query->whereRaw('YEAR(created_at) = ?', ['2026']);
            	
            })
            ->paginate(12);
        $bestProducts = Product::with('brand')
            ->where('is_best_product', 'Y')
            ->whereHas('brand', function ($query) {
                $query->where('status', '1');
            })
            ->orderBy('display_order', 'asc')
            ->take(3)
            ->get();


        $bestDesigns = Product::with('brand')
            ->where('is_best_design', 'Y')
            ->whereHas('brand', function($query) {
                $query->where('status', '1');
            })
            ->orderBy('display_order', 'asc')
            ->take(9)
            ->get();
    
    	$premiumProduct = Product::with('brand')
    		->whereHas('brand', function ($query) {
        		$query->where('brand_name', 'like', '%Shinsung Silicone Co., Ltd.%');
    		})
        	->take(1)
    		->get();
    
    	$bestGlobal = Product::with('brand')
    		->whereHas('brand', function ($query) {
        		$query->where('brand_name', 'like', '%TidyLab Co., Ltd.%');
    		})
    		->get();

		$kCreative = Product::with('brand')
    		->whereHas('brand', function ($query) {
        		$query->where('id', 809);
    		})
        	->take(2)
    		->get();

		$marketLeader = Product::with('brand')
    		->whereHas('brand', function ($query) {
        		$query->where('brand_name', 'like', '%CHEIL GENERAL FOOD Co., Ltd.%');
    		})
        	->get();

        return view('frontend.brand', 
            compact(
                'categories', 
                'products', 
                'bestProducts',
                'bestDesigns', 
                'premiumProduct', 
                'bestGlobal', 
                'kCreative', 
                'marketLeader'
            )
        );
    }

    public function productDetail($id)
    {
        $product = product::findOrFail($id);
        // Product whose brand was deleted: hidden like in the public product lists.
        abort_if(! $product->brand, 404);
        $brandProducts = product::where('brand_id', $product->brand_id)->get();

        return view('frontend.product_detail', compact('product', 'brandProducts'));
    }

    public function inquiriesStore(Request $request){
        $request->validate([
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'country' => 'required',
            'inquiry' => 'required',
        ]);
        // inquiries::create($request->all());
        // Only the form's own fields are saved (id/created_at etc. can't be sent in).
        inquiries::create($request->only(['email', 'first_name', 'last_name', 'company', 'country', 'inquiry']));
        return redirect()->route('frontend.inquiries')->with('success','Data Has Been Sent !!');
    }

    public function inquiriesStoreIndo(Request $request){
        $request->validate([
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'country' => 'required',
            'inquiry' => 'required',
        ]);
        // inquiries::create($request->all());
        // Only the form's own fields are saved (id/created_at etc. can't be sent in).
        inquiries::create($request->only(['email', 'first_name', 'last_name', 'company', 'country', 'inquiry']));
        return redirect()->route('frontend.inquiriesIndo')->with('success','Data sudah terkirim !!');
    }

    public function inquiriesStoreKorea(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'country' => 'required',
            'inquiry' => 'required',
        ]);
        // inquiries::create($request->all());
        // Only the form's own fields are saved (id/created_at etc. can't be sent in).
        inquiries::create($request->only(['email', 'first_name', 'last_name', 'company', 'country', 'inquiry']));
        return redirect()->route('frontend.inquiriesKorea')->with('success','데이터가 전송되었습니다 !!');
    }

    public function newsStore(Request $request){
        // news::create($request->all());
        // An empty/invalid newsletter submit now gets a validation error (422) instead of a 500 database error.
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        news::create($request->only(['name', 'email']));

        return response()->json([
            'message' => 'Thank you for your interest in JIPREMIUM'
        ]);
    }

    public function newsStoreIndo(Request $request){
        // news::create($request->all());
        // An empty/invalid newsletter submit now gets a validation error (422) instead of a 500 database error.
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        news::create($request->only(['name', 'email']));

        return response()->json([
            'message' => 'Terima kasih atas minat Anda pada JIPREMIUM'
        ]);
    }

    public function newsStoreKorea(Request $request){
        // news::create($request->all());
        // An empty/invalid newsletter submit now gets a validation error (422) instead of a 500 database error.
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        news::create($request->only(['name', 'email']));

        return response()->json([
            'message' => 'JIPREMIUM에 관심을 가져주셔서 감사합니다.'
        ]);
    }

    public function notice(){
        $notice = notice::all();
        return view('frontend.notice', compact('notice'));
    }

    public function noticeIndo(){
        $notice = notice::all();
        return view('frontend.id.notice', compact('notice'));
    }

    public function noticeKorea(){
        $notice = notice::all();
        return view('frontend.kor.notice', compact('notice'));
    }

    public function noticeShow($id){
        // $dataNotice = notice::find($id);
        $dataNotice = notice::findOrFail($id);
        return view('frontend.notice_show', compact('dataNotice'));
    }

    public function buyer(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apismartererp.ayrtonware.com/kreen/kreenapi_dev_up2/v1/event_detail2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id_event' => 'ERJBRWYECAUUOQNPK896'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . config('services.kreen.erp_bearer_token')
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response);

        $title = $data->data[0]->title;
        $type_event = $data->data[0]->type_event;
        $category = $data->data[0]->category;
        $description = $data->data[0]->description;
        $venue_platform = $data->data[0]->venue_platform;
        $maps_img = $data->data[0]->maps_img;
        $img = $data->data[0]->img;
        $link = $data->data[0]->link;
        $date = $data->data[0]->date[0]->date_event;
        $time_start = $data->data[0]->date[0]->time_start;
        $time_end = $data->data[0]->date[0]->time_end;

        return view('frontend.registration.buyer',
            compact(
                [
                    'title',
                    'type_event',
                    'category',
                    'description','
                    venue_platform',
                    'maps_img',
                    'img',
                    'link',
                    'date',
                    'time_start',
                    'time_end'
                ]
            )
        );
    }
}
