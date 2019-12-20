function soloLetras(e){
     key = e.keyCode || e.which;
     teclado = String.fromCharCode(key).toLowerCase();
     letras="_abcdefghijklmnoprstuvwxyz1234567890";
     especiales ="8-37-38-95";
     teclado_especial = false;

     for(var i in especiales){
         if(key==especiales[i]){
             teclado_especial = true;
             break;
         }

         if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
         }
     }
 }

 function soloLetras2(e){
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras="áéíóúabcdefghijklmnñoprstuvwxyz";
    especiales ="8-37-38-95";
    teclado_especial = false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial = true;
            break;
        }

        if(letras.indexOf(teclado)==-1 && !teclado_especial){
           return false;
        }
    }
}

function soloLetras3(e){
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras="@.abcdefghijklmnñoprstuvwxyz1234567890_-";
    especiales ="8-37-38-95";
    teclado_especial = false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial = true;
            break;
        }

        if(letras.indexOf(teclado)==-1 && !teclado_especial){
           return false;
        }
    }
}