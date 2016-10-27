function cpfcnpj(){
 if(document.a.b.value.length == 3){
      document.a.b.value = document.a.b.value + '.';      
      return false;  
       }if(document.a.b.value.length == 7){ 
           document.a.b.value = document.a.b.value + '.';   
              return false;   
          }   if(document.a.b.value.length == 11){  
                document.a.b.value = document.a.b.value + '-';     
                 return false;   
             }   if(document.a.b.value.length == 15){    
                 p0=document.a.b.value.charAt(0);      
                   p1=document.a.b.value.charAt(1);     
                      p2=document.a.b.value.charAt(2);     
                         p3=document.a.b.value.charAt(4);   
                              p4=document.a.b.value.charAt(5);  
                                    p5=document.a.b.value.charAt(6);  
                                          p6=document.a.b.value.charAt(8);  
                                                p7=document.a.b.value.charAt(9);  
                                                      p8=document.a.b.value.charAt(10);  
                                                           p9=document.a.b.value.charAt(12);   
                                                               p10=document.a.b.value.charAt(13);   
                                                                  p11=document.a.b.value.charAt(14);   
                                                                     document.a.b.value = '';       
         document.a.b.value = p0 + p1 + '.' + p2 + p3 + p4 + '.' + p5 + p6 + p7 + '/' + p8 + p9 + p10 + p11 + '-';  
              p0='';     
               p1=''; 
                    p2='';  
                        p3='';  
                            p4=''; 
                                 p5='';   
                                    p6='';  
                                        p7='';   
                                           p8='';   
                                              p9='';    
                                                p10='';   
                                                  p11='';   
                                                    return false;   }}




 function formatar(mascara, documento){
      var i = documento.value.length;
      var saida = mascara.substring(0,1);
      var texto = mascara.substring(i);
      
      if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
            }
        }

           /* Use:
           OnKeyPress="formatar('##/##/####', this)"
           no campo que você quer formatar */ 

  function mascara(telefone){ 
   if(telefone.value.length == 0)
     telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(telefone.value.length == 3)
      telefone.value = telefone.value + ')'; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
 
 if(telefone.value.length == 9)
     telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
  
}
