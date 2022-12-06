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