<?php
include('functions.php');
$pdo = db_conn();

if (
    !isset($_POST['comment']) || $_POST['comment']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$comment = $_POST['comment'];

//データ登録SQL作成
$stmt = $pdo->prepare('UPDATE php05_table SET comment=:a1, WHERE id=:id');
$stmt->bindValue(':a1', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: select.php');
    exit;
}
