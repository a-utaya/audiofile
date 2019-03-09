<?php
session_start();

include('functions.php');

chk_ssid();

$_name = $_SESSION['name'];
$_image = $_SESSION['upfile3'];
// var_dump($_image);
$pdo = db_conn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>account</title>
</head>
<body>
    <p><?=$_image?></p>
    <div class="mx-auto" style="width: 300px; margin-top:100px; font-size: 30px;"><span style="font-size: 50px; color: red;"><?=$_name?></span>さん</div>
    <div class="mx-auto" style="width: 300px; font-size: 30px;">こんにちは！</div>

    <div class="mx-auto" style="width: 250px;">
    <button button type="button" class="btn btn-danger btn-lg" onclick="location.href='user_index.php'" style="margin-top:20px;">Ｅｎｔｅｒ</button>
    </div>
</body>
</html>