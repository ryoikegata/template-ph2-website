<?php

declare(strict_types = 1);
require('../dbconnect.php');
session_start();


// PDOの設定を呼び出す
if (isset($_SESSION['id'])) {//ログインしているとき
} else {//ログインしていない時
  header("Location: ". "http://localhost:8080/admin/auth/signin.php");
}
$id = $_SESSION['id'];
// 全問題の取り出し
$questions = $pdo->query("SELECT * FROM questions")->fetchAll(PDO::FETCH_ASSOC);
// 全選択肢の取り出し
$choices = $pdo->query("SELECT * FROM choices")->fetchAll(PDO::FETCH_ASSOC);

// 問題に対応する選択肢を、問題の配列の中にさらに配列で入れ込む
foreach ($choices as $key => $choice) {
  // $indexに$choice["question_id"]が$questionsのidと同じ場合、そのidを返している（foreachだから1~6まで）
  $index = array_search($choice["question_id"], array_column($questions, 'id'));
  // $questionsの$index番目にchoicesという連想配列を作り、$choiceを格納
  $questions[$index]["choices"][] = $choice;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/styles/common.css">
  <link rel="stylesheet" href="./admin.css">
  <title>問題一覧</title>
</head>

<body>
  <header class="header">
    <div class="logout">
      <form action="../services/signout.php">
      <button type="submit">ログアウト</button>
      </form>
    </div>
  </header>
  <main class="main">
    <form action="./questions/create.php">
  <button type="submit">問題作成</button>
  </form>
    <h1>問題一覧</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>問題</th>
        </tr>
      </thead>
      <tbody>
      <?php
       foreach ($questions as $index => $question) :
       $question_id = $question['id'];
        $question_content = $question['content'];?>
          <tr>
            <td><?= $question["id"] ?></td>
            <td><a href="./questions/edit.php?id=<?= $question["id"] ?>" ><?= $question["content"] ?></a></td>
            <form method="POST" action="../services/delete_question.php">
              <td>
                <input type="hidden" name="id" value="<?= $question['id'] ?>">
                <button type="submit">削除</button>
              </td>
            </form>
       </tr>
       <?php endforeach; ?>
      </tbody>
    </table>
  </main>
  <!-- <script>
    // const questionDelete = async (questionId) => {
    //   return
    //   const res = await fetch(`http://localhost:8080/.services/delete_question.php?id=${questionId}`,{method: "DELETE" } );
    // }
    const deleteQuestion = async (questionId) => {
      if (!confirm('削除してもよろしいでしょうか？')) return
      const res = await fetch(`http://localhost:8080/services/delete_question.php?id=${questionId}`, { method: 'DELETE' });
      if (res.status === 200) {
        alert('削除に成功しました')
        document.getElementById(`question-${questionId}`).remove()
      } else {
        alert('削除に失敗しました')
      }
    }
  </script> -->
</body>


</html>