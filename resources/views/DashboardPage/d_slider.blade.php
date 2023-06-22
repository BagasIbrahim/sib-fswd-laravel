@extends('layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    {{-- <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div> --}}

    {{-- <!-- Content Row -->
    <div class="row"> --}}
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tabel Slider</h4>
        </div>

        @if (Auth::user()->role == 'admin'||Auth::user()->role == 'staff')           
        <div>
            <a href="/daftarslider/s_tambah" class="my-2 mx-3 btn btn-primary">Tambah Slider</a>
        </div><br>
        @endif
         
        <div class="card-body">
            <div class="table-responsive mx-2">
                <table class="table table-bordered" id="dataTable" width="100%">
        
                    <thead>
                        <th>No</th>
                        <th>Image Product</th>
                        <th>Slider Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        {{-- <th>Link</th> --}}
                        @if (Auth::user()->role == 'admin')           
                        <th>Aksi</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach($slider as $s)
                            <tr>
                                <td>{{$s->id}}</td>
                                <td><img style="height: 100px; width: 100px;" src="{{ asset('storage/images/sliders/' . $s->image) }}" alt=""></td>
                                <td>{{$s->name_slider}}</td>
                                <td style="width: 25em">{{$s->description}}</td>
                                <td>{{$s->status}}</td>
                                @if (Auth::user()->role == 'admin')           
                                <td class="actions" style="width: 6em">
                                    <a href="/daftarslider/s_detail/{{$s->id}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-xs"></i></a>
                                    <a href="/daftarslider/s_edit/{{$s->id}}" class="btn btn-success btn-sm"><i class="fas fa-pen fa-xs"></i></a>
                                    <a href="/daftarslider/hapus/{{$s->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
                                </td>
                                @endif
                            </tr>
            
                        @endforeach
            
                    </tbody>
            
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection