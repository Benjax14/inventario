function check() {
    const marca = document.getElementById('mar').value;
    const nombre = document.getElementById('nom').value;
    const precio = document.getElementById('pre').value;
    const stock = document.getElementById('sto').value;
    const genero = document.getElementById('gen').value;
    const imagen = document.getElementById('formFile').value;
    const color = document.getElementById('col').value;
    const categoria = document.getElementById('cat').value;
    const talla = document.getElementById('tal').value;

    expresionRegular = /^[a-zA-ZÀ-ÿ\s]{1,}$/

    if(!expresionRegular.test(marca)){
        alert('Debe ingresar la marca del producto con letras mayúsculas y/o minusculas');
        return false;
    }
    if(!expresionRegular.test(nombre)){
        alert('Debe ingresar el nombre del producto con letras mayúsculas y/o minusculas');
        return false;
    }

    if(precio < 5000 || precio > 100000){
        alert('El precio debe ser más de $5.000 o menos de $100.000');
        return false;
    }

    if(stock <= 0 || stock > 50){
        alert('El stock debe ser más de 1 o menos de 50');
        return false;
    }

    if(genero === '-Seleccione el género-'){
        alert('Debe seleccionar un género');
        return false;
    }
    if(imagen === ""){
        alert('Debe subir un archivo de imagen (preferencia jpg, jpeg y png');
        return false;

    }
    if(color === '-Seleccione el color-'){
        alert('Debe registrar el color');
        return false;
    }
    if(categoria === '-Seleccione la categoría-'){
        alert("Debe ingresar la categoria al producto");
        return false;
    }
    if(talla === '-Seleccione una talla-'){
        alert('Debe ingresar una talla');
        return false;
    }

    
}
