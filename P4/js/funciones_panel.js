
/*************************************************************************************/
//Second Menu

function newSelect(){
    var x = document.getElementById("table").value;
    var c = document.getElementById("categoria");
    c.disabled=false;

    switch(x) {
        case 'obra':
            c.innerHTML = "";
            c.innerHTML += "<option value='obra'>Titulo</option>";
            c.innerHTML += "<option value='obra'>Autor</option>";
            c.innerHTML += "<option value='obra'>Año</option>";
            
            break;

        case 'coleccion':
            c.innerHTML = "";
            c.innerHTML += "<option value='obra'>Nombre</option>";
            break;

        case 'comentario':
            c.innerHTML = "";
            c.innerHTML += "<option value='obra'>Usuario</option>";
            c.innerHTML += "<option value='obra'>Email</option>";
            c.innerHTML += "<option value='obra'>Fecha</option>";
            c.innerHTML += "<option value='obra'>Texto</option>";
            break;

        case 'usuario':
            c.innerHTML = "";
            c.innerHTML += "<option value='obra'>Usuario</option>";
            c.innerHTML += "<option value='obra'>Email</option>";
            c.innerHTML += "<option value='obra'>Ip</option>";;
            break;
    }
}