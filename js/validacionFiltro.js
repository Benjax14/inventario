function Filtro(){

const cat = document.getElementById('cat').value;
const col = document.getElementById('col').value;
const talla = document.getElementById('tal').value;
const gen = document.getElementById('gen').value;

if(cat === '---Seleccione Categoria---' && col === '---Seleccione Color---' && talla === '---Seleccione Talla---' && gen === '---Seleccione Genero---'){
    alert('Por favor seleccione al menos un filtro a buscar');
    return false;
}

}