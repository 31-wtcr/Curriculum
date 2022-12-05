<?php
function check_user_logged_in(){
    // セッション開始
    session_start();
    // セッションにuser_nameの値がなければlogin.phpにリダイレクト
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
}

function redirect_main_unless_parameter($param){
    if (empty($param)) {
        header("Location: main.php");
        exit;
    }
}