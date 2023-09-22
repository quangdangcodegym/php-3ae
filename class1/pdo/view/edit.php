
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
        <form class="frm-product" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?action=edit&id=' . $product->getId(); ?>">
            <input type="hidden" id="<?= $product->getId() ?>">    
        <div class="row">
                <label for="" class="col-3">Name:</label>
                <input type="text" class="col-7" name="name-product" value="<?= $product->getName() ?>">
            </div>
            <div class="row">
                <label for="" class="col-3">Description:</label>
                <input type="text" class="col-7" name="description-product" value="<?= $product->getDescription() ?>">
            </div>
            <div class="row">
                <label for="" class="col-3">Price:</label>
                <input type="number" class="col-7" name="price-product" value="<?= $product->getPrice() ?>">
            </div>
            <div class="row">
                <label for="" class="col-3"></label>
                <button>Edit</button>
            </div>
        </form>
    </div>

</body>

</html>