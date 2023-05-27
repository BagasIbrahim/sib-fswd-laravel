<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/dataTables.bootstrap5.min.css')}}"/>
    <title>Daftar Pengguna</title>
</head>

<body>
    <!-- Tampilkan data -->
    <h1 class="mx-2">Daftar Pengguna</h1>
    <div>
        <a href="/pengguna/formtambah" class="mx-2 btn btn-primary">Tambah Pengguna</a>
        <a href="users_logout.php" class="mx-2 btn btn-danger">Log Out</a>
    </div><br>

        <div class="table-responsive mx-2">
            <table class="table table-striped" id="dataTable" width="100%">
    
                <thead>
                    <th>No</th>
                    <th>Avatar</th>
                    <th>Nama</th>
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
                                <a href="/pengguna/detail/{{$u->id}}" class="mx-1 btn btn-primary"><i class="fas fa-info-circle fa-xs"></i></a>
                                <a href="/pengguna/formedit/{{$u->id}}" class="mx-1 btn btn-success"><i class="fas fa-pen fa-xs"></i></a>
                                <a href="/pengguna/hapus/{{$u->id}}" class="mx-1 btn btn-danger"><i class="fas fa-trash fa-xs"></i></a>
                            </td>
                        </tr>
        
                    @endforeach
        
                </tbody>
        
            </table>
        </div>

</body>

<script src="{{asset('vendor/bootstrap/javascript/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/javascript/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/javascript/dataTables.bootstrap5.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

</html>