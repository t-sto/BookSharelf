<?php
require_once('../assets/php/db_config.php');
require("../assets/php/login_check.php");

//セッション内に集荷IDが無い場合
if (empty($_SESSION['bs_collect_id'])) {
	header("location: ../login"); //ログインページへリダイレクト
	exit();
}

$collect_id = $_SESSION['bs_collect_id'];
$_SESSION['bs_collect_id'] = array();  //セッションを初期化

//集荷情報とユーザー情報を削除
try {
	//集荷IDからユーザーIDを取得
	$pdo = new PDO(DSN, DB_USER, DB_PASS);
	$stmt = $pdo->prepare('select user_id from CollectDestinationTable where collect_id = :id');
	$stmt->bindValue(':id', $collect_id);
	$stmt->execute();
	$row = $stmt->fetch();

	//ユーザーIDと紐づく集荷情報削除
	$stmt = $pdo->prepare('delete from CollectDestinationTable where user_id = :id');
	$stmt->bindValue(':id', $row["user_id"]);
	$stmt->execute();

	//ユーザーIDと紐づくユーザー情報削除
	$stmt = $pdo->prepare('delete from UserInfoTable where user_id = :id');
	$stmt->bindValue(':id', $row["user_id"]);
	$stmt->execute();
} catch (Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}

header("location: ./"); //集荷情報リストページへリダイレクト
exit();
