<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table categories
        $categories = DB:: table('categories')->get();

        return view('/DashboardPage/d_kategori', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            // memanggil view tambah
            return view('/TableKategori/c_tambah');
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
            'name_category' => 'required|string',
        ],
        [
            'name_category.required' => 'Nama Kategori harus diisi',
            'name_category.string' => 'Nama Kategori harus berupa string'
        ]
    );
        // insert data ke table categories
        DB::table('categories')->insert([
            'name_category' => $request->name_category,
        ]);

        // alihkan halaman ke halaman categories
        return redirect('/daftarkategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mengambil data categories berdasarkan id yang dipilih
        $categories = DB::table('categories')->where('id', $id)->get();
        // passing data categories yang didapat ke view detail.blade.php
        return view('/TableKategori/c_detail', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data categories berdasarkan id yang dipilih
        $categories = DB::table('categories')->where('id', $id)->get();
        // passing data categories yang didapat ke view edit.blade.php
        return view('/TableKategori/c_edit', ['categories' => $categories]);
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
            'name_category' => 'required|string'
        ],
        [
            'name_category.required' => 'Nama Kategori harus diisi',
            'name_category.string' => 'Nama Kategori harus berupa string'
        ]
    );
        // update data categories
		DB::table('categories')->where('id', $request->id)->update([
            'name_category' => $request->name_category
        ]);
        // alihkan halaman ke halaman categories
        return redirect('/daftarkategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data categories berdasarkan id yang dipilih
        DB::table('categories')->where('id', $id)->delete();
        // alihkan halaman ke halaman categories
        return redirect('/daftarkategori');
    }
}
