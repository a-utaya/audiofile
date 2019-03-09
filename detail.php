<?php
session_start();

include('functions.php'); //関数を記述したファイルの読み込み
$pdo = db_conn(); //関数実行
$menu = menu();

chk_ssid();

// getで送信されたidを取得
if (!isset($_GET['id'])) {
    exit("Error");
}
$id = $_GET['id'];

//データ登録SQL作成，指定したidのみ表示する
$stmt = $pdo->prepare('SELECT * FROM php05_table WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    errorMsg($stmt);
} else {
    $rs = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo更新ページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">データ更新</a>
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

    <form method="post" action="update.php">
        <div class="form-group">
            <label for="name">本のタイトル</label>
            <input type="text" class="form-control" id="name" name='name' value="<?=$rs['name']?>">
        </div>
        <div class="form-group">
            <label for="url">本のURL</label>
            <input type="text" class="form-control" id="url" name='url' value="<?=$rs['url']?>">
        </div>
        <div class="form-group">
            <label for="comment">感想</label>
            <textarea class="form-control" id="comment" name='comment' rows="3"></textarea>
                <?=$rs['comment']?>
            </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">送信</button>
            <button type="reset" class="btn btn-primary">キャンセル</button>
        </div>
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>