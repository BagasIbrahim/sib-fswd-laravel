<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserGroup;



class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table users_group
        $group = DB:: table('users_group')->get();
        // mengirim data users_group ke view index
        return view('/DashboardPage/d_grup_pengguna', ['group' => $group]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // memanggil view tambah
        return view('/TableGroupUser/g_tambah');
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
            'name_group' => 'required|string'
        ],
        [
            'name_group.required' => 'Nama Grup harus diisi',
            'name_group.string' => 'Nama Grup harus berupa string'
        ]);
        // insert data ke table users_group
        DB::table('users_group')->insert([
            'name_group' => $request->name_group
        ]);
        // alihkan halaman ke halaman grup pengguna
        return redirect('/daftargruppengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mengambil data users_group berdasarkan id yang dipilih
        $group = DB::table('users_group')->where('id', $id)->get();
        // passing data users_group yang didapat ke view detail.blade.php
        return view('/TableGroupUser/g_detail', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data users_group berdasarkan id yang dipilih
        $group = DB::table('users_group')->where('id', $id)->get();
        // passing data users_group yang didapat ke view edit.blade.php
        return view('/TableGroupUser/g_edit', ['group' => $group]);
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
            'name_group' => 'required|string'
        ],
        [
            'name_group.required' => 'Nama grup pengguna harus diisi',
            'name_group.string' => 'Nama grup pengguna harus berupa string'
        ]);
        // update data users_group
		DB::table('users_group')->where('id', $request->id)->update([
            'name_group' => $request->name_group,
        ]);
        // alihkan halaman ke halaman grup pengguna
        return redirect('/daftargruppengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data users_group berdasarkan id yang dipilih
        DB::table('users_group')->where('id', $id)->delete();
        // alihkan halaman ke halaman grup pengguna
        return redirect('/daftargruppengguna');
    }
}
