<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        // ->select('products.id', 'category_id AS categories.name_category', 'products.name_product', 'products.description', 'products.price', 'products.status')
        ->get();
        // dd($products);
        return view('/welcome', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('/TableProduk/formtambah');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $products)
    {
        // 
        // insert data ke table users
        DB::table('products')->insert([
            'category_id' => $products->category_id,
            'name_product' => $products->name_product,
            'description' => $products->description,
            'price' => $products->price,
            'status' => $products->status,
            'created_by' => $products->created_by,
            'verified_by' => $products->verified_by
        ]);

        // alihkan halaman ke halaman produk
        return redirect('daftarproduk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $products = DB::table('products')->where('id', $id)->get();
        // passing data produk yang didapat ke view detail.blade.php
        return view('/TableProduk/detail', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $products = DB::table('products')->where('id', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return view('/TableProduk/formedit', ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $products)
    {
        // update data produk
        DB::table('products')->where('id', $products->id)->update([
            'category_id' => $products->category_id,
            'name_product' => $products->name_product,
            'description' => $products->description,
            'price' => $products->price,
            'status' => $products->status,
            'created_by' => $products->created_by,
            'verified_by' => $products->verified_by
        ]);
        // alihkan halaman ke halaman produk
        return redirect('daftarproduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data produk berdasarkan id yang dipilih
        DB::table('products')->where('id', $id)->delete();
        // alihkan halaman ke halaman produk
        return redirect('daftarproduk');
    }
}
