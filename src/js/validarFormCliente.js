(function(){
    //Variables
    const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    const num = /^[0-9]+$/;

    const formulario = document.querySelector('#form-cliente');
    const fieldset = document.querySelector('#fieldset-empresa');
    const inputEmpresa = document.querySelector('#empresa');
    const inputTelefono = document.querySelector('#tel-empresa');
    const inputNIT = document.querySelector('#nit');
    const inputCorreo = document.querySelector('#email-empresa');
    const inputContacto = document.querySelector('#nombre-contacto');
    const inputCargo = document.querySelector('#cargo');
    const inputDireccion = document.querySelector('#direccion');
    const inputCiudad = document.querySelector('#ciudad');
    const inputMensaje = document.querySelector('#mensaje-empresa');
    const btnEnviar = document.querySelector('#enviar-empresa');


    document.addEventListener("DOMContentLoaded", function() {
        iniciarForm();
        eventosForm();
    });

    function iniciarForm() {
        btnEnviar.disabled = true;
        btnEnviar.classList.add('btn-disabled');
    }

    function eventosForm() {
        inputEmpresa.addEventListener('blur', validarFormCliente);
        inputTelefono.addEventListener('blur', validarFormCliente);
        inputNIT.addEventListener('blur', validarFormCliente);
        inputCorreo.addEventListener('blur', validarFormCliente);
        inputContacto.addEventListener('blur', validarFormCliente);
        inputCargo.addEventListener('blur', validarFormCliente);
        inputDireccion.addEventListener('blur', validarFormCliente);
        inputCiudad.addEventListener('blur', validarFormCliente);
        inputMensaje.addEventListener('input', validarFormCliente);
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
    
    function validarFormCliente(e) {
        
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

        if(er.test(inputCorreo.value) && inputEmpresa.value !== '' && inputTelefono.value !== '' && inputNIT.value !== '' && inputContacto.value !== '' && inputCargo.value !== '' && inputDireccion.value !== '' && inputCiudad.value !== '' && inputMensaje.value !== ''){
            btnEnviar.disabled = false;
            btnEnviar.classList.remove('btn-disabled');           

        } else {
            btnEnviar.disabled = true;
            btnEnviar.classList.add('btn-disabled');
        }
    }
})();