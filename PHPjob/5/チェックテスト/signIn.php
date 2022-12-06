<?php
// function.phpの読み込み
require_once('function.php');

// $_POSTが空でなければ処理を実行する
if(!empty($_POST)){
    // ユーザー名が空であれば警告を表示
    if(empty($_POST['username'])) {
        echo 'Username is empty.';
    }
    // パスワードが空であれば警告を表示
    if (empty($_POST['password'])) {
        echo 'Password is empty.';
    }
    // ユーザー名とパスワードが空でなければ以下の処理を続行
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        // ユーザー名とパスワードのエスケープ処理
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        // ログイン処理開始
        $pdo = db_connect();
        try {
            // SQL文用意
            $sql = 'SELECT * FROM users WHERE name = :username';
            // プリペアドステートメント化
            $stmt = $pdo->prepare($sql);
            // ユーザー名をバインド
            $stmt->bindParam(':username', $username);
            // 実行
            $stmt->execute();
        // 例外処理
        } catch (PDOException $e) {
            //エラーメッセージ表示
            echo 'Error: ' . $e->getMessage();
            // 接続終了
            die();
        }

        // 結果が一行取得できた場合$rowに格納して返す
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // 保存されているパスワードと入力されたパスワードのハッシュが一致するか判定
            if (password_verify($password, $row['password'])) {
                // セッションに値を保存
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                // main.phpにリダイレクト
                header('location: main.php');
                exit;
            // パスワードが一致しない場合はエラーメッセージを出力
            }else{
                echo 'Username or password is wrong.';
            }
        // 結果が取得できなかった場合はエラーメッセージを出力
        }else {
            echo 'Username or password is wrong.';
        }
    }
}
?>

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
        <h1>ログイン画面</h1>
        <a href="signUp.php">新規ユーザー登録</a>
    </div>
        <form action="signIn.php" method="post">
        <input type="text" placeholder='ユーザー名' name='username' id='username'><br>
        <input type="password" placeholder='パスワード' name="password" id="password"><br>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>
