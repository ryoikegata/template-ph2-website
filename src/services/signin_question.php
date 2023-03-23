<?php

require("../dbconnect.php");
session_start();

$email = $_POST['email'];
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if ($_POST['password'] === $user['password']) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    header("Location: ". "http://localhost:8080/admin/index.php"  );
} else {
    echo '<a href="../admin/auth/signin.php">ログインページに戻る</a> ';
}
