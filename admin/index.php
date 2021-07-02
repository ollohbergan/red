<?php
include_once('include/config.php');
session_start();
if(!isset($_SESSION['login'])){
	header("Location:login.php");
	exit;
}

include_once('include/head.php');
include_once('include/menyu.php');
include_once('include/main.php');
include_once('include/footer.php');
include_once('include/script.php');
?>