  
const vibor=document.querySelector('#menu_zakazi');
let menu=document.querySelector('#vivod_tablic');
const zakaz=document.querySelector('#vivod_zakaza');
const select=document.querySelector('#table_selection');
const add=document.querySelector('#add');

var basket={}; // корзина
var basket_osnova={}; // корзина
if(basket==null)
		basket={};


//добавлем кнопку и выбор настраиваемой таблицы
vibor.onclick=function vibor(){

if(select.value=="Комплектующие"){
	menu.style="display:block";
zakaz.style="display:none";
add.style="display:block";
}
if(select.value=="Заказы")
{add.style="display:none";
	zakaz.style="display:block";
menu.style="display:none";
}}


$('button.button_redact').on('click',red)
function red(){
var articul_id = $(this).attr('articul_id');

var tr = document.getElementById(articul_id);
tr.parentNode.removeChild(tr);

id_tip=articul_id.split(":");
$.ajax({ 
url: 'admin.php', // скрипт который получит отправление 
type: "POST", // метод 
  data: {id_tip: id_tip[0],
  tip_id:id_tip[1]
}
});
}

//удаляем строки из таблицы и бд, в зависимости от выбора селекта
$('button.button_del').on('click',dell)
//добавление товара в корзину, по кнопке
function dell(){

if(select.value=="Комплектующие"){



var articul_id = $(this).attr('articul_id');

var tr = document.getElementById(articul_id);
tr.parentNode.removeChild(tr);

id_tip=articul_id.split(":");
$.ajax({ 
url: 'admin.php', // скрипт который получит отправление 
type: "POST", // метод 
  data: {id_tip: id_tip[0],
  tip_id:id_tip[1]
}
});


}
else
if(select.value=="Заказы")
{

var articul_id = $(this).attr('articul_id');
var tr = document.getElementById(articul_id);
tr.parentNode.removeChild(tr);

localStorage.setItem("delet",JSON.stringify(articul_id));

$.ajax({ 
url: 'admin.php', // скрипт который получит отправление 
type: "POST", // метод 
data: {name: articul_id} 
});


}}



//удаляем строки из таблицы и бд, в зависимости от выбора селекта
$('button.button_prostonapishif').on('click',prostonapishif)
//добавление товара в корзину, по кнопке
function prostonapishif(){
  var articul = $(this).attr('articul');
  $.ajax({ 
url: 'admin.php', // скрипт который получит отправление 
type: "POST", // метод 
data: {id_prostonapishif: articul} 
});
}