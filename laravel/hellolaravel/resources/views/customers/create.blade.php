<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create form</h1>
    <form method="POST" action="{{ route('customers.create')}}">
        @csrf
        <div>
            <label>Username</label>
            <input type="text" name="username" />
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password" />
        </div>

        <button>Create</button>
    </form>
</body>

</html>