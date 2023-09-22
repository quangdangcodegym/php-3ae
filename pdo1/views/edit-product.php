<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" >
        <div>
            <label style="width: 100px;display: inline-block;">Name: </label>
            <input type="text" value="<?= $product['name'] ?>" name="name" placeholder="Input name.." />
        </div>
        <div>
            <label style="width: 100px;display: inline-block;">Description: </label>
            <input type="text" value="<?= $product['description'] ?>" name="description" placeholder="Input description.." />
        </div>
        <div>
            <label style="width: 100px;display: inline-block;">Price: </label>
            <input type="text" value="<?= $product['price'] ?>" name="price" placeholder="Input price.." />
        </div>
        <div>
            <label style="width: 100px;display: inline-block;"></label>
            <button>Edit</button>
        </div>
    </form>
</body>
</html>