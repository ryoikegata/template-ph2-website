<?php
declare(strict_types = 1);

// PDOの設定を呼び出す
require('../dbconnect.php');

if(isset($_POST['id'])) {
  $id = $_POST['id'];

  try {
    $questions_sql = "DELETE FROM questions WHERE id = :id";
    $questions_stmt = $pdo->prepare($questions_sql);
    $questions_stmt->bindParam(":id", $id);
    $questions_stmt->execute();

    $choices_sql = "DELETE FROM choices WHERE question_id = :id";
    $choices_stmt = $pdo->prepare($choices_sql);
    $choices_stmt->bindParam(":id", $id);
    $choices_stmt->execute();

    header('Location: ../admin/index.php');
    exit();

  } catch (PDOException $e) {
    echo $e->getMessage();
    die();
  }
}
?>