<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['login'];
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все мониторы

$zapros= mysqli_query($link,"SELECT * FROM moduli_pamyati");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);

$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$form_factor[1000]=[];
$kol_vo_kontaktov[1000]=[];
$latentnost[1000]=[];
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
		<a href="index.php"> / ГЛАВНАЯ </a>  <a href="kompl.php"> / КОМПЛЕКТУЮЩИЕ ДЛЯ ПК </a> / МОДУЛИ ПАМЯТИ
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
$zapros= mysqli_query($link,"SELECT * FROM moduli_pamyati");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {

$id[$k]=$row['id'];
$name[$k]=$row['name'];
$form_factor[$k]=$row['form_factor'];
$kol_vo_kontaktov[$k]=$row['kol_vo_kontaktov'];
$latentnost[$k]=$row['latentnost'];
$price[$k]=$row['price'];
$image[$k]='"'.$row['image'].'"';
	$k+=1;
}}
?>

var id, name1, form_factor, form_factor, kol_vo_kontaktov,latentnost, price, image, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
name1=<?php echo json_encode($name);?>;
id=<?php echo json_encode($id);?>;
form_factor=<?php echo json_encode($form_factor);?>;
kol_vo_kontaktov=<?php echo json_encode($kol_vo_kontaktov);?>;
latentnost=<?php echo json_encode($latentnost);?>; 
price=<?php echo json_encode($price);?>; 
image=<?php echo json_encode($image);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++)
{ 
tovar={"name1" : name1[i], "form_factor" : form_factor[i], "kol_vo_kontaktov" : kol_vo_kontaktov[i], "latentnost": latentnost[i], "price": price[i], "image": image[i], "id" : id[i] }; 
arr.push(tovar); }}

//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1+'</h2>'+'<br>'; 
out+= '<h3> '+ "Форм-фактор: "+arr[key].form_factor+ '</h3>'+'<br>'; 
out+='<h3> '+ "Количество контактов: "+arr[key].kol_vo_kontaktov+'</h3>'+'<br>';
out+='<h3> '+"Латентность: "+arr[key].latentnost+ '</h3>'+'<br>'+'</div>'; 
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
basket[articul_id]="moduli_pamyati";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('moduli_pamyati',JSON.stringify(basket));
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