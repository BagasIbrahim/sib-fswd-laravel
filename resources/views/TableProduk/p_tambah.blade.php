<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Form Menambahkan Product</title>
</head>

<body>
    
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Tambah Produk</h1>
            <div>
                <a href="/daftarproduk" class="btn btn-primary">Kembali</a>
            </div>
        </header>



    <form class="row g-3" action="/daftarproduk/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option selected disabled>-- Pilih Category --</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name_category }}</option>
                @endforeach
            </select>
            {{-- <input type="text" class="form-control" id="category_id" name="category_id" placeholder=""> --}}
            {{-- - error message untuk category --}}
            @error('category_id')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="name_product" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name_product" name="name_product" placeholder="Product Name">
            {{-- - error message untuk nama product --}}
            @error('name_product')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Product Description"></textarea>
            {{-- - error message untuk description --}}
            @error('description')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="xxx.xx">
            {{-- - error message untuk price --}}
            @error('price')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control">
            @if (Auth::user()->role == 'admin')
            <option value="accepted">Accepted</option>
            @endif
            @if (Auth::user()->role == 'admin')
            <option value="rejected">Rejected</option>
            @endif
            <option value="waiting">Waiting</option>
            </select>
            {{-- - error message untuk status --}}
            @error('status')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="created_by" class="form-label">Created By</label>
            <select name="created_by" id="created_by" class="form-select">
                <option selected disabled>-- Pilih User --</option>
                @foreach ($users as $item)
                <option value="{{ $item->id }}">{{ $item->name_user}}</option>
                @endforeach
            </select>
            {{-- <input type="text" class="form-control" id="created_by" name="created_by" placeholder=""> --}}
            {{-- - error message untuk created --}}
            @error('created_by')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="verified_by" class="form-label">Verified By</label>
            <select name="verified_by" id="verified_by" class="form-select">
                <option selected disabled>-- Pilih User --</option>
                @foreach ($users as $item)
                <option value="{{ $item->id }}">{{ $item->name_user}}</option>
                @endforeach
            </select>
            {{-- <input type="text" class="form-control" id="verified_by" name="verified_by" placeholder=""> --}}
            {{-- - error message untuk verified --}}
            @error('verified_by')
            <div class="my-2 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="image" class="form-label">Images Product</label>
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