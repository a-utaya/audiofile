<?php
session_start();

include('user_functions.php');

chk_ssid();

$_name = $_SESSION['name'];

$menu = menu();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン登録</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">ユーザ登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menu?>
                </ul>
                <p class="login_user"><span><?=$_name?></span>としてログイン中</p>
            </div>
        </nav>
    </header>

    <form method="post" action="user_insert_file.php" enctype="multipart/form-data">
        <div class="kanri_group">
            <input type="radio" class="kanri0" id="kanri_flg" name='kanri_flg' value="0">
            <label for="ippan">一般</label>
            <input type="radio" class="kanri1" id="kanri_flg" name='kanri_flg' value="1">
            <label for="kanri">管理者</label>
        </div>

        <div class="kanri_group">
                <input type="radio" class="life0" id="life_flg" name='life_flg' value="0">アクティブ
                <input type="radio" class="life1" id="life_flg" name='life_flg' value="1">非アクティブ
        </div>

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" class="form-control" id="name" name='name' required>
        </div>
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name='lid' required>
        </div>
        <div class="form-group">
            <label for="lpw">パスワード</label>
            <input type="password" class="form-control" id="lpw" name='lpw' required>
            <input type="checkbox" id="pass">
            <label for="pass">パスワードを表示</label>
        </div>
        <div class="form-group">
            <label for="upfile3">画像</label>
            <input type="file" class="form-control-file" id="upfile3" name="upfile3" accept="image/*" capture="camera">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">登 録</button>
        </div>
    </form>

    <script>
        var pw = document.getElementById('lpw');
        var pwCheck = document.getElementById('pass');
        pwCheck.addEventListener('change', function() {
            if(pwCheck.checked) {
                pw.setAttribute('type', 'text');
            } else {
                pw.setAttribute('type', 'password');
            }
        }, false);    
    </script>
</body>

</html>