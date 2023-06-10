<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        // mengambil data dari table slider
        $slider = DB::table('slider')->get();

        // mengirim data slider ke view index
        return view('/DashboardPage/d_slider', ['slider' => $slider]);
    }

    public function create()
    {
        return view('/TableSlider/s_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_slider' => 'required|string|min:3',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
        ],
        [
            'name_slider.required' => 'Nama slider tidak boleh kosong',
            'name_slider.string' => 'Nama slider harus berupa string',
            'name_slider.min' => 'Nama slider minimal 3 karakter',
            'description.required' => 'deskripsi tidak boleh kosong',
            'image.required' => 'Gambar tidak boleh kosong',
            'image.mimes' => 'Gambar harus berupa jpeg, png, jpg, atau svg',
        ]
    );
        // Cek apakah upload file
        if ($request->hasFile('image')) {
            $name = $request->file('image');
            $imageName = 'Slider_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/images/sliders', $request->file('image'), $imageName);
        }

        // insert data ke table slider
        DB::table('slider')->insert([
            'name_slider' => $request->name_slider,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // alihkan halaman ke halaman slider
        return redirect('daftarslider');
    }

    public function show($id)
    {
        // mengambil data slider berdasarkan id yang dipilih
        $slider = DB::table('slider')->where('id', $id)->get();
        // passing data slider yang didapat ke view show.blade.php
        return view('/TableSlider/s_detail', ['slider' => $slider]);
    }
    
    public function edit($id)
    {
        // mengambil data slider berdasarkan id yang dipilih
        $slider = DB::table('slider')->where('id', $id)->get();
        // passing data slider yang didapat ke view edit.blade.php
        return view('/TableSlider/s_edit', ['slider' => $slider]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_slider' => 'required|string|min:3',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
        ],
        [
            'name_slider.required' => 'Nama tidak boleh kosong',
            'name_slider.string' => 'Nama harus berupa string',
            'name_slider.min' => 'Nama minimal 3 karakter',
            'description.required' => 'deskripsi tidak boleh kosong',
            'image.required' => 'Gambar tidak boleh kosong',
            'image.mimes' => 'Gambar harus berupa jpeg, png, jpg, atau svg',
        ]
    );
        // Cek apakah upload file
        if ($request->hasFile('image')) {
             // ambil nama file gambar lama dari database
            $oldImage = DB::table('slider')->where('id', $request->id)->value('image');
             // Menghapus file lama dari storage
            Storage::delete('public/images/sliders/'. $oldImage);
            // Menyimpan gambar baru ke storage
            $name = $request->file('image');
            $imageName = 'Slider_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/images/sliders', $request->file('image'), $imageName);
        }

        // update data slider
        DB::table('slider')->where('id', $request->id)->update([
            'name_slider' => $request->name_slider,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // alihkan halaman ke halaman slider
        return redirect('daftarslider');
    }

    public function destroy($id)
    {
         // ambil nama file gambar lama dari database
         $oldImage = DB::table('slider')->where('id', $id)->value('image');
         // Menghapus file lama dari storage
        Storage::delete('public/images/sliders/'. $oldImage);

        // menghapus data slider berdasarkan id yang dipilih
        DB::table('slider')->where('id', $id)->delete();

        // alihkan halaman ke halaman slider
        return redirect('daftarslider');
    }
}
