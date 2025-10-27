<?php
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

    if ($email === "" || $pass === "") {
        echo "すべての項目を入力してください。";
    } else {
        // パスワードをハッシュ化
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $db->prepare("INSERT INTO " . TB_USER . " (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $hashed]);

        echo "<p>登録が完了しました！<a href='Login.php'>ログインへ</a></p>";
    }
}
?>

<!-- デザイン付きフォーム -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>新規登録</title>
<style>
body {
    font-family: "Yu Gothic", sans-serif;
    background: linear-gradient(135deg, #eef2f3, #8e9eab);
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
    <h1>ユーザー登録</h1>
    <form method="post">
        <input type="email" name="email" placeholder="メールアドレス" required>
        <input type="password" name="password" placeholder="パスワード" required>
        <button type="submit">登録する</button>
    </form>
</body>
</html>
