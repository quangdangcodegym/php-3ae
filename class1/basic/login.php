<?php
    $username_error = null;
    $password_error = null;
    $name = null;
    $password = null;
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        if(!empty($_GET['username'])){
            $name = $_GET['username'];
        }
        if(isset($_GET['password'])){
            $password = $_GET['password'];
        }
        
    
        if($name == "admin" && $password == "admin") {
            echo "<script>alert('login success')</script>";
        }else{
            $username_error = "Thông tin username không hợp lệ";
            $password_error = "Thông tin username không hợp lệ";
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
<form>
    <div class="login">
        <div>
            <h2>Login</h2>
            <label>
                Username:
                <input type="text" name="username" size="30"  placeholder="username" value="<?php echo $name; ?>" />
            </label>
            <label style="color:red; display: block"></label>
        </div>
        <div>
            <label>
                Password:
                <input type="password" name="password" size="30" placeholder="password" value="<?php echo $password; ?>" />
            </label>
            <label style="color:red; display: block;"></label>
        </div>
        
        <input type="submit" value="Sign in"/>
    </div>
</form>
</body>
</html>