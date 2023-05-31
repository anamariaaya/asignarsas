//Variables
const ciudad = {
    id: '',
    nombre: '',
    activa: ''
}

const checkCiudad = document.querySelectorAll('.check-ciudad');

document.addEventListener('DOMContentLoaded', () => {
    leerCheckbox();
});

function leerCheckbox() {
    checkCiudad.forEach(check => {
        check.addEventListener('click', e => {
            guardarSeleccion(e);
        });
    });
}

function guardarSeleccion(e) {
    ciudad.id = e.target.id;
    ciudad.nombre = e.target.dataset.nombre;
    if(e.target.value === '1'){
        ciudad.activa = '0';
    } else {
        ciudad.activa = '1';
    }

    enviarSeleccion();
}

async function enviarSeleccion() {
    const { id, nombre, activa } = ciudad;
    const infoCiudad = new FormData();
    
    infoCiudad.append('id', id);
    infoCiudad.append('nombre', nombre);
    infoCiudad.append('activa', activa);

    try{
        const url = '/api/ciudad';

        const respuesta = await fetch(url, {
            method: 'POST',
            body: infoCiudad
        });

        const resultado = await respuesta.json();
        if(resultado.resultado){
            Swal.fire({
                title: 'Ciudad Actualizada',
                text: 'Ya puedes revisar tus cambios',
                icon: 'success'
            }).then( () => {
                window.location.reload();
            })
        };
    } catch(error) {
        console.log(error);
        Swal.fire({
            title: 'Error',
            text: 'Ciudad no actualizada. Intenta de nuevo o contacta al administrador',
            icon: 'error'
        });
    }
}