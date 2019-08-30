<?php
//このページが表示された時の
//送信方法(GET or POST)の確認
//GET送信の場合は、入力画面に遷移する
if($_SERVER['REQUEST_METHOD']=='GET'){
    //このページを表示する際の送信がGETの場合
    //index.htmlに遷移する
    header('Location: index.html');
}



//functions.phpを読み込んで、
//定義した関数を使えるようにする
require_once('functions.php');



var_dump($_POST);
$username=$_POST['username'];
$email=$_POST['email'];
$content=$_POST['content'];

//ユーザー名が空かチェック
$username=$_POST['username'];
$emall=$_POST['emall'];
$content=$_POST['content'];

if($username == "") {
    $usernameResult='ユーザー名が入力されていません';
}else{
    $usernameResult=$username;
}
// メールアドレスが空かチェック
if ($email == '') {
    $emailResult = 'メールアドレスが入力されていません';
  } else {
    $emailResult = $email;
  }
  
  // 内容が空かチェック
  if ($content == '') {
    $contentResult = 'お問い合わせ内容が入力されていません';
  } else {
    $contentResult = $content;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力内容確認</title>
</head>
<body>
    <h1>入力内容確認</h1>
    <p>名前;<?php echo $_POST['username'];?></p>
    <p>メールアドレス;<?php echo $_POST['email']; ?></p>
    <p>内容;<?php echo $_POST['content']; ?></p>
<form action="thanks.php" method="POST">
<input type="hidden" name="username" value="<?php echo $username; ?>">
<input type="hidden" name="email" value="<?php echo $email; ?>">
<input type="hidden" name="content" value="<?php echo $content; ?>">
    
<button type="button" onclick="history.back();">戻る</button>
    <input type="submit"value="ok">
</form>


</body>
</html>