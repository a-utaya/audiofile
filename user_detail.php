<?php
include('user_functions.php');
$pdo = db_conn();
$menu = menu();

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM user_table WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

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
    <title>ログイン更新ページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">ユーザ更新</a>
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

    <form method="post" action="user_update.php">
        <div class="kanri_group">
            <input type="radio" class="kanri0" id="kanri_flg" name='kanri_flg' value="">一般
            <input type="radio" class="kanri1" id="kanri_flg" name='kanri_flg' value="">管理者
        </div>

        <div class="kanri_group">
                <input type="radio" class="life0" id="life_flg" name='life_flg' value="">アクティブ
                <input type="radio" class="life1" id="life_flg" name='life_flg' value="">非アクティブ
        </div>
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" class="form-control" id="name" name='name' value="<?=$rs['name']?>">
        </div>
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name='lid' value="<?=$rs['name']?>">
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
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
         <!-- idは変えたくない = ユーザーから見えないようにする-->
        <input type="hidden" name="id" value="<?=$rs['id']?>">
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