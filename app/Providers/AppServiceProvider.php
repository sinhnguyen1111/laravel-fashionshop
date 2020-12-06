<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

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
        if(!Cache::has('product_number')){
            $product_number = Product::count();
            Cache::put('product_number',$product_number,60);
        }
        $product = Cache::get('product_number');

        if(!Cache::has('user_number')){
            $user_number = User::count();
            Cache::put('user_number',$user_number,60);
        }
        $category = Cache::get('user_number');
        $cate = Category::where('parent_id','0')->get();
        View::share([
            'cate'=>$cate,
            'product_count'=>$product,
            'user_count'=>$category
            ]);
    }
}
