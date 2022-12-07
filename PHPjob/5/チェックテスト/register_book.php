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

    if(!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock_number'])){
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
        $stock_number = htmlspecialchars($_POST['stock_number'], ENT_QUOTES);

        $pdo = db_connect();

        try {
            $sql = 'INSERT INTO books (title, date, stock_number) VALUES (:title, :date, :stock_number)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock_number', $stock_number, PDO::PARAM_INT);
            $stmt->execute();
            header('location: main.php');
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
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