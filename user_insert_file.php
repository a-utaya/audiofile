<?php

include('user_functions.php'); //関数を記述したファイルの読み込み
$pdo = db_conn(); //関数実行

// 入力チェック
if(
    !isset($_POST['name'])||$_POST['name']==''||
    !isset($_POST['lid'])||$_POST['lid']==''||
    !isset($_POST['lpw'])||$_POST['lpw']==''
){
    exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];


//アカウントファイル
if (isset($_FILES['upfile3']) && $_FILES['upfile3']['error'] ==0) {
    $file_name3 = $_FILES['upfile3']['name'];    
    $tmp_path3 = $_FILES['upfile3']['tmp_name'];
    $file_dir_path3 = 'upload/';

    $extension3 = pathinfo($file_name3, PATHINFO_EXTENSION);
    $uniq_name3 = date('YmdHis').md5(session_id()).".".$extension3;
// var_dump($extension2);
    $file_name3 = $file_dir_path3.$uniq_name3; 
    
    if(is_uploaded_file($tmp_path3)) {
        if(move_uploaded_file($tmp_path3, $file_name3)) {
            chmod($file_name3, 0644);
        }else{
            exit('Error:アカウント画像をアップロードできませんでした');
        }
    }
} else {
    exit('アカウント画像が送信されていません');
}


$sql ='INSERT INTO user_table(id, name, lid, lpw, kanri_flg, life_flg, image)
        VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :image)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR); 
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR); 
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);   
$stmt->bindValue(':image', $file_name3, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //５．index.phpへリダイレクト
    header('Location: user_index.php');
}
