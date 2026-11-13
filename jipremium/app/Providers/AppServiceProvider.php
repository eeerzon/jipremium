<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Laravel 8+ defaults to Tailwind; keep the Bootstrap 4 pagination views used by Laravel 7.
        Paginator::useBootstrapFour();

        // Local only: registration forms post real orders to Kreen. Answer those calls with a fake
        // response instead. Read-only Kreen calls (form questions, attendance data) still go out.
        if ($this->app->environment('local') && config('services.kreen.fake_order_api')) {
            Http::fake([
                'kreenconnect.com/kreenapi/order/event/checkout' => function ($request) {
                    Log::warning('KREEN_FAKE_ORDER_API: checkout was NOT sent to Kreen', ['url' => $request->url()]);

                    return Http::response([
                        'success' => true,
                        'message' => 'Local fake checkout (not sent to Kreen)',
                        'data' => [],
                    ], 200);
                },
                'kreenconnect.com/kreenapi/order/event-jipremium' => Http::response([
                    'success' => false,
                    'message' => 'Local fake lookup (not sent to Kreen)',
                    'data' => [],
                ], 200),
            ]);
        }
    }
}
