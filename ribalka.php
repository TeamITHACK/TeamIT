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
	<title>Рыбалка</title>
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
		<a href="index.php"> / ГЛАВНАЯ </a> / БРОНИРОВАНИЕ УСЛУГИ "РЫБАЛКА":
	</span>
</div>
<br>
<br>
<br>
<div style="float:left; margin: 2%;">
	<h1 style="color: black;">
		Что входит:
		<ul>
			<li><label style="font-size: 60%; color: black;">Аренда участка, для рыбалки.</label></li>
			<li><label style="font-size: 60%; color: black;">Комплексный обед.</label></li>
			<li><label style="font-size: 60%; color: black;">Переносной гамак.</label></li>
			<li><label style="font-size: 60%; color: black;">Прохладные напитки.</label></li>
		</ul>
	</h1>
</div>
<div id="out" style="float: left;">

<?php 
require('bronirovanie_ribalka.php');
	?>

</div>

<!-- подключение слайдера  -->
<ul class="gallery2" style=" margin: 1%;">
	<li style="background: #f6bd60; width: 600px; height: 500px;"> <img src="img/5.jpeg" style="width: 600px; height: 500px;"> </li>
	<li style="background: #f5cac3; width: 600px; height: 500px;"> <img src="img/10.jpeg"style="width: 600px; height: 500px;"></li>

	<li style="background: #f28482;width: 600px; height: 500px;"> <img src="img/17.jpeg"style="width: 600px; height: 500px;"></li>
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


<?php 
require('footer.php');
	?>
</body>
</html>