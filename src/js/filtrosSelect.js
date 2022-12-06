(function(){
    document.addEventListener('DOMContentLoaded', function() {
        if(selectLeidos){
            filtrarLeidos();
        }
        if(selectOfertas){
            filtrarOfertas();
        }
        if(selectCiudad){
            filtrarCiudad();
        }
        if(ciudadBuscar){
            ciudadSearch();
        }
        if(selectUsuario){
            filtrarUsuario();
        }
        if(usuarioBuscar){
            usuarioSearch();
        }
    });

    //Seleccionamos el select de filtros
    const selectLeidos = document.querySelector('#filtro-leidos');
    const selectOfertas = document.querySelector('#filtro-ofertas');
    const selectCiudad = document.querySelector('#filtro-ciudad');
    const selectUsuario = document.querySelector('#filtro-usuario');
    
    const ciudadBuscar = document.querySelector('#ciudad-search');
    const usuarioBuscar = document.querySelector('#usuario-search');

    function filtrarOfertas(){
        selectOfertas.addEventListener('change', e => {
            filtrarSelect(e, 'strcity', '/admin/ofertas' );            
        });
    }

    function filtrarLeidos(){
        //Escuchamos la opción seleccionada
        selectLeidos.addEventListener('change', e => {
            filtrarSelect(e, 'strstatus', '/admin/inbox' );            
        });
    }

    function filtrarCiudad(){
        //Escuchamos la opción seleccionada
        selectCiudad.addEventListener('change', e => {
            filtrarSelect(e, 'strmode', '/admin/ciudades' );            
        });
    }

    function ciudadSearch(){
        ciudadBuscar.addEventListener('blur', e => {
            filtrarSelect(e, 'strsearch', '/admin/ciudades' );
        });
    }

    function filtrarUsuario(){
        //Escuchamos la opción seleccionada
        selectUsuario.addEventListener('change', e => {
            filtrarSelect(e, 'struser', '/admin/usuarios' );            
        });
    }

    function usuarioSearch(){
        usuarioBuscar.addEventListener('blur', e => {
            filtrarSelect(e, 'strsearchus', '/admin/usuarios' );
        });
    }

    function filtrarSelect(e, condicion, url){
        const filtroSeleccionado = e.target.value;
            if(filtroSeleccionado){
                window.location = `?${condicion}=${filtroSeleccionado}`;
                
            } else{
                window.location.href = url;
            }
    }
})();