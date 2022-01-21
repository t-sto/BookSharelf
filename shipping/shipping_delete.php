<?php
require_once('../assets/php/db_config.php');
require("../assets/php/login_check.php");

//セッション内に発送IDが無い場合
if (empty($_SESSION['bs_shipping_id'])) {
	header("location: ../login"); //ログインページへリダイレクト
	exit();
}

$shipping_id = $_SESSION['bs_shipping_id'];
$_SESSION['bs_shipping_id'] = array();  //セッションを初期化

//発送情報とユーザー情報を削除
try {
	//発送IDからユーザーIDを取得
	$pdo = new PDO(DSN, DB_USER, DB_PASS);
	$stmt = $pdo->prepare('select user_id from ShippingAddressTable where shipping_id = :id');
	$stmt->bindValue(':id', $shipping_id);
	$stmt->execute();
	$row = $stmt->fetch();

	//ユーザーIDと紐づく発送情報削除
	$stmt = $pdo->prepare('delete from ShippingAddressTable where user_id = :id');
	$stmt->bindValue(':id', $row["user_id"]);
	$stmt->execute();

	//ユーザーIDと紐づくユーザー情報削除
	$stmt = $pdo->prepare('delete from UserInfoTable where user_id = :id');
	$stmt->bindValue(':id', $row["user_id"]);
	$stmt->execute();
} catch (Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}

header("location: ./"); //発送情報リストページへリダイレクト
exit();
