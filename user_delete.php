<?php
include('user_functions.php');
$pdo = db_conn();

$id   = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM user_table WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: user_select.php');
    exit;
}
