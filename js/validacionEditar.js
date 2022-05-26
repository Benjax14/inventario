function checkInputs() {
    //En proceso...
    const marca = document.getElementById('marca').value;
    const titulo = document.getElementById('titulo_producto').value;
    const precio = document.getElementById('precio').value;
    const stock = document.getElementById('stock').value; 
    const talla = document.getElementById("talla").value;
    const categoria = document.getElementById("cat").value;
    const estado = document.getElementById("estado").value;
    const color = document.getElementById("color").value;
    
    expresionRegular = /^[a-zA-ZÀ-ÿ0-9\s]{1,}$/

    if(marca === '' || titulo === ''){
        alert('No puede tener espacios vacios');
        return false;
    }
    if(precio < 5000){
        alert('No puede valer menos de 5000 pesos');
        return false;
    }
    if(stock < 0){
        alert('No puede tener 0 elementos');
        return false;
    }
    if(talla === "-Seleccione una talla-"){
        alert('Seleccione una talla');
        return false;
    }
    if(categoria === "-Seleccione la categoria-"){
        alert('Seleccione una categoria')
        return false;
    }
    if(estado === "-Seleccione estado-"){
        alert('Seleccione un estado');
        return false;
    }
    if(color === "-Seleccione color-"){
        alert('Seleccione un color');
        return false;
    }
    if(!expresionRegular.test(marca) || !expresionRegular.test(titulo)){
        alert("Solo admite letras y números")
        return false;
    }
    
}
