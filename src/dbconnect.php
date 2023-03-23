<?php
//PDOの設定
$dsn = 'mysql:host=db;dbname=posse;charset=utf8';
$user = 'root';
$password = 'root';
$pdo = new PDO($dsn, $user, $password, [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
// const DB_HOST = 'mysql:dbname=posse;host=db;charset=utf8';
// const DB_USER = 'root';
// const DB_PASSWORD = 'root';

// //例外 exception
// try{
//   $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //連想配列
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //例外
//     PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策
//   ]);
//   echo '接続成功';

// } catch(PDOException $e){
//   echo '接続失敗' . $e->getMessage() . "\n";
//   exit();
// }
// //pdoをprepareの中にSQL文で書く
// //$stmt = $pdo->prepare("SELECT * FROM choices");


// // (5) SQL実行
// //$res = $stmt->execute();

// // (6) 該当するデータを取得
// //if( $res ) {
// 	//$data = $stmt->fetchAll();
// 	//var_dump($data);
// //}

// $questions = $pdo->query("SELECT * FROM questions")->fetchAll(PDO::FETCH_ASSOC);
// $choices = $pdo->query("SELECT * FROM choices")->fetchAll(PDO::FETCH_ASSOC);

// foreach ($choices as $key => $choice) {
//   $index = array_search($choice["question_id"], array_column($questions, 'id'));
//   $questions[$index]["choices"][] = $choice;
//   var_dump($questions);
// }


