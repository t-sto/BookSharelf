<?php
session_start();

//セッション内にアカウントIDが無い場合
if(empty($_SESSION['bs_account_id'])){
	header("location: ../login"); //ログインページへリダイレクト
	exit();
}
?>