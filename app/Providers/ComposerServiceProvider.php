<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // mengambil data dari table users
		$users = DB::table('users')->get();
        view()->composer(['/TableUser/users', '/DashboardPage/d_pengguna'], function ($view) use ($users) {
            $view->with('users', $users);
        });

        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        // ->select('products.id', 'category_id as name_category', 'products.name_product', 'products.description', 'products.price', 'products.status')
        ->get();
        view()->composer(['/welcome', '/DashboardPage/d_produk'], function ($view) use ($products) {
            $view->with('products', $products);
        });
    }
}
