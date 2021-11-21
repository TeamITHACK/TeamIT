<?php
session_start();
$_SESSION['login'];
header("Content-Type: text/html; charset=utf-8");
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все ос
$zapros= mysqli_query($link,"SELECT * FROM operac_sistem");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);
$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$tip_opersist[1000]=[];
$opisanie[1000]=[];
$bitnost[1000]=[];
$localisation[1000]=[];
$image[1000]=[];
$price[1000]=[];
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
		<a href="index.php"> / ГЛАВНАЯ </a> /<a href="progr_obes.php"> ПРОГРАММНОЕ ОБЕСПЕЧЕНИЕ </a> / ОПЕРАЦИОННЫЕ СИСТЕМЫ: 
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
$zapros= mysqli_query($link,"SELECT * FROM operac_sistem");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {

$id[$k]=$row['id'];
$name[$k]=$row['name'];
$tip_opersist[$k]=$row['tip_opersist'];
$opisanie[$k]=$row['opisanie'];
$bitnost[$k]=$row['bitnost'];
$localisation[$k]=$row['localisation'];
$image[$k]='"'.$row['image'].'"';
$price[$k]=$row['price'];
// прибавление данных в строку
$k+=1; 
}}
?>

var id, name1, tip_opersist, opisanie, bitnost, localisation, image, price, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
// переносим массив элементов из php в  js
id=<?php echo json_encode($id);?>;
name1=<?php echo json_encode($name);?>;
tip_opersist=<?php echo json_encode($tip_opersist);?>;
opisanie=<?php echo json_encode($opisanie);?>;
bitnost=<?php echo json_encode($bitnost);?>;
localisation=<?php echo json_encode($localisation);?>;
image=<?php echo json_encode($image);?>;
price=<?php echo json_encode($price);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++) {
tovar={"id":id[i],"name1":name1[i],"tip_opersist":tip_opersist[i],"opisanie":opisanie[i], "bitnost":bitnost[i], "localisation":localisation[i], "image":image[i], "price":price[i] }; 
arr.push(tovar); }}


//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1 +'</h2>'+'<br>';
out+='<h3> '+ "Тип ОС: "+arr[key].tip_opersist + '</h3>'+'<br>'; 
out+='<h4> '+ "Описание: "+arr[key].opisanie + '</h4>'+'<br>'; 
out+= '<h3> '+ "Битность: "+arr[key].bitnost + '</h3>'+'<br>'; 
out+='<h3> '+ "Локализация: "+arr[key].localisation+'</h3>'+'<br>'+'</div>';
out+='<label id="price">'+arr[key].price+ " rub " +'<br>'+'</label>';
out+='<button class="button_tovar" articul='+key+' articul_id="'+arr[key].id+'" price="'+arr[key].price+'"> <img class="bas" src="img/supermarket-basket.png"> </button>'; 
out+='</div>';
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
basket[articul_id]="operac_sistem";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('operac_sistem',JSON.stringify(basket));
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
<?php 
require('footer.php');
	?>
</body>
</html>