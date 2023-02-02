<?php
/* 入力チェック */
if(
!isset($_POST["name"])||$POST["name"]==""||
!isset($_POST["email"])||$POST["email"]==""||
!isset($_POST["point"])||$POST["point"]==""||
!isset($_POST["content"])||$POST["content"]==""
){
    

exit('ParaError');

}


// elseif ($name == '') {
// 	echo 'お名前が入力されていません。';
// }



//1. POSTデータ取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$point    = $_POST['point'];
$content = $_POST['content'];

// if(empty($_POST['check_data'])){
//     echo "未入力です。";

// }


//2. DB接続します
//*** function化する！  *****************
try {
    $db_name = 'gs_kadai8'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO
                        gs_an_table(
                            name, email, point, content, indate
                            )
                        VALUES (
                            :name, :email, :point, :content, sysdate()
                            );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':point', $point, PDO::PARAM_INT); //PARAM_INTなので注意
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$status = $stmt->execute(); //実行



//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
?>
