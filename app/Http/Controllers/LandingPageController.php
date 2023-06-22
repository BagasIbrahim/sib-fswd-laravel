<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index(){
        $slider = DB::table('slider')->where('status', 'active')->get();
        $products = DB::table('products')->where('status', 'accepted')->get();
        $categories = DB::table('categories')->get();

        return view('welcome', [
            'slider' => $slider,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    // public function show($id){
    //     $product = DB::table('products')->where('id', $id)->get();
    //     $categories = DB::table('categories')->get();

    //     return view('welcome', [
    //         'product' => $product,
    //         'categories' => $categories
    //     ]);
    // }
}