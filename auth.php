<?php
session_start();
if (!empty($_SESSION['login'])) {
header("Location: profile.php"); }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация\регистрация</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/style_2.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>


<?php 
require('header.php');
	?>

<span style="display: flex; justify-content: center;">
<?php
//  Соединямся с БД 
// Проверка, что кнопка "Авторизация" нажата 
if(isset($_POST['submit'])){
$link=mysqli_connect('localhost','root','','rzd') or (mysqli_error("База данных не подключена!"));
// Изменение кодировки
$utf=mysqli_query($link,"set names 'utf8'");
// Заносим введенные данные в переменные 
$login=$_POST['login'];
$password=$_POST['password'];
// Хэш пароля
$password=md5($password);
//Запрос на выбор данных, присваивание данных из бд к переменным
$query="SELECT * FROM users WHERE user_login='$login' AND user_password='$password'";
$utf=mysqli_query($link,$query);
$connect = mysqli_num_rows($utf);

// Выборка данных, проверка на коннект
// Если нет ошибок, то 
if($connect == 1){
	// Включение сессии, если всё успешно
$_SESSION['login']=$_POST['login'];
$_SESSION['password']=$password;

echo '<script type="text/javascript">';
echo 'localStorage.setItem("login",JSON.stringify("'.$login.'"));';
echo '</script>';
header("Location: profile.php");

}
else{
echo 'Неверные данные!';
}}	
?>
</span>

<div class="enter">
<!-- Форма авторизации -->
<div class="auth">
	<h3> Авторизация  </h3>
<form class="autho" action="" method="POST">
	<label> Логин </label>
	<input type="text" name="login" required>
	<label> Пароль </label>
	<input type="password" name="password" required>
	<br>
    <button type="submit" name="submit">Войти</button>
     <a href="/rzd/registr.php"> Зарегистрироваться?  </a>
  </div>  
  
</form>

</div>



<!-- подвал -->

<?php 
require('footer.php');
	?>

</body>
</html>