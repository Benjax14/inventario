function buscador() {

    const frase = document.getElementById('pal').value;

    expresionRegular = /^[a-zA-ZÀ-ÿ0-9\s]{1,}$/;

    if(frase === ''){
        alert('Por favor ingrese el nombre o marca del producto');
        return false;
    }else if(!expresionRegular.test(frase)){
        alert('Solo se acepta el formato de letras y números');
        return false;
    }

}

function buscador2(){

    const minimo = document.getElementById('val_minimo').value;
    const maximo = document.getElementById('val_maximo').value;

        if(minimo === '' || maximo === ''){
            alert('Por favor de ingresar un rango de precios.');
            return false;
        }else if(minimo > maximo){
            alert('Rango de precios incorrectos. Vuelva a intentar.');
            return false;
        }else if(minimo <= 0){
            alert('Precio Inválido');
            return false;
        }


}
