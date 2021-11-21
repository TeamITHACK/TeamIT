<?php
header("Content-type: text/html; charset=utf-8");
session_start();
$link = mysqli_connect('localhost', 'root', '', 'rzd');
$utf=mysqli_query($link,"set names 'utf8'");
//выполняем запрос, на все комплектующие 
$zapros= mysqli_query($link,"(SELECT 'mouse' as 'kat', id, name, price,image from mouse) UNION (SELECT 'monitor', id, name, price,image FROM monitor) UNION (SELECT 'moduli_pamyati', id, name, price,image FROM moduli_pamyati) UNION (SELECT 'office_api', id, name, price,image FROM office_api) UNION (SELECT 'komputeri',  id, name, price,image FROM komputeri) UNION (SELECT 'sistema_ohlajdeniya', id, name, price,image FROM sistema_ohlajdeniya) UNION (SELECT 'jestkie_diski', id, name, price,image FROM jestkie_diski) UNION (SELECT 'flash_memory', id, name, price,image FROM flash_memory) UNION (SELECT 'corpus', id, name, price,image FROM corpus) UNION (SELECT 'mat_plata', id, name, price,image FROM mat_plata)  UNION (SELECT 'vneshnie_diski', id, name, price,image FROM vneshnie_diski)  UNION (SELECT 'processor', id, name, price,image FROM processor) UNION (SELECT 'jd_ssd', id, name, price,image FROM jd_ssd) UNION (SELECT 'videocard', id, name, price,image FROM videocard) UNION (SELECT 'keyboard', id, name, price,image FROM keyboard) UNION (SELECT 'operac_sistem', id, name, price,image FROM operac_sistem) UNION (SELECT 'block_pitaniya', id, name, price,image FROM block_pitaniya)");
$num_rows=mysqli_num_rows($zapros);
$i=0;
$k=0;
$name[1000]=[];
$price[1000]=[];
$tip[1000]=[];
$image[1000]=[];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Панель администратора</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style (1).css">

	<script defer src="js/jquery-3.6.0.js"></script> 

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<center>
	<div id="modal_menu_body">
		<form action="" method="get">
			<h2>Название</h2>
			<input id="nazvanie" type="text" name="name">
			<h2>Разрешение</h2>
			<input id="razreshenie" type="text" name="razreshenie">
			<h2>Соотношение</h2>
			<input id="sootnoshenie" type="text" name="sootnoshenie">
			<h2>Тип матрицы</h2>
			<input id="tip_matrici" type="text" name="tip_matrici">
			<h2>Комплектующие</h2>
			<select id="tip" type="text" name="tip">
				<option>mouse</option>
				<option>monitor</option>
				<option>moduli_pamyati</option>
				<option>office_api</option>
				<option>komputeri</option>
				<option>sistema_ohlajdeniya</option>
				<option>jestkie_diski</option>
				<option>flash_memory</option>
				<option>corpus</option>
				<option>mat_plata</option>
				<option>vneshnie_diski</option>
				<option>processor</option>
				<option>jd_ssd</option>
				<option>videocard</option>
				<option>operac_sistem</option>
				<option>block_pitaniya</option>
				<option>keyboard</option>
				</select>
			<h2>Цена</h2>
			<input id="cost_modal" type="text" name="price">
			<h2>Изображение</h2>
			<input id="img_modal" type="text" name="image"><br>
			<input  type="submit" name="modal_save" id="modal_save" value="Добавить"><br>
			<input id="modal_close" type="button" name="modal_close" value="Выйти">
		</form>
	</div>
</center>

<center>
	<div id="modal_menu_body2">
		<form action="" method="POST">
			<h2>Название</h2>
			<input id="name_r" type="text" name="name_r">
			<h2>Комплектующие</h2>
			<select id="tip_r" type="text" name="tip_r">
				<option>mouse</option>
				<option>monitor</option>
				<option>moduli_pamyati</option>
				<option>office_api</option>
				<option>komputeri</option>
				<option>sistema_ohlajdeniya</option>
				<option>jestkie_diski</option>
				<option>flash_memory</option>
				<option>corpus</option>
				<option>mat_plata</option>
				<option>vneshnie_diski</option>
				<option>processor</option>
				<option>jd_ssd</option>
				<option>videocard</option>
				<option>operac_sistem</option>
				<option>block_pitaniya</option>
				<option>keyboard</option>
				</select>
			<h2>Цена</h2>
			<input id="price_r" type="text" name="price_r">
			<h2>Изображение</h2>
			<input id="image_r" type="file"  webkiturl >
			<input  type="button" name="modal_save_r" value="Загрузить"><br>
			<input id="modal_save2" style="margin-top: 1%;" type="submit" name="modal_save_r" value="Сохранить"><br>
			<input id="modal_close2" type="button" name="modal_close" value="Выйти">
			<input style="visibility: hidden;" id="modal_id" type="text" name="modal_id">
		</form>
	</div>
</center>
<div id="all">
		<center>
	<div id="div_form">
		<h1 style="font-size: 200%;">ПАНЕЛЬ АДМИНИСТРАТОРА</h1>
		<!-- Выводим список таблиц, которые можно редактироваться -->
		<select id="table_selection" style="display:flex; justify-content: center;">
  <option>Комплектующие</option> 
  <option>Заказы</option>
        </select>
        <div id="vibor" style="padding: 5px;">
        	<button id="menu_zakazi" style="margin-top: 1%; width: 50%;">Выбрать</button>
        	<button id="add" >Добавить</button>
        </div>
        <!-- Выводим пустую таблицу, и заполняем её данными из бд -->
        <table id="vivod_tablic">
        	<tr>
        		<th>НАИМЕНОВАНИЕ</th>
        		<th>ЦЕНА</th>
        		<th>ИЗОБРАЖЕНИЯ</th>
        		<th></th>
        		<th></th>
        	</tr>
        </table>
         <table id="vivod_zakaza" style="display: none;">
        	<tr>
        		<th>Номер заказа</th>
        		<th>Заказаные товары</th>
        		<th>Пользователь</th>
        		<th>Сумма</th>
        		<th>Статус</th>
        		<th>Дата заказа</th>
        		<th>Количество</th>
        		<th>Дата выдачи</th>
        		<th></th>
        		<th></th>
        	</tr>
        </table>
</div>
</center>
</div>
<script type="text/javascript">
//получаем данные из таблицы блюд
	var tovar;
	var a=0;
	var i;
	var arr =[];
	for (var i = 0; i < <?php print_r($num_rows)?>; i++) {
//php + js где мы берём из бд
	<?php
$link = mysqli_connect('localhost', 'root', '', 'kim_olyash');
//выполняем запрос, на все блюда с типом пицца
$zapros= mysqli_query($link,"(SELECT 'mouse' as 'kat', id, name, price,image from mouse) UNION (SELECT 'monitor', id, name, price,image FROM monitor) UNION (SELECT 'moduli_pamyati', id, name, price,image FROM moduli_pamyati) UNION (SELECT 'office_api', id, name, price,image FROM office_api) UNION (SELECT 'komputeri',  id, name, price,image FROM komputeri) UNION (SELECT 'sistema_ohlajdeniya', id, name, price,image FROM sistema_ohlajdeniya) UNION (SELECT 'jestkie_diski', id, name, price,image FROM jestkie_diski) UNION (SELECT 'flash_memory', id, name, price,image FROM flash_memory) UNION (SELECT 'corpus', id, name, price,image FROM corpus) UNION (SELECT 'mat_plata', id, name, price,image FROM mat_plata)  UNION (SELECT 'vneshnie_diski', id, name, price,image FROM vneshnie_diski)  UNION (SELECT 'processor', id, name, price,image FROM processor) UNION (SELECT 'jd_ssd', id, name, price,image FROM jd_ssd) UNION (SELECT 'videocard', id, name, price,image FROM videocard) UNION (SELECT 'keyboard', id, name, price,image FROM keyboard) UNION (SELECT 'operac_sistem', id, name, price,image FROM operac_sistem) UNION (SELECT 'block_pitaniya', id, name, price,image FROM block_pitaniya)");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);
for ( $e = 0; $e < $num_rows; $e=$e+1) {
while($row=mysqli_fetch_assoc($zapros)){
$id[$k]=$row['id'];
$name[$k]=$row['name'];
$price[$k]=$row['price'];
$tip[$k]=$row['id'].":".$row['kat'];
$image[$k]='"'.$row['image'].'"';
	$k+=1;
}
}


?>
var name1,price,image,result,login,tip,id;
for (var i = 0; i < <?php print_r($num_rows)?>; i++) {
	name1=<?php echo json_encode($name);?>;
	id=<?php echo json_encode($id);?>;					
	price=<?php echo json_encode($price);?>;
	image=<?php echo json_encode($image);?>;
	tip=<?php echo json_encode($tip);?>;

}

	for (i=0; i < <?php print_r($num_rows)?>; i++)
	{ 
	tovar={"name1" : name1[i],"price" : price[i],"image" : image[i], "id" : id[i], "tip":tip[i]};
arr.push(tovar);
	}
}

//заполняем массив out данными о товаре
var out = '';
for(var key in arr){
	out+="<tr id='"+arr[key].tip+"''>"
	out+="<td>"+arr[key].name1+"</td>";
	out+="<td>"+arr[key].price+"</td>";
	out+="<td>"+'<img style="margin-left:25%;" src='+arr[key].image+' class="menu-img">'+"</td>";
	out+="<td>"+'<form action="admin.php" method="POST">'+'<button class="button_del" articul='+key+' articul_id='+arr[key].tip+' price="'+arr[key].price+'" name="bt_del">Удалить</button>'+'</form>'+"</td>"; 
	out+="<td>"+'<button class="button_redact" articul='+key+' articul_id='+arr[key].tip+' price="'+arr[key].price+'">Редактировать</button>'+"</td>";
	out+="</tr>"
}
document.getElementById('vivod_tablic').innerHTML+=out;


</script>

<script type="text/javascript">
//получаем данные из таблицы 
<?php  $zapros= mysqli_query($link,"SELECT * FROM `basket`");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros); ?>
	var tovar;
	var a=0;
	var i;
var arr =[];
	for (var i = 0; i < <?php echo $num_rows;?>; i++) {

//php + js где мы берём из бд
	<?php
	$k=0;

$zapros= mysqli_query($link,"SELECT * FROM `basket`");
$utf=mysqli_query($link,"set names 'utf8'");
$num_rows=mysqli_num_rows($zapros);
for ( $e = 0; $e < $num_rows; $e=$e+1) {

while($row=mysqli_fetch_assoc($zapros)){

$id[$k]=$row['id_basket'];
	$id_tovara[$k]=$row['id_tovara'];
	$login[$k]=$row['login'];
	$summa[$k]='"'.$row['summa'].'"';
	$data_zakaza[$k]=$row['data_zakaza'];
	$status[$k]=$row['status'];
	$kolichesto[$k]=$row['kolichesto'];
	$data_vidachi[$k]=$row['data_vidachi'];
	$k+=1;
}}
?>
var id_tovara1,login1,data_zakaza,kolichesto,data_vidachi,summa,status,id;
for (var i = 0; i < <?php echo $num_rows;?>; i++) {
	id=<?php echo json_encode($id);?>;
	id_tovara1=<?php echo json_encode($id_tovara);?>;
	login1=<?php echo json_encode($login);?>;
	data_zakaza=<?php echo json_encode($data_zakaza);?>;
	kolichesto=<?php echo json_encode($kolichesto);?>;
	data_vidachi=<?php echo json_encode($data_vidachi);?>;
	summa=<?php echo json_encode($summa);?>;
	status=<?php echo json_encode($status);?>;

}

	for (i=0; i < <?php echo $num_rows;?>; i++)
	{ 
	tovar={"id_tovara1" : id_tovara1[i],"login1" : login1[i],"data_zakaza" : data_zakaza[i],"kolichesto" : kolichesto[i],"data_vidachi" : data_vidachi[i],"summa" : summa[i],"status" : status,"id" : id[i]};
arr.push(tovar);
	}
}
//заполняем массив out данными о товаре
var out_zakaz = '';
for(var key in arr){
	out_zakaz+="<tr id='aaaa"+arr[key].id+"'>";
	out_zakaz+="<td>"+arr[key].id+"</td>";
	out_zakaz+="<td>"+arr[key].id_tovara1+"</td>";
	out_zakaz+="<td>"+arr[key].login1+"</td>";
		out_zakaz+="<td>"+arr[key].summa+"</td>";
	out_zakaz+="<td>"+arr[key].status+"</td>";
	out_zakaz+="<td>"+arr[key].data_zakaza+"</td>";
		out_zakaz+="<td>"+"1"+"</td>";
	out_zakaz+="<td>"+arr[key].data_vidachi+"</td>";


	out_zakaz+="<td>"+'<form action="admin.php" method="POST">'+'<button class="button_del" articul='+key+' summa="'+arr[key].summa+'">Удалить</button>'+"</td>";
	out_zakaz+="<td>"+'<button class="button_prostonapishif" articul='+arr[key].id+' summa="'+arr[key].summa+'">Закрыть заказ</button>'+'</form>'+"</td>";
	out_zakaz+="<td>"
	out_zakaz+="</tr>"
}
document.getElementById('vivod_zakaza').innerHTML+=out_zakaz;


<?php

    
 session_destroy();

 ?>

</script> 

<script type="text/javascript">
	if (localStorage.getItem('Account')=="false")
		window.location.href = "auto.php";
</script>

<script type="text/javascript">
	const table_selection=document.querySelector('#table_selection');
	if(table_selection.value=="Комплектующие"){

<?php
//добавление нового товара
if ($_GET['tip']=="monitor") {
	mysqli_query($link,"INSERT INTO monitor (`name`,`razreshenie`,`sootnoshenie`,`tip_matrici`,`price`,`image`) VALUES('".$_GET['name']."','".$_GET['razreshenie']."','".$_GET['sootnoshenie']."','".$_GET['tip_matrici']."',".$_GET['price'].",'".$_GET['image']."')");
}
//редактирование выбранного блюда

if ($_POST['tip_r']=="monitor") {
	$test=$_POST['modal_id'];
	$modl_id_tip=explode(":",$test);
 $zapros="UPDATE ".$modl_id_tip[1]." SET name = '".$_POST['name_r']."' WHERE id=".intval($modl_id_tip[0]);

 mysqli_query($link,"UPDATE ".$modl_id_tip[1]." SET name = '".$_POST['name_r']."' WHERE id=".intval($modl_id_tip[0]));

mysqli_query($link,"UPDATE ".$modl_id_tip[1]." SET price = '".$_POST['price_r']."' WHERE id=".$modl_id_tip[0]);


mysqli_query($link,"DELETE FROM ".$_POST['tip_id']." WHERE id =".$_POST['id_tip']);
}
?>


//чистим get, получая адрес без параметров и записывая в url

// baseUrl = window.location.href.split("?")[0];
// window.history.pushState('name', '', baseUrl);
// }
	if(select.value=="Заказы")
{
<?php

mysqli_query($link,"UPDATE basket SET status = 'Доставлен', data_vidachi=CURRENT_DATE()  WHERE id_basket=".$_POST['id_prostonapishif']);
  
?>

}


baseUrl = window.location.href.split("?")[0];
window.history.pushState('name', '', baseUrl);

</script>


	<script defer src="js/script.js"></script>
	<script defer src="js/addNewRow.js"></script>

</body>
</html>