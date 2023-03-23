<?php
require('../../dbconnect.php');

$questions = $pdo->query("SELECT * FROM questions")->fetchAll(PDO::FETCH_ASSOC);
// 全選択肢の取り出し
$choices = $pdo->query("SELECT * FROM choices")->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM questions WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $_REQUEST["id"]);
$stmt->execute();
$question = $stmt->fetch();

$sql = "SELECT * FROM choices WHERE question_id = :question_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":question_id", $_REQUEST["id"]);
$stmt->execute();
$choices = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問題編集</title>
</head>

<body>
  <main>
    <div class="container">
      <h1>問題編集</h1>

      <form action="../../services/update_question.php" method="POST" enctype="multipart/form-data">
        <p>問題文</p>
        <input type="text" id="question" name="content" value="<?= $question['content'] ?>">
        <p>選択肢:</p>
        <?php foreach ($choices as $key => $choice) { ?>
          <input type="text" name="choices[]" placeholder="選択肢を入力してください" value=<?= $choice["name"] ?>>
        <?php } ?>

        <p>正解の選択肢</p>
      <select name="iscorrect" id="">
        <option value="" selected disabled></option>
        <option value="1">選択肢１</option>
        <option value="2">選択肢２</option>
        <option value="3">選択肢３</option>
      </select>

      <p>問題の画像</p>
      <input type="file" name="image">


      <p>補足</p>
      <input type="text" name="supplement" value="<?= $question["supplement"] ?>">
      <input type="hidden" name="question_id" value="<?= $question["id"] ?>">
      <input type="submit" value="更新">
      </form>
    </div>
  </main>
</body>

</html>