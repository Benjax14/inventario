function checkInputs() {
    
    const id = document.getElementById('controlBuscador').value;
    const nombre = document.getElementById('nombre_cliente').value;
    const rut = document.getElementById('rut').value;
    const fono = document.getElementById('fono_cliente').value;
    const email = document.getElementById('email').value;
    var fecha = document.getElementById('fecha').value;
    expresionRegular = /^[a-zA-ZÀ-ÿ\s]{1,50}$/;
    correo = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    expresionNum = /^[0-9]+$/
    
    if(id === "-Seleccione el producto-"){
        alert('Por favor seleccione un producto a reservar');
        return false;
    }

    if(nombre === ''){
        alert('Por favor llene el espacio vacio del nombre para continuar');
        return false;
    }

    if(rut === ''){
        alert('Por favor llene el espacio vacio del rut para continuar');
        return false;
    }

    if(fono === ''){
        alert('Por favor llene el espacio vacio del fono para continuar');
        return false;
    }

    if(email === ''){
        alert('Por favor llene el espacio vacio del email para continuar');
        return false;
    }

    if(fecha === ''){
        alert('Por favor llene el espacio vacio de la fecha para continuar');
        return false;
    }

    if(!expresionRegular.test(nombre)){
        alert('El nombre no es válido');
        return false;
    }

    if(nombre.length > 20){
        alert('El nombre es demasiado largo');
        return false;
    }

    if(nombre.length <= 4){
        alert('El nombre es demasiado corto');
        return false;
    }

    if(!expresionNum.test(rut)){
        alert('Solo se permiten numeros en el rut');
        return false;
    }

    if(rut < 50000000 || rut > 250000000){
        alert('El rut no es válido');
        return false;
    }

    if(!expresionNum.test(fono)){
        alert('Solo se permiten numeros en el fono');
        return false;
    }

    if(fono.length < 8 || fono.length > 8 || fono <= 0){
        alert('El numero de telefono no es válido');
        return false;
    }

    if(!correo.test(email)){
        alert('El correo electrónico no es válido');
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
        alert('La fecha no es válida');
        return false;
    }
    
}