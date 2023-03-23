<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
</head>
<body>
  <main>
    <header class="header">
      <div class="signup">
      <a href="./signup.php">新規登録</a>
    </div></header>
    <div class="container">
      <h1>ログイン</h1>
      <form action="../../services/signin_question.php" method="POST">
      <label for="">Email: <input type="text" name="email"></label>
      <label for="">パスワード: <input type="text" name="password"></label>
      <button type="submit">ログイン</button>
      </form>
    </div>
  </main>
</body>
</html>