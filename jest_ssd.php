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
		<a href="index.php"> / ГЛАВНАЯ </a> / ЖЕСТКИЕ ДИСКИ И SSD
	</span>
</div>
<div class="resize">
<section id="service-id">
	<ul class="service_wrap" style="flex-wrap:nowrap;">
		<li class="service_card">
			<a class="service_link" href="jestk_disk.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/cpu.png" alt="Жесткие диски" >
				</div>
				<div class="service_desc">
					Жесткие диски
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="jd_ssd.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src="img/cooling_system.png" alt="SSD">
				</div>
				<div class="service_desc">
					SSD
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