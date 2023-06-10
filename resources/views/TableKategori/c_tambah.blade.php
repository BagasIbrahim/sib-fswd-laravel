<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Form Menambahkan Kategori</title>
</head>

<body>
    
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Tambah Kategori</h1>
            <div>
                <a href="/daftarkategori" class="btn btn-primary">Kembali</a>
            </div>
        </header>

    <form class="row g-3" action="/daftarkategori/create" method="post">
        @csrf
        <div class="col-md-6">
            <label for="name_category" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name_category" name="name_category" placeholder="Category Name">
            {{-- - error message untuk name_category --}}
            @error('name_category')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
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