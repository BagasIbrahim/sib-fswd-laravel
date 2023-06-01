@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tabel Produk</h4>
        </div>

        <div>
            <a href="/daftarproduk/formtambah" class="my-2 mx-3 btn btn-primary">Tambah Produk</a>
        </div><br>
         
        <div class="card-body">
            <div class="table-responsive mx-2">
                <table class="table table-striped" id="dataTable" width="100%">
        
                    <thead>
                        <th>No</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->name_category}}</td>
                                <td>{{$p->name_product}}</td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->status}}</td>
                                <td class="actions">
                                    <a href="/daftarproduk/detail/{{$p->id}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-xs"></i></a>
                                    <a href="/daftarproduk/formedit/{{$p->id}}" class="btn btn-success btn-sm"><i class="fas fa-pen fa-xs"></i></a>
                                    <a href="/daftarproduk/hapus/{{$p->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
                                </td>
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