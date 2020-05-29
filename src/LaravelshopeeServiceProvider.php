<?php


namespace Huaqiang\LaravelShopee;


use Carbon\Laravel\ServiceProvider;
use Huaqiang\LaravelShopee\Services\Shopee;

class LaravelshopeeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('shopee', function () {
            return new Shopee();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/shopee.php' => config_path('shopee.php'),
        ]);
    }
}