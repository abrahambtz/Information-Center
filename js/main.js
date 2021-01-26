const formularioCliente = document.querySelector('#cliente');
const listadoClientes = document.querySelector('#clienteOp');
var n = 1;
eventListener();

function eventListener() {
    //Cuando el formulario de crear o editar se ejecuta.

    formularioCliente.addEventListener('submit', leerFormulario);
}
function leerFormulario(e) {
    e.preventDefault();
    const nombre = document.querySelector('#nombre').value,
        matriz = document.querySelector('#matriz').value,
        accion = document.querySelector('#accion').value;

    if (nombre === '' || matriz === '') {
        console.log("Faltan campos");
    }
    else {
        const infoCliente = new FormData();
        infoCliente.append('nombre', nombre);
        infoCliente.append('matriz', matriz);
        infoCliente.append('accion', accion);
        //console.log(...infoCliente);
        if (accion === 'crear') {
            //Crearemos un nuevo elemento
            //console.log("infoCliente");
            insertarBD(infoCliente);


        } else {
            //Editar el contacto    
        }
    } //console.log("Estan llenos los campos");
}
function insertarBD(datos) {
    //llamados ajax

    //Crear el objeto
    const xhr = new XMLHttpRequest();
    var nombre = null;
    var matriz = null;


    //Abrir la conexion
    xhr.open('POST', 'modal/modelos/mCliente.php', true);
    //Pasar los datos
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
            //Leeemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);
            //console.log(respuesta.accion);

            //Inserta nuevos elementos al Select 
            /*const nuevoCliente = document.createElement("option");
            nuevoCliente.value = respuesta.datos.id_insertado;
            nuevoCliente.text = respuesta.datos.nombre;
            
            listadoClientes.appendChild(nuevoCliente);*/
           
            $("#clienteOp").prepend("<option value='"+respuesta.datos.id_insertado+"' selected='selected'>"+respuesta.datos.nombre+"</option>");
            $(listadoClientes).selectpicker("refresh");
            $('.selectpicker').selectpicker('refresh');

        }
    }
    //Enviar los datos.  
    //$(listadoClientes).append('<option value="sd" selected="">'+nombre+'</option>');  
    //$("#clienteOp").prepend("<option value='Auto 0' selected='selected'>Auto 0</option>");
    xhr.send(datos);

    $("#modalInsertarCliente .close").click()
    $("#modalInsertarCliente").on("hidden.bs.modal", function () {
        $('.modal-body').find('nombre,input').val('');
        $('.modal-body').find('matriz,select').val('');

    });

}
