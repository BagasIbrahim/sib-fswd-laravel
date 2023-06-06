<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class APIProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name_category')
        ->get();
        return response()->json([
            'status' => 200,
            'message' => 'Data Produk Berhasil Ditampilkan',
            'data' => $products,
        ]);
    }

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

        return response()->json([
            'status' => 200,
            'message' => 'Data Produk Berhasil Ditambahkan',
            'data' => $request->all(),
        ]);
    }

    public function show($id)
    {
        $products = DB::table('products')->where('id', $id)->get();
        return response()->json([
            'status' => 200,
            'message' => 'Data Produk Berhasil Ditampilkan',
            'data' => $products,
        ]);
    }
    
    public function update(Request $request, $id)
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
       DB::table('products')->where('id', $id)->update([
            'category_id' => $request->category_id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'created_by' => $request->created_by,
            'verified_by' => $request->verified_by
        ]);

        //update products
        

        return response()->json([
            'status' => 200,
            'message' => 'Data Produk Berhasil Diupdate',
            'data' => $request->all(),
        ]);
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data Produk Berhasil Dihapus',
        ]);
    }
}
