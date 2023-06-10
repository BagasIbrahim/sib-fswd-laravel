@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tabel Pengguna</h4>
        </div>

        @if (Auth::user()->role == 'admin')           
        <div>
            <a href="/daftarpengguna/u_tambah" class="my-2 mx-3 btn btn-primary">Tambah Pengguna</a>
        </div><br>
        @endif
         
        <div class="card-body">
            <div class="table-responsive mx-2">
                <table class="table table-bordered" id="dataTable" width="100%">
        
                    <thead>
                        <th>No</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        @if (Auth::user()->role == 'admin')           
                        <th>Aksi</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td><img style="height: 100px; width: 100px;" src="{{ asset('storage/images/users/' . $u->avatar) }}" alt=""></td>
                                <td>{{$u->name_user}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->phone}}</td>
                                <td>{{$u->name_group}}</td>
                                @if (Auth::user()->role == 'admin')           
                                <td class="actions" style="width: 6em">
                                    <a href="/daftarpengguna/u_detail/{{$u->id}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle fa-xs"></i></a>
                                    <a href="/daftarpengguna/u_edit/{{$u->id}}" class="btn btn-success btn-sm"><i class="fas fa-pen fa-xs"></i></a>
                                    <a href="/daftarpengguna/hapus/{{$u->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-xs"></i></a>
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