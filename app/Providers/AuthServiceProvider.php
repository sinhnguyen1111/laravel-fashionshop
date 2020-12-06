<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Product' => 'App\Policies\ProductPolicy',
        // Product::class => ProductPolicy::class,
        'App\Models\Product' => 'App\Policies\ProductPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // $this->ProductPolicy();

        Gate::define('update-product', function ($user, $product){
            return $user->id === $product->user_id;
         });
    }
}
