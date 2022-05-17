<?php

namespace App\Providers;

use App\Services\SCL\Cart\CartService;
use App\Services\SCL\Cart\CartServiceInterface;
use App\Services\SCL\Customer\CustomerService;
use App\Services\SCL\Customer\CustomerServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $service = [];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->service = [
            CartServiceInterface::class => CartService::class,
            CustomerServiceInterface::class => CustomerService::class,
        ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->service as $interface => $class) {
            $this->app->bind($interface, $class);
        }
    }
}
