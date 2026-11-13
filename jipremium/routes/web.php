<?php

use Illuminate\Support\Facades\Route;
use App\partners;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('language/{lang}', 'LanguageController@switchLang')->name('language.switch');

//auth
// Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Public registration disabled: any registered user gets full /admin access.
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', 'Auth\RegisterController@register');

Route::get('/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('/password/confirm', 'Auth\ConfirmPasswordController@confirm');
Route::get('/password/reset', 'Auth\ConfirmPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ConfirmPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset', 'Auth\ConfirmPasswordController@reset')->name('password.update');
Route::get('/password/reset/{token}', 'Auth\ConfirmPasswordController@showResetForm')->name('password.reset');

// frontend
Route::get('/', 'FrontController@home')->name('frontend.home');
Route::get('/inquiries', 'FrontController@inquiries')->name('frontend.inquiries');
Route::get('notice/{id}', 'FrontController@noticeShow')->name('notices.show');
Route::get('/notice', 'FrontController@notice');
// View frontend.registration.buyer does not exist, so this always returned 500 (after calling the Kreen dev API).
// Route::get('/buyer', 'FrontController@buyer');
Route::get('/pdf/{filename}', 'PdfController@displayPdf');

Route::get('/exhibit', function () {
    return view('frontend.exhibit');
});

// adding new sidebar route
Route::get('/exhibition_overview', function () {
    return view('frontend.exhibition_overview');
});
Route::get('/partner', 'PartnersController@home')->name('frontend.partner');
Route::get('/subscription', function () {
    return view('frontend.subscription');
});
Route::get('/concurrent_show', function () {
    return view('frontend.concurrent_show');
});
Route::get('/exhibitor_item', 'ExhibitorItemController@home')->name('frontend.exhibitor_item');


Route::get('/event_info', function () {
    return view('frontend.event_info');
});
Route::get('/visit', function () {
    return view('frontend.visit');
});
Route::get('/brands', 'FrontController@brands')->name('brands');
Route::get('brands/product/{id}', 'FrontController@productDetail')->name('brand.product');

//inquiries
Route::post('/id/inquiries', 'FrontController@inquiriesStoreIndo')->name('inquiries.indo')->middleware('throttle:20,1');
Route::post('/kor/inquiries', 'FrontController@inquiriesStoreKorea')->name('inquiries.korea')->middleware('throttle:20,1');
Route::prefix('admin')->group(function () {
    Route::get('inquiries', 'InquiriesController@index')->name('inquiries.index');
    Route::get('inquiries/create', 'InquiriesController@create')->name('inquiries.create');
    Route::post('inquiries', 'FrontController@inquiriesStore')->name('inquiries.store')->middleware('throttle:20,1');
    Route::get('inquiries/{id}/edit' ,'InquiriesController@edit')->name('inquiries.edit');
    Route::put('inquiries/{id}' ,'InquiriesController@update')->name('inquiries.update');
    Route::delete('inquiries/{id}' ,'InquiriesController@destroy')->name('inquiries.destroy');
});

//news
Route::post('/id/news', 'FrontController@newsStoreIndo')->name('news.indo')->middleware('throttle:20,1');
Route::post('/kor/news', 'FrontController@newsStoreKorea')->name('news.korea')->middleware('throttle:20,1');
Route::get('news/export', 'NewsController@export')->name('news.export');
Route::prefix('admin')->group(function () {
    Route::get('news', 'NewsController@index')->name('news.index');
    Route::get('news/create', 'NewsController@create')->name('news.create');
    Route::post('news', 'FrontController@newsStore')->name('news.store')->middleware('throttle:20,1');

    Route::get('news/{id}/edit' ,'NewsController@edit')->name('news.edit');
    Route::put('news/{id}' ,'NewsController@update')->name('news.update');
    Route::delete('news/{id}' ,'NewsController@destroy')->name('news.destroy');
});

// Route::get('/get-data-visitor-online-form', 'BuyerOnlineController@getOrderFormData');
Route::get('/get-data-visitor-online-form', 'BuyerOnlineController@getOrderFormData')->middleware('throttle:20,1');

// registration
Route::get('/visitor-online-registration', 'VisitorOnlineController@visitorOnlineCreate')->name('visitor_online.create');
Route::post('/visitor-online-registration', 'VisitorOnlineController@visitorOnlineStore')->name('visitor_online.store')->middleware('throttle:60,1');

Route::get('/buyer-online-registration', 'BuyerOnlineController@buyerOnlineCreate')->name('buyer_online.create');
Route::post('/buyer-online-registration', 'BuyerOnlineController@buyerOnlineStore')->name('buyer_online.store')->middleware('throttle:60,1');

// registration offline
Route::get('/visitor-onsite-registration', 'VisitorOnsiteController@visitorOnsiteCreate')->name('visitor_onsite.create');
Route::post('/visitor-onsite-registration', 'VisitorOnsiteController@visitorOnsiteStore')->name('visitor_onsite.store')->middleware('throttle:60,1');

//registration test
// Unique names: duplicates of the routes above break `php artisan route:cache`.
// Route::get('/visitor-onsite-registration-test', 'VisitorOnsiteController@visitorOnsiteCreateTest')->name('visitor_onsite.create');
// Route::post('/visitor-onsite-registration-test', 'VisitorOnsiteController@visitorOnsiteStore')->name('visitor_onsite.store')->middleware('throttle:60,1');
// Test page closed: it was public and could submit real registrations.
// Route::get('/visitor-onsite-registration-test', 'VisitorOnsiteController@visitorOnsiteCreateTest')->name('visitor_onsite.create_test');
// Route::post('/visitor-onsite-registration-test', 'VisitorOnsiteController@visitorOnsiteStore')->name('visitor_onsite.store_test')->middleware('throttle:60,1');

Route::get('/buyer-onsite-registration', 'BuyerOnsiteController@buyerOnsiteCreate')->name('buyer_onsite.create');
Route::post('/buyer-onsite-registration', 'BuyerOnsiteController@buyerOnsiteStore')->name('buyer_onsite.store')->middleware('throttle:60,1');

//mom & kids
Route::prefix('mom-and-kids')->group(function() {
    Route::get('/', 'MomKidsController@index')->name('momkids.index');
});
//notice
// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::get('notice', 'NoticeController@index')->name('notice.index');
//     Route::get('notice/create', 'NoticeController@create')->name('notice.create');
//     Route::post('notice', 'NoticeController@store')->name('notice.store');
//     Route::get('notice/{id}/edit' ,'NoticeController@edit')->name('notice.edit');
//     Route::put('notice/{id}' ,'NoticeController@update')->name('notice.update');
//     Route::delete('notice/{id}' ,'NoticeController@destroy')->name('notice.destroy');
// });

//backend
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
    Route::get('/data-event', function () {
        return view('backend.data-event.list');
    });
    Route::get('data-visitor-online/{id}/{idt}', 'DataEventController@visitorOnline')->name('visitor.online');
    Route::get('data-buyer-online/{id}/{idt}', 'DataEventController@buyerOnline')->name('buyer.online');
    Route::get('data-visitor-onsite/{id}/{idt}', 'DataEventController@visitorOnsite')->name('visitor.onsite');
    Route::get('data-buyer-onsite/{id}/{idt}', 'DataEventController@buyerOnsite')->name('buyer.onsite');

    Route::resource('partners', PartnersController::class);
    Route::resource('exhibition', ExhibitionController::class);
    Route::resource('notice', NoticeController::class);

	//brand
    Route::get('data-brand', function() {
        return view('backend.brand.home');
    });
    Route::resource('brand', BrandController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

    //asset partner
    Route::get('asset/list', 'PartnerAssetController@index')->name('asset.index');
    Route::get('asset/create', 'PartnerAssetController@create')->name('asset.create');
    Route::post('asset', 'PartnerAssetController@store')->name('asset.store');
    Route::get('asset/{id}/edit', 'PartnerAssetController@edit')->name('asset.edit');
    Route::put('asset/{id}', 'PartnerAssetController@update')->name('asset.update');
    Route::delete('asset/{id}', 'PartnerAssetController@destroy')->name('asset.destroy');

    //upload image
    Route::get('/upload-images', 'ImageController@showUploadForm')->name('image.upload');
    Route::post('/upload-images', 'ImageController@upload')->name('image.upload.post');
    Route::post('images/delete-selected', 'ImageController@deleteSelected')->name('images.delete.selected');
    // Deleting via GET could be triggered by a link on another site (CSRF); the view already posts a DELETE form.
    // Route::get('images/delete/{id}', 'ImageController@delete')->name('image.delete');
    Route::delete('images/delete/{id}', 'ImageController@delete')->name('image.delete');
});

    Route::get('/thank_you/{id_order}', 'ThankYouController@show')->name('thank_you')->middleware('throttle:60,1');
    
    Route::post('/import-category', 'CategoryController@import')->name('import.category');
    Route::post('/import-brand', 'BrandController@import')->name('import.brand');
    Route::post('/import-product', 'ProductController@import')->name('import.product');
    Route::post('delete/selected/products', 'ProductController@deleteSelected')->name('delete.selected.products');
    Route::post('delete/selected/brands', 'BrandController@deleteSelected')->name('delete.selected.brands');
    Route::post('/brand/toggle-status/{id}', 'BrandController@toggleStatus')->name('brand.toggleStatus');

	

// Route::get('inject-api', function (Request $request) {
//     $idEvent  = 'HJUQPPJEBJGJNSOBH299';
//         $idTicket = 'JZECYWAHYMGADUGYA296';

//         $start = Carbon::parse('2026-08-26 04:36:57');
//         $end   = Carbon::parse('2026-08-26 09:11:52');

// 		$fields = (new \App\Http\Controllers\VisitorOnlineController)->getOrderFormData();

//     	if (!$fields) {
//         	return response()->json(['error' => 'Gagal mengambil order form fields dari API'], 500);
//     	}

//         $rows = DB::table('buyer_registrations')
//             ->whereBetween('created_at', [$start, $end])
//         	->where('tag', 'visitor_online')
//             ->get();

//         $results   = [];
//         $success   = 0;
//         $failed    = 0;

//         foreach ($rows as $row) {
//             $addForm = json_decode($row->data_addform, true) ?? [];
        
//         	$answersByDetailId = collect($addForm)->keyBy('id_question_detail');

//             $orderFormAnswers = collect($fields)->map(function ($field) use ($answersByDetailId) {
//             	$detailId = $field['id_order_form_detail'];
//             	$existing = $answersByDetailId->get($detailId);

//             	return [
//             	    'id_order_form_master' => $field['id_order_form_master'],
//             	    'id_order_form_detail' => $detailId,
//             	    'answer'               => $existing['answer'] ?? '', // fallback string kosong kalau tidak ada
//            		];
//        		})->values()->all();

//             $payload = [
//                 'id_event'       => $idEvent,
//                 'id_user'        => '',
//                 'platform'       => 'web',
//                 'tickets'        => [
//                     [
//                         'id_ticket'          => $idTicket,
//                         'first_name'         => $row->first_name,
//                         'last_name'          => $row->last_name,
//                         'email'              => $row->email,
//                         'phone'              => $row->phone,
//                         'order_form_answers' => $orderFormAnswers,
//                     ],
//                 ],
//                 'payment_method' => null,
//             ];

//             $response = Http::withHeaders([
//                 'API-Secret-Key' => config('services.kreen.api_secret_key'),
//                 'Content-Type'   => 'application/json',
//             ])->timeout(10)->post('https://kreenconnect.com/kreenapi/order/event/checkout', $payload);

//             if ($response->failed()) {
//                 $failed++;

//                 Log::error('Kreenconnect checkout failed', [
//                     'buyer_registration_id' => $row->id,
//                     'name'                  => $row->first_name . ' ' . $row->last_name,
//                     'status'                => $response->status(),
//                     'body'                  => $response->body(),
//                 ]);

//                 $results[] = [
//                     'id'      => $row->id,
//                     'name'    => $row->first_name . ' ' . $row->last_name,
//                     'success' => false,
//                     'error'   => $response->json() ?? $response->body(),
//                 ];

//                 continue;
//             }

//             $success++;

//             $results[] = [
//                 'id'      => $row->id,
//                 'name'    => $row->first_name . ' ' . $row->last_name,
//                 'success' => true,
//                 'result'  => $response->json(),
//             ];
//         }

//         return response()->json([
//             'summary' => [
//                 'total'   => count($rows),
//                 'success' => $success,
//                 'failed'  => $failed,
//             ],
//             'results' => $results,
//         ]);
// });

