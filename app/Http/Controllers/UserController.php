<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;	
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
	public function index()
	{
		// mengambil data dari table users
		$users = DB::table('users')
		->join('users_group', 'users_group.id', '=', 'users.group_id')
		->select('users.*', 'users_group.name_group')
		->get();
		// mengirim data pegawai ke view users
		return view('/DashboardPage/d_pengguna', ['users' => $users]);
	}

	// method untuk menampilkan view form tambah users
	public function create()
	{
		$group = DB::table('users_group')->get();
		return view('/TableUser/u_tambah', ['users_group' => $group]);
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
			'avatar' => 'required|mimes:jpeg,png,jpg,svg',
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
			'avatar.required' => 'Avatar tidak boleh kosong',
			'avatar.mimes' => 'Avatar harus berupa jpeg, png, jpg, atau svg',
		]
	);
		// Cek apakah upload file
        if ($request->hasFile('avatar')) {
            $name = $request->file('avatar');
            $imageName = 'User_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/images/users', $request->file('avatar'), $imageName);
        }	


		// insert data ke table pengguna
		DB::table('users')->insert([
			'name_user' => $request->name,
			'group_id' => $request->group_id,
			'role' => $request->role,
			'password' => Hash::make($request->password),
			'email' => $request->email,
			'phone' => $request->telp,
			'avatar' => $imageName,
		]);
		// alihkan halaman ke halaman pengguna
		return redirect('/daftarpengguna');
	}
	
	public function show($id)
    {
        // mengambil data pengguna berdasarkan id yang dipilih
		$users = DB::table('users')->where('id', $id)->get();
		$group = DB::table('users_group')->get();
		// passing data pengguna yang didapat ke view detail.blade.php
		return view('/TableUser/u_detail', ['users' => $users, 'users_group' => $group]);
    }

	public function edit($id)
	{
		// mengambil data pengguna berdasarkan id yang dipilih
		$users = DB::table('users')->where('id', $id)->get();
		$group = DB::table('users_group')->get();
		// passing data pengguna yang didapat ke view edit.blade.php
		return view('/TableUser/u_edit', ['users' => $users, 'users_group' => $group]);
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
			'avatar' => 'required|mimes:jpeg,png,jpg,svg',
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
			'avatar.required' => 'Avatar tidak boleh kosong',
			'avatar.mimes' => 'Avatar harus berupa jpeg, png, jpg, atau svg',
		]
		);
		if ($request->hasFile('avatar')) {

			// ambil nama file gambar lama dari database
			$oldImage = DB::table('users')->where('id', $request->id)->value('avatar');
			// Menghapus file lama dari storage
			Storage::delete('public/images/users/'. $oldImage);
			
			$name = $request->file('avatar');
			$imageName = 'User_' . time() . '.' . $name->getClientOriginalExtension();
			Storage::putFileAs('public/images/users', $request->file('avatar'), $imageName);

		}	

		// update data pengguna
		DB::table('users')->where('id', $request->id)->update([
			'name_user' => $request->name,
			'group_id' => $request->group_id,
			'role' => $request->role,
			'password' => Hash::make($request->password),
			'email' => $request->email,
			'phone' => $request->telp,
			'avatar' => $imageName,
		]);
		// alihkan halaman ke halaman pengguna
		return redirect('/daftarpengguna');
	}

	public function destroy($id)
	{

		// ambil nama file gambar lama dari database
		$oldImage = DB::table('users')->where('id', $id)->value('avatar');
		// Menghapus file lama dari storage
		Storage::delete('public/images/users/'. $oldImage);

		// menghapus data pengguna berdasarkan id yang dipilih
		DB::table('users')->where('id', $id)->delete();

		// alihkan halaman ke halaman pengguna
		return redirect('/daftarpengguna');
	}
}
