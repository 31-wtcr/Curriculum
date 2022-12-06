<?php
// データベース接続のための定数定義
define('DB_DATABASE', 'book_management');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('PDO_DSN', 'mysql:host=localhost; charset=utf8; dbname='.DB_DATABASE);

// データベース接続
function db_connect(){
    // 処理開始
    try {
        // 定数を用いて接続
        $dbh = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        // データベースハンドルの属性をPDOExceptionを投げるよう変更
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    // 例外処理
    } catch (PDOException $e) {
        // エラーメッセージを取得して表示
        echo 'Error: '. $e->getMessage();
        // 接続終了
        die();
    }
}