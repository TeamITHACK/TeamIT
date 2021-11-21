<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['login'];
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все мониторы

$zapros= mysqli_query($link,"SELECT * FROM corpus");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);

$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$tiporazmer[1000]=[];
$otseki_525_vneshnie[1000]=[];
$otseki_35_vneshnie[1000]=[];
$frontalnie_raziemi_2_0[1000]=[];
$frontalnie_raziemi_3_0[1000]=[];
$moschnost_bp[1000]=[];
$material_korpusa[1000]=[];
$max_leigh_videocard[1000]=[];
$price[1000]=[];
$image[1000]=[];
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
		<a href="index.php"> / ГЛАВНАЯ </a>  <a href="kompl.php"> / КОМПЛЕКТУЮЩИЕ ДЛЯ ПК </a> / КОРПУСА
	</span>
</div>
<div id="out">

<script type="text/javascript">
	var tovar;
	var a=0;
	var i;
	var arr =[];
	for (var i = 0; i < <?php echo $num_rows;?>; i++) {

//php + js берем данные из бд
<?php
$id[1000];
$zapros= mysqli_query($link,"SELECT * FROM corpus");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {

$id[$k]=$row['id'];
$name[$k]=$row['name'];
$tiporazmer[$k]=$row['tiporazmer'];
$otseki_525_vneshnie[$k]=$row['otseki_525_vneshnie'];
$otseki_35_vneshnie[$k]=$row['otseki_35_vneshnie'];
$frontalnie_raziemi_2_0[$k]=$row['frontalnie_raziemi_2_0'];
$frontalnie_raziemi_3_0[$k]=$row['frontalnie_raziemi_3_0'];
$moschnost_bp[$k]=$row['moschnost_bp'];
$material_korpusa[$k]=$row['material_korpusa'];
$max_leigh_videocard[$k]=$row['max_leigh_videocard'];
$price[$k]=$row['price'];
$image[$k]='"'.$row['image'].'"';
$k+=1;
}}
?>

var id, name1, tiporazmer, otseki_525_vneshnie, max_leigh_videocard, max_leigh_videocard, otseki_35_vneshnie, frontalnie_raziemi_2_0, frontalnie_raziemi_3_0, moschnost_bp, material_korpusa, price, image, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
name1=<?php echo json_encode($name);?>;
id=<?php echo json_encode($id);?>;
tiporazmer=<?php echo json_encode($tiporazmer);?>;
otseki_525_vneshnie=<?php echo json_encode($otseki_525_vneshnie);?>;
otseki_35_vneshnie=<?php echo json_encode($otseki_35_vneshnie);?>;
frontalnie_raziemi_2_0=<?php echo json_encode($frontalnie_raziemi_2_0);?>;
frontalnie_raziemi_3_0=<?php echo json_encode($frontalnie_raziemi_3_0);?>;
moschnost_bp=<?php echo json_encode($moschnost_bp);?>;
material_korpusa=<?php echo json_encode($material_korpusa);?>;
max_leigh_videocard=<?php echo json_encode($max_leigh_videocard);?>; 
price=<?php echo json_encode($price);?>; 
image=<?php echo json_encode($image);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++)
{ 
tovar={"name1" : name1[i],"frontalnie_raziemi_3_0":frontalnie_raziemi_3_0[i],"max_leigh_videocard":max_leigh_videocard[i] ,"material_korpusa":material_korpusa[i], "moschnost_bp":moschnost_bp[i] , "tiporazmer" : tiporazmer[i],"frontalnie_raziemi_2_0" : frontalnie_raziemi_2_0[i], "otseki_525_vneshnie" : otseki_525_vneshnie[i], "otseki_35_vneshnie": otseki_35_vneshnie[i], "price": price[i], "image": image[i], "id" : id[i] }; 
arr.push(tovar); }}

//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1+'</h2>'+'<br>'; 
out+= '<h3> '+ "Типоразмер: "+arr[key].tiporazmer+ '</h3>'+'<br>'; 
out+= '<h3> '+ "Отсеки 5,25' внутренние: "+arr[key].otseki_525_vneshnie+ '</h3>'+'<br>'; 
out+= '<h3> '+ "Отсеки 3,5' внутренние: " +arr[key].otseki_35_vneshnie+ '</h3>'+'<br>'; 
out+= '<h3> '+ "Фронтальные разъемы USB 2.0: "+arr[key].frontalnie_raziemi_2_0+ '</h3>'+'<br>'; 
out+= '<h3> '+ "Фронтальные разъемы USB 3.0: "+arr[key].frontalnie_raziemi_3_0+ '</h3>'+'<br>'; 
out+= '<h3> '+ "Мощность БП: "+arr[key].moschnost_bp+ '</h3>'+'<br>'; 
out+= '<h3> '+ "Материал корпуса: "+arr[key].material_korpusa+ '</h3>'+'<br>'; 
out+='<h3> '+"Максимальная длина видеокарты:  "+arr[key].max_leigh_videocard+ '</h3>'+'<br>'+'</div>'; 
out+='<label id="price_lab">'+arr[key].price+ " rub " +'<br>'+'</label>';
out+='<button class="button_tovar" articul='+key+' articul_id="'+arr[key].id+'" price="'+arr[key].price+'"> <img class="bas" src="img/supermarket-basket.png"> </button>'; 
out+='</div>';
out+='<br> ';
}
document.getElementById('out').innerHTML=out;
</script>
<script type="text/javascript">
var basket; // корзина
var basket_osnova={}; // корзина
if(basket==null)
basket={};
var button_tovar = document.querySelector('.button_tovar');
//событие клика по класс button_menu и вызов функции addToBasket
$('button.button_tovar').on('click',addToBasket)
//добавление товара в корзину, по кнопке
function addToBasket(){
//заносим артикул и кол-во товара в массив корзины
var articul = $(this).attr('articul');
var price1 = $(this).attr('price');
var articul_id = $(this).attr('articul_id');

if(basket[articul_id]==undefined)
{
basket[articul_id]="corpus";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('corpus',JSON.stringify(basket));
localStorage.setItem('Summa',price1);}
//запоминаем айди объектов, которые будем менять, в переменные
var sum="";
const sum_vivod=document.getElementById('cena');
sum=JSON.parse(localStorage.getItem('Summa'));
sum+=" rub"
document.getElementById('cena').innerHTML = sum;
}
</script>

</div>

<br>
<?php 
require('footer.php');
	?>
</body>
</html>