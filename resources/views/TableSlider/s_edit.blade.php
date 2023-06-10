<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Edit Slider</title>
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Slider</h1>
            <div>
                <a href="/daftarslider" class="btn btn-primary">Kembali</a>
            </div>
        </header>

            @foreach($slider as $s)
                <form class="row g-3" action="/daftarslider/update" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" value="{{$s->id}}">
                    
                    <div class="col-md-12">
                        <label for="name_slider" class="form-label">Slider Name</label>
                        <input type="text" class="form-control" id="name_slider" name="name_slider" value="{{$s->name_slider}}" placeholder="Product Name">
                        {{-- - error message untuk nama slider --}}
                        @error('name_slider')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$s->description}}" placeholder="Slider Description">
                        {{-- - error message untuk description --}}
                        @error('description')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="price" class="form-label">Link Slider</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$s->link}}" placeholder="xxx.xx">
                        - error message untuk price
                        @error('link')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    
                    <div class="col-12">
                        <label for="image" class="form-label d-block">Images Slider</label>
                        @if ($s->image)
                            <img src="{{ asset('storage/images/sliders/' . $s->image) }}" class="rounded-top mb-3"
                            style="width: 150px; height: 150px;" alt="">
                         @endif
                        <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        {{-- - error message untuk image --}}
                        @error('image')
                        <div class="my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" id="update" name="update" class="btn btn-primary">Simpan</button>
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