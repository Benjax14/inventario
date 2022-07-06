function checkInputs() {
    
    const id = document.getElementById('clave').value;
    const nombre = document.getElementById('nombre_cliente').value;
    const fono = document.getElementById('fono_cliente').value;
    const email = document.getElementById('email').value;
    var fecha = document.getElementById('fecha').value;
    expresionRegular = /^[a-zA-ZÀ-ÿ\s]{1,50}$/;
    correo = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

    if(!expresionRegular.test(nombre)){
        alert('El nombre no es valido');
        return false;
    }

    if(nombre.length > 20){
        alert('El nombre es demasiado largo');
        return false;
    }

    if(fono.length < 8 || fono.length > 8 || fono <= 0){
        alert('El numero de telefono no es valido');
        return false;
    }

    if(!correo.test(email)){
        alert('El correo electrónico no es valido');
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
    fecha_limite = f.getFullYear()+1 + "-" + mes + "-" + dia;

    if(fecha <= fecha_actual || fecha > fecha_limite){
        alert('La fecha no es valida');
        return false;
    }
    
}