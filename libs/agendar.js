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

	$('#dataforphp').val(Sday);

	$('#Hora p, #selectHora').show(300);

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

	//alert("ano: "+y+" mês: "+m+" dia: "+d);

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

	haMesasOcupadas = 0;
	hora = $('#selectHora').val();

	if(hora != ""){

		$.ajax({
			url:"./php/calendarphp/verificarHorarios.php?ano="+y+"&&mes="+m+"&&dia="+d,
			success:function(horaDis){
				if(horaDis != ""){
	
					var horarios = horaDis.split('.')[0];
					var mesas = horaDis.split('.')[1];
	
					mesas = (mesas.split('/'));
					horarios = (horarios.split('/'));

					//alert(mesas.length);
					//alert(horarios.length);
	
					if(horarios.length == mesas.length){
						for(i = 0; i < horarios.length; i++){
							
							if(horarios[i] == hora && mesas[i] != "vazia"){
								haMesasOcupadas = 1;
								mesasOcupadas = (mesas[i].split(','));
	
								for(j=0; j < mesasOcupadas.length; j++){
									$('#Mesa'+mesasOcupadas[j]).removeClass('btn-mesa').addClass('mesaOcupada');
								}
							}
						}
						if(haMesasOcupadas == 0){
							$('.mesaOcupada').removeClass('mesaOcupada').addClass('btn-mesa');
						}
					}else{
						console.log("quantidade length de mesas e horarios não está correto");
					}
				}
			}
		});
	}else{
		$('.mesaOcupada').removeClass('mesaOcupada').addClass('btn-mesa');
	}


	//reseta os valores e esconde o botão confirmar
	$('#confirmarReserva-panel button').fadeOut('300');
	$("#mesaSelecionada").val("Nenhuma mesa selecionada");

	//toggle da mesa escolhida
	if(hora != "vazia"){
	   $('#mesaSelecionada-panel h3, #mesaSelecionada-panel input').show('300');
	}else{
	   $('#mesaSelecionada-panel h3, #mesaSelecionada-panel input').hide('300');
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