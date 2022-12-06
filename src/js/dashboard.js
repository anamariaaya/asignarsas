document.addEventListener('DOMContentLoaded', function() {
    if(eliminarMensaje){
        borrarMensaje();
    }
    if(eliminarOferta){
        borrarOferta();
    }
    if(eliminarUsuario){
        borrarUsuario();
    }
});

//variables
const container = document.querySelector('.dashboard__contenido');
const eliminarMensaje = document.querySelectorAll('#eliminar-mensaje');
const eliminarOferta = document.querySelectorAll('#eliminar-oferta');
const eliminarUsuario = document.querySelectorAll('#eliminar-usuario');

//funciones
function borrarMensaje(){
    eliminarMensaje.forEach(boton => {
        boton.addEventListener('click', function(e){
            e.preventDefault();

            $id = e.target.value;
                crearAlerta('/admin/inbox');
        });
    });
}

function borrarOferta(){
    eliminarOferta.forEach(boton => {
        boton.addEventListener('click', function(e){
            e.preventDefault();

            $id = e.target.value;
                crearAlerta('/admin/ofertas/eliminar');
        });
    });
}

function borrarUsuario(){
    eliminarUsuario.forEach(boton => {
        boton.addEventListener('click', function(e){
            e.preventDefault();

            $id = e.target.value;
                crearAlerta('/admin/usuarios/eliminar');
        });
    });
}

function crearAlerta(accion){
    console.log($id);
    const alertaContenedor = document.createElement('div');
    alertaContenedor.classList.add('modal-alerta--activo');
    // alertaContenedor.onclick = cerrarAlerta;

    const alertaDiv = document.createElement('DIV');
    alertaDiv.classList.add('modal-alerta');

    const alertaIcono = document.createElement('I');
    alertaIcono.classList.add('fa-solid', 'fa-circle-exclamation', 'modal-alerta__icono');

    const alertaTitulo = document.createElement('H3');
    alertaTitulo.classList.add('modal-alerta__titulo');
    alertaTitulo.textContent = '¿Estás seguro?';

    const alertaParrafo = document.createElement('P');
    alertaParrafo.classList.add('modal-alerta__parrafo');
    alertaParrafo.textContent = 'Esta acción no se puede deshacer';

    const alertaBotones = document.createElement('DIV');
    alertaBotones.classList.add('modal-alerta__botones');

    const alertaBotonCancelar = document.createElement('BUTTON');
    alertaBotonCancelar.classList.add('modal-alerta__boton', 'modal-alerta__boton--cancelar');
    alertaBotonCancelar.textContent = 'Cancelar';
    alertaBotonCancelar.onclick = cerrarAlerta;

    const alertaBotonEliminar = document.createElement('FORM');
    alertaBotonEliminar.setAttribute('action', accion);
    alertaBotonEliminar.setAttribute('method', 'POST');

    const alertaInput = document.createElement('INPUT');
    alertaInput.setAttribute('type', 'hidden');
    alertaInput.setAttribute('name', 'id');
    alertaInput.setAttribute('value', $id);

    const alertaInput2 = document.createElement('INPUT');
    alertaInput2.setAttribute('type', 'hidden');
    alertaInput2.setAttribute('name', 'tipo');
    alertaInput2.setAttribute('value', 'contacto');

    const alertaInputSubmit = document.createElement('INPUT');
    alertaInputSubmit.setAttribute('type', 'submit');
    alertaInputSubmit.setAttribute('value', 'Eliminar');
    alertaInputSubmit.classList.add('modal-alerta__boton');

    alertaBotonEliminar.appendChild(alertaInput);
    alertaBotonEliminar.appendChild(alertaInput2);
    alertaBotonEliminar.appendChild(alertaInputSubmit);

    //Agregar botones al div de botones
    alertaBotones.appendChild(alertaBotonCancelar);
    alertaBotones.appendChild(alertaBotonEliminar);

    //Agregar elementos en el DIV alerta
    alertaDiv.appendChild(alertaIcono);
    alertaDiv.appendChild(alertaTitulo);
    alertaDiv.appendChild(alertaParrafo);
    alertaDiv.appendChild(alertaBotones);

    alertaContenedor.appendChild(alertaDiv);
    container.appendChild(alertaContenedor);    
}

function cerrarAlerta(){
    const alerta = document.querySelector('.modal-alerta--activo');
    if(alerta){
        alerta.remove();
    }
}