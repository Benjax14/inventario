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