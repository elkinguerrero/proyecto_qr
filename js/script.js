
var contrato = null;

function Guardar_formulario(){
    //la variable contrato contiene los datos el contrato escaneado
    console.log(contrato)

    // la variable fecha contiene el dato de la fecha que se selecciona en el fomrularion
    fecha = document.getElementById('add_evento_fecha').value;

    //id no se pide en el formulario por lo que se deja vacia
    id = 1;

    if(contrato="null" || contratol == null){
        contrato = document.getElementById('id_contrato').value;
    }

    if(fecha == ''){
        alert("debe seleccionar una fecha")
        return;
    }

    var respuesta = new XMLHttpRequest();
    respuesta.onreadystatechange = function() {};
    respuesta.open("POST", "php/guardar_texto.php", false);
    respuesta.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    respuesta.send("contrato="+contrato+"&id="+id+"&fecha="+fecha);
    if(respuesta.status == 200 && respuesta.readyState == 4){
        document.getElementById("formulario").submit();
    }
}