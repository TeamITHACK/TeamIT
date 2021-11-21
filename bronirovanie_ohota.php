<!DOCTYPE html>
<html>
    <head>
       <title>Группировка полей формы</title>
       <meta charset="utf-8">
       <link rel="stylesheet" href="css/bronirovanie.css">
    </head>
    <body>

        <main>
            <form action="bronirovanie_ohota.php" method="post">
                <fieldset>
                    <legend>Охота</legend>
                    <label>Фамилия</label> 
			    <input type="Text" name="familia">
			    <label>Имя</label> 
			    <input type="Text" name="Imya">
			    <label>Отчество</label> 
			    <input type="Text" name="Otchestvo">
                <div class="one-third-width">
                    <label>Число брони</label> 
                    <input type="number" min="1" max="31" name="day" value="21">
                </div>
                <div class="two-third-width">
    			    <label>Месяц брони</label> 
    			    <input type="month" name="month" value="2021-11" name="month">
    			</div>

    			<div class="half-width">
    			    <label>Количество дней</label>
    			    1 <input type="range" min="1" max="30" step="1" name="dayscount" value="1"> 30
    			</div>
    			<div class="half-width output-area">
     			    <output name="dayscountval">1</output>
    			</div>
    			<div class="half-width-2">
                    <label style="color: red;">Требуется предоплата!( от 200 рублей)</label>
                   
                </div>
    			<div class="buttons">
    				<input type="submit" value="Забронировать" name="bronirovanie" id="submit">
    			</div>
</fieldset>

                
		    </form> 
        </main>
        <br>
        <script type="text/javascript">
    document.querySelector("#submit").onclick = function(){
  alert("Происходит переход на онлайн кассу и оплата");
}
</script>
<?php 
if (isset($_POST['bronirovanie']))
    {
$link=mysqli_connect('localhost','root','','rzd') or (mysqli_error("База данных не подключена!"));
mysqli_query($link,"set names 'utf8'");
$otziv = mysqli_query($link, "INSERT INTO bronirovanie (id, imya, familia, otchestvo, nomer_doma,kol_spal_mest,data_zaselenya,srok,na_chto) VALUES ('', '".$_POST['Imya']."', '".$_POST['familia']."', '".$_POST['Otchestvo']."',0,0,'".$_POST['month'].".".$_POST['day']."',".$_POST['dayscount'].",'ohota')");

header('Location: ohota.php');
}

?>
    </body>
</html>