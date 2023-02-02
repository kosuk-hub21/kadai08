


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    <?php if( !empty($success_message) ): ?>
	    <p class="success_message"><?php echo $success_message; ?></p> 
    <?php endif; ?>
        <?php if( !empty($error_message) ): ?>
	<ul class="error_message">
		<?php foreach( $error_message as $value ): ?>
			<li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
	</ul>
    <?php endif; ?>

    </header>
    
    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>Email：<input type="text" name="email"></label><br>
                <label>点数：<input type="text" name="point"></label><br>
                <label><textarea name="content" rows="4" cols="40"></textarea></label><br>
                <input type="submit" name="btn_submit"value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>

<?php


// 変数の初期化
// $current_date = null;
// $data = null;
// $file_handle = null;
// $split_data = null;
$message = array();
$message_array = array();
// $success_message = null;
$error_message = array();

if( !empty($_POST['btn_submit']) ) {

	// 名前の入力チェック
	if( empty($_POST['name']) ) {
		$error_message[] = '名前を入力してください。';
	}

	// メールアドレスの入力チェック
	if( empty($_POST['email']) ) {
		$error_message[] = 'メールアドレスを入力してください。';
	}

    // 点数の入力チェック
	if( empty($_POST['point']) ) {
		$error_message[] = 'メールアドレスを入力してください。';
	}

    // フリーワードの入力チェック
	if( empty($_POST['content']) ) {
		$error_message[] = '点数の理由を入力してください。';
	}

	// if( $file_handle = fopen( FILENAME, "a") ) {

	// 	// 書き込み日時を取得
	// 	$current_date = date("Y-m-d H:i:s");
	
	// 	// 書き込むデータを作成
	// 	$data = "'".$_POST['name']."','".$_POST['email']."','".$_POST['point']."','".$_POST['content']."','".$current_date."'\n";
	
	// 	// 書き込み
	// 	fwrite( $file_handle, $data);
	
	// 	// ファイルを閉じる
	// 	fclose( $file_handle);

	// 	$success_message = 'メッセージを書き込みました。';
	// }
}

