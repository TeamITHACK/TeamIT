<?php
session_start();
$_SESSION['login'];
  ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=desktop, initial-scale=1.0">
	<title>Компьютерный магазин</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/style_2.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<?php 
require('header.php');
	?>
<br>
<span style="display: flex;
justify-content: center;">

<?php 
if (!empty($_SESSION['login'])) {
}
else echo "Войдите или зарегистрируйтесь!";
?>

</span>

<div class="way">
	<span>
		<a href="index.php"> / ГЛАВНАЯ </a> / КОМПЛЕКТУЮЩИЕ ДЛЯ ПК:
	</span>
</div>
<br>
<div class="resize">
<section id="service-id">
	<ul class="service_wrap">
		<li class="service_card">
			<a class="service_link" href="processor.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/cpu.png" alt="Процессоры" >
				</div>
				<div class="service_desc">
					Процессоры
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="sistemohl.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src="img/cooling_system.png" alt="Система охлаждения">
				</div>
				<div class="service_desc">
					Системы охлаждения
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="mat_plata.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src="img/mainboard.png" alt="Материнская плата">
				</div>
				<div class="service_desc">
					Материнские платы
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="moduli_pamyati.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/memory.png" alt="Модули памяти">
					
				</div>
				<div class="service_desc">
					Модули памяти
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="videocard.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/card.png" alt="Видеокарты">
					
				</div>
				<div class="service_desc">
					Видеокарты
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="block_pitaniya.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/power-supply.png" alt="Блоки питания">
				</div>
				<div class="service_desc">
					Блоки питания
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="corpus.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/systemunit.png" alt="Корпуса">
				</div>
				<div class="service_desc">
					Корпуса
				</div>
			</a>
		 </li>
	</ul>
</section>
</div>

<?php 
require('footer.php');
	?>
</body>
</html>