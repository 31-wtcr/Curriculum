<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="wrapper">
        <h1>ユーザー登録画面</h1>
        <a href="signIn.php">ログイン</a>
    </div>
    <form action="signUp.php" method="post">
        <input type="text" placeholder='ユーザー名' name='username' id='username'><br>
        <input type="password" placeholder='パスワード' name="password" id="password"><br>
        <input type="submit" value="新規登録" id='signUp' name='signUp'>
    </form>
</body>
</html>

<?php
// function.phpの読み込み
require_once('function.php');

// $_POSTが空であれば処理を終了する
if(empty($_POST['signUp'])){
    return;
// ユーザー名が空であれば警告を表示
}elseif(empty($_POST['username'])) {
    echo 'Username is empty.';
// パスワードが空であれば警告を表示
}elseif (empty($_POST['password'])) {
    echo 'Password is empty.';

// ユーザー名とパスワードが空でなければ以下の処理を続行
}elseif(!empty($_POST['username']) && !empty($_POST['password'])){
    // ユーザー名とパスワードのエスケープ処理
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    // ユーザー新規登録処理開始
    $pdo = db_connect();
    try {
        // ユーザー名が一致するか検索するSQL文用意
        $sql = 'INSERT INTO users (name, password) VALUES (:username, :password)';
        // パスワードハッシュ化
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        // プリペアドステートメント化
        $stmt = $pdo->prepare($sql);
        // ユーザー名をバインド
        $stmt->bindParam(':username', $username);
        // パスワードをバインド
        $stmt->bindParam(':password', $password_hashed);
        // 実行
        $stmt->execute();
        // 登録完了メッセージ出力
        echo('New user registered.');
    // 例外処理
    } catch (PDOException $e) {
        //エラーメッセージ表示
        echo 'Error: ' . $e->getMessage();
        // 接続終了
        die();
    }
}