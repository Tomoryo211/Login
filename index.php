<?php

require_once __DIR__ . "/config.php";

try{
    $db = new PDO (DB_DSN,DB_USER,DB_PASS);
}catch(PDOException $e){
    die("データベース接続:" . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $pass]);

    echo "登録完了！<a href='login.php'>ログインページへ</a>";
}
?>
