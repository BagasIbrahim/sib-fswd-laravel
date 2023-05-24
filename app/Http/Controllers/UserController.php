<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
	public function index()
	{
		// mengambil data dari table users
		$users = DB::table('users')->get();

		// mengirim data pegawai ke view users
		return view('/TableUser/users', ['users' => $users]);
	}

	// method untuk menampilkan view form tambah users
	public function create()
	{
		return view('/TableUser/formtambah');
	}

	public function store(Request $users)
	{
		// insert data ke table pengguna
		DB::table('users')->insert([
			'name' => $users->name,
			'role' => $users->role,
			'password' => $users->password,
			'email' => $users->email,
			'phone' => $users->telp,
			'address' => $users->alamat
		]);
		// alihkan halaman ke halaman pengguna
		return redirect('/pengguna');
	}
	
	public function show($id)
    {
        //
    }

	public function edit($id)
	{
		// mengambil data pengguna berdasarkan id yang dipilih
		$users = DB::table('users')->where('id', $id)->get();
		// passing data pengguna yang didapat ke view edit.blade.php
		return view('/TableUser/formedit', ['users' => $users]);
	}

	public function update(Request $users){
		// update data pengguna
		DB::table('users')->where('id', $users->id)->update([
			'name' => $users->name,
			'role' => $users->role,
			'password' => $users->password,
			'email' => $users->email,
			'phone' => $users->telp,
			'address' => $users->alamat
		]);
		// alihkan halaman ke halaman pengguna
		return redirect('/pengguna');
	}

	public function destroy($id)
	{
		// menghapus data pengguna berdasarkan id yang dipilih
		DB::table('users')->where('id', $id)->delete();

		// alihkan halaman ke halaman pengguna
		return redirect('/pengguna');
	}
}
