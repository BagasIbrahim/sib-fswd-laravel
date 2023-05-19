<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <title>Daftar Pengguna</title>
</head>

<body>
    <!-- Tampilkan data -->
    <h1 class="mx-2">Daftar Pengguna</h1>
    <div>
        <a href="/pengguna/formtambah" class="mx-2 btn btn-primary">Tambah Pengguna</a>
        <a href="users_logout.php" class="mx-2 btn btn-danger">Log Out</a>
    </div><br>

    <table id="myTable">

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
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->phone}}</td>
                    <td>{{$u->role}}</td>
                    <td class="actions">
                        <a href="users_update.php?id={{$u->id}}" class="mx-1 btn btn-success"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="users_delete.php?id={{$u->id}}" class="mx-1 btn btn-danger"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>


</body>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>