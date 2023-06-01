@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tabel Pengguna</h4>
        </div>

        <div>
            <a href="/daftargruppengguna/formtambah" class="my-2 mx-3 btn btn-primary">Tambah Pengguna</a>
        </div><br>
         
        <div class="card-body">
            <div class="table-responsive mx-2">
                <table class="table table-striped" id="dataTable" width="100%">
        
                    <thead>
                        <th>No</th>
                        <th>Group Name</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($group as $g)
                            <tr>
                                <td>{{$g->id}}</td>
                                <td>{{$g->name_group}}</td>
                                <td class="actions">
                                    <a href="/daftargruppengguna/detail/{{$g->id}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-xs"></i></a>
                                    <a href="/daftargruppengguna/formedit/{{$g->id}}" class="btn btn-success btn-sm"><i class="fas fa-pen fa-xs"></i></a>
                                    <a href="/daftargruppengguna/hapus/{{$g->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
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