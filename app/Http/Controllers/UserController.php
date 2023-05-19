<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function users(){
        // mengambil data dari table users
    	$users = DB::table('users')->get();
 
    	// mengirim data pegawai ke view users
    	return view('/TableUser/users',['users' => $users]);
    }
    
    // method untuk menampilkan view form tambah users
    public function formtambah(){
        return view('/TableUser/formtambah');
    }

    public function create(Request $users){
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
}
