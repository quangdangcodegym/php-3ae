
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../view/css/style.css">
</head>

<body>
    <div class="container">
        <table border="1" class="tb-product">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p) : ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['name'] ?></td>
                        <td><?= $p['description'] ?></td>
                        <td><?= $p['price'] ?></td>
                        <td class="end-col">
                            <a href="<?php echo $_SERVER['PHP_SELF'] . "?action=edit&id=" . $p['id']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="showDelete(<?= $p['id']?> , '<?= $p['name']?>')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>


            </tbody>
        </table>
    </div>
    <script>
        function showDelete(id, name){
            let check = confirm("Bạn có muốn xóa " + name );
            if(check){
                window.location.href = "<?= $_SERVER['PHP_SELF']. "?action=delete&id=". $p->getId()?>";
            }
        }
        </script>
</body>

</html>