<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Detail Produk</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Detail Produk</h1>
            <div>
                <a href="/daftarproduk" class="btn btn-primary">Kembali</a>
            </div>
        </header>

        @foreach($products as $p)
                <form class="row g-3">
                    @csrf
                    <input type="hidden" name="id" value="{{$p->id}}">

                    <div class="col-12">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option selected disabled>-- Pilih Category --</option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $p->category_id == $item->id ? 'selected' : '' }}>{{ $item->name_category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="name_product" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name_product" name="name_product" value="{{$p->name_product}}" placeholder="Product Name">
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$p->description}}" placeholder="Product Description">
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$p->price}}" placeholder="xxx.xx">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="accepted" {{ $p->status == 'accepted' ? 'selected' : '' }}
                            >Accepted</option>
                            <option value="rejected" {{ $p->status == 'rejected' ? 'selected' : '' }}
                            >Rejected</option>
                            <option value="waiting" {{ $p->status == 'waiting' ? 'selected' : '' }}
                            >Waiting</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="created_by" class="form-label">Created By</label>
                        <select name="created_by" id="created_by" class="form-select">
                            <option selected disabled>-- Pilih User --</option>
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}" {{ $p->created_by == $item->id ? 'selected' : '' }}>{{ $item->name_user}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="verified_by" class="form-label">Verified By</label>
                        <select name="verified_by" id="verified_by" class="form-select">
                            <option selected disabled>-- Pilih User --</option>
                            @foreach ($users as $item)
                            <option value="{{ $item->id }}" {{ $p->verified_by == $item->id ? 'selected' : '' }}>{{ $item->name_user}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" value="{{$p->verified_by}}" id="verified_by" name="verified_by" placeholder=""> --}}
                        {{-- - error message untuk verified --}}
                        @error('verified_by')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>\
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="image" class="form-label d-block">Images Product</label>
                        @if ($p->image)
                            <img src="{{ asset('storage/images/products/' . $p->image) }}" class="rounded-top mb-3"
                            style="width: 150px; height: 150px;" alt="">
                         @endif
                    </div>
                </form>
            @endforeach
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script> --}}

</html>