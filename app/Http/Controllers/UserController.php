<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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
			'name_user' => $users->name,
			'group_id' => $users->group_id,
			'role' => $users->role,
			'password' => Hash::make($users->password),
			'email' => $users->email,
			'phone' => $users->telp,
		]);
		// alihkan halaman ke halaman pengguna
		return redirect('/daftarpengguna');
	}
	
	public function show($id)
    {
        // mengambil data pengguna berdasarkan id yang dipilih
		$users = DB::table('users')->where('id', $id)->get();

		// passing data pengguna yang didapat ke view detail.blade.php
		return view('/TableUser/detail', ['users' => $users]);
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
			'name_user' => $users->name,
			'group_id' => $users->group_id,
			'role' => $users->role,
			'password' => Hash::make($users->password),
			'email' => $users->email,
			'phone' => $users->telp,
		]);
		// alihkan halaman ke halaman pengguna
		return redirect('/daftarpengguna');
	}

	public function destroy($id)
	{
		// menghapus data pengguna berdasarkan id yang dipilih
		DB::table('users')->where('id', $id)->delete();

		// alihkan halaman ke halaman pengguna
		return redirect('/daftarpengguna');
	}
}
