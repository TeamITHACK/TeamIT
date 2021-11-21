const newRow=document.querySelector('#add');
const body=document.querySelector('#all');
const modal=document.querySelector('#modal_menu_body');
const modal_save=document.querySelector('#modal_save');
const modal_close=document.querySelector('#modal_close');
const modal2=document.querySelector('#modal_menu_body2');

const modal_close2=document.querySelector('#modal_close2');
const modal_id=document.querySelector('#modal_id');
//Открываем модальное окно и делаем страницу не кликабельной
newRow.onclick=function open(){
	modal.setAttribute('style', 'display:inline-block');
	body.setAttribute("style", "pointer-events: none");

}

//закрываем модальное окно и делаем страницу кликабельной
modal_close.onclick=function close(){
	modal.setAttribute('style', 'display:none');
	body.setAttribute("style", "pointer-events: auto");

}
var articul_idd
$('button.button_redact').on('click',redact)
//Открываем модальное окно и делаем страницу не кликабельной
function redact(){
	articul_idd = $(this).attr('articul_id');
	modal2.setAttribute('style', 'display:inline-block');
	body.setAttribute("style", "pointer-events: none");


document.getElementById('modal_id').value = articul_idd;

}
//закрываем модальное окно и делаем страницу кликабельной
modal_close2.onclick=function close(){
	modal2.setAttribute('style', 'display:none');
	body.setAttribute("style", "pointer-events: auto");
}



// const modal_save2=document.querySelector('#modal_save2');
// modal_save2.onclick=function Olyasave(){
// id_tip=articul_id.split(":");
// $.ajax({ 
// url: 'admin.php', // скрипт который получит отправление 
// type: "GET", // метод 
//   data: {id_tip: id_tip[0],
//   tip_id:id_tip[1]
// }
// }); 

// }