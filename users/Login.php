<?php
session_start();
require_once __DIR__ . "/../config.php";

try {
    $db = new PDO(DB_DSN, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("DB接続失敗: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $pass = $_POST["password"] ?? '';

    $stmt = $db->prepare("SELECT * FROM " . TB_USER . " WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($pass, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["email"] = $user["email"];
        header("Location: mypage.php");
        exit;
    } else {
        echo "メールアドレスまたはパスワードが間違っています。";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<style>
body {
    font-family: "Yu Gothic", sans-serif;
    background: linear-gradient(135deg, #89f7fe, #66a6ff);
    text-align: center;
    padding-top: 80px;
}
form {
    display: inline-block;
    background: #fff;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
input {
    display: block;
    width: 260px;
    margin: 10px auto;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
}
button {
    background-color: #4a90e2;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}
button:hover {
    background-color: #357ABD;
}
</style>
</head>
<body>
    <h1>ログイン</h1>
    <form action="Loginrear.php" method="post">
        <input type="email" name="email" placeholder="メールアドレス" required>
        <input type="password" name="password" placeholder="パスワード" required>
        <button type="submit">ログイン</button>
    </form>
    <p><a href="signup.php">新規登録はこちら</a></p>
</body>
</html>
