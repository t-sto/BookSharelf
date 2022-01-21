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

try {
	$pdo = new PDO(DSN, DB_USER, DB_PASS);
	$stmt = $pdo->prepare('update ShippingAddressTable set shipping_executedflag = 2 where shipping_id = :id');
	$stmt->bindValue(':id', $shipping_id);
	$stmt->execute();
} catch (Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}

header("location: shipping_detail.php?id=" . $shipping_id); //発送情報詳細ページへリダイレクト
exit();
