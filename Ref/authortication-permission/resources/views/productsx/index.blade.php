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

    @vite(['resources/css/style.css', 'resources/css/productx.css'])
</head>

<body>
    <!-- <div class="navbar">
        <ul class="menu-bar">
            <li><a href="">Hello 1</a></li>
            <li><a href="">Hello 2</a></li>
            <li><a href="">Hello 3</a></li>
        </ul>
    </div> -->
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light container menu-app">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Products</a>
                    <a class="nav-link" href="#">Musics</a>
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">About</a>
                </div>
            </div>
            <div class="profile">
                <a class="profile-menu-title">Quang Đặng</a>
                <ul class="dropdown-menu profile-menu-list" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

        </nav>
    </div>
    <div class="main container p-5">
        <h1 class="text-center">List Products</h1>
        <div class="productx-cards">
            @foreach($products as $p)
            <x-product :productPrice='$p->price' :productTitle='$p->name' :productDescription='$p->description' />
            @endforeach

        </div>
    </div>

    <div class="footer">
        <span>Copy right @Codegym Huế</span>
    </div>

    <script>
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