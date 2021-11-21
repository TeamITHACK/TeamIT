<?php 
session_start();



?>

<script type="text/javascript">
	localStorage.setItem('Account',false);
</script>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=desktop, initial-scale=1.0">
	<title>Volga Iron Hack</title>
		
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<script src="jQuery.min.js"></script>  
<script src="jQuery.scrollSpeed.js">
	$(function() {  
    // плавная прокрутка страницы
    jQuery.scrollSpeed(100, 800, 'easeOutCubic');
});
</script>
</head>
<body>
<?php 

require('header.php');

	?>


<br>
<span style="display: flex;
justify-content: center; font-size: 13px; font-weight: bold;">


</span>
<script type="text/javascript">
if(localStorage.getItem('Summa')==undefined) {
localStorage.setItem('Summa',0);}
</script>


<!-- подключение слайдера  -->
<script defer src="js/slider.js"></script>
<!-- Основной блок слайдера начало -->
<div class="slider">
    <!-- Первый слайд -->
    <div class="item">
        <img src="img/9.jpeg">
    </div>
    <!-- Второй слайд -->
    <div class="item">
        <img src="img/5.jpeg">
    </div>
    <!-- Третий слайд -->
    <div class="item">
        <img src="img/10.jpeg">
    </div>
    <!-- Четвёртый слайд -->
    <div class="item">
        <img src="img/17.jpeg">
    </div>
    <!-- Кнопки-стрелочки -->
    <a class="previous" onclick="previousSlide()">&#10094;</a>
    <a class="next" onclick="nextSlide()">&#10095;</a>
</div>
<!-- Разметка слайдера  конец  -->

<div class="ellipse">
	
</div>

<div class="ellipse_2">
	
</div>

<div class="line_1">
	
</div>

<div class="line_2">

</div>


<div class="line_3">
	
</div>

<div class="line_4">

</div>

<div>
<div id="t1">
	БАЗА
</div>

<div id="t2">
	ОТДЫХА
</div>
</div>


<section id="service-id">
	<h2 class="service_title">Услуги</h2>
	<ul class="service_wrap">
		<li class="service_card">
			<a class="service_link" href="homes.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/warehouse.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Забронировать дом
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="ribalka.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/pool.png" alt="Компьютеры" >
				</div>
				<div class="service_desc">
					Рыбалка
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="kompl_.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src="img/cruise-ship.png" alt="Комплектующие для ПК">
				</div>
				<div class="service_desc">
					Аренда судна
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="banya.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/bathroom.png" alt="Мониторы">
				</div>
				<div class="service_desc">
					Баня
				</div>
			</a>
		 </li>
		<li class="service_card">
			<a class="service_link" href="ystr__enter.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/map-pointer.png" alt="Устройства ввода">
					
				</div>
				<div class="service_desc">
					Экскурсии
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="progr__obes.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/toolkit.png" alt="Программное обеспечение">
					
				</div>
				<div class="service_desc">
					Прокат рыболовных принадлежностей
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="ohota.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src="img/archery.png" alt="Носители информации">
				</div>
				<div class="service_desc">
					Организация охоты
				</div>
			</a>
		 </li>
		 <li class="service_card">
			<a class="service_link" href="jest__ssd.php"> 
				<div class="service_img-wrap"> 
					<img class="service_img" src=" img/compass.png
" alt="Жесткие диски и SSD">
				</div>
				<div class="service_desc">
					Услуги егеря
				</div>
			</a>
		 </li>
	</ul>
</section>

<!-- Блок подписки -->
	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div>
					<div class="newsletter_content">
						<div class="newsletter_title"> Оставить отзыв</div>
						<div class="newsletter_form_container">
<form action="" method="POST" id="newsletter_form">
<p>Ваше имя:</p>
<input type="text" name="name" required class="newsletter_input" >
<p>Ваш комментарий:</p>
<textarea name="comment" required></textarea> 
<p>Оценка от 1 до 5:</p>
<input type="number" name="otcenka" min="1" max="5" required>
<br>
<button formaction="index.php"  type="submit" class="newsletter_button"><span>отправить</span></button>


<?php

if (!empty($_POST['name']) or !empty($_POST['comment']) or !empty($_POST['otcenka']) ) {

$name = $_POST['name'];
$comment = $_POST['comment'];
$otcenka = $_POST['otcenka'];

?>
<?php 
//Добавление заказа
$link=mysqli_connect('localhost','root','','rzd') or (mysqli_error("База данных не подключена!"));
mysqli_query($link,"set names 'utf8'");

/*
* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
*/


/*
* Создаем переменные со значениями, которые были получены с $_POST
*/

/*
* Делаем запрос на добавление новой строки в таблицу 

*/
if (!empty($name) and ($comment) and ($otcenka) ) {
	// code...


mysqli_query($link,"INSERT INTO `otziv` (
`name` ,
`coment` ,
`ocenka`
)
VALUES ('$name', '$comment', '$otcenka');");
echo '<script type="text/javascript">document.location.href = "popup.php";</script>';
}

}

?>
</form>
<br>
</div>
	</div>
	</div>
	</div>
	</div>
	<?php 

$link=mysqli_connect('localhost','root','','rzd') or (mysqli_error("База данных не подключена!"));
mysqli_query($link,"set names 'utf8'");
$otziv = mysqli_query($link, "SELECT * FROM `otziv`");

$otziv = mysqli_fetch_all($otziv);

for ($i=count($otziv)-1;$i>count($otziv)-4;$i--) {
?>

<div class="otz">
<p><?= $otziv[$i][1]?></p>
<p><?= $otziv[$i][2]?></p>
<p>-<?= $otziv[$i][3]?>-</p>

</div>
<?php
}
?>

<!-- подключение слайдера  -->
<ul class="gallery">
	<li style="background: #f6bd60; "> <img src="img/5.jpeg" style="height: 648px;"> </li>
	<li style="background: #f5cac3; "> <img src="img/10.jpeg" ></li>

	<li style="background: #f28482;"> <img src="img/17.jpeg" ></li>
</ul>


<script type="text/javascript">
	
	const slider = document.querySelector('.gallery');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', e => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', _ => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', _ => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', e => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const SCROLL_SPEED = 3;
  const walk = (x - startX) * SCROLL_SPEED;
  slider.scrollLeft = scrollLeft - walk;
});

</script>

<!-- Разметка слайдера  конец  -->

<?php
require('footer.php');
	?>



</body>
</html>