

function preview_imagen(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();


        reader.onload = function (e) {
            var x = document.getElementById("miniatura");
            x.style.display="block";
            x.src= e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function showMove(id){
    var x = document.getElementById("obra_"+id);
    var c = document.getElementById("coleccion");
    x.add(c);

}


function changeColeccion(coleccion,obra_id,...colecciones){

 
    
    var i = document.createElement("select"); //input element, text
    i.setAttribute('type',"file");
    i.setAttribute('name',"nueva_coleccion[]");
    i.style.marginLeft="5px";

    
    for (var n = 0; n < colecciones.length; n=n+2) {

        var h = document.createElement("option"); //input element, Submit button
        h.setAttribute('value', colecciones[n+1]);
        h.innerHTML=colecciones[n];
        if(coleccion == colecciones[n]){
            h.selected=true;
        }
        
        i.appendChild(h); 
    }
      
        var c = document.createElement("input")
        c.setAttribute('type',"hidden");
        c.setAttribute('name',"obras[]");
        c.setAttribute('value', obra_id);
        i.appendChild(c);
    

    document.getElementById('cambiar_boton_'+obra_id).remove();
    var text_before = document.getElementById("label_"+obra_id).textContent;
    document.getElementById("label_"+obra_id).innerHTML = "<span style='color:#333'>Mover</span> "+
        text_before+"<span style='color:#333'> a </span>";
    document.getElementById('obra_'+obra_id).appendChild(i);
}



function subida_form(id){
    
    var f = document.createElement("form");
    f.setAttribute('method',"post");
    f.setAttribute('action',"../recursos/panel/upload_foto.php");
    f.setAttribute('enctype',"multipart/form-data");


    var i = document.createElement("input"); //input elemento
    i.setAttribute('type',"file");
    i.setAttribute('name',"imagen");
    i.setAttribute('id','up_image')
    i.setAttribute('onchange',"preview_imagen(this);");

    var h = document.createElement("input"); //hide elemento
    h.setAttribute('type',"hidden");
    h.setAttribute('name',"obra");
    h.setAttribute('value', id);

    var s = document.createElement("input"); //input element, Submit button
    s.setAttribute('type',"submit");
    s.setAttribute('name',"enviar");
    s.setAttribute('value',"Subir Imagen");
    s.setAttribute('class','send_image');

    var d = document.createElement("div");
    d.setAttribute('class','column');

    var m = document.createElement('img');
    m.setAttribute('id','miniatura');
    m.setAttribute('src','');
    m.setAttribute('alt','preview');

    f.appendChild(m);
    d.appendChild(i);
    f.appendChild(h);
    d.appendChild(s);
    f.appendChild(d);

    document.getElementById('upload_boton').remove();
    var div = document.getElementById('upload_foto').appendChild(f);

    div.style.border="solid 1px #333";


}