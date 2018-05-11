
function validarEmail() {
    
    var email = document.getElementById("email").value;
    var nombre = document.getElementById("entrada_nombre").value;
    var texto = document.getElementById("entrada_texto").value;

    //validacion de email
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email)){
        if(nombre != "" && texto != ""){
	        crearComentario();
	        alert("¡Comentario enviado!");
    	}
    	else{
    		alert("No has rellenado todos los datos.");
    	}
    } else {
        alert("¡La dirección de email es incorrecta!");
    }
}


function mostrarComentarios(){
	var x = document.getElementById("box_comentarios");
	var b = document.getElementById("boton_comentarios")
    if (x.style.display === "none") {
        x.style.display = "block";
        b.style.backgroundColor =" #4caf50";


    } else {
        x.style.display = "none";
        b.style.backgroundColor ="#333";
    }
}




function validarTexto() {
//Listado de palabras prohibidas
	if (event.keyCode == 32){
		var texto = document.getElementById("entrada_texto").value;
        var prohibidas = ["mierda", "basura", "gilipollas", "cabron", "tonto", "idiota", "caca", "tontos" ];

        //Generar el regex
        function escaparRegex(string) {
            return string.replace(/[\\^$.|?*+()[{]/g, '\\$&');
        }

        var prohibidasOr = prohibidas.map(escaparRegex).join('|'),
        regex = new RegExp('\\[?\\b(?:' + prohibidasOr + ')\\b\\]?', 'gi');

    	//Reemplazar
    	var n = texto.split(" ");
    	var word = n[n.length - 2];
    	var x = "*";
    	var finish = x.repeat(word.length);
    	resultado = texto.replace(regex, finish);
		document.getElementById("entrada_texto").value = resultado;
	}
}



function crearComentario() {
  
  //Cogemos el texto y nombre del formulario
  var texto_in = document.getElementById("entrada_texto").value;
  var nombre_in = document.getElementById("entrada_nombre").value;

  //El divPrincipal es comentarios que es donde se contienen el comentario
  var divPrincipal= document.getElementById('comentarios') ;
  //Creamos un nuevo div
  var newDiv = document.createElement("div");

  //Creamos un nuevo p para elnombre
  var paraN = document.createElement("p");
  //Asignamos la classe nombre a ese p
  paraN.className="nombre";
  //creamos texto dentro de p con el nombre
  var nombre = document.createTextNode(nombre_in);
  //insertamos el texto en p
  paraN.appendChild(nombre);


  var paraD = document.createElement("p");
  paraD.className="fecha";
  var fecha = new Date();
  var options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minutes: 'numeric'};
  fecha.toLocaleDateString("es-ES", options);
  var date = document.createTextNode(fecha);
  paraD.appendChild(date);


  var paraT = document.createElement("p");
  paraT.className ="text";
  var texto = document.createTextNode(texto_in);
  paraT.appendChild(texto);

  newDiv.appendChild(paraN);
  newDiv.appendChild(paraD);
  newDiv.appendChild(paraT);

  newDiv.className ="comentario";

  divPrincipal.appendChild(newDiv);
}

