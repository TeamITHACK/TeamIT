<?php
	session_start(); // обязательно стартуем сессию, чтобы с ней далее работать
	$_SESSION['login'] = null;
  header("Location: index.php");
?>
