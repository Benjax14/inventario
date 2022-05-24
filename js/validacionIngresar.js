function valid(){
    const marca = document.getElementById('mar').value;
    const nombre = document.getElementById('nom').value;
    const precio = document.getElementById('pre').value;
    const stock = document.getElementById('sto').value;
    const talla = document.getElementById('talla').value;
    const categoria = document.getElementById('cat').value;


if(marca === '' || nombre === '' || precio === '' || stock === ''){
    alert('Debe llenar todos los datos requeridos para el producto');
    return false;
}
if(talla === '-Seleccione una talla-' || categoria === '-Seleccione la categoria-'){
    alert('es necesario seleccionar las casillas faltantes');
    return false;
}
if(precio<3000){
    alert('no puede ingresar un monto inferior a $5.000');
    return false;
}
if(stock=="0"){
    alert('no puede registrar 0 stock del producto');
    return false;
}
}




function palabras(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    letra="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú ";
    especiales="8-37-38-46-168";
    teclado_esp=false;
        for(var i in especiales){
            if(key==especiales[i]){
            teclado_esp=true;
            break;
            }
            if(letra.indexOf(teclado)==-1 &&!teclado_esp){
            return false;
            }
        }
}
function numeros(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    num="0123456789";
    especiales="8-37-38-46";
    teclado_esp=false;
            for(var i in especiales){
            if(key==especiales[i]){
                teclado_esp=true;break;
            }
            if(num.indexOf(teclado)==-1 &&!teclado_esp){
                return false;
            }
    }
    }