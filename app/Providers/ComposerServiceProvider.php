<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\User;


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
        // // mengambil data dari table users
		// $users = DB::table('users')->get();
        // view()->composer(['/TableUser/users', '/DashboardPage/d_pengguna'], function ($view) use ($users) {
        //     $view->with('users', $users);
        // });

        // $products = Products::select('products.*', 'categories.name_category')
        // ->with( 'categories', 'users')
        // ->join('categories', 'categories.id', '=', 'products.category_id')
        // ->get();
        // view()->composer(['/welcome', '/DashboardPage/d_produk'], function ($view) use ($products) {
        //     $view->with('products', $products);
        // });
    }
}
