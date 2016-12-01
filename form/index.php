<?php
session_start();
require_once("login.php");
$login = new user();

if($login->is_loggedin()!="")
{
    $login->redirect('form.php');
}

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['nrp']);
    $upass = strip_tags($_POST['password']);
        
    if($login->doLogin($uname,$upass))
    {
        //echo "success";
        $login->redirect('form.php');
    }
    else
    {
        echo "Invalid Login Details";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login TC</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" name="nrp" placeholder="NRP">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button name="btn-login" class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>