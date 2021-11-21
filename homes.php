<?php
header("Content-Type: text/html; charset=utf-8");
$link = mysqli_connect('localhost', 'root', '', 'rzd');

$zapros= mysqli_query($link,"SELECT * FROM komputeri");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);
$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$processor[1000]=[];
$processor_chastota[1000]=[];
$operativnaya_pamyat[1000]=[];
$graghics[1000]=[];
$jestkii_disk[1000]=[];
$ssd[1000]=[];
$operacionn_sistem[1000]=[];
$image[1000]=[];
$price[1000]=[];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=desktop, initial-scale=1.0">
	<title>Выбор дома</title>
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


</span>

<div class="way">
	<span>
		<a href="index.php"> / ГЛАВНАЯ </a> / БРОНИРОВАНИЕ ДОМА:
	</span>
</div>
<br>
<div id="out">

<section id="service-id">
	<h2 class="service_title">Список домов</h2>
	<ul class="service_wrap">
		<li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №1 
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы"></div>
				<div class="service_desc">
					Дом №2
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы"></div>
				<div class="service_desc">
					Дом №3 
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: red;">Забронирован</lable></p>
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы"></div>
				<div class="service_desc">
					Дом №4
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
					
				</div>
				<div class="service_desc">
					Дом №5
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: red;">Забронирован</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
					
				</div>
				<div class="service_desc">
					Дом №6
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: red;">Забронирован</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №7
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
				<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №8
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №9
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №10
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №11
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №12
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №13
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="bron.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Дом №14
					<p style="color: black; margin-top: -2px;">Статус: <lable style="color: blue;">Сдаётся</lable></p>
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