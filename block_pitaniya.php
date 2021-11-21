<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['login'];
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все мониторы

$zapros= mysqli_query($link,"SELECT * FROM block_pitaniya");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);

$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$form_factor[1000]=[];
$pitanie_matpl_process[1000]=[];
$pitanie_videocard[1000]=[];
$raziemi_sata[1000]=[];
$raziemi_molex[1000]=[];
$raziemi_ventolyatora[1000]=[];
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



</span>

<div class="way">
	<span>
		<a href="index.php"> / ГЛАВНАЯ </a>  <a href="kompl.php"> / КОМПЛЕКТУЮЩИЕ ДЛЯ ПК </a> / БЛОК ПИТАНИЯ
	</span>
</div>
<br>
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
$zapros= mysqli_query($link,"SELECT * FROM block_pitaniya");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {


$id[$k]=$row['id'];
$name[$k]=$row['name'];
$form_factor[$k]=$row['form_factor'];
$pitanie_matpl_process[$k]=$row['pitanie_matpl_process'];
$pitanie_videocard[$k]=$row['pitanie_videocard'];
$raziemi_sata[$k]=$row['raziemi_sata'];
$raziemi_molex[$k]=$row['raziemi_molex'];
$raziemi_ventolyatora[$k]=$row['raziemi_ventolyatora'];
$price[$k]=$row['price'];
$image[$k]='"'.$row['image'].'"';
	$k+=1;
}}
?>

var id, name1, form_factor, pitanie_matpl_process, raziemi_sata, raziemi_molex,raziemi_ventolyatora, price, image, pitanie_videocard, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
id=<?php echo json_encode($id);?>;
name1=<?php echo json_encode($name);?>;
form_factor=<?php echo json_encode($form_factor);?>;
pitanie_matpl_process=<?php echo json_encode($pitanie_matpl_process);?>;
pitanie_videocard=<?php echo json_encode($pitanie_videocard);?>;
raziemi_sata=<?php echo json_encode($raziemi_sata);?>;
raziemi_molex=<?php echo json_encode($raziemi_molex);?>;
raziemi_ventolyatora=<?php echo json_encode($raziemi_ventolyatora);?>;
price=<?php echo json_encode($price);?>; 
image=<?php echo json_encode($image);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++)
{ 
tovar={"name1" : name1[i],"pitanie_videocard":pitanie_videocard[i], "form_factor" : form_factor[i], "pitanie_matpl_process" : pitanie_matpl_process[i], "raziemi_sata": raziemi_sata[i],"raziemi_molex": raziemi_molex[i],"raziemi_ventolyatora":raziemi_ventolyatora[i], "price": price[i], "image": image[i], "id" : id[i] }; 
arr.push(tovar); }}

//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1+'</h2>'+'<br>'; 
out+= '<h3> '+ "Форм-фактор: "+arr[key].form_factor+ '</h3>'+'<br>'; 
out+='<h3> '+ "Питание материнской платы и процессора: "+arr[key].pitanie_matpl_process+'</h3>'+'<br>';
out+='<h3> '+ "Питание видеокарты: "+arr[key].pitanie_videocard+'</h3>'+'<br>';
out+='<h3> '+ "Разъемы SATA:  "+arr[key].raziemi_sata+'</h3>'+'<br>';
out+='<h3> '+ "Разъемы Peripheral (Molex):"+arr[key].raziemi_molex+'</h3>'+'<br>';
out+='<h3> '+"Размер вентилятора(ов): "+arr[key].raziemi_ventolyatora+ '</h3>'+'<br>'+'</div>'; 
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
basket[articul_id]="block_pitaniya";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('block_pitaniya',JSON.stringify(basket));
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