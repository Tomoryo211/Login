<?php
// DB関係設定
const DB_DRIVER = "mysql";
const DB_NAME = "rtomoduka";
const DB_HOST = "127.0.0.1"; // localhostではなく127.0.0.1に変更！
const DB_USER = "rtomoduka";
const DB_PASS = "eccMyAdmin";
const DB_CHARSET = "utf8mb4";

// DSN（接続文字列）
const DB_DSN = DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

// テーブル名
const TB_USER = "user";
?>

