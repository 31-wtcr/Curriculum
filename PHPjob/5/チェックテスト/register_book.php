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
    <form action="register_book.php" method="post">
        <input type="text" name="title" id="title" placeholder='タイトル'><br>
        <input type="text" name="date" id="date" placeholder='発売日'><br>
        <label for="stock_number">在庫数</label><br>
        <input type="number" name="stock_number" id="stock_number"><br>
        <input type="submit" value="登録">
    </form>
</body>
</html>