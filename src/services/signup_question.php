<?php

require("../dbconnect.php");

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$lastInsertId = $pdo->lastInsertId();

if(isset($_POST){
  $stmt = $pdo->prepare("INSERT INTO users(id, name, email, password ) VALUES(:id, :name, :email, :password)");
  $stmt->execute([
    "name" => $name,
    "email" => $email,
    "password" => $password,
    "id" => $lastInsertId
  ]);
  header("Location: ". "http://localhost:8080/admin/index.php");
}else{
  print('登録事項が記入されてません');
  header("Location:". "http://localhost:8080/admin/auth/signin.php");
}