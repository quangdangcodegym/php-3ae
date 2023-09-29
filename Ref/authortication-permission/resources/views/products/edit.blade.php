<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.css" integrity="sha512-eRBMRR/qeSlGYAb6a7UVwNFgXHRXa62u20w4veTi9suM2AkgkJpjcU5J8UVcoRCw0MS096e3n716Qe9Bf14EyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.all.js" integrity="sha512-cD1xrn0N1tV0ze8axCp+noWgxMFlWVg22HBXUfowicWhJsnAcSXNKnwI77Bkn3yLyqGvwZ/a8M2PtOjVp5vMaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        * {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Edit Product</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('products.update', [ 'id' => $product->id])}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="d-block" for="">Name</label>
                            <input name='name' value="{{old('name') ?? $product->name }}" class="form-control" type="text" placeholder="Enter name..." />
                        </div>
                        <div class="col-sm-6">
                            <label class="d-block" for="">Description</label>
                            <input name='description' value="{{old('description') ?? $product->description}}" class="form-control" type="text" placeholder="Enter description..." />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class="d-block" for="">Price</label>
                            <input type="number" name='price' value="{{old('price') ?? $product->price}}" class="form-control" type="text" placeholder="Enter price..." />
                        </div>
                        <div class="col-sm-6">
                            <label class="d-block" for="">Category</label>
                            <select name='category_id' class="form-select">
                                @foreach ($categories as $cate)
                                <option {{ $cate->id == $product->category_id ? 'selected' : '' }} value="{{ $cate->id}}">{{ $cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <button class="btn btn-primary col-2 mx-2">Update</button>
                        <a class="btn btn-dark col-2" href="{{ route('products.index')}}" class="col-2">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>