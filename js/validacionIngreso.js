function checkInputs() {
    
    const marca = document.getElementById('marca_produc').value;
    const nombre = document.getElementById('nombre_produc').value;
    const precio = document.getElementById('precio').value;
    const stock = document.getElementById('stock').value;
    expresionRegular = /^[a-zA-ZÀ-ÿ\s]{1,50}$/

    if(!expresionRegular.test(marca) || !expresionRegular.test(nombre)){
        alert('Solo se permiten letras');
        return false;
    }

    if(precio < 5000 || precio > 100000){
        alert('El precio ingresado no es válido');
        return false;
    }

    if(stock <= 0 || stock > 50){
        alert('El stock ingresado no es válido');
        return false;
    }
    
}
