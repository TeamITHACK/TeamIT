<?php
session_start();
$_SESSION['login'];
header("Content-Type: text/html; charset=utf-8");
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все мониторы
$zapros= mysqli_query($link,"SELECT * FROM jestkie_diski");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);
$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$tip_jd[1000]=[];
$form_factor[1000]=[];
$obiem_nakopitelya[1000]=[];
$interface[1000]=[];
$bufendate[1000]=[];
$speedshpindelya[1000]=[];
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
		<a href="index.php"> / ГЛАВНАЯ </a> /<a href="jest_ssd.php"> ЖЕСТКИЕ ДИСКИ И SSD </a> / ЖЕСТКИЕ ДИСКИ: 
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
$zapros= mysqli_query($link,"SELECT * FROM jestkie_diski");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {


$id[$k]=$row['id'];
$name[$k]=$row['name'];
$tip_jd[$k]=$row['tip_jd'];
$form_factor[$k]=$row['form_factor'];
$obiem_nakopitelya[$k]=$row['obiem_nakopitelya'];
$interface[$k]=$row['interface'];
$bufendate[$k]=$row['bufendate'];
$speedshpindelya[$k]=$row['speedshpindelya'];
$image[$k]='"'.$row['image'].'"';
$price[$k]=$row['price'];
// прибавление данных в строку
$k+=1; 
}}
?>

var id, name1, tip_jd, form_factor, obiem_nakopitelya, interface, bufendate, speedshpindelya, image, price, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
// переносим массив элементов из php в  js
id=<?php echo json_encode($id);?>;
name1=<?php echo json_encode($name);?>;
tip_jd=<?php echo json_encode($tip_jd);?>;
form_factor=<?php echo json_encode($form_factor);?>;
obiem_nakopitelya=<?php echo json_encode($obiem_nakopitelya);?>;
interface=<?php echo json_encode($interface);?>;
bufendate=<?php echo json_encode($bufendate);?>;
speedshpindelya=<?php echo json_encode($speedshpindelya);?>;
image=<?php echo json_encode($image);?>;
price=<?php echo json_encode($price);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++) {
tovar={"id":id[i],"name1":name1[i],"tip_jd":tip_jd[i],"form_factor":form_factor[i], "obiem_nakopitelya":obiem_nakopitelya[i], "interface":interface[i], "bufendate":bufendate[i], "speedshpindelya":speedshpindelya[i],"image":image[i], "price":price[i] }; 
arr.push(tovar); }}


//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1+'</h2>'+'<br>';
out+='<h3> '+ "Тип жесткого диска: "+arr[key].tip_jd+ '</h3>'+'<br>'; 
out+='<h3> '+ "Форм-фактор: "+arr[key].form_factor+ '</h3>'+'<br>'; 
out+= '<h3> '+ "Объем накопителя: "+arr[key].obiem_nakopitelya+ '</h3>'+'<br>'; 
out+='<h3> '+ "Интерфейс: "+arr[key].interface+'</h3>'+'<br>';
out+='<h3> '+"Буферная память: "+arr[key].bufendate+ '</h3>'+'<br>'; 
out+='<h3> '+ "Скорость вращения: "+arr[key].speedshpindelya+'</h3>'+'<br>'+'</div>';
out+='<label id="price">'+arr[key].price+ " rub " +'<br>'+'</label>';
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
basket[articul_id]="jestkie_diski";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('jestkie_diski',JSON.stringify(basket));
localStorage.setItem('Summa',price1);}
//запоминаем айди объектов, которые будем менять, в переменные
var sum="";
const sum_vivod=document.getElementById('cena');
sum=JSON.parse(localStorage.getItem('Summa'));
sum+=" rub"
document.getElementById('cena').innerHTML = sum;
}
</script>
<?php 
require('footer.php');
	?>
</body>
</html>