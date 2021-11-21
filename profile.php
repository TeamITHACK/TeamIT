<?php
session_start();
$login=$_SESSION['login'];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/style_2.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<header>
	
</header>
<div class="profile">

	<button id="btn_profile_1">
		Профиль
	</button>



</div>


<div id="block_profile_1">
	<img class="img_user" src="img/user.png" height="20%" width="20%">
<form class="profile_reg" action="" method="POST">

<?php 
$link=mysqli_connect("localhost", "root", "", "rzd");
$query="SELECT * FROM users WHERE user_login='$login'" ;
mysqli_set_charset($link, "utf8");
$result = mysqli_query($link,$query);
$data = $result->fetch_assoc();
?> 

      <label> <?php echo $data['Name']; ?>  </label>
      <input type="text" name="name" size="15" maxlength="30" required placeholder="Введите имя">

      <label> <?php echo $data['Surname']; ?></label>
      <input type="text" size="15" maxlength="30" name="surname" required placeholder="Введите фамилию">

	  <label><?php echo $data['Otchestvo']; ?></label>
      <input type="text" size="15" maxlength="30" name="otchestvo" required placeholder="Введите отчество">

      <label><?php echo $data['Phone']; ?></label>
      <input type="text" size="11" maxlength="12" name="phone" required placeholder="Телефон">

	<button class="btn_prof" type="submit" name="submit"> <span>Сохранить изменения</span> </button>
	<br>
</form>
</div>

<?php 
if(isset($_POST['submit'])) {
$link=mysqli_connect("localhost", "root", "", "rzd");
mysqli_set_charset($link, "utf8");

$name = $_POST['name'];
$surname = $_POST['surname'];
$otchestvo = $_POST['otchestvo'];
$phone = $_POST['phone'];

$query = "UPDATE users SET Name='".$name."', Surname='".$surname."', Otchestvo='".$otchestvo."',Phone='".$phone."' WHERE user_login='".$login."'";
mysqli_query($link,$query);
header("location:profile.php");
}
?>

<div id="block_order_2" style="display: none;">
<table id="vivod_zakaza" style="display: block; border: 1px solid black;">
        	<tr>
        		<th>Номер заказа</th>
        		<th>Заказаные товары</th>
        		<th>Сумма</th>
        		<th>Статус</th>
        		<th>Дата заказа</th>
        		<th>Количество</th>
        		<th>Дата выдачи</th>
        		<th></th>
        		<th></th>
        	</tr>
        </table>

<script type="text/javascript">
	<?php
	$k=0;

$zapros= mysqli_query($link,"SELECT * FROM `basket` WHERE login = 'qwerty'");
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
	var arr =[];
	for (i=0; i < <?php echo $num_rows;?>; i++)
	{ 
	tovar={"id_tovara1" : id_tovara1[i],"login1" : login1[i],"data_zakaza" : data_zakaza[i],"kolichesto" : kolichesto[i],"data_vidachi" : data_vidachi[i],"summa" : summa[i],"status" : status,"id" : id[i]};
arr.push(tovar);
	}

//заполняем массив out данными о товаре
var out_zakaz = '';
for(var key in arr){
	out_zakaz+="<tr id='aaaa"+arr[key].id+"' style='border:1px solid black;'>";
	out_zakaz+="<td style='border:1px solid black;'>"+arr[key].id+"</td>";
	out_zakaz+="<td style='border:1px solid black;'>"+arr[key].id_tovara1+"</td>";
		out_zakaz+="<td style='border:1px solid black;'>"+arr[key].summa+"</td>";
	out_zakaz+="<td style='border:1px solid black;'>"+arr[key].status+"</td>";
	out_zakaz+="<td style='border:1px solid black;'>"+arr[key].data_zakaza+"</td>";
		out_zakaz+="<td style='border:1px solid black;'>"+"1"+"</td>";
	out_zakaz+="<td style='border:1px solid black;'>"+arr[key].data_vidachi+"</td>";

	out_zakaz+="</tr>"
}

document.getElementById('vivod_zakaza').innerHTML+=out_zakaz;
</script> 
</div>


<!-- скрипт для появления/исчезновения контента -->
<script type="text/javascript" src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){  //дожидаемся загрузки страницы
    $('#btn_profile_1').on("click", function(){  //вешаем событие на клик по кнопке id="btn1"
	$("#block_profile_1").css("display", "flex" );
	$("#block_order_2").css("display", "none");
	$("#block_reviews_3").css("display", "none");
    });

    $('#btn_order_2').on("click", function(){  //вешаем событие на клик по кнопке id="btn2"
	$("#block_profile_1").css("display", "none");
	$("#block_order_2").css("display", "flex");
	$("#block_reviews_3").css("display", "none");
    });
});
</script>


<!-- подвал -->

<?php 
require('footer.php');
	?>
</body>
</html>