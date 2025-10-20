<?php
session_start();

require_once __DIR__ . "/../config.php";
// DB接続
try{
    $db = new PDO(DB_DSN,DB_USER,DB_PASS);
}catch(PDOException $e){
    die("データベース接続失敗: " . $e->getMessage());
}

if()
?>