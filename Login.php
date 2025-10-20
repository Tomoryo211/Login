<?php
session_start();

require_once __DIR__ . "/../config.php";
// DB接続
try{
    $db = new PDO(DB_DSN,DB_USER,DB_PASS);
}catch(PDOException $e){
    die("データベース接続失敗: " . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] === "POST");{
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt -> execute(["email"]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($pass, $user["password"])){
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["email"] = $user["email"];
        header("Location: dashboard.php");
        exit;
    }else{
        echo "メールアドレスまたはパスワードが間違っています。";
    }
}
?>