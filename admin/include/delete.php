<?php
include_once('config.php');
$id = (int)$_GET['id'];
$baza->query("DELETE FROM `register` WHERE `id`=".$id) or die($baza->error);
header("Location:register.php");
exit;
?>