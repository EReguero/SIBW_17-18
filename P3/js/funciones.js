/*************************************************************************************/
//Comprobacion email

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

/*************************************************************************************/
//Boton interactivo

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

/*************************************************************************************/
//Validacion de texto

function validarTexto(...a) {
//Listado de palabras prohibidas
	if (event.keyCode == 32){
		var texto = document.getElementById("entrada_texto").value;
        var prohibidas = a;

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
/*************************************************************************************/
// REDES POP-UP
//La función window_open crea el pop-up o ventana emergente
function window_open(titulo,imagen,red){
  window.open("recursos/redes.php?titulo="+titulo+"&imagen="+imagen+"&red="+red, "Compartir en ", "width=780,height=530, top=85,left=120");
}
  
//La función window_close cerrara el pop-up o ventana emergente
function window_close(){
  window.close();
}
  

/*************************************************************************************/
//SLIDER

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    x[slideIndex-1].style.display = "block"; 
}