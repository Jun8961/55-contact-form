<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // このページを表示する際の送信がGETの場合
  // index.htmlに遷移する
  header('Location: index.html');
}


// 1. functions.phpを読み込む
// 2. $_POSTから送信された値を取得
// （エスケープ処理も）
// 3. 値を画面に表示する

// functions.phpを読み込む
require_once('functions.php');
// dbconnect.phpを読み込む
require_once('dbconnect.php');

// $_POSTから送信された値を取得（エスケープ処理も）
$username = h($_POST['username']);
$email = h($_POST['email']);
$content = h($_POST['content']);

// 受け取った値をもとに、データベースに登録

// SQLの準備
$stmt = 
  $dbh->prepare('INSERT INTO surveys (username, email, content, created_at) VALUES(?,?,?, now())');

// SQLを実行
// ?の部分に当たる値を配列で渡す
$stmt->execute([$username, $email, $content]);


// ?: SQLインジェクションの対策
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>送信完了</title>
</head>
<body>
  <h1>お問い合わせありがとうございました</h1>
  <p>名前：<?php echo $username; ?></p>
  <p>メールアドレス：<?php echo $email; ?></p>
  <p>お問い合わせ内容：<?php echo $content; ?></p>
</body>
</html>









