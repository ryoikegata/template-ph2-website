<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
  <div class="container">
    <h1>アカウント登録</h1>
    <form action="../../services/signup_question.php" method="POST">
      <label for="">名前: <input type="text" name="name"></label>
      <label for="">Email: <input type="text" name="email"></label>
      <label for="">パスワード <input type="text" name="password"></label>
      <button type="submit">登録</button>
    </form>
  </div>
</body>
</html>