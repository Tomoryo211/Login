<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>マイページ</title>
<style>
body {
    font-family: "Yu Gothic", sans-serif;
    background: linear-gradient(135deg, #d4fc79, #96e6a1);
    text-align: center;
    padding-top: 80px;
}
a {
    color: #2b5876;
    text-decoration: none;
}
</style>
</head>
<body>
    <h1>ようこそ <?= htmlspecialchars($_SESSION["email"]) ?> さん</h1>
    <p><a href="Login.html">ログアウトする</a></p>
</body>
</html>
