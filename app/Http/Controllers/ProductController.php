<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Enums\ServerStatus;

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
        ->select('products.*', 'categories.name_category')
        ->get();
        // dd($products);
        return view('/DashboardPage/d_produk', ['products' => $products]);
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
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name_product' => 'required|string',
            'description' => 'required',
            'price' => 'required|decimal:2',
            'status' => 'required|in:accepted,rejected,waiting',
            'created_by' => 'required|integer',
            'verified_by' => 'required|integer'
        ],
        [
            'category_id.required' => 'Kategori harus diisi.',
            'name_product.required' => 'Nama produk harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'price.required' => 'Harga harus diisi.',
            'status.required' => 'Status harus diisi.',
            'created_by.required' => 'created_by harus diisi.',
            'verified_by.required' => 'verified_by harus diisi.',
            'category_id.integer' => 'Kategori harus berupa angka.',
            'name_product.string' => 'Nama produk harus berupa string.',
            'price.decimal' => 'Harga harus berupa angka.',
            'status.in' => 'Status harus berupa accepted, rejected, atau waiting.',
            'created_by.integer' => 'created_by harus berupa angka.',
            'verified_by.integer' => 'verified_by harus berupa angka.'
        ]      
    );

        // if ($request->fails()) {
        //     return redirect('daftarproduk/formtambah')
        //                 ->withErrors($request);
        // }

        // insert data ke table users
        DB::table('products')->insert([
            'category_id' => $request->category_id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'created_by' => $request->created_by,
            'verified_by' => $request->verified_by
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
    public function update(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name_product' => 'required|string',
            'description' => 'required',
            'price' => 'required|decimal:2',
            'status' => 'required|in:accepted,rejected,waiting',
            'created_by' => 'required|integer',
            'verified_by' => 'required|integer'
        ],
        [
            'category_id.required' => 'Kategori harus diisi.',
            'name_product.required' => 'Nama produk harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'price.required' => 'Harga harus diisi.',
            'status.required' => 'Status harus diisi.',
            'created_by.required' => 'created_by harus diisi.',
            'verified_by.required' => 'verified_by harus diisi.',
            'category_id.integer' => 'Kategori harus berupa angka.',
            'name_product.string' => 'Nama produk harus berupa string.',
            'price.decimal' => 'Harga harus berupa angka.',
            'status.in' => 'Status harus berupa accepted, rejected, atau waiting.',
            'created_by.integer' => 'created_by harus berupa angka.',
            'verified_by.integer' => 'verified_by harus berupa angka.'
        ]
    );



        // if ($request->fails()) {
        //     return redirect('daftarproduk/formedit')
        //                 ->withErrors($request);
        // }
        // update data produk
        DB::table('products')->where('id', $request->id)->update([
            'category_id' => $request->category_id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'created_by' => $request->created_by,
            'verified_by' => $request->verified_by
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
