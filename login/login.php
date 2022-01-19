<?php
require_once('../assets/php/db_config.php');
session_start();

//ログイン名とパスワードの入力値を取得して空ではないかチェック
if (empty($_POST["UserName"]) or empty($_POST["Password"])) { //ログイン名とパスワードのどちらかが入力されていない場合
	$_SESSION['error_message'] = "再入力してください";
	header("location: ./"); //ログインページへリダイレクト
	exit();
}

//DB内で入力値に合致するアカウントを取得
try {
	$pdo = new PDO(DSN, DB_USER, DB_PASS);
	$stmt = $pdo->prepare('select account_id, account_pass from AccountTable where account_name = :name');	//入力値に合致するアカウントがあるか確認
	$stmt->bindValue(':name', $_POST["UserName"]);
	$stmt->execute();
	$row = $stmt->fetch();
} catch (Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}

//合致するアカウントがあるか
if (isset($row['account_id']) and password_verify($_POST["Password"], $row['account_pass'])) {	//IDとパスワードが正しい場合
	$_SESSION['bs_account_id'] = $row['account_id'];	//セッションにIDを代入
	header("location: ../collect"); //管理者ページへリダイレクト
	exit();
} else {
	$_SESSION['error_message'] = "ユーザーネームかパスワードが間違っています";
	header("location: ./"); //ログインページへリダイレクト
	exit();
}
