 function mascara(t, mask){
	 var i = t.value.length;
	 var saida = mask.substring(1,0);
	 var texto = mask.substring(i)
	 if (texto.substring(0,1) != saida){
	 t.value += texto.substring(0,1);
	 }
 }

function mascaraTelefone( campo ) {
      
         function trata( valor,  isOnBlur ) {
            
            valor = valor.replace(/\D/g,"");                      
            valor = valor.replace(/^(\d{2})(\d)/g,"($1)$2");       
            
            if( isOnBlur ) {
               
               valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");   
            } else {

               valor = valor.replace(/(\d)(\d{3})$/,"$1-$2"); 
            }
            return valor;
         }
         
         campo.onkeypress = function (evt) {
             
            var code = (window.event)? window.event.keyCode : evt.which;   
            var valor = this.value
            
            if(code > 57 || (code < 48 && code != 8 ))  {
               return false;
            } else {
               this.value = trata(valor, false);
            }
         }
         
         campo.onblur = function() {
            
            var valor = this.value;
            if( valor.length < 13 ) {
               this.value = ""
            }else {      
               this.value = trata( this.value, true );
            }
         }
         
         campo.maxLength = 14;
      }




function moeda(z){
v = z.value;
v=v.replace(/\D/g,"") // permite digitar apenas numero
v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
v=v.replace(/(\d{1})(\d{1,2})$/,"$1.$2") // coloca virgula antes dos ultimos 2 digitos
z.value = v;
}

