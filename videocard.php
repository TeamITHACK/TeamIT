<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['login'];
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все мониторы

$zapros= mysqli_query($link,"SELECT * FROM videocard");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);

$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$videochisset[1000]=[];
$chastota_graph_process[1000]=[];
$obiem_videopamyati[1000]=[];
$tip_videopamyati[1000]=[];
$chastota_videopamyati[1000]=[];
$podderjka_tekhology[1000]=[];
$dop_pitanie[1000]=[];
$rekomend_moschn_bp[1000]=[];
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
		<a href="index.php"> / ГЛАВНАЯ </a>  <a href="kompl.php"> / КОМПЛЕКТУЮЩИЕ ДЛЯ ПК </a> / ВИДЕОКАРТЫ
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
$zapros= mysqli_query($link,"SELECT * FROM videocard");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {

$id[$k]=$row['id'];
$name[$k]=$row['name'];
$videochisset[$k]=$row['videochisset'];
$chastota_graph_process[$k]=$row['chastota_graph_process'];
$obiem_videopamyati[$k]=$row['obiem_videopamyati'];
$tip_videopamyati[$k]=$row['tip_videopamyati'];
$chastota_videopamyati[$k]=$row['chastota_videopamyati'];
$podderjka_tekhology[$k]=$row['podderjka_tekhology'];
$dop_pitanie[$k]=$row['dop_pitanie'];
$rekomend_moschn_bp[$k]=$row['rekomend_moschn_bp'];
$price[$k]=$row['price'];
$image[$k]='"'.$row['image'].'"';
	$k+=1;
}}
?>

var id, name1, videochisset, chastota_graph_process, obiem_videopamyati,tip_videopamyati,chastota_videopamyati,podderjka_tekhology,podderjka_tekhology,dop_pitanie,rekomend_moschn_bp, price, image, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
name1=<?php echo json_encode($name);?>;
id=<?php echo json_encode($id);?>;
videochisset=<?php echo json_encode($videochisset);?>;
chastota_graph_process=<?php echo json_encode($chastota_graph_process);?>;
obiem_videopamyati=<?php echo json_encode($obiem_videopamyati);?>; 
tip_videopamyati=<?php echo json_encode($tip_videopamyati);?>; 
chastota_videopamyati=<?php echo json_encode($chastota_videopamyati);?>; 
podderjka_tekhology=<?php echo json_encode($podderjka_tekhology);?>; 
dop_pitanie=<?php echo json_encode($dop_pitanie);?>; 
rekomend_moschn_bp=<?php echo json_encode($rekomend_moschn_bp);?>; 
price=<?php echo json_encode($price);?>; 
image=<?php echo json_encode($image);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++)
{ 
tovar={"name1" : name1[i], "videochisset" : videochisset[i], "chastota_graph_process" : chastota_graph_process[i], "obiem_videopamyati": obiem_videopamyati[i], "tip_videopamyati": tip_videopamyati[i],"chastota_videopamyati": chastota_videopamyati[i],"podderjka_tekhology": podderjka_tekhology[i],"dop_pitanie": dop_pitanie[i],"rekomend_moschn_bp": rekomend_moschn_bp[i], "price": price[i], "image": image[i], "id" : id[i] }; 
arr.push(tovar); }}

//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1+'</h2>'+'<br>'; 
out+= '<h3> '+ "Видеочипсет:"+arr[key].videochisset+ '</h3>'+'<br>'; 
out+='<h3> '+ "Частота графического процессора: "+arr[key].chastota_graph_process+'</h3>'+'<br>';
out+='<h3> '+ "Объем видеопамяти: "+arr[key].obiem_videopamyati+'</h3>'+'<br>';
out+='<h3> '+ "Тип видеопамяти: "+arr[key].tip_videopamyati+'</h3>'+'<br>';
out+='<h3> '+ "Частота видеопамяти: "+arr[key].chastota_videopamyati+'</h3>'+'<br>';
out+='<h3> '+ "Разъемы дополнительного питания: "+arr[key].dop_pitanie+'</h3>'+'<br>';
out+='<h3> '+ "Поддержка технологий: "+arr[key].podderjka_tekhology+'</h3>'+'<br>';
out+='<h3> '+"Рекомендуемая производителем мощность БП:  "+arr[key].rekomend_moschn_bp+ '</h3>'+'<br>'+'</div>'; 
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
basket[articul_id]="videocard";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('videocard',JSON.stringify(basket));
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