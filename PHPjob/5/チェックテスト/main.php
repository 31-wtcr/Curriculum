<?php
// function.phpの読み込み
require_once('function.php');
// DB接続
$pdo = db_connect();
// セッション開始
session_start();
// ログイン確認
check_user_logged_in();

try {
    // sql文の準備
    $sql = 'SELECT * FROM books';
    // プリペアドステートメント
    $stmt = $pdo->prepare($sql);
    // 実行
    $stmt->execute();
} catch (PDOException $e) {
    //エラーメッセージの出力
    echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .wrapper {
            width: 200px;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a {
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        a.register {
            background-color: dodgerblue;
        }

        a.signOut {
            background-color: slategray;
        }

        a.delete {
            background-color: red;
        }

        table {
            border-collapse: collapse;
        }

        th, td {
            padding: 20px 40px;
            font-size: 1.3rem;
            text-align: center;
            border: grey 1px solid;
        }

        th {
            background-color: lightgrey;
        }
    </style>
</head>
<body>
    <h1>在庫一覧画面</h1>
    <div class='wrapper'>
        <a href="register_book.php" class="register">新規登録</a>
        <a href="signOut.php" class="signOut">ログアウト</a>
    </div>
    <table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        <?php
        // 結果を一行取得し表示
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock_number']; ?></td>
                <td><a href="delete_book.php?id=<?php echo $row['id']; ?>" class="delete">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
