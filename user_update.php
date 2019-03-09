<?php
// 関数ファイル読み込み
include('user_functions.php'); //関数を記述したファイルの読み込み
$pdo = db_conn(); //関数実行

//入力チェック(受信確認処理追加)
if (
    !isset($_POST['name'])||$_POST['name']==''||
    !isset($_POST['lid'])||$_POST['lid']==''||
    !isset($_POST['lpw'])||$_POST['lpw']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$id = $_POST['id'];
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = 0;
$life_flg = 0;


//データ登録SQL作成
$stmt = $pdo->prepare('UPDATE user_table SET name=:a1, lid=:a2, lpw=:a3, kanri_flg=:a4, life_flg=:a5, WHERE id=:id');
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: user_select.php');
    exit;
}
