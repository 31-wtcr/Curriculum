<?php
require_once('function.php');
session_start();
check_user_logged_in();

$id = $_GET['id'];
if(empty($id)){
    header('location: main.php');
    exit;
}

$pdo = db_connect();

try {
    $sql = 'DELETE FROM books WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('location: main.php');
    exit;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}