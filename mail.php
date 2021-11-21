
<meta charset="UTF-8" />
<?php

	if (isset($_POST['name']) && $_POST['name'] != "")//если существует атрибут NAME и он не пустой то создаем переменную для отправки сообщения
		$name = $_POST['name'];
	
	if (isset($_POST['email']) && $_POST['email'] != "") //тут все точно так же как и в предыдущем случае
		$email = $_POST['email'];

	if (isset($_POST['message']) && $_POST['message'] != "") 
		$body = $_POST['message'];


	$address = "olienka.tsar@mail.ru";//адрес куда будет отсылаться сообщение для администратора
	$mes  = "Имя: $name \n";	//в этих строчках мы заполняем текст сообщения. С помощью оператора .= мы просто дополняем текст в переменную
	$mes .= "E-mail: $email \n";
 	$mes .= "Текст: $body"; 
	$send = ($address,$mes,"Content-type:text/plain; charset = UTF-8\r\nFrom:$email");//собственно сам вызов функции отправки сообщения на сервере
	if ($send) { //проверяем, отправилось ли сообщение 
		echo "Сообщение отправлено успешно!";
	}
	else {
		echo "Ошибка, сообщение не отправлено!";
	}
		 
?>