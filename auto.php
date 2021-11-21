
<!DOCTYPE html>
<html>
<head>
	<title>Панель администратора</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="jquery-3.6.0.js"></script>

</head>
<body>
	<center>
<form action="" method="POST">
	<div class="admin_enter">
		<h1>Панель администратора</h1>
		<br>
		<h1>Логин</h1>
		<input type="text" name="login" required placeholder="Введите логин">
		<h1>Пароль</h1>
		<br>
		<input type="password" name="pass"placeholder="Введите пароль">
		<br>
		<input id="connect_auto" type="submit" name="connect" value="Войти">
</div>
</form>
</center>

<?php 
//проверяем, что была нажата кнопка и её значение равно "войти"
if (isset($_POST['connect'])) {
	// подключение или регистрация нового пользователя
$host = 'localhost'; 
$user = $_POST['login']; 
$password = $_POST['pass']; 
$db_name = 'kim_olyash'; 
	$link = mysqli_connect($host, $user, $password, $db_name);
	if($link == true)
	{echo "<script type='text/javascript'>localStorage.setItem('Account',true);</script>";
		echo '<script type="text/javascript"> window.location.href = "admin.php"; </script>';

	}
	else
		echo '<script type="text/javascript"> window.location.href = "auto.php"; </script>';

}


?>

</body>
</html>