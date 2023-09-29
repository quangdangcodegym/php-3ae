<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.css" integrity="sha512-eRBMRR/qeSlGYAb6a7UVwNFgXHRXa62u20w4veTi9suM2AkgkJpjcU5J8UVcoRCw0MS096e3n716Qe9Bf14EyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.all.js" integrity="sha512-cD1xrn0N1tV0ze8axCp+noWgxMFlWVg22HBXUfowicWhJsnAcSXNKnwI77Bkn3yLyqGvwZ/a8M2PtOjVp5vMaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            font-size: 16px;
            font-weight: 400;
            font-family: 'Times New Roman', Times, serif;
        }

        .menu {
            height: 70px;
            background: rebeccapurple;
        }

        .footer {
            height: 70px;
            background: rebeccapurple;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer span {
            display: flex;
            text-align: center;
            align-items: center;
            height: 100%;
        }

        .main {
            min-height: calc(100vh - 70px - 70px);


        }
    </style>
</head>

<body>
    <div class="menu">

    </div>
    <div class="main container p-5">
        <h1 class="text-center">List Products</h1>
        <div class="row justify-content-between mb-sm-5">
            <div class="col-sm-2 row ps-1">
                <a href="{{ route('products.create')}}"><button class="btn btn-primary col-12">Create</button></a>
            </div>
            <div class="col-sm-6 row">
                <div class="col-sm-7 px-sm-0">
                    <input class="form-control col-12" type="text" placeholder="Search..." />
                </div>
                <div class="col-sm-5">
                    <button class="btn btn-primary col-12">Search</button>
                </div>
            </div>
        </div>
        <div style="max-height: calc(100vh - 70px - 70px); overflow: auto;">
            @if(session('msg') && session('msgAction'))
            <!-- <div class="alert alert-danger">{{ session('msg') }}</div> -->
            <script>
                var msgAction = '{{ session("msgAction") }}';
                var msg = '{{ session("msg") }}';
                Swal.fire({
                    position: 'top-end',
                    icon: msgAction == 'success' ? 'success' : 'error',
                    title: msg,
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td>{{ $p->id}}</td>
                        <td>{{ $p->name}}</td>
                        <td>{{ $p->description}}</td>
                        <td>{{ $p->status ? 'TRUE' : 'FALSE'}}</td>
                        <td>{{ $p->price}}</td>
                        <td>
                            {{ $p->category->name}}
                        </td>
                        <td>
                            <a href="{{ route('products.edit', ['id' => $p->id ])}}" class="btn btn-primary">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a onclick="handleTrash('{{ $p->id}}', '{{$p->name}}')" href="javascript:void(0)" class="btn btn-secondary">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <span>Copy right @Codegym Huế</span>
    </div>

    <script>
        public

        function showSwal(msgAction, msg) {
            Swal.fire({
                position: 'top-end',
                icon: msgAction == 'success' ? 'success' : 'error',
                title: msg,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                if (msgAction == 'success') {
                    window.location.assign("/products");
                }
            })
        }

        function handleTrash(id, name) {
            Swal.fire({
                title: 'Are you sure delete?',
                text: name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var theUrl = "/products/" + id;
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            showSwal('success', 'Delete product successfully');

                        } else {
                            showSwal('error', 'Can not delete products');
                        }
                    };
                    xmlHttp.open("DELETE", theUrl, false); // false for synchronous request
                    xmlHttp.setRequestHeader("X-CSRF-TOKEN", csrfToken);
                    xmlHttp.send(null);
                    return xmlHttp.responseText;
                }
            })
        }
    </script>
</body>

</html>