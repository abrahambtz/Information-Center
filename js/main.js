const formularioCliente = document.querySelector('#cliente');
const formularioContactos = document.querySelector('#contacto');
const formularioVpn = document.querySelector('#vpn');
const formularioNotas = document.querySelector('#notas');

const listadoClientes = document.querySelector('#clienteOp');
const listadoContacto = document.querySelector('#listadoContactos');
const listadoVpn = document.querySelector('#listadoVpn');
const listadoNotas = document.querySelector('#listadoNotas');


eventListener();
eventListenerClose();
function eventListenerClose() {
    $("#btnCerrarX, #btnCerrar").click(function () {
        $("#cliente").trigger("reset");
    });
    $("#btnCerrarContactoX,#btnCerrarContacto").click(function () {
        $("#contacto").trigger("reset");
    });
    $("#btnCerrarVPNX,#btnCerrarVPN").click(function () {
        $("#vpn").trigger("reset");
    });
    $("#btnCerrarNotasX,#btnCerrarNotas").click(function () {
        $("#notas").trigger("reset");
    });


}
function eventListener() {
    //Cuando el formulario de crear o editar se ejecuta.

    formularioCliente.addEventListener('submit', leerFormularioCliente);
    formularioContactos.addEventListener('submit', leerFormularioContacto);
    formularioVpn.addEventListener('submit', leerFormularioVpn);
    formularioNotas.addEventListener('submit', leerFormularioNotas);
}
function leerFormularioCliente(e) {
    e.preventDefault();
    const nombre = document.querySelector('#nombre').value,
        matriz = document.querySelector('#matriz').value,
        firewall = document.querySelector('#firewall').value,
        switches = document.querySelector('#switches').value,
        telefonia = document.querySelector('#telefonia').value,
        wireless = document.querySelector('#wireless').value,
        accion = document.querySelector('#accion').value;

    if (nombre === '' || matriz === '') {
        console.log("Faltan campos");
    }
    else {

        const infoCliente = new FormData();
        infoCliente.append('nombre', nombre);
        infoCliente.append('matriz', matriz);
        infoCliente.append('firewall', firewall);
        infoCliente.append('switches', switches);
        infoCliente.append('telefonia', telefonia);
        infoCliente.append('wireless', wireless);
        infoCliente.append('accion', accion);
        //console.log(...infoCliente);
        if (accion === 'crear') {
            //Crearemos un nuevo elemento
            //console.log("infoCliente");
            insertarBDCliente(infoCliente);


        } else {
            //Editar el contacto    
        }
    } //console.log("Estan llenos los campos");
}
function insertarBDCliente(datos) {
    //llamados ajax

    //Crear el objeto
    const xhr = new XMLHttpRequest();

    //Abrir la conexion
    xhr.open('POST', 'modal/modelos/mCliente.php', true);
    //Pasar los datos
    xhr.onload = function () {
        if (this.status === 200) {
            //console.log(JSON.parse(xhr.responseText));
            //Leeemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);
            //console.log(respuesta.accion);

            //Inserta nuevos elementos al Select 
            /*const nuevoCliente = document.createElement("option");
            nuevoCliente.value = respuesta.datos.id_insertado;
            nuevoCliente.text = respuesta.datos.nombre;
            
            listadoClientes.appendChild(nuevoCliente);*/

            $("#clienteOp").prepend("<option value='" + respuesta.datos.id_insertado + "' selected='selected'>" + respuesta.datos.nombre + "</option>");
            $(listadoClientes).selectpicker("refresh");
            $('.selectpicker').selectpicker('refresh');

        }
    }
    //Enviar los datos.  
    //$(listadoClientes).append('<option value="sd" selected="">'+nombre+'</option>');  
    //$("#clienteOp").prepend("<option value='Auto 0' selected='selected'>Auto 0</option>");
    xhr.send(datos);
    $("#modalInsertarCliente .close").click()
}

function leerFormularioContacto(e) {

    e.preventDefault();

    const nombreContacto = document.querySelector('#nombreContacto').value,
        correo = document.querySelector('#correo').value,
        telefono = document.querySelector('#telefono').value,
        extencion = document.querySelector('#extencion').value,
        celular = document.querySelector('#celular').value,
        idCliente = document.querySelector('#idCliente').value,
        accionContacto = document.querySelector('#accionContacto').value;

    if (nombreContacto === '' || correo === '' || telefono === '') {
        console.log("Faltan campos");
    }
    else {

        const infoCliente = new FormData();
        infoCliente.append('nombreContacto', nombreContacto);
        infoCliente.append('correo', correo);
        infoCliente.append('telefono', telefono);
        infoCliente.append('extencion', extencion);
        infoCliente.append('celular', celular);
        infoCliente.append('idCliente', idCliente);
        infoCliente.append('accionContacto', accionContacto);
        //console.log(...infoCliente);
        if (accionContacto === 'crear') {


            //Crearemos un nuevo elemento
            //console.log("infoCliente");
            insertarBDContacto(infoCliente);


        } else {
            //Editar el contacto   
            console.log("Hola");
        }
    } //console.log("Estan llenos los campos");
}
function insertarBDContacto(datos) {
    //llamados ajax

    //Crear el objeto
    const xhr = new XMLHttpRequest();

    //Abrir la conexion
    xhr.open('POST', 'modal/modelos/mContacto.php', true);

    //Pasar los datos
    xhr.onload = function () {
        if (this.status === 200) {
            //console.log(JSON.parse(xhr.responseText));
            //Leeemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);
            // console.log(respuesta.accionContacto);

            //Inserta nuevos elementos al Select 



            const nuevoContacto = document.createElement('div');

            const divCard = document.createElement('div');
            const divCardBody = document.createElement('div');
            const divCardText = document.createElement('div');

            nuevoContacto.classList.add('col-12', 'col-lg-6', 'mb-3');
            divCard.classList.add('card');
            divCardBody.classList.add('card-body', 'mb-0');
            divCardText.classList.add('card-text', 'ml-3', 'mt-0', 'm-0');



            const contenedorInfo = document.createElement('p');
            contenedorInfo.classList.add('font-weight-light', 'm-0');

            contenedorInfo.innerHTML = `
                <b>Nombre: </b> ${respuesta.datos.nombreContacto}
                <br>
                <b>Correo: </b> ${respuesta.datos.correo}
                <br>
                <b>Telefono:</b> ${respuesta.datos.telefono} ext. ${respuesta.datos.extencion}
                <br>
                <b>Celular: </b> ${respuesta.datos.celular}
            
            `;

            const acciones = document.createElement('p');
            const space = document.createElement('b');
            acciones.classList.add('m-0', 'text-right');

            const btnEnditar = document.createElement('button');
            btnEnditar.classList.add('mr-1', 'btn', 'btn-sm', 'btn-info', 'rounded-circle');
            btnEnditar.setAttribute('data-toggle', 'tooltip');
            btnEnditar.setAttribute('data-placement', 'bottom');
            btnEnditar.setAttribute('title', 'Editar');
            const iconoEditar = document.createElement('i');
            iconoEditar.classList.add('fas', 'fa-pencil-alt');

            btnEnditar.appendChild(iconoEditar);

            const btnEliminar = document.createElement('button');
            btnEliminar.classList.add('btn', 'btn-sm', 'btn-danger', 'rounded-circle');
            btnEliminar.setAttribute('data-toggle', 'tooltip');
            btnEliminar.setAttribute('data-placement', 'bottom');
            btnEliminar.setAttribute('title', 'Eliminar');
            const iconoEliminar = document.createElement('i');
            iconoEliminar.classList.add('fas', 'fa-trash-alt');

            btnEliminar.appendChild(iconoEliminar);

            acciones.appendChild(btnEnditar);
            acciones.appendChild(space);
            acciones.appendChild(btnEliminar);


            const contenedorTitulo = document.createElement('p');
            contenedorTitulo.classList.add('card-title', 'font-weight-bold', 'm-0');
            const spanTitulo = document.createElement('span');
            spanTitulo.classList.add('badge', 'badge-dark');
            spanTitulo.innerHTML = `Contacto nuevo`;

            contenedorTitulo.appendChild(spanTitulo);

            divCardText.appendChild(contenedorInfo);
            divCardText.appendChild(acciones);
            divCardBody.appendChild(contenedorTitulo);
            divCardBody.appendChild(divCardText);
            divCard.appendChild(divCardBody);
            nuevoContacto.appendChild(divCard);
            listadoContactos.appendChild(nuevoContacto);

            /*  
            document.getElementById("main").appendChild(div);
            listadoClientes.appendChild(nuevoCliente);*/
            /*
            $("#clienteOp").prepend("<option value='"+respuesta.datos.id_insertado+"' selected='selected'>"+respuesta.datos.nombre+"</option>");
            $(listadoClientes).selectpicker("refresh");
            $('.selectpicker').selectpicker('refresh');
            document.querySelector('cliente').reset();*/
        }
    }
    //Enviar los datos.  
    //$(listadoClientes).append('<option value="sd" selected="">'+nombre+'</option>');  
    //$("#clienteOp").prepend("<option value='Auto 0' selected='selected'>Auto 0</option>");
    xhr.send(datos);
    $("#modalContacto .close").click()
}

function leerFormularioVpn(e) {

    e.preventDefault();

    const ipvpn = document.querySelector('#ipvpn').value,
        uservpn = document.querySelector('#uservpn').value,
        passvpn = document.querySelector('#passvpn').value,
        tipovpn = document.querySelector('input[name="tipovpn"]:checked');
    accionVpn = document.querySelector('#accionVpn').value;
    idCliente = document.querySelector('#idClienteVPN').value,
        sharedsecret = (tipovpn.id === 'netVPN') ? '' : document.querySelector('#sharedsecret').value;

    if (ipvpn === '' || uservpn === '' || passvpn === '' || tipovpn.id != 'netVPN' && sharedsecret === '') {
        window.alert("Faltan campos - SharedSecret - Es necesario agregar el SharedSecret en caso de que se seleccione Global Client VPN");

    }
    else {
        const infoCliente = new FormData();


        infoCliente.append('ipvpn', ipvpn);
        infoCliente.append('uservpn', uservpn);
        infoCliente.append('passvpn', passvpn);
        infoCliente.append('tipovpn', tipovpn.value);
        infoCliente.append('accionVpn', accionVpn);
        infoCliente.append('idCliente', idCliente);
        infoCliente.append('sharedsecret', sharedsecret);


        //console.log(...infoCliente);
        if (accionVpn === 'crear') {


            //Crearemos un nuevo elemento
            //console.log("infoCliente");
            insertarBDVpn(infoCliente);


        } else {
            //Editar el contacto   
            console.log("Hola");
        }
    } //console.log("Estan llenos los campos");
}
function insertarBDVpn(datos) {
    //llamados ajax

    //Crear el objeto
    const xhr = new XMLHttpRequest();

    //Abrir la conexion
    xhr.open('POST', 'modal/modelos/mVpn.php', true);

    //Pasar los datos
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
            //Leeemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);
            // console.log(respuesta.accionContacto);

            //Inserta nuevos elementos al Select 
            const nuevoVpn = document.createElement('div');
            const divCard = document.createElement('div');
            const divCardBody = document.createElement('div');
            const divCardText = document.createElement('div');

            nuevoVpn.classList.add('col-12', 'col-lg-6', 'mb-3');
            divCard.classList.add('card');
            divCardBody.classList.add('card-body', 'mb-0');
            divCardText.classList.add('card-text', 'ml-3', 'mt-0', 'm-0');

            const contenedorInfo = document.createElement('p');
            contenedorInfo.classList.add('font-weight-light', 'm-0');
            contenedorInfo.innerHTML = `
                <b>IP: </b> ${respuesta.datos.ipvpn}
                <br>
                <b>Usuario: </b> ${respuesta.datos.uservpn}
                <br>
                <b>Contraseña:</b> ${respuesta.datos.passvpn}
                <br>
                <b>Shared Secret: </b> ${respuesta.datos.sharedsecret}
            
            `;

            const acciones = document.createElement('p');
            const space = document.createElement('b');
            acciones.classList.add('m-0', 'text-right');

            const btnEnditar = document.createElement('button');
            btnEnditar.classList.add('mr-1', 'btn', 'btn-sm', 'btn-info', 'rounded-circle');
            btnEnditar.setAttribute('data-toggle', 'tooltip');
            btnEnditar.setAttribute('data-placement', 'bottom');
            btnEnditar.setAttribute('title', 'Editar');
            const iconoEditar = document.createElement('i');
            iconoEditar.classList.add('fas', 'fa-pencil-alt');

            btnEnditar.appendChild(iconoEditar);

            const btnEliminar = document.createElement('button');
            btnEliminar.classList.add('btn', 'btn-sm', 'btn-danger', 'rounded-circle');
            btnEliminar.setAttribute('data-toggle', 'tooltip');
            btnEliminar.setAttribute('data-placement', 'bottom');
            btnEliminar.setAttribute('title', 'Eliminar');
            const iconoEliminar = document.createElement('i');
            iconoEliminar.classList.add('fas', 'fa-trash-alt');

            btnEliminar.appendChild(iconoEliminar);

            acciones.appendChild(btnEnditar);
            acciones.appendChild(space);
            acciones.appendChild(btnEliminar);


            const contenedorTitulo = document.createElement('p');
            contenedorTitulo.classList.add('card-title', 'font-weight-bold', 'm-0');
            const spanTitulo = document.createElement('span');
            spanTitulo.classList.add('badge', 'badge-primary');
            spanTitulo.innerHTML = `${respuesta.datos.tipovpn}`;

            contenedorTitulo.appendChild(spanTitulo);

            divCardText.appendChild(contenedorInfo);
            divCardText.appendChild(acciones);
            divCardBody.appendChild(contenedorTitulo);
            divCardBody.appendChild(divCardText);
            divCard.appendChild(divCardBody);
            nuevoVpn.appendChild(divCard);
            listadoVpn.appendChild(nuevoVpn);

            /*  
            document.getElementById("main").appendChild(div);
            listadoClientes.appendChild(nuevoCliente);*/
            /*
            $("#clienteOp").prepend("<option value='"+respuesta.datos.id_insertado+"' selected='selected'>"+respuesta.datos.nombre+"</option>");
            $(listadoClientes).selectpicker("refresh");
            $('.selectpicker').selectpicker('refresh');
            document.querySelector('cliente').reset();*/
        }
    }
    //Enviar los datos.  
    //$(listadoClientes).append('<option value="sd" selected="">'+nombre+'</option>');  
    //$("#clienteOp").prepend("<option value='Auto 0' selected='selected'>Auto 0</option>");
    xhr.send(datos);
    $("#modalVpn .close").click()
}

function leerFormularioNotas(e) {

    e.preventDefault();

    const nombreNota = document.querySelector('#nombreNota').value,
        descrpcionNota = document.querySelector('#descrpcionNota').value,
        accion = document.querySelector('#accionNotas').value;
        idCliente = document.querySelector('#idClienteNotas').value;
    if (nombreNota === '' || descrpcionNota === '') {
        window.alert("Faltan campos.");
    }
    else {
        const infoCliente = new FormData();

        infoCliente.append('nombreNota', nombreNota);
        infoCliente.append('descrpcionNota', descrpcionNota);
        infoCliente.append('accion', accion);
        infoCliente.append('idCliente', idCliente);
        //console.log(...infoCliente);
        if (accion === 'crear') {

            //Crearemos un nuevo elemento
            //console.log(infoCliente);
            insertarBDNotas(infoCliente);


        } else {
            //Editar el contacto   
            console.log("Hola");
        }
    } //console.log("Estan llenos los campos");
}

function insertarBDNotas(datos) {
    //llamados ajax

    //Crear el objeto
    const xhr = new XMLHttpRequest();

    //Abrir la conexion
    xhr.open('POST', 'modal/modelos/mNotas.php', true);

    //Pasar los datos
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(JSON.parse(xhr.responseText));
            //Leeemos la respuesta de PHP
            const respuesta = JSON.parse(xhr.responseText);
            // console.log(respuesta.accionContacto);
            const descripcion = respuesta.datos.descrpcionNota.substring(0, 200);
            //Inserta nuevos elementos al Select 


            
            const nuevoNotas = document.createElement('div');

            const divCard = document.createElement('div');
            const divCardBody = document.createElement('div');
            const divCardText = document.createElement('div');
            
            nuevoNotas.classList.add('col-12', 'col-lg-6', 'mb-3');
            divCard.classList.add('card');
            divCardBody.classList.add('card-body', 'mb-0');
            divCardText.classList.add('card-text', 'ml-3', 'mt-0', 'm-0');
            divCardText.setAttribute('style','height: 5rem;');
            
            
            const contenedorInfo = document.createElement('p');
            contenedorInfo.classList.add('font-weight-light', 'm-0');
            
            contenedorInfo.innerHTML = `${descripcion}`;
            
            const acciones = document.createElement('p');
            const space = document.createElement('b');
            acciones.classList.add('m-0', 'text-right');
            
            const btnEnditar = document.createElement('button');
            btnEnditar.classList.add('mr-1', 'btn', 'btn-sm', 'btn-info', 'rounded-circle');
            btnEnditar.setAttribute('data-toggle', 'tooltip');
            btnEnditar.setAttribute('data-placement', 'bottom');
            btnEnditar.setAttribute('title', 'Editar');
            const iconoEditar = document.createElement('i');
            iconoEditar.classList.add('fas', 'fa-pencil-alt');
            
            btnEnditar.appendChild(iconoEditar);
            
            const btnEliminar = document.createElement('button');
            btnEliminar.classList.add('btn', 'btn-sm', 'btn-danger', 'rounded-circle');
            btnEliminar.setAttribute('data-toggle', 'tooltip');
            btnEliminar.setAttribute('data-placement', 'bottom');
            btnEliminar.setAttribute('title', 'Eliminar');
            const iconoEliminar = document.createElement('i');
            iconoEliminar.classList.add('fas', 'fa-trash-alt');
            
            btnEliminar.appendChild(iconoEliminar);
            
            acciones.appendChild(btnEnditar);
            acciones.appendChild(space);
            acciones.appendChild(btnEliminar);
            
            
            const contenedorTitulo = document.createElement('p');
            contenedorTitulo.classList.add('card-title', 'font-weight-bold', 'm-0');
            const spanTitulo = document.createElement('span');
            spanTitulo.classList.add('badge', 'badge-danger');
            spanTitulo.innerHTML = `${respuesta.datos.nombreNota}`;
            
            contenedorTitulo.appendChild(spanTitulo);
            
            divCardText.appendChild(contenedorInfo);
            divCardBody.appendChild(contenedorTitulo);
            divCardBody.appendChild(divCardText);
            divCardBody.appendChild(acciones);
            divCard.appendChild(divCardBody);
            nuevoNotas.appendChild(divCard);
            listadoNotas.appendChild(nuevoNotas);

            /*  
            document.getElementById("main").appendChild(div);
            listadoClientes.appendChild(nuevoCliente);*/
            /*
            $("#clienteOp").prepend("<option value='"+respuesta.datos.id_insertado+"' selected='selected'>"+respuesta.datos.nombre+"</option>");
            $(listadoClientes).selectpicker("refresh");
            $('.selectpicker').selectpicker('refresh');
            document.querySelector('cliente').reset();*/
        }
    }
    //Enviar los datos.  
    //$(listadoClientes).append('<option value="sd" selected="">'+nombre+'</option>');  
    //$("#clienteOp").prepend("<option value='Auto 0' selected='selected'>Auto 0</option>");
    xhr.send(datos);
    $("#modalNotas .close").click()
}