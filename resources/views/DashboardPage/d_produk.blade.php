@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tabel Produk</h4>
        </div>

        @if (Auth::user()->role == 'admin'||Auth::user()->role == 'staff')           
        <div>
            <a href="/daftarproduk/p_tambah" class="my-2 mx-3 btn btn-primary">Tambah Produk</a>
        </div><br>
        @endif
         
        <div class="card-body ">
            <div class="table-responsive mx-2">
                <table class="table table-bordered" id="dataTable" width="100%">
        
                    <thead>
                        <th>No</th>
                        <th>Image Product</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        @if (Auth::user()->role == 'admin')           
                        <th>Aksi</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td><img style="height: 100px; width: 100px;" src="{{ asset('storage/images/products/' . $p->image) }}" alt=""></td>
                                <td>{{$p->name_category}}</td>
                                <td>{{$p->name_product}}</td>
                                <td>{{$p->description}}</td>
                                <td>RP. {{number_format($p->price, 0)}}</td>
                                <td>{{$p->status}}</td>
                                @if (Auth::user()->role == 'admin')           
                                <td class="actions" style="width: 6em">
                                    <a href="/daftarproduk/p_detail/{{$p->id}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-xs"></i></a>
                                    <a href="/daftarproduk/p_edit/{{$p->id}}" class="btn btn-success btn-sm"><i class="fas fa-pen fa-xs"></i></a>
                                    <a href="/daftarproduk/hapus/{{$p->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
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