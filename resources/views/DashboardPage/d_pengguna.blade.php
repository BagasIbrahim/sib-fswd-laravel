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
            <a href="/daftarpengguna/formtambah" class="my-2 mx-3 btn btn-primary">Tambah Pengguna</a>
        </div><br>
         
        <div class="card-body">
            <div class="table-responsive mx-2">
                <table class="table table-striped" id="dataTable" width="100%">
        
                    <thead>
                        <th>No</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->avatar}}</td>
                                <td>{{$u->name_user}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->phone}}</td>
                                <td>{{$u->role}}</td>
                                <td class="actions">
                                    <a href="/daftarpengguna/detail/{{$u->id}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-xs"></i></a>
                                    <a href="/daftarpengguna/formedit/{{$u->id}}" class="btn btn-success btn-sm"><i class="fas fa-pen fa-xs"></i></a>
                                    <a href="/daftarpengguna/hapus/{{$u->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
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