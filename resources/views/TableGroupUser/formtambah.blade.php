<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Form Menambahkan Grup Pengguna</title>
</head>

<body>
    
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Tambah Grup Pengguna</h1>
            <div>
                <a href="/daftargruppengguna" class="btn btn-primary">Kembali</a>
            </div>
        </header>

    <form class="row g-3" action="/daftargruppengguna/create" method="post">
        @csrf
        <div class="col-md-6">
            <label for="name_group" class="form-label">Group Name</label>
            <input type="text" class="form-control" id="name_group" name="name_group" placeholder="Group Name">
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
</script> --}}

</html>