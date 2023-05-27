<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Edit Pengguna</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Pengguna</h1>
            <div>
                <a href="/daftarpengguna" class="btn btn-primary">Kembali</a>
            </div>
        </header>

        @foreach($users as $u)
                <form class="row g-3" action="/daftarpengguna/update" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$u->id}}">

                    <div class="col-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{$u->name_user}}" id="name" name="name" placeholder="Nama Lengkap">
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="admin" <?php if ($u->role == 'admin') {
                                                        echo 'selected';
                                                    } ?>>Admin</option>
                            <option value="staff" <?php if ($u->role == 'staff') {
                                                        echo 'selected';
                                                    } ?>>Staff</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{$u->password}}">
                        <input type="checkbox" class="form-checkbox"> Show password
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$u->email}}" placeholder="name@examples.com">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{$u->phone}}" placeholder="08xxxx">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$u->address}}">
                    </div>
                    <div class="col-12">
                        <button type="submit" id="update" name="update" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            @endforeach
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script>

</html>