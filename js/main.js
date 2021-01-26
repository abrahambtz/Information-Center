const formularioCliente = document.querySelector('#cliente');
eventListener();

function eventListener(){
    //Cuando el formulario de crear o editar se ejecuta.

    formularioCliente.addEventListener('submit', leerFormulario);
}
function leerFormulario(e){
    e.preventDefault();
    const nombre = document.querySelector('#nombre').value, 
    matriz = document.querySelector('#matriz').value, 
    accion = document.querySelector('#accion').value;

    if(nombre === '' || matriz === ''){
        console.log("Faltan campos");
    }
    else {
        const infoCliente = new FormData();
        infoCliente.append('nombre', nombre);
        infoCliente.append('matriz', matriz);
        infoCliente.append('accion', accion);
        //console.log(...infoCliente);
        if(accion === 'crear'){
            //Crearemos un nuevo elemento
            insertarBD(infoCliente);
        }else{
            //Editar el contacto    
        }
    } //console.log("Estan llenos los campos");
}
function insertarBD(datos){
     //llamados ajax

     //Crear el objeto
     const xhr = new XMLHttpRequest();

     //Abrir la conexion
    xhr.open('POST', 'modal/modelos/mCliente.php', true);
     //Pasar los datos
    xhr.onload = function() {
        if(this.status === 200){
            console.log(JSON.parse(xhr.responseText));
            //Leeemos la respuesta de PHP
            const respuestas = JSON.parse(xhr.responseText);
            console.log(respuestas.accion);
        }
    }

     //Enviar los datos.    
     xhr.send(datos);
}
