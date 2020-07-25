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

var y="";
var m="";
var d="";

var anterior = ""; //for function day


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

$(".day").click(function(){

	var Sday=$(this).attr('id');
	dataVerif = Sday.replace('/', '-');
	dataVerif = dataVerif.replace('/', '-');
	dataAtual = $.datepicker.formatDate('yy-mm-dd', new Date());

	dataVerif = dataVerif.split('-');
	dataAtual = dataAtual.split('-');

	

	//verificação do ano selecionado
	if(dataVerif[0] >= dataAtual[0]){
		//verificação do mês selecionado
		if(dataVerif[1] >= dataAtual[1]){
			//verificação do dia selecionado
			if(Number(dataVerif[2]) >= Number(dataAtual[2])){
			}else{
				alert("Dia selecionado não pode ser antes que o dia atual");
				return;
			}
		}else{
			alert("Mês selecionado não pode ser antes que o mês atual");
			return;
		}
	}else{
		alert("Ano selecionado não pode ser antes que o ano atual");
		return;
	}

	$('#dataforphp').val(Sday);

	$('#Hora p, #selectHora').show(300);
	$('#confirmarReserva-panel button').hide(200);
    $('#mesaSelecionada-panel h3').hide(200);
    $('#mesaSelecionada-panel input').hide(200);

	if($(this) != anterior){
		$(this).css("backgroundColor","green").css("color","white");
		$(anterior).css("backgroundColor","").css("color","black");
		anterior = $(this);

		$('.mesaOcupada').removeClass('mesaOcupada').addClass('btn-mesa');
	}

	$(".horarios").remove();

	y=(Sday.split('/'))[0];
	m=(Sday.split('/'))[1];
	d=(Sday.split('/'))[2];

	$.ajax({
		url:"./php/calendarphp/verificarHorarios.php?ano="+y+"&&mes="+m+"&&dia="+d,
		success:function(horaDis){
			if(horaDis != ""){

				var horarios = horaDis.split('.')[0];

				horarios = (horarios.split('/'));

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
	$('#menu-aux').attr('id', 'container-menu');
	$('.table-mesas').show(1000);
	$('.square, .square+p').show(1000);

	haMesasOcupadas = 0;
	horaSelecionada = $('#selectHora').val();

	if(horaSelecionada != "none"){
		$.ajax({
			url:"./php/calendarphp/verificarMesas.php?hora="+horaSelecionada+"&&data="+y+"-"+m+"-"+d,
			success:function(mesasOcupadas){
				if(mesasOcupadas != ""){
					$('.mesaOcupada').removeClass('mesaOcupada').addClass('btn-mesa');
	
					var mesas = mesasOcupadas.split(',');
	
					for(j=0; j < mesas.length; j++){
						$('#Mesa'+mesas[j]).removeClass('btn-mesa').addClass('mesaOcupada');
					}					

				}else{
					$('.mesaOcupada').removeClass('mesaOcupada').addClass('btn-mesa');
				}
			}
		});
	}else{
		$('.mesaOcupada').removeClass('mesaOcupada').addClass('btn-mesa');
	}


	//reseta os valores e esconde o botão confirmar
	$('#confirmarReserva-panel button').fadeOut('300');	
	$("#mesaSelecionada").val("Escolha uma de nossas mesas");

	//toggle da mesa escolhida
	$('#mesaSelecionada-panel h3, #mesaSelecionada-panel input').show('300');


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