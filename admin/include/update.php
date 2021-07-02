<?php
include_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Taxrirlash</title>
</head>
<body>
	<?php
		$id = (int)$_GET['id'];
	if(isset($_POST['edit'])):
		$username = htmlspecialchars($_POST['username']);
		$email = htmlspecialchars($_POST['email']);
		$password =md5($_POST['password']);
	$baza->query("UPDATE `register` SET `username`='$username' , `email`='$email'  , `password`='$password' ,
    WHERE `id`=".$id) or die($baza->error);
	header("Location:register.php");
	exit;
	else:


	$result = $baza->query("SELECT * FROM `register` WHERE `id`=".$id)->fetch_array(); ?>
	
	<form method="post" action="">
	<label>Username<input type="text" name="username" value="<?=$result['username']?>"></label><br>
	<label>Email<input type="text" name="email" value="<?=$result['email']?>"></label><br>
	<label>Password<input type="password" name="password"></label><br>
<?php endwhile;?>
	<input type="submit" name="edit" value="O`zgartirish">
    </form>
<?php endif; ?>
</body>
</html>