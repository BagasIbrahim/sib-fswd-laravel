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

        $prducts = DB::table('categories')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->get();
        view()->composer(['/welcome', '/DashboardPage/d_produk'], function ($view) use ($prducts) {
            $view->with('products', $prducts);
        });
    }
}
