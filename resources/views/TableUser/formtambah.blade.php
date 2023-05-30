<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Form Menambahkan Users</title>
</head>

<body>
    
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Tambah Pengguna</h1>
            <div>
                <a href="/daftarpengguna" class="btn btn-primary">Kembali</a>
            </div>
        </header>

    <form class="row g-3" action="/daftarpengguna/create" method="post">
        @csrf
        <div class="col-12">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
        </div>
        <div class="col-12">
            <label for="group" class="form-label">Group</label>
            <input type="text" class="form-control" id="group_id" name="group_id" placeholder="">
        </div>
        <div class="col-md-6">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
            <option value="user">User</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <input type="checkbox" class="form-checkbox"> Show password
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@examples.com">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Telp</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="08xxxx">
        </div>
        <!-- <div class="col-12">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="inputGroupFile04" name="avatar" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div> -->
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
</script>

</html>