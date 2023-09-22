<?php
$username = null;
$password = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["username"])) {
        $username = $_POST["username"];
    }
    if (!empty($_POST["password"])) {
        $password = $_POST["password"];
    }
    if ($username === "admin" && $password === "admin") {
        echo "<h3>Welcome <span style='color:red'>" . $username . "</span> to website</h3>";
    } else {
        echo "<h3><span style='color:red'>Login Error</span></h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div>
            <label>Username</label>
            <input type="text" value="<?= $username ?: 'aa' ?>" placeholder="username" name="username" ?>
        </div>
        <div>
            <label>Pass</label>
            <input type="text" placeholder="pass" name="password" ?>
        </div>
        <div>
            <button type="submit" name="btnlogin" id="btnlogin"> Login</button>
            <button type="submit" name="btncancel" id="btncancel"> Cancel</button>
        </div>
    </form>

</body>

</html>