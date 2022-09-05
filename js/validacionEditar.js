function checkInputs() {
    //En proceso...

    const marca = document.getElementById('marca_produc').value;
    const titulo = document.getElementById('nombre_produc').value;
    const precio = document.getElementById('precio').value;
    const stock = document.getElementById('stock').value; 
    const talla = document.getElementById("talla").value;
    const categoria = document.getElementById("cat").value;
    const genero = document.getElementById("genx").value;
    const color = document.getElementById("color").value;
    

    expresionRegular = /^[a-zA-ZÀ-ÿ0-9\s]{1,}$/

    if(marca === '' || titulo === ''){
        alert('No puede tener campos vacíos');
        return false;
    }
    if(precio < 5000 || precio > 100000){
        alert('No puede valer menos de 5000 pesos y más de 100000');
        return false;
    }
    if(stock < 1){
        alert('Stock Inválido');
        return false;
    }
    if(talla === "-Seleccione una talla-"){
        alert('Seleccione una talla');
        return false;
    }
    if(categoria === "-Seleccione la categoría-"){
        alert('Seleccione una categoría')
        return false;
    }
    if(color === "-Seleccione color-"){
        alert('Seleccione un color');
        return false;
    }
    if(!expresionRegular.test(marca) || !expresionRegular.test(titulo)){
        alert("Solo se admite letras y números")
        return false;
    }
    if(genero === "-Seleccione género-"){
        alert('Seleccione un género');
        return false;
    }

    
}
