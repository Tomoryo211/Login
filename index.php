<?php

require_once __DIR__ . "/config.php";
// DB接続
try{
    $db = new PDO(DB_DSN,DB_USER,DB_PASS);
}catch(PDOException $e){
    die("データーベース接続失敗" . $e -> getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");

?>
<!DOCTYPE html>
<html lang="ja">
<head>
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