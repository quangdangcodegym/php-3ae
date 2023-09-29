<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="<?= $_SERVER['PHP_SELF'] . '?action=create' ?>">Create</a>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php foreach($products as $key=>$p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td>
                    <a href="<?= $_SERVER['PHP_SELF'] . '?action=edit&id=' . $p['id'] ?>"><?= $p['name'] ?></a>
                </td>
                <td><?= $p['description'] ?></td>
                <td><?= $p['price'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="handleClickDelete(<?= $p['id'] ?>, '<?= $p['name'] ?>')" >Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function handleClickDelete(id, name){
            let check = confirm('Bạn có muốn xóa: ' + name);
            if(check == true){
                let url = "http://localhost:3000/LOP%20TOI/PHP-0623/PHP/James/pdo1/products.php?action=delete&id=" + id;

                console.log(url);
                window.location.assign(url);
            }
        }
    </script>
</body>
</html>