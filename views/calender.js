function calender(comeco){
mes="10";
ano=2015;
if(mes=="01"){
	mes="Janeiro";
	dias=31;
}else if(mes=="02"){
	mes="Fevereiro";
	if(ano%4==0) dias=29;
	else dias=28;
}else if(mes=="03"){
	mes="Março";
	dias=31;
}else if(mes=="04"){
	mes="Abril";
	dias=30;
}else if(mes=="05"){
	mes="Maio";
	dias=31;
}else if(mes=="06"){
	mes="Junho";
	dias=30;
}else if(mes=="07"){
	mes="Julho";
	dias=31;
}else if(mes=="08"){
	mes="Agosto";
	dias=31;
}else if(mes=="09"){
	mes="Setembro";
	dias=30;
}else if(mes=="10"){
	mes="Outubro";
	dias=31;
}else if(mes=="11"){
	mes="Novembro";
	dias=30;
}else{
	mes="Dezembro";
	dias=31;
}

if(comeco+dias<=35) $("#extra").remove();
if(comeco+dias==29) $("#fev").remove();
for (var i=comeco; i < dias+comeco; i++){
	$("#dia").css('font-size','30px');
	$("#mes").html(mes).css('font-size', '30px')
	$("#"+(i)).html(i-comeco+1).css('font-size','40px');
}
}
