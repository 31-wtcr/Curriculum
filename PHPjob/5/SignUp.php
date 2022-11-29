<?php

// db_connect.phpの読み込みFILL_IN
require_once('db_connect.php');
// メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// POSTで送られていれば処理実行
if (isset($_POST['signUp'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
};
// nameとpassword両方送られてきたら処理実行
if (empty($name)){
    
}
// PDOのインスタンスを取得FILL_IN
try {
    
// SQL文の準備 FILL_IN 
// パスワードをハッシュ化
// プリペアドステートメントの作成 FILL_IN 
// 値をセット FILL_IN
// 実行 FILL_IN
// 登録完了メッセージ出力
}catch (PDOException $e) {
// エラーメッセージの出力 FILL_IN 
// 終了 FILL_IN
}
}
?>




<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>新規登録</h1>
<form method="POST" action="SignUp.php">
user:<br>
<input type="text" name="name" id="name">
<br>
password:<br>
<input type="password" name="password" id="password"><br>
<input type="submit" value="submit" id="signUp" name="signUp">

</form>
</body>
</html>