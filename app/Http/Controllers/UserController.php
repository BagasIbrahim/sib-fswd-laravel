<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;	
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

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

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'group_id' => 'required|integer',
			'role' => 'required|in:admin,staff,user',
			'password' => 'required|min:5',
			'email' => 'required|email',
			'telp' => 'required|numeric',
			// 'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		],
		[
			'name.required' => 'Nama tidak boleh kosong',
			'name.string' => 'Nama harus berupa string',
			'name.min' => 'Nama minimal 3 karakter',
			'group_id.required' => 'Group tidak boleh kosong',
			'group_id.integer' => 'Group harus berupa angka',
			'role.required' => 'Role tidak boleh kosong',
			'role.in' => 'Role harus berupa admin, staff, atau user',
			'password.required' => 'Password tidak boleh kosong',
			'password.min' => 'Password minimal 5 karakter',
			'email.required' => 'Email tidak boleh kosong',
			'email.email' => 'Email tidak valid',
			'telp.required' => 'Nomor telepon tidak boleh kosong',
			'telp.numeric' => 'Nomor telepon harus berupa angka',
		]
	);
		// 
		if ($request->hasFile('avatar')) {
            $name = $request->file('avatar');
            $fileName = 'User_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/images', $request->file('avatar'), $fileName);
        }
		// insert data ke table pengguna
		DB::table('users')->insert([
			'name_user' => $request->name,
			'group_id' => $request->group_id,
			'role' => $request->role,
			'password' => Hash::make($request->password),
			'email' => $request->email,
			'phone' => $request->telp,
			// 'avatar' => $fileName->avatar,
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

	public function update(Request $request)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'group_id' => 'required|integer',
			'role' => 'required|in:admin,staff,user',
			'password' => 'required|min:5',
			'email' => 'required|email',
			'telp' => 'required|numeric',
			// 'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		],
		[
			'name.required' => 'Nama tidak boleh kosong',
			'name.string' => 'Nama harus berupa string',
			'name.min' => 'Nama minimal 3 karakter',
			'group_id.required' => 'Group tidak boleh kosong',
			'group_id.integer' => 'Group harus berupa angka',
			'role.required' => 'Role tidak boleh kosong',
			'role.in' => 'Role harus berupa admin, staff, atau user',
			'password.required' => 'Password tidak boleh kosong',
			'password.min' => 'Password minimal 5 karakter',
			'email.required' => 'Email tidak boleh kosong',
			'email.email' => 'Email tidak valid',
			'telp.required' => 'Nomor telepon tidak boleh kosong',
			'telp.numeric' => 'Nomor telepon harus berupa angka',
		]
	);

		if ($request->hasFile('avatar')) {
            $name = $request->file('avatar');
            $fileName = 'User_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/images', $request->file('avatar'), $fileName);
        }

		// update data pengguna
		DB::table('users')->where('id', $request->id)->update([
			'name_user' => $request->name,
			'group_id' => $request->group_id,
			'role' => $request->role,
			'password' => Hash::make($request->password),
			'email' => $request->email,
			'phone' => $request->telp,
			// 'avatar' => $fileName,
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
