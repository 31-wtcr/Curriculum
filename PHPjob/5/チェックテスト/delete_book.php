<?php
// function.php読み込み
require_once('function.php');
// セッション開始
session_start();
// ログイン確認
check_user_logged_in();
// GETからidを取得
$id = $_GET['id'];
// $idが空であればメインにリダイレクト
if(empty($id)){
    header('location: main.php');
    exit;
}
// DBに接続
$pdo = db_connect();

try {
    // sql文を準備
    $sql = 'DELETE FROM books WHERE id = :id';
    // プリペアドステートメント
    $stmt = $pdo->prepare($sql);
    // IDをバインド
    $stmt->bindParam(':id', $id);
    // 実行
    $stmt->execute();
    // メインにリダイレクト
    header('location: main.php');
    exit;
// 例外処理
} catch (PDOException $e) {
    // エラーメッセージ出力
    echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}