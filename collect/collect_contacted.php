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

try {
	$pdo = new PDO(DSN, DB_USER, DB_PASS);
	$stmt = $pdo->prepare('update CollectDestinationTable set collect_executedflag = 2 where collect_id = :id');
	$stmt->bindValue(':id', $collect_id);
	$stmt->execute();
} catch (Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}

header("location: collect_detail.php?id=" . $collect_id); //集荷情報詳細ページへリダイレクト
exit();
