<?php
include('functions.php');
$pdo = db_conn();

// 入力チェック
if (
    !isset($_POST['comment']) || $_POST['comment']==''
) {
    exit('ParamError');
}

$comment = $_POST['comment'];

//画像ファイル
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] ==0) {
    // ファイルをアップロードしたときの処理
    // ①送信ファイルの情報取得
    $file_name = $_FILES['upfile']['name'];    
    $tmp_path = $_FILES['upfile']['tmp_name'];
    $file_dir_path = 'upload/';

    // ②File名の準備
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $uniq_name = date('YmdHis').md5(session_id()).".".$extension;
    $file_name = $file_dir_path.$uniq_name; 
// var_dump($file_name);
// var_dump($tmp_path);
    // ③サーバの保存領域に移動&④表示
    if(is_uploaded_file($tmp_path)) {
        if(move_uploaded_file($tmp_path, $file_name)) {
            chmod($file_name, 0644);
        }else{
            exit('Error:画像をアップロードできませんでした');
        }
    }
} else {
    // ファイルをアップしていないときの処理
    exit('画像が送信されていません');
}

// //音声ファイル
if (isset($_FILES['upfile2']) && $_FILES['upfile2']['error'] ==0) {
    $file_name2 = $_FILES['upfile2']['name'];    
    $tmp_path2 = $_FILES['upfile2']['tmp_name'];
    $file_dir_path2 = 'upload/';

    $extension2 = pathinfo($file_name2, PATHINFO_EXTENSION);
    $uniq_name2 = date('YmdHis').md5(session_id()).".".$extension2;
// var_dump($extension2);
    $file_name2 = $file_dir_path2.$uniq_name2; 
    
    if(is_uploaded_file($tmp_path2)) {
        if(move_uploaded_file($tmp_path2, $file_name2)) {
            chmod($file_name2, 0644);
        }else{
            exit('Error:音声をアップロードできませんでした');
        }
    }
} else {
    exit('音声が送信されていません');
}


// データ登録SQL作成
// imageカラムとバインド変数を追加
$sql ='INSERT INTO php05_table(id, comment, image, audio, indate)
        VALUES(NULL, :a1, :image, :audio, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $comment, PDO::PARAM_STR);
$stmt->bindValue(':image', $file_name, PDO::PARAM_STR);
$stmt->bindValue(':audio', $file_name2, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: index.php');
}
