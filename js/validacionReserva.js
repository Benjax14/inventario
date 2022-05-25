function checkInputs() {
    
    const id = document.getElementById('clave').value;
    const nombre = document.getElementById('nombre_cliente').value;
    const fono = document.getElementById('fono_cliente').value;
    var fecha = document.getElementById('fecha').value;
    expresionRegular = /^[a-zA-ZÀ-ÿ\s]{1,50}$/

    if(!expresionRegular.test(nombre)){
        alert('Solo se permiten letras');
        return false;
    }

    if(fono.length < 8 || fono.length > 8){
        alert('El numero de telefono no es valido');
        return false;
    }

    var f = new Date();

    var mes = (f.getMonth() + 1 ).toString();

    if(mes.length <= 1){
        mes = "0" + mes;
    }

    var dia = f.getDate().toString();

    if(dia.length <= 1){
        dia = "0" + dia;
    }

    fecha_actual = f.getFullYear() + "-" + mes + "-" + dia;

    if(fecha <= fecha_actual){
        alert('La fecha no es valida');
        return false;
    }
    
}