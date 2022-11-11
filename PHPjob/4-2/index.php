<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="1599315827_logo.png" alt="logo" width="200px" height="120px">
        <div>
            <div class="welcome_message">
                <p>ようこそ隼田翔吾さん</p>
            </div>
            <div class="login_timestamp">
                <p>最終ログイン日：2019-07-02 21:56:05</p>
            </div>
        </div>
    </header>
    <main>
        <table>
            <tr>
                <th>記事ID</th><th>タイトル</th><th>カテゴリ</th><th>本文</th><th>投稿日</th>
            </tr>

            <?php
                require("getdata.php");
                $getData = new getData;
                foreach($getData->getPostData() as $data){
                    echo '<tr><td>' . $data['id'] . '</td><td>' . $data['title'] . '</td><td>'; 
                    switch ($data['category_no']) {
                        case 1:
                            echo '食事';
                            break;

                        case 2:
                            echo '旅行';
                            break;
                        
                        default:
                            echo 'その他';
                            break;
                    };
                    echo '</td><td>' . $data['comment'] . '</td><td>' . $data['created'] . '</td><tr>';
                };
            ?>

        </table>
    </main>
    <footer>
        <p>Y&I group.inc</p>
    </footer>
</body>
</html>