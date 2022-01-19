<?php
require_once('assets/php/db_config.php');
session_start();

//DBに情報を追加
try {
	//ユーザー情報を追加
	$pdo = new PDO(DSN, DB_USER, DB_PASS);
	$stmt = $pdo->prepare("insert into UserInfoTable values(null,:address,:number,:mail,:name)");
	$stmt->bindValue(':address', $_POST["address"]);
	$stmt->bindValue(':number', (string)$_POST["number"]);
	if (!empty($_POST["mail"])) {
		$stmt->bindValue(':mail', $_POST["mail"]);
	} else {
		$stmt->bindValue(':mail', null);
	}
	$stmt->bindValue(':name', $_POST["name"]);
	$stmt->execute();
	$user_id = $pdo->lastInsertId();	//追加したユーザー情報のユーザーIDを取得

	//集荷･発送情報追加
	switch ($_POST["contact_flag"]) {
		case 1:
			$stmt = $pdo->prepare("insert into CollectDestinationTable values(null,:date,1,:message,:user_id)");
			break;
		case 2:
			$stmt = $pdo->prepare("insert into ShippingAddressTable values(null,:date,1,:message,:user_id)");
			break;
	}
	$stmt->bindValue(':date', date("Y/m/d"));
	if (!empty($_POST["message"])) {
		$stmt->bindValue(':message', $_POST["message"]);
	} else {
		$stmt->bindValue(':message', null);
	}
	$stmt->bindValue(':user_id', $user_id);
	$stmt->execute();
} catch (Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}

header("location: ./?message=送信が完了しました"); //トップページへリダイレクト
exit();
