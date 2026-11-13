<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderCheckController;
use App\Http\Controllers\Api\CheckinBackfillController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Unused Laravel scaffold route; the users table has no api_token column, so it only produced 500 errors.
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('check.secretkey')->group(function () {
    Route::post('order/check-qrcode', [OrderCheckController::class, 'checkQrcode']);

    // These write to the live event DB, so they require the API-Secret-Key header too.
    Route::post('/checkin-backfill/run', [CheckinBackfillController::class, 'run']);
    Route::post('/checkin-backfill/fix-flag-present', [CheckinBackfillController::class, 'fixFlagPresent']);
});
