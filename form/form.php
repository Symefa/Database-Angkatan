<?php
require_once('session.php');
require('dulur.php');
require_once('login.php');
$logs = new user();
$data = new dulur();
if(isset($_POST['btn-submit']))
{
    $data->modif($_SESSION['user_session'], $_POST['nama'], $_POST['nick'], $_POST['hometown'], $_POST['birthday'],$_POST['phone'], $_POST['email'], $_POST['adress'], $_POST['homeaddress'], $_POST['idline'], $_POST['instagram'], 0);
    $logs->logout();
    $logs->redirect('index.php');
}

$conf = require 'conf.php';
$db = new PDO("mysql:host={$conf['dbHost']};dbname={$conf['dbName']}",
            $conf['dbUser'],
            $conf['dbPass']
            );
$stmt2 = $db->prepare("SELECT * FROM tc_member WHERE id=:uname LIMIT 1");
$stmt2->bindparam(':uname', $_SESSION['user_session']);
$stmt2->execute();
$userRow=$stmt2->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form TC</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
</head>

<body>
    <div class="contact-clean">
        <form method="post">
            <h2 class="text-center" style="margin-bottom: 0px;">Data Pribadi</h2>
            <h3 class="text-center" style="margin-top: 10px;margin-bottom: 36px;"><?php echo $userRow['id'];?></h3>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="nama" placeholder="Nama" value = "<?php echo $userRow['name']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="nick" placeholder="Nama Panggilan" value = "<?php echo $userRow['nick']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="hometown" placeholder="Kota Asal" value = "<?php echo $userRow['hometown']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="birthday" placeholder="Tanggal Lahir DD/MM/YY" value = "<?php echo $userRow['birthday']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="phone" placeholder="Nomor Telpon" value = "<?php echo $userRow['phone']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="email" placeholder="Alamat Email" value = "<?php echo $userRow['email']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="adress" placeholder="Alamat Surabaya" value = "<?php echo $userRow['adress']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="homeaddress" placeholder="Alamat Asal" value = "<?php echo $userRow['homeaddress']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="idline" placeholder="ID Line" value = "<?php echo $userRow['idline']; ?>"></div>
            <div class="form-group has-success">
                <input class="form-control" type="text" name="instagram" placeholder="Instragram" value = "<?php echo $userRow['instagram']; ?>"></div>
            <div class="form-group">
                <button name='btn-submit' class="btn btn-primary" type="submit">send</button>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>