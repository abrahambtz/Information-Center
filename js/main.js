const formularioCliente = document.querySelector('#cliente');
eventListener();

function eventListener(){
    //Cuando el formulario de crear o editar se ejecuta.

    formularioCliente.addEventListener('submit', leerFormulario);
}
function leerFormulario(e){
    e.preventDefault();
    const nombre = document.querySelector('#nombre').value;
    const matriz = document.querySelector('#matriz').value;
    if(nombre === ''){
        console.log("El campo esta");
    }
    else  console.log("El campo esta");


}
