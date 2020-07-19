$(document).ready(function(){
var month=(($(".MYdiv").attr("id")).split("/"))[0];
var year=(($(".MYdiv").attr("id")).split("/"))[1];
var nodays=(($(".MYdiv").attr("id")).split("/"))[2];
var viewtype=$(".viewtype").attr("id");
var day=$(".daysel").attr("id");
var evID='';
var evTmp='';
var evYR='';
var evMon='';
var evDay='';
var evTime='';

function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}

$(".next").click(function(){
	if (viewtype=='month') {
	month++;
	if (month>12) {year++;month=1;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	
	}else if (viewtype=='month'){


	}else if (viewtype=='day'){
	day++;
	if (day>nodays) {
		month++; day=1;
	}
	if (month>12) {year++;month=1;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	}

});



$(".back").click(function(){
	if (viewtype=='month') {
	month--;
	if (month<1){year--;month=12;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	}else if (viewtype=='month'){


	}else if (viewtype=='day'){
	day--;
	if (day<1) {
		month--; day=daysInMonth(month,year);
	}
	if (month<1) {year--;month=12;}
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");
	}
});

var anterior = "";

$(".day").click(function(){


var Sday=$(this).attr('id');


if($(this) != anterior){
	$(this).css("backgroundColor","green").css("color","white");
	$(anterior).css("backgroundColor","").css("color","black");
	anterior = $(this);
}

$(".horarios").remove();

var y=(Sday.split('/'))[0];
var m=(Sday.split('/'))[1];
var d=(Sday.split('/'))[2];
//alert("ano: "+y+" mês: "+m+" dia: "+d);

$.ajax({
	url:"./php/calendarphp/verificarHorarios.php?ano="+y+"&&mes="+m+"&&dia="+d,
	success:function(horaDis){
		if(horaDis != ""){

			var horarios = (horaDis.split('/'));
			i=0;

			while(horarios[i] != undefined){

				var txtOption = "<option class=horarios value="+horarios[i]+">"+horarios[i]+"</option>";				
				
				$("#selectHora").append(txtOption);
				i++;
			}
		}else{
			$(".horarios").remove();
		}
	}
});
//window.open("?month="+m+"&&year="+y+"&&viewtype="+"day"+"&&day="+d,"_self");
});

$("#selectHora").change(function (){
	hora = $('#selectHora').val();
	//reseta os valores e esconde o botão confirmar
	$('#confirmarReserva-panel button').fadeOut('300');
	$("#mesaSelecionada").html("Nenhuma mesa selecionada");

	//toggle da mesa escolhida
	if(hora != "none"){
	   $('#mesaSelecionada-panel h3, #mesaSelecionada-panel p').show('300');
	}else{
	   $('#mesaSelecionada-panel h3, #mesaSelecionada-panel p').hide('300');
	}
 });


$(".viewday").click(function(){

	viewtype='day';
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");

});

$(".viewmonth").click(function(){

viewtype='month';
	window.open("?month="+month+"&&year="+year+"&&viewtype="+viewtype+"&&day="+day,"_self");

});


});