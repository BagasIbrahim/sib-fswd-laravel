<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $categories = DB::table('categories')->get();
        $users = DB::table('users')->get();
        // $users = DB::table('users')->get();
         return view ('/TableProduk/p_tambah', ['categories' => $categories, 'users' => $users]);

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
            'created_by' => 'required|integer',
            'verified_by' => 'required|integer',
            'image' => 'required|mimes:jpeg,png,jpg,svg'
        ],
        [
            'category_id.required' => 'Kategori tidak boleh kosong',
            'name_product.required' => 'Nama produk tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'created_by.required' => 'created_by tidak boleh kosong',
            'verified_by.required' => 'verified_by tidak boleh kosong',
            'image.required' => 'Gambar harus di upload.',
            'category_id.integer' => 'Kategori harus berupa angka.',
            'name_product.string' => 'Nama produk harus berupa string.',
            'price.decimal' => 'Harga harus berupa angka.',
            'created_by.integer' => 'created_by harus berupa angka.',
            'verified_by.integer' => 'verified_by harus berupa angka.',
            'image.mimes' => 'Gambar harus berupa jpeg, png, jpg, atau svg.',
        ]      
    );
        // Cek jika role staff menambah data produk
        if(Auth::check()&& Auth::user()->role =="staff"){
            $status = 'waiting';
        } else{
            $request->validate([
                'status' => 'required|in:accepted,rejected,waiting',
            ]);
            $status = $request->status;
        }
        // Cek apakah upload file
        if ($request->hasFile('image')) {
            $name = $request->file('image');
            $imageName = 'Product_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/images/products', $request->file('image'), $imageName);
        }	

        // insert data ke table users
        DB::table('products')->insert([
            'category_id' => $request->category_id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $status,
            'created_by' => $request->created_by,
            'verified_by' => $request->verified_by,
            'image' => $imageName
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
        $categories = DB::table('categories')->get();
        $users = DB::table('users')->get(); 
        // passing data produk yang didapat ke view detail.blade.php
        return view('/TableProduk/p_detail', ['products' => $products, 'categories' => $categories, 'users' => $users]);
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
        $categories = DB::table('categories')->get();
        $users = DB::table('users')->get(); 
        // passing data produk yang didapat ke view edit.blade.php
        return view('/TableProduk/p_edit', ['products' => $products, 'categories' => $categories, 'users' => $users]);
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
            'verified_by' => 'required|integer',
            'image' => 'required|mimes:jpeg,png,jpg,svg'
        ],
        [
            'category_id.required' => 'Kategori tidak boleh kosong',
            'name_product.required' => 'Nama produk tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'created_by.required' => 'created_by tidak boleh kosong',
            'verified_by.required' => 'verified_by tidak boleh kosong',
            'category_id.integer' => 'Kategori harus berupa angka.',
            'image.required' => 'Gambar harus di upload.',
            'name_product.string' => 'Nama produk harus berupa string.',
            'price.decimal' => 'Harga harus berupa angka.',
            'status.in' => 'Status harus berupa accepted, rejected, atau waiting.',
            'created_by.integer' => 'created_by harus berupa angka.',
            'verified_by.integer' => 'verified_by harus berupa angka.',
            'image.mimes' => 'Gambar harus berupa jpeg, png, jpg, atau svg.',
        ]
    );
    if ($request->hasFile('image')) {

        // ambil nama file gambar lama dari database
        $oldImage = DB::table('products')->where('id', $request->id)->value('image');
        // Menghapus file lama dari storage
        Storage::delete('public/images/products/'. $oldImage);
        // Menyimpan gambar baru ke storage
        $name = $request->file('image');
        $imageName = 'Product_' . time() . '.' . $name->getClientOriginalExtension();
        Storage::putFileAs('public/images/products', $request->file('image'), $imageName);

    }	
        DB::table('products')->where('id', $request->id)->update([
            'category_id' => $request->category_id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'created_by' => $request->created_by,
            'verified_by' => $request->verified_by,
            'image' => $imageName
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
        // ambil nama file gambar lama dari database
        $oldImage = DB::table('products')->where('id', $id)->value('image');
        // Menghapus file lama dari storage
        Storage::delete('public/images/products/'. $oldImage);
        
        // menghapus data produk berdasarkan id yang dipilih
        DB::table('products')->where('id', $id)->delete();
        // alihkan halaman ke halaman produk
        return redirect('daftarproduk');
    }
}
