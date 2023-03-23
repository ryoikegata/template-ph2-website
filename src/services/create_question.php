<?php

require('../dbconnect.php');

$content = $_POST['content'];
$supplement = isset($_POST['supplement']) ? $_POST['supplement'] : null;


//画像のアップデート
$image_name = uniqid(mt_rand(), true) . '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
$image_path = dirname(__FILE__) . '/../assets/img/quiz/' . $image_name;
move_uploaded_file(
  $_FILES['image']['tmp_name'],
  $image_path
);


$stmt = $pdo->prepare("INSERT INTO questions(content, image, supplement ) VALUES(:content, :image, :supplement)");
$stmt->execute([
  "content" => $content,
  "image" => $image_name,
  "supplement" => $supplement
]);
$lastInsertId = $pdo->lastInsertId();

$stmt = $pdo->prepare("INSERT INTO choices(name, valid, question_id) VALUES(:name, :valid, :question_id)");
for ($i = 0; $i < count($_POST["choices"]); $i++) {
  $stmt->execute([
    "name" => $_POST["choices"][$i],
    "valid" => (int)$_POST['iscorrect'] === $i + 1 ? 1 : 0,
    "question_id" => $lastInsertId
  ]);
}

header("Location: ". "http://localhost:8080/admin/index.php");