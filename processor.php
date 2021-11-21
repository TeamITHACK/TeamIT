<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['login'];
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все мониторы
$zapros= mysqli_query($link,"SELECT * FROM processor");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);

$i=0;
$k=0;
$id[1000]=[];
$name[1000]=[];
$yadro[1000]=[];
$gnezdo_processora[1000]=[];
$kol_vo_yader[1000]=[];
$kol_vo_potokov[1000]=[];
$chastota[1000]=[];
$l3_cash[1000]=[];
$tehn_process[1000]=[];
$tip_pamyati[1000]=[];
$ko_vo_kanaov[1000]=[];
$versya_pci[1000]=[];
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
		<a href="index.php"> / ГЛАВНАЯ </a>  <a href="kompl.php"> / КОМПЛЕКТУЮЩИЕ ДЛЯ ПК </a> / ПРОЦЕССОРЫ
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
$zapros= mysqli_query($link,"SELECT * FROM processor");
$num_rows=mysqli_num_rows($zapros);
for ($e = 0; $e<print_r($num_rows); $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)) {


$id[$k]=$row['id'];
$name[$k]=$row['name'];
$yadro[$k]=$row['yadro'];
$gnezdo_processora[$k]=$row['gnezdo_processora'];
$kol_vo_yader[$k]=$row['kol_vo_yader'];
$kol_vo_potokov[$k]=$row['kol_vo_potokov'];
$chastota[$k]=$row['chastota'];
$l3_cash[$k]=$row['l3_cash'];
$tehn_process[$k]=$row['tehn_process'];
$tip_pamyati[$k]=$row['tip_pamyati'];
$ko_vo_kanaov[$k]=$row['ko_vo_kanaov'];
$versya_pci[$k]=$row['versya_pci'];
$price[$k]=$row['price'];
$image[$k]='"'.$row['image'].'"';
	$k+=1;
}}
?>

var id, name1, yadro, gnezdo_processora, kol_vo_yader,kol_vo_potokov,chastota,l3_cash,tehn_process, price,tip_pamyati,ko_vo_kanaov,versya_pci,image, tovar={};
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
name1=<?php echo json_encode($name);?>;
id=<?php echo json_encode($id);?>;
yadro=<?php echo json_encode($yadro);?>;
gnezdo_processora=<?php echo json_encode($gnezdo_processora);?>;
kol_vo_yader=<?php echo json_encode($kol_vo_yader);?>; 
kol_vo_potokov=<?php echo json_encode($kol_vo_potokov);?>; 
chastota=<?php echo json_encode($chastota);?>; 
l3_cash=<?php echo json_encode($l3_cash);?>; 
tehn_process=<?php echo json_encode($tehn_process);?>; 
tip_pamyati=<?php echo json_encode($tip_pamyati);?>; 
ko_vo_kanaov=<?php echo json_encode($ko_vo_kanaov);?>; 
versya_pci=<?php echo json_encode($versya_pci);?>; 
price=<?php echo json_encode($price);?>; 
image=<?php echo json_encode($image);?>;
}

for (i=0; i < <?php echo $num_rows;?>; i++)
{ 
tovar={"name1" : name1[i], "versya_pci":versya_pci[i], "yadro" : yadro[i], "gnezdo_processora" : gnezdo_processora[i], "kol_vo_yader": kol_vo_yader[i],"kol_vo_potokov":kol_vo_potokov[i], "chastota":chastota[i], "l3_cash":l3_cash[i],"tehn_process":tehn_process[i],"tip_pamyati":tip_pamyati[i],"ko_vo_kanaov":ko_vo_kanaov[i], "price": price[i], "image": image[i], "id" : id[i] }; 
arr.push(tovar); }}

//заполняем массив out данными о товаре
var out = '';
for(var key in arr) {
out+='<br> ';
out+='<div class="tovar">'; 
out+='<img class="tovar_img" src='+arr[key].image+'<br>'; 
out+= '<div class="textforname">'+'<h2>'+arr[key].name1+'</h2>'+'<br>'; 
out+= '<h3> '+ "Ядро: "+arr[key].yadro+ '</h3>'+'<br>'; 
out+='<h3> '+ "Гнездо процессора:  "+arr[key].gnezdo_processora+'</h3>'+'<br>';
out+='<h3> '+ "Количество ядер: "+arr[key].kol_vo_yader+'</h3>'+'<br>';
out+='<h3> '+ "Количество потоков : "+arr[key].kol_vo_potokov+'</h3>'+'<br>';
out+='<h3> '+ "Частота: "+arr[key].chastota+'</h3>'+'<br>';
out+='<h3> '+ "L3 кэш: "+arr[key].l3_cash+'</h3>'+'<br>';
out+='<h3> '+ "Технологический процесс: "+arr[key].tehn_process+'</h3>'+'<br>';
out+='<h3> '+ "Тип памяти:"+arr[key].tip_pamyati+'</h3>'+'<br>';
out+='<h3> '+ "Количество каналов памяти:"+arr[key].ko_vo_kanaov+'</h3>'+'<br>';
out+='<h3> '+"Версия PCI Express: "+arr[key].versya_pci+ '</h3>'+'<br>'+'</div>'; 
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
basket[articul_id]="processor";

var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)+parseInt(price1, 10);
price1=plus;
// запомниаем данные в localstorage
localStorage.setItem('processor',JSON.stringify(basket));
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