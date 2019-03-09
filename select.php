<?php
session_start();

include('functions.php');

chk_ssid();

$_name = $_SESSION['name'];
// var_dump($_name);

$pdo = db_conn();


//データ表示SQL作成
$sql = 'SELECT * FROM php05_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status==false) {
    errorMsg($stmt);
} else {
    $view='';
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
// var_dump($result);
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['indate'].'</p>';
        $view .= '<img src="'.$result['image'].'" alt="" height="150px">';
        $view .= '<audio preload="auto" controls>'.'<source src="'.$result['audio'].'">'.'</audio>';
        $view .= '<p>'.$result['comment'].'</p>';
        $view .= '<div><a href="detail.php?id='.$result[id].'" class="badge badge-primary">編集する</a>';
        $view .= '<a href="delete.php?id='.$result[id].'" class="badge badge-danger">削除する</a></div>';
        $view .= '</li>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>データ一覧</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">投稿データ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="top.php">ＴＯＰ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">投稿ページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">ログアウト</a>
                    </li>
                </ul>
                    <p class="login_user"><span><?=$_name?></span>としてログイン中</p>
            </div>
        </nav>
    </header>

    <div class="list">
        <ul class="list-group">
            <?=$view?>
        </ul>
    </div>

</body>

</html>