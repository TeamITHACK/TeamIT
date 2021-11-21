<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['login'];
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все мониторы
$zapros= mysqli_query($link,"SELECT * FROM sistema_ohlajdeniya");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);

$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$kol_vo_vevntilyatorov[1000]=[];
$diametr_ventilyatora[1000]=[];
$skorost_vrascheniya_ventilyatora[1000]=[];
$max_teplovid_process[1000]=[];
$osnovanie_kulera[1000]=[];
$visota_kulera[1000]=[];
$pitanie[1000]=[];
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
		<a href="index.php"> / ГЛАВНАЯ </a>  <a href="kompl.php"> / КОМПЛЕКТУЮЩИЕ ДЛЯ ПК </a> / СИСТЕМА ОХЛАЖДЕНИЯ
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
$zapros= mysqli_query($link,"SELECT * FROM sistema_ohlajdeniya");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {


$id[$k]=$row['id'];
$name[$k]=$row['name'];
$kol_vo_vevntilyatorov[$k]=$row['kol_vo_vevntilyatorov'];
$diametr_ventilyatora[$k]=$row['diametr_ventilyatora'];
$skorost_vrascheniya_ventilyatora[$k]=$row['skorost_vrascheniya_ventilyatora'];
$max_teplovid_process[$k]=$row['max_teplovid_process'];
$osnovanie_kulera[$k]=$row['osnovanie_kulera'];
$visota_kulera[$k]=$row['visota_kulera'];
$pitanie[$k]=$row['pitanie'];
$price[$k]=$row['price'];
$image[$k]='"'.$row['image'].'"';
	$k+=1;
}}
?>

var id, name1, kol_vo_vevntilyatorov, diametr_ventilyatora, skorost_vrascheniya_ventilyatora,max_teplovid_process,osnovanie_kulera,visota_kulera,pitanie, price, image, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
name1=<?php echo json_encode($name);?>;
id=<?php echo json_encode($id);?>;
kol_vo_vevntilyatorov=<?php echo json_encode($kol_vo_vevntilyatorov);?>;
diametr_ventilyatora=<?php echo json_encode($diametr_ventilyatora);?>;
skorost_vrascheniya_ventilyatora=<?php echo json_encode($skorost_vrascheniya_ventilyatora);?>; 
max_teplovid_process=<?php echo json_encode($max_teplovid_process);?>; 
osnovanie_kulera=<?php echo json_encode($osnovanie_kulera);?>; 
visota_kulera=<?php echo json_encode($visota_kulera);?>; 
pitanie=<?php echo json_encode($pitanie);?>; 
price=<?php echo json_encode($price);?>; 
image=<?php echo json_encode($image);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++)
{ 
tovar={"name1" : name1[i], "kol_vo_vevntilyatorov":kol_vo_vevntilyatorov[i], "diametr_ventilyatora" : diametr_ventilyatora[i], "skorost_vrascheniya_ventilyatora" : skorost_vrascheniya_ventilyatora[i], "max_teplovid_process": max_teplovid_process[i],"osnovanie_kulera":osnovanie_kulera[i], "visota_kulera":visota_kulera[i], "pitanie":pitanie[i], "price": price[i], "image": image[i], "id" : id[i] }; 
arr.push(tovar); }}

//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1+'</h2>'+'<br>'; 
out+= '<h3> '+ "Количество вентиляторов: "+arr[key].kol_vo_vevntilyatorov+ '</h3>'+'<br>'; 
out+='<h3> '+ "Диаметр вентилятора:  "+arr[key].diametr_ventilyatora+'</h3>'+'<br>';
out+='<h3> '+ "Скорость вращения вентилятора: "+arr[key].skorost_vrascheniya_ventilyatora+'</h3>'+'<br>';
out+='<h3> '+ "Максимальное тепловыделение процессора: "+arr[key].max_teplovid_process+'</h3>'+'<br>';
out+='<h3> '+ "Основание кулера: "+arr[key].osnovanie_kulera+'</h3>'+'<br>';
out+='<h3> '+ "Высота кулера: "+arr[key].visota_kulera+'</h3>'+'<br>';
out+='<h3> '+"Питание вентилятора от материнской платы: "+arr[key].pitanie+ '</h3>'+'<br>'+'</div>'; 
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
basket[articul_id]="sistema_ohlajdeniya";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('sistema_ohlajdeniya',JSON.stringify(basket));
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
