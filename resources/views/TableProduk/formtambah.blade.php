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

    <form class="row g-3" action="/daftarproduk/create" method="post">
        @csrf
        <div class="col-12">
            <label for="category_id" class="form-label">Category</label>
            <input type="text" class="form-control" id="category_id" name="category_id" placeholder="">
        </div>
        <div class="col-md-6">
            <label for="name_product" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name_product" name="name_product" placeholder="Product Name">
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Product Description">
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="xxx.xx">
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control">
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
            <option value="waiting">Waiting</option>
            </select>
        </div>
        <div class="col-12">
            <label for="created_by" class="form-label">Created</label>
            <input type="text" class="form-control" id="created_by" name="created_by" placeholder="">
        </div>
        <div class="col-12">
            <label for="verified_by" class="form-label">Verified</label>
            <input type="text" class="form-control" id="verified_by" name="verified_by" placeholder="">
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