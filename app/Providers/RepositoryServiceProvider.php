<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repository = [];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->repository = [
            'App\Repositories\Customer\CustomerRepositoryInterface' => 'App\Repositories\Customer\CustomerRepository',
            'App\Repositories\CartItem\CartItemRepositoryInterface' => 'App\Repositories\CartItem\CartItemRepository',
            'App\Repositories\Cart\CartRepositoryInterface' => 'App\Repositories\Cart\CartRepository',
        ];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->repository as $interface => $class) {
            $this->app->bind($interface, $class);
        }
    }
}
