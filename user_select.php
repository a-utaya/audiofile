<?php
//1. DB接続
include('user_functions.php'); //関数を記述したファイルの読み込み
$pdo = db_conn(); //関数実行
$menu = menu();

//2. データ表示SQL作成
$sql = 'SELECT*FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view='';
if ($status==false) {
    errorMsg($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<img src="'.$result['image'].'" alt="" height="150px">';
        $view .= '<p>'.$result['lid'].'</p>';
        $view .= '<p>'.$result['lpw'].'</p>';
        $view .= '<a href="user_detail.php?id='.$result[id].'" class="badge badge-primary">編集する</a>';
        $view .= '<a href="user_delete.php?id='.$result[id].'" class="badge badge-danger">削除する</a>';
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
    <title>ログインリスト表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">ユーザ一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menu?>
                </ul>
            </div>
        </nav>
    </header>

    <div>
        <ul class="list-group">
            <!-- ここにDBから取得したデータを表示しよう -->
            <?=$view?>
        </ul>
    </div>

</body>

</html>