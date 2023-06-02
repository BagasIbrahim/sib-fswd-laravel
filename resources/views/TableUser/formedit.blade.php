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
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" value="{{$u->id}}">

                    <div class="col-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{$u->name_user}}" id="name" name="name" placeholder="Nama Lengkap">
                        {{-- - error message untuk nama user--}}
                        @error('name')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="col-12">
                        <label for="group" class="form-label">Group</label>
                        <input type="text" class="form-control" value="{{$u->group_id}}" id="group_id" name="group_id" placeholder="">
                        {{-- - error message untuk group --}}
                        @error('group_id')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="admin" {{ $u->role == 'admin' ? 'selected' : '' }}
                                                    >Admin</option>
                            <option value="staff" {{ $u->role == 'staff' ? 'selected' : '' }}
                                                    >Staff</option>
                            <option value="user" {{ $u->role == 'user' ? 'selected' : '' }}
                                                    >Users</option>
                            {{--> error message untuk role --}}
                            @error('role')
                            <div class="my-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{$u->password}}">
                        <input type="checkbox" class="form-checkbox"> Show password
                        {{-- - error message untuk password --}}
                        @error('password')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$u->email}}" placeholder="name@examples.com">
                        {{-- - error message untuk email --}}
                        @error('email')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{$u->phone}}" placeholder="08xxxx">
                        {{-- - error message untuk phone --}}
                        @error('telp')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-12">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" value="{{$u->avatar}}"aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div> --}}
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