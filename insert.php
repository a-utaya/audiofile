<?php
include('functions.php');

if (
    !isset($_POST['comment']) || $_POST['comment']==''
) {
    exit('ParamError');
}

$comment = $_POST['comment'];

$pdo = db_conn();

$sql ='INSERT INTO php05_table(id, comment, indate) 
        VALUES(NULL, :a1, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $comment, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: index.php');
}

// $name = $_GET['name'];
