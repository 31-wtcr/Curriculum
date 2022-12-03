<?php
    define('DB_DATABASE', 'yigroupBlog');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('PDO_DSN', 'mysql:host=localhost; charset=utf8; dbname='.DB_DATABASE);

    // DBに接続する関数を定義
    function connect(){
        // 処理開始
        try {
            // 定数を用いてDBに接続
            $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
            // データベースハンドルの属性をPDOExceptionを投げるよう変更
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        // 例外処理
        } catch (PDOExceptiion $e) {
            // エラーメッセージを取得して表示
            echo 'Error' . $e->getMessgae();
            // DBとの接続を終了
            die();
        }
    }