function mensagem(){
$("#mensagem").remove();
clearTimeout(fv);
}
fv = setTimeout(mensagem, 3000);