@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tabel Kategori</h4>
        </div>

        @if (Auth::user()->role == 'admin')           
        <div>
            <a href="/daftarkategori/c_tambah" class="my-2 mx-3 btn btn-primary">Tambah Kategori</a>
        </div><br>
        @endif
         
        <div class="card-body">
            <div class="table-responsive mx-2">
                <table class="table table-bordered" id="dataTable" width="100%">
        
                    <thead>
                        <th>No</th>
                        <th>Category Name</th>  
                        @if (Auth::user()->role == 'admin')             
                        <th>Aksi</th>                                 
                        @endif
                    </thead>
                    <tbody>
                        @foreach($categories as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->name_category}}</td>
                                @if (Auth::user()->role == 'admin')           
                                <td class="actions" >
                                    <a href="/daftarkategori/c_detail/{{$c->id}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-xs"></i></a>
                                    <a href="/daftarkategori/c_edit/{{$c->id}}" class="btn btn-success btn-sm"><i class="fas fa-pen fa-xs"></i></a>
                                    <a href="/daftarkategori/hapus/{{$c->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
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