<?php
session_start();

include('functions.php');

chk_ssid();

$_name = $_SESSION['name'];
// $_image = $result['image'];
// var_dump($_image);
$pdo = db_conn();
$user_id = $_GET['id'];


$sql = 'SELECT * FROM php05_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status==false) {
    errorMsg($stmt);
} else {
    $view='';
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['indate'].'</p>';
        $view .= '<img src="'.$result['image'].'" alt="" height="150px">';
        $view .= '<audio preload="auto" controls>'.'<source src="'.$result['audio'].'">'.'</audio>';
        $view .= '<p>'."いいね！".'</p>';
        $view .= '</li>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>TOP</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">G'stagram</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">投稿ページ</a>
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

    <div>
        <ul class="list-group">
            <?=$view?>
        </ul>
    </div>
</body>
</html>