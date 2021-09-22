<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
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
        if(config('app.env') === 'development') {
            \URL::forceScheme('https');
        }
        
        Response::macro('success', function($data){
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        });

        Response::macro('error', function($data, $status_code){
            return response()->json([
                'success' => false,
                'data' => $data,
            ],$status_code);
        });
    }
}
