<?php
session_start();
$_SESSION['login']='$login';
header("Content-type: text/html; charset=utf-8");
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
$zapros= mysqli_query($link,"(SELECT 'mouse' as 'kat', id, name, price,image from mouse) UNION (SELECT 'monitor', id, name, price,image FROM monitor) UNION (SELECT 'moduli_pamyati', id, name, price,image FROM moduli_pamyati) UNION (SELECT 'office_api', id, name, price,image FROM office_api) UNION (SELECT 'komputeri',  id, name, price,image FROM komputeri) UNION (SELECT 'sistema_ohlajdeniya', id, name, price,image FROM sistema_ohlajdeniya) UNION (SELECT 'jestkie_diski', id, name, price,image FROM jestkie_diski) UNION (SELECT 'flash_memory', id, name, price,image FROM flash_memory) UNION (SELECT 'corpus', id, name, price,image FROM corpus) UNION (SELECT 'mat_plata', id, name, price,image FROM mat_plata)  UNION (SELECT 'vneshnie_diski', id, name, price,image FROM vneshnie_diski)  UNION (SELECT 'processor', id, name, price,image FROM processor) UNION (SELECT 'jd_ssd', id, name, price,image FROM jd_ssd) UNION (SELECT 'videocard', id, name, price,image FROM videocard) UNION (SELECT 'keyboard', id, name, price,image FROM keyboard) UNION (SELECT 'operac_sistem', id, name, price,image FROM operac_sistem) UNION (SELECT 'block_pitaniya', id, name, price,image FROM block_pitaniya)");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);
$i=0;
$k=0;
$name[1000]=[];
$price[1000]=[];
$tip[1000]=[];
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
	<script src="jquery-3.6.0.js"></script>
</head>
<body>
<?php 
require('header.php');
?>
<br>
<div class="way">
	<span>
		<a href="index.php"> / ГЛАВНАЯ </a> / КОРЗИНА:
	</span>
</div>
<br>
<div id="basket_div">
				заказы: 
		<script type="text/javascript">
//php + js берем из бд
//moduli_pamyati,office_api,komputeri,sistema_ohlajdeniya,jestkie_diski,flash_memory,monitor,corpus,mat_plata,vneshnie_diski,processor,jd_ssd,videocard
	<?php 
$zapros= mysqli_query($link,"(SELECT 'mouse' as 'kat', id, name, price,image from mouse) UNION (SELECT 'monitor', id, name, price,image FROM monitor) UNION (SELECT 'moduli_pamyati', id, name, price,image FROM moduli_pamyati) UNION (SELECT 'office_api', id, name, price,image FROM office_api) UNION (SELECT 'komputeri',  id, name, price,image FROM komputeri) UNION (SELECT 'sistema_ohlajdeniya', id, name, price,image FROM sistema_ohlajdeniya) UNION (SELECT 'jestkie_diski', id, name, price,image FROM jestkie_diski) UNION (SELECT 'flash_memory', id, name, price,image FROM flash_memory) UNION (SELECT 'corpus', id, name, price,image FROM corpus) UNION (SELECT 'mat_plata', id, name, price,image FROM mat_plata)  UNION (SELECT 'vneshnie_diski', id, name, price,image FROM vneshnie_diski)  UNION (SELECT 'processor', id, name, price,image FROM processor) UNION (SELECT 'jd_ssd', id, name, price,image FROM jd_ssd) UNION (SELECT 'videocard', id, name, price,image FROM videocard) UNION (SELECT 'keyboard', id, name, price,image FROM keyboard) UNION (SELECT 'operac_sistem', id, name, price,image FROM operac_sistem) UNION (SELECT 'block_pitaniya', id, name, price,image FROM block_pitaniya)");
$num_rows=mysqli_num_rows($zapros);
$utf=mysqli_query($link,"set names 'utf8'");
for ( $e = 0; $e < $num_rows; $e=$e+1) {
while($row=mysqli_fetch_assoc($zapros)){
$id[$k]=$row['id'];
$name[$k]=$row['name'];
$price[$k]=$row['price'];
$tip[$k]=$row['id'].":".$row['kat'];
$image[$k]='"'.$row['image'].'"';
	$k+=1;
}} ?>
var id,id2, name1, tip, price, image;
for (var i = 0; i < <?php print_r($num_rows);?>; i++) {
name1=<?php echo json_encode($name);?>;
id=<?php echo json_encode($id);?>;
price=<?php echo json_encode($price);?>; 
image=<?php echo json_encode($image);?>;
tip=<?php echo json_encode($tip);?>;
}
var id2={};
for (var j = 0; j<<?php echo json_encode($num_rows);?>; j++) {
	id2[j]=tip[j].split(':');
}
//заполняем массив out данными о товаре
var moduli_pamyati=JSON.parse(localStorage.getItem('moduli_pamyati'));
var office_api=JSON.parse(localStorage.getItem('office_api'));
var komputeri=JSON.parse(localStorage.getItem('komputeri'));
var sistema_ohlajdeniya=JSON.parse(localStorage.getItem('sistema_ohlajdeniya'));
var jestkie_diski=JSON.parse(localStorage.getItem('jestkie_diski'));
var flash_memory=JSON.parse(localStorage.getItem('flash_memory'));
var monitor=JSON.parse(localStorage.getItem('monitor'));
var corpus=JSON.parse(localStorage.getItem('corpus'));
var mat_plata=JSON.parse(localStorage.getItem('mat_plata'));
var vneshnie_diski=JSON.parse(localStorage.getItem('vneshnie_diski'));
var processor=JSON.parse(localStorage.getItem('processor'));
var jd_ssd=JSON.parse(localStorage.getItem('jd_ssd'));
var videocard=JSON.parse(localStorage.getItem('videocard'));
var keyboard=JSON.parse(localStorage.getItem('keyboard'));
var mouse=JSON.parse(localStorage.getItem('mouse'));
var operac_sistem=JSON.parse(localStorage.getItem('operac_sistem'));
var block_pitaniya=JSON.parse(localStorage.getItem('block_pitaniya'));
var arr_all={mouse,monitor,moduli_pamyati,office_api,komputeri,sistema_ohlajdeniya,jestkie_diski,flash_memory,corpus,mat_plata,vneshnie_diski,processor,jd_ssd,videocard,keyboard,block_pitaniya,operac_sistem};
//проверяем данные из local storage и конвертируем в id товара, если значение не null
var number_tovara = '';
for(var key in arr_all){
	if (arr_all[key]!=null)
		{number_tovara+=Object.keys(arr_all[key])+",";
	number_tovara+=key+";";
		}
}
number_tovara=number_tovara.split(";");
var number_tovara_2={};
for (var i = 0; i < number_tovara.length-1; i++) {
number_tovara_2[i]=number_tovara[i].split(',');
}
var tovar={};
var result=[];
for (i=0; i < <?php echo json_encode($num_rows);?>; i++) 
	{
	 for (j=0; j < Object.keys(number_tovara_2).length; j++)
		for (k=0; k < number_tovara_2[j].length-1; k++)
		if(id2[i][0]==number_tovara_2[j][k] && id2[i][1]==number_tovara_2[j][number_tovara_2[j].length-1])
		{
	tovar={"name1" : name1[i],"price" : price[i],"image" : image[i],"tip": number_tovara_2[j][number_tovara_2[j].length-1],"id" : id[i]};
	result.push(tovar);
	}
}
//заполняем массив out данными о товаре
var out = '';
for(var key in result){
	out+='<div class="tovar">';
	out+='<img class="tovar_img" src='+result[key].image+'<br>'; 
	out+=" "+result[key].name1+'<br>';
	out+="Цена: "+result[key].price+" rub"+'<br>';
	out+="Кол-во:"+'<input type="number" name="kol_vo" style="width:10%;" min=1 value=1 max=100>';
	out+='<button class="button_tovar" articul_id='+result[key].id+' articul='+key+' tip="'+result[key].tip+'" price="'+result[key].price+'">Убрать из корзины </button>'+'<br>' ;
	out+='</div>';
	out+='<br>';
	console.log(key);
}
document.getElementById('basket_div').innerHTML=out;
		</script>
	</div>
<div class="order_oformlenie">
	<h3>Оформление заказа </h3>
		<div id="info">
			<script type="text/javascript">
				var stroka="";
				summa='<input style="visibility: hidden;" name="Summa" value="'+JSON.parse(localStorage.getItem('Summa'))+'">';
				var arr_result={},arr_out;
			for (var i = 0; i < result.length;i++){arr_result[i]=result[i].name1+":"+result[i].tip;
				}

				for (var i = 0; i < result.length;i++){
					
					if(i==result.length-1)
				stroka=stroka+arr_result[i]+";";
			else
				stroka=stroka+arr_result[i]+";";
				}
				result_vivod='<input style="visibility: hidden;" name="resultat" value='+stroka+'>';
document.getElementById('info').innerHTML=result_vivod+summa;
</script>
</div>
<p id="suuum">
</p>
<form action="" method="POST">
<input class="zakaz" type="submit" name="save" value="Оформить заказ">
</form>
<br>
<script type="text/javascript">
var sum="";
const sum_vivod=document.getElementById('suuum');
sum=JSON.parse(localStorage.getItem('Summa'));
sum+=" rub"
document.getElementById('suuum').innerHTML = sum;		
$('input.zakaz').on('click',zakaz)
function zakaz(){
$.ajax({
url: 'basket.php', // скрипт который получит отправление
type: "POST", // метод
data: {Summa:JSON.parse(localStorage.getItem('Summa')),
login:JSON.parse(localStorage.getItem('login')),
resultat: stroka
},
error: function () {// необязательная функция, срабатывает при неудаче
alert('Error');
}
});
} 
</script>
</div>
<script type="text/javascript">
$('save').on('click',zakaz)
function zakaz(){
storage.clear();
<?php
 $result=$_POST['resultat'];
$login=$_POST['login'];
$summa=$_POST['Summa'];
$link=mysqli_connect('localhost','root','','kim_olyash') or (mysqli_error("База данных не подключена!"));
mysqli_query($link,"set names 'utf8'");
$zapros="INSERT INTO `basket` (`id_tovara`,`login`, `summa`, `status`) VALUES (\"".$result."\",'".$login."',".$summa.",\"Ожидание\")";
mysqli_query($link,$zapros);
?>
}
</script>
<?php 
require('footer.php');
	?>
	<script src="js/delet_basket.js"></script>
</body>
</html>