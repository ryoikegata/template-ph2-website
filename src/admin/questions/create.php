<?php
require('../../dbconnect.php')

?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>問題作成</title>
</head>
<body>
  <div class="container">
    <h1>問題作成</h1>

    <form action="../../services/create_question.php" method="POST" enctype="multipart/form-data">

      <p>問題文：</p>
      <input type="text" name="content" id="question" placeholder="問題文を入力してください" />


      <p>選択肢：</p>
      <input type="text" name="choices[]" placeholder="選択肢を入力してください">
      <input type="text" name="choices[]" placeholder="選択肢を入力してください">
      <input type="text" name="choices[]" placeholder="選択肢を入力してください">


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
      <input type="text" name="supplement">


      <input type="submit" value="作成">
      </form>
  </div>
</body>
</html>