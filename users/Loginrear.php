<?php 
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ダッシュボード</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-xl shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">ようこそ、<?php echo htmlspecialchars($_SESSION["email"]); ?> さん！</h1>
        <a href="logout.php" class="text-blue-500 hover:underline">ログアウト</a>
    </div>
</body>
</html>