//Variables
const contacto = {
    id : null,
    nombres : '',
    apellidos : '',
    ciudad: '',
    correo: '',
    celular: '',
    mensaje: '',
    estado: '0',
    fecha: ''
}

const btnEnviar = document.querySelector('#enviar');

const formulario = document.querySelector('#enviar-mensaje');
const fieldset = document.querySelector('#fieldset');

// //Variables para campos
const nombres = document.querySelector('#nombresInput');
const apellidos = document.querySelector('#apellidosInput');
const ciudad = document.querySelector('#ciudadInput');
const correo = document.querySelector('#correoInput');
const celular = document.querySelector('#celularInput');
const mensaje = document.querySelector('#mensajeInput');


// //Formatear la fecha
function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
  }

const fecha = new Date();
const mes = padTo2Digits(fecha.getMonth() + 1);
const dia = padTo2Digits(fecha.getDate());
const year = fecha.getFullYear();
const hora = padTo2Digits(fecha.getHours());
const minutos = padTo2Digits(fecha.getMinutes());
const segundos = padTo2Digits(fecha.getSeconds());
const fechaFormateada = `${year}-${mes}-${dia} ${hora}:${minutos}:${segundos}`;

contacto.fecha = fechaFormateada;


const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

const num = /^[0-9]+$/;

document.addEventListener('DOMContentLoaded', () => {
    iniciarForm();
    eventListeners();    
});

function eventListeners() {
    nombresInput.addEventListener('blur', validarFormulario);    
    apellidosInput.addEventListener('blur', validarFormulario);
    ciudadInput.addEventListener('blur', validarFormulario);
    correoInput.addEventListener('blur', validarFormulario);
    celularInput.addEventListener('blur', validarFormulario);
    mensajeInput.addEventListener('input', validarFormulario);

}

function iniciarForm() {
    btnEnviar.disabled = true;
    btnEnviar.classList.add('btn-disabled');
}

function validarFormulario(e) {
    if(e.target.value.length > 0){
        //Elimina los errores
        const error = document.querySelector('.alerta__error');
        if(error){
            error.remove();
        }
       
    } else {
        //console.log('No hay nada');
        mostrarError('Todos los campos son obligatorios');
    }

    if(e.target.type === 'email'){
        if(er.test(e.target.value) === false){
            mostrarError('Email no valido');
        } 
    }

    if(e.target.type === 'tel'){
        if(num.test(e.target.value) === false || e.target.value.length < 9){
            mostrarError('Teléfono no valido');
        } 
    }

    if(er.test(correoInput.value) && nombresInput.value !== '' && apellidosInput.value !== '' && ciudadInput.value !== '' && celularInput.value !== '' && mensajeInput.value !== ''){
        btnEnviar.disabled = false;
        btnEnviar.classList.remove('btn-disabled');
        console.log('se puede enviar');
        llenarMensaje();
    } else{
        console.log('No se puede enviar');
    }
}

function mostrarError(mensaje){
    const mensajeError = document.createElement('p');
    mensajeError.textContent = mensaje;
    mensajeError.classList.add('alerta', 'alerta__error');

    const errores = document.querySelectorAll('.alerta__error');
    if(errores.length === 0){
        formulario.insertBefore(mensajeError, fieldset);
    }    
}

function llenarMensaje(){

    contacto.nombres = nombres.value;
    contacto.apellidos = apellidos.value;
    contacto.ciudad = ciudad.value;
    contacto.correo = correo.value;
    contacto.celular = celular.value;
    contacto.mensaje = mensaje.value;

    btnEnviar.onclick = function(e){
        e.preventDefault();
        apiContacto();
    }
}


async function apiContacto() {
    const {nombres, apellidos, ciudad, correo, celular, mensaje, estado, fecha} = contacto;

    const datos = new FormData();
    datos.append('nombres', nombres);
    datos.append('apellidos', apellidos);
    datos.append('ciudad', ciudad);
    datos.append('correo', correo);
    datos.append('celular', celular);
    datos.append('mensaje', mensaje);
    datos.append('estado', estado);
    datos.append('fecha', fecha);

    try {
        const url = 'http://localhost:3000/api/mensaje';
        
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await respuesta.json();

        if(resultado.resultado){
            Swal.fire({
                title: 'Mensaje Enviado',
                text: 'Gracias por escribirnos',
                icon: 'success'
            }).then( () => {
                window.location.reload();
            })
        };

    } catch(error) {
        console.log(error);
        Swal.fire({
            title: 'Error',
            text: 'Mensaje no enviado. Intenta de nuevo',
            icon: 'error'
        }).then( () => {
            window.location.reload();
        });        
    }
}