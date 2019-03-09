<?php
session_start();

include('functions.php');

chk_ssid();

$_name = $_SESSION['name'];
$_image = $_FILES['upfile3'];
// var_dump($_image);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>photostagram</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">投稿ページ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="top.php">TOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">投稿データ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">ログアウト</a>
                    </li>
                </ul>
                    <p class="login_user"><span><?=$_name?></span>としてログイン中</p>
            </div>
        </nav>
    </header>

    <form method="post" action="insert_file.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="upfile">画像</label>
            <input type="file" class="form-control-file" id="upfile" name="upfile" accept="image/*" capture="camera">
        </div>
        <div class="form-group">
            <label for="upfile2">音声</label>
            <input type="file" class="form-control-file" id="upfile2" name="upfile2" accept="audio/*" capture>
        </div>
        <div class="form-group">
            <label for="comment">つぶやき</label>
            <textarea class="form-control" id="comment" name='comment' rows="3" width="20px"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">投稿する</button>
            <button type="reset" class="btn btn-info">キャンセル</button>
        </div>
    </form>

</body>
</html>