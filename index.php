<?php

require_once __DIR__ . "/config.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$db = new PDO(DB_DSN,DB_USER, DB_PASS);
$stmt = $pdo -> prepare('INSERT INTO web_users')
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
</head>
<body>
    <main>
        <div>
            <h1>新規登録</h1>
            <form action=""  method="POST">
                <label>電話番号またはメールアドレス</label>
                <input type="text" name="email" required>

                <label>パスワード</label>
                <input type="password" name="password" required>

                <a href="#">パスワードを忘れた方はこちら</a>
                <button type="submit">ログイン</button>
            </form>
        </div>
    </main>
</body>
</html>