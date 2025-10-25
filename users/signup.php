<?php

require_once __DIR__ . "/../config.php";

try{
    $db = new PDO (DB_DSN,DB_USER,DB_PASS);
}catch(PDOException $e){
    die("データベース接続:" . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO TB_LOGIN  (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $pass]);

    echo "登録完了！<a href='Login.php'>ログインページへ</a>";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">新規登録</h1>
            <form action="" method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700">メールアドレス</label>
                    <input type="email" name="email" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <div>
                    <label class="block text-gray-700">パスワード</label>
                    <input type="password" name="password" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition">登録</button>
            </form>
    </div>
</body>
</html>
