<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Form Menambahkan Slider</title>
</head>

<body>
    
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Tambah Slider</h1>
            <div>
                <a href="/daftarslider" class="btn btn-primary">Kembali</a>
            </div>
        </header>



    <form class="row g-3" action="/daftarslider/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="name_slider" class="form-label">Slider Name</label>
            <input type="text" class="form-control" id="name_slider" name="name_slider" placeholder="Slider Name">
            {{-- - error message untuk name_slider --}}
            @error('name_slider')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Slider Description"></textarea>
            {{-- - error message untuk description --}}
            @error('description')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
            @if (Auth::user()->role == 'admin')
            <option value="active">Active</option>
            @endif
            @if (Auth::user()->role == 'admin')
            <option value="expired">Expired</option>
            @endif
            <option value="pending">Pending</option>
            </select>
            {{-- - error message untuk status --}}
            @error('status')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="image" class="form-label">Images Slider</label>
            <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            {{-- - error message untuk image --}}
            @error('image')
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