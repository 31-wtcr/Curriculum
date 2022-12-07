<?php
// function.php読み込み
require_once('function.php');
// セッション開始
session_start();
// ログイン確認
check_user_logged_in();
// POSTが空でなければ実行
if (!empty($_POST)){
    // titleが空であればエラーメッセージ表示
    if(empty($_POST['title'])){
        echo 'Title is empty.';
    }
    // dateが空であればエラーメッセージ表示
    if(empty($_POST['date'])){
        echo 'Date is empty.';
    }
    // stock_numberが空であればエラーメッセージ表示
    if(empty($_POST['stock_number'])){
        echo 'Stock number is empty.';
    }
    // title, date, stock_numberが揃っていれば実行
    if(!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock_number'])){
        // title, date, stock_numberをエスケープ処理
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
        $stock_number = htmlspecialchars($_POST['stock_number'], ENT_QUOTES);
        // DB接続
        $pdo = db_connect();

        try {
            // sql文用意
            $sql = 'INSERT INTO books (title, date, stock_number) VALUES (:title, :date, :stock_number)';
            // プリペアドステートメント
            $stmt = $pdo->prepare($sql);
            // バインド
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock_number', $stock_number, PDO::PARAM_INT);
            // 実行
            $stmt->execute();
            // メインにリダイレクト
            header('location: main.php');
        // 例外処理
        } catch (PDOException $e) {
            // エラーメッセージ出力
            echo 'Error: ' . $e->getMessage();
            // 終了
            die();
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
    <h1>本 登録画面</h1>
    <form action="" method="post">
        <input type="text" name="title" id="title" placeholder='タイトル'><br>
        <input type="date" name="date" id="date" placeholder='発売日'><br>
        <label for="stock_number">在庫数</label><br>
        <input type="number" name="stock_number" id="stock_number"><br>
        <input type="submit" value="登録">
    </form>
</body>
</html>