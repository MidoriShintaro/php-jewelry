<?php
session_start();
include "../db/connect.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_admin WHERE email='$username' AND password='$password' LIMIT 1");
    $count = mysqli_num_rows($sql_select_admin);
    $admin = mysqli_fetch_assoc($sql_select_admin);

    if ($count > 0) {
        $_SESSION['admin_name'] = $admin['admin_name'];
        $_SESSION['admin_id'] = $admin['admin_id'];
        header('location: quanlydanhmuc.php');
    } else {
        echo '<p class="text-danger">wrong username or password</p>';
    }
}

if (isset($_GET['logout'])) {
    unset($_SESSION['admin_name']);
}

if (isset($_SESSION['admin_name'])) {
    header('location: quanlydanhmuc.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <title>Signin Template</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./style/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form action="index.php" method="post" class="form-signin">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="username" class="sr-only">Email address</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
</body>

</html>