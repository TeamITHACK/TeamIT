var basket={}; // корзина
var basket_osnova={}; // корзина
if(basket==null)
		basket={};
var button_tovar = document.querySelector('.button_tovar');
//событие клика по класс button_tovar и вызов функции addToBasket
$('button.button_tovar').on('click',delete_to_basket)
//добавление товара в корзину, по кнопке
function delete_to_basket(){
	//заносим артикул и кол-во товара в массив корзины
	var articul = $(this).attr('articul');
	var tip = $(this).attr('tip');
	var articul_id = $(this).attr('articul_id');
	console.log(articul);
	delete basket[articul_id];
var izmenenie_basket={};
if(tip=="moduli_pamyati")
	izmenenie_basket=moduli_pamyati;
if(tip=="office_api")
	izmenenie_basket=office_api;
if(tip=="komputeri")
	izmenenie_basket=komputeri;
if(tip=="sistema_ohlajdeniya")
	izmenenie_basket=sistema_ohlajdeniya;
if(tip=="jestkie_diski")
	izmenenie_basket=jestkie_diski;
if(tip=="flash_memory")
	izmenenie_basket=flash_memory;
if(tip=="monitor")
	izmenenie_basket=monitor;
if(tip=="corpus")
	izmenenie_basket=corpus;
if(tip=="mat_plata")
	izmenenie_basket=mat_plata;
if(tip=="vneshnie_diski")
	izmenenie_basket=vneshnie_diski;
if(tip=="processor")
	izmenenie_basket=processor;
if(tip=="jd_ssd")
	izmenenie_basket=jd_ssd;
if(tip=="videocard")
	izmenenie_basket=videocard;
if(tip=="keyboard")
	izmenenie_basket=keyboard;
if(tip=="mouse")
	izmenenie_basket=mouse;
if(tip=="operac_sistem")
	izmenenie_basket=operac_sistem;
if(tip=="block_pitaniya")
	izmenenie_basket=block_pitaniya;
var k;
for (var i = 0; i < Object.keys(izmenenie_basket).length; i++) {
k=Object.keys(izmenenie_basket);
	if(k[i]==articul_id)
	{ 
		delete izmenenie_basket[k[i]];
	
	}

}


// запомниаем данные в localstorage
   localStorage.setItem(tip,JSON.stringify(izmenenie_basket));
	
// запомниаем данные в localstorage
	var price = $(this).attr('price');
var summ=JSON.parse(localStorage.getItem('Summa'));
var plus=parseInt(summ, 10)-parseInt(price, 10);
price=plus;
    localStorage.setItem('Summa',price);
var sum="";
//const sum_vivod=document.getElementById('cena');
sum=JSON.parse(localStorage.getItem('Summa'));
sum+=" Руб."
document.getElementById('cena').innerHTML = sum;

window.location.reload();
}
