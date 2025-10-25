<?php
session_start();

require_once __DIR__."/../config.php";

// DB接続
try{
    $db = new PDO(DB_DSN,DB_USER,DB_PASS);
}catch(PDOException $e){
    die("データベース接続失敗: " . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] === "POST");{
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $stmt = $db->prepare("SELECT * FROM TB_LOGIN WHERE email = ?");
    $stmt->execute([$email]); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user["password"])){
        $_SESSION["user"] = $user["email"];
        echo"<p>ようこそ" . htmlspecialchars($user["email"]) . "さん</p>";
    }else{
        echo "<p>メールアドレスまたはパスワードが間違っています。</p>";
    }
}
?>