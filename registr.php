<!DOCTYPE html>
<?php
session_start();

if (!empty($_SESSION['login'])) {
	$_SESSION['login'];
header("Location: profile.php"); }
?>

<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=desktop, initial-scale=1.0">
	<title>Авторизация\регистрация</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/style_2.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<?php 
require('header.php');
	?>

<div class="enter">

<span style="display: flex; justify-content: center;">

<?php 
if(isset($_POST['submit'])) {

$link=mysqli_connect('localhost','root','','rzd') or (mysqli_error("База данных не подключена!"));

$utf=mysqli_query($link,"SET names 'utf8'");

$login=trim(strip_tags($_POST['login']));

$password=strip_tags($_POST['password']);

$email = trim($_POST['email']);


if(!empty('login')){

$zapros="SELECT user_login FROM users WHERE user_login='".$login."'";

$utf=mysqli_query($link,$zapros);

$connect=mysqli_num_rows($utf);

if($connect!=1) {

$password=md5($password);

$query="INSERT INTO users SET user_login='".$login."', user_password='".$password."',user_email='".$email."'";

$utf=mysqli_query($link,$query);

$link=mysqli_connect('localhost','root','','rzd');

$sql="GRANT SELECT,INSERT,UPDATE,DELETE ON . TO '".$login."'IDENTIFIED BY '".$password."'";

mysqli_query($link,$sql);

session_start();
$_SESSION['login']=$_POST['login'];
$_SESSION['password']=$password;

echo '<script type="text/javascript">';
echo 'localStorage.setItem("login",JSON.stringify("'.$login.'"));';
echo '</script>';
header("Location: profile.php");
}

else{ echo "Данный логин занят!";
} }
else{ echo "Логин или пароль неверный! "; }
}
?>
</span>

<!-- Форма регистрации -->
<div class="registration">
<h3> Регистрация  </h3>
<form class="reg" action="registr.php" method="POST">
      <label>Логин</label>
      <input type="text" name="login" size="15" maxlength="15" required placeholder="Введите логин">
      <label>Пароль</label>
      <input type="password" size="15" maxlength="15" required name="password" placeholder="Введите пароль">
      <label> Почта </label>
	<input type="email" name="email" required placeholder="email@me.com">
	<br>
	<button type="submit" name="submit"> <span>Регистрация</span> </button>
	<br>
	 <a href="/rzd/auth.php"> Уже зарегистрирован?  </a>
</form>
</div>


</div>

<!-- подвал -->

<?php 
require('footer.php');
	?>
</body>
</html>
