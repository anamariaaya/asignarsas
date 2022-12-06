//Variables para comprobación REGEX
const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

const num = /^[0-9]+$/;

//Variables para ciudades
const ofertas= document.querySelector('#ciudades');
const navCiudades = document.createElement('NAV');

//Variables para ofertas
const gridVacantes = document.querySelector('.grid-vacantes');
const idURL = window.location.search.split('=')[1];
const tituloSpan = document.querySelector('#ciudad-vacante');
const linkCiudad = document.querySelector('#link-ciudad');
const infoOferta = document.querySelector('.info-oferta');
const infoVacante = document.querySelector('#info-vacante');
const infoVacante2 = document.querySelector('#info-vacante2');
const ciudadCargo = document.querySelector('#ciudad-cargo');
const divIndex = document.querySelector('.grid-index-v');

//Variables para el formulario de postulación
const formPostulacion = document.querySelector('#form-postulacion');
const fieldset = document.querySelector('#fieldset');
const postularCargo = document.querySelector('#postular-cargo');
const identificacion = document.querySelector('#identificacion');
const nombreCandidato = document.querySelector('#nombre-candidato');
const apellidoCandidato = document.querySelector('#apellido-candidato');
const edadCandidato = document.querySelector('#edad-candidato');
const telefonoCandidato = document.querySelector('#telefono-candidato');
const emailCandidato = document.querySelector('#email-candidato');
const ciudadCandidato = document.querySelector('#ciudad-candidato');
const hdvCandidato = document.querySelector('#hdv');
const btnPostular = document.querySelector('#btn-postular');
const candidato = {
    id: null,
    identificacion: '',
    nombre: '',
    apellido: '',
    edad: '',
    telefono: '',
    email: '',
    ciudad: '',
    hdv: '',
    idOferta: idURL,
    fechaRec: null
};


document.addEventListener('DOMContentLoaded', () => {
    initApi();
});

function initApi() {    
    consultaCiudades();    
    consultaOfertas();
}

//Funciones globales
function currency(number) {
    var str = number.toString().split(".");
    str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return "$" + str.join(".");
};

//Api Ofertas
async function consultaCiudades(){
    try{
        const resultado = await fetch('http://localhost:3000/api/ciudades');
        const datos = await resultado.json();
        mostrarCiudades(datos);
        tituloCiudad(datos);

    }catch(error){
        console.log(error);
    }
}

function mostrarCiudades(ciudades){
    if(ofertas){
        mostrarCiudad(ciudades);
        const buscarCiudad = document.querySelector('#buscar-ciudad');
        buscarCiudad.addEventListener('input', e => {
            const filtro = ciudades.filter(ciudad => ciudad.nombre.toLowerCase().includes((e.target.value).toLowerCase()));
            
            if(e.target.value.length > 1){
                mostrarCiudad(filtro);
            }else{
                mostrarCiudad(ciudades);
            }
        });      
    }    
}

function mostrarCiudad(ciudades){
    while(navCiudades.firstChild){
        navCiudades.removeChild(navCiudades.firstChild);
    }
    ciudades.forEach(ciudad => {
        const {id, nombre} = ciudad;
        //DOM Scripting
        //Generar el ícono
        const iconoOferta = document.createElement('i');
        iconoOferta.classList.add('fa', 'fa-solid', 'fa-briefcase', 'no-click');

        //Generar el nombre de la ciudad
        const nombreCiudad = document.createElement('P');
        nombreCiudad.textContent = nombre;
        nombreCiudad.classList.add('no-click');

        //Generar el div de la ciudad
        const divCiudad = document.createElement('DIV');
        divCiudad.classList.add('iconos', 'ofertas-icon');

        //Asignar el icono y el nombre a la ciudad
        divCiudad.appendChild(iconoOferta);
        divCiudad.appendChild(nombreCiudad);

        //Generar el enlace a la oferta
        const enlaceCiudad = document.createElement('A');
        enlaceCiudad.appendChild(divCiudad);
        enlaceCiudad.href = `/vacantes?id=${id}`;        
        
        navCiudades.appendChild(enlaceCiudad);
        ofertas.appendChild(navCiudades);
    });
}

function tituloCiudad(ciudades){
    if(tituloSpan){
        ciudades.forEach(ciudad => {
            const {id, nombre} = ciudad;
            if(id === idURL){
                tituloSpan.textContent = nombre;
            }
        });
    }
}

async function consultaOfertas(){
    try{
        const resultado = await fetch('http://localhost:3000/api/vacantes');
        const datos = await resultado.json();
        ofertasIndex(datos);
        mostrarOfertas(datos);
        detalleVacante(datos);
        postulacionVacante(datos);
    }catch(error){
        console.log(error);
    }
}

//DOM Scripting - Ofertas Index
function ofertasIndex(ofertas){
    if(divIndex){
        ofertas.slice(ofertas.length - 4, ofertas.length).forEach(oferta => {
            const{id, cargo, salario, imagen, ciudad} = oferta;
            
            //Generar el div de la oferta
            const divOferta = document.createElement('DIV');
            divOferta.classList.add('vacante', 'vacante-index');

            //Generar la imagen de la oferta
            const imagenOferta = document.createElement('IMG');
            imagenOferta.src = `/images/${imagen}`;
            imagenOferta.alt = `Vacante en: ${ciudad}`;
            imagenOferta.setAttribute('loading', 'lazy');
            
            //Generar el parrafo del cargo
            const cargoParrafo = document.createElement('P');
            //Generar el span del cargo
            const cargoSpan = document.createElement('SPAN');
            cargoSpan.textContent = cargo;
            cargoParrafo.appendChild(cargoSpan);

            //Generar el párrafo del salario
            const salarioParrafo = document.createElement('P');
            salarioParrafo.textContent = currency(salario);

            //Generar el párrafo de la ciudad
            const ciudadParrafo = document.createElement('P');
            ciudadParrafo.textContent = `Ubicación: ${ciudad}`;

            //Generar el enlace a la oferta
            const enlaceOferta = document.createElement('A');
            enlaceOferta.classList.add('btn-vacante');
            enlaceOferta.textContent = 'Ver oferta';
            enlaceOferta.href = `/vacante?id=${id}`;

            //Asignar los elementos al div de la oferta
            divOferta.appendChild(imagenOferta);
            divOferta.appendChild(cargoParrafo);
            divOferta.appendChild(salarioParrafo);
            divOferta.appendChild(ciudadParrafo);
            divOferta.appendChild(enlaceOferta);

            //Asignar el div de la oferta al div de las ofertas
            divIndex.appendChild(divOferta);
        });
    }
}

//DOM Scripting Ofertas y vacantes
function mostrarOfertas(ofertas){
    if(gridVacantes){
        //hacer un arreglo con todas las idciudad de las ofertas sin repetir
        const idCiudades = [...new Set(ofertas.map(oferta => oferta.idCiudad))];
        
        //Verificar si el idURL no es igual a alguna de las idCiudades para mostrar una alerta   
        if(idURL){
            if(!idCiudades.includes(idURL)){
                const sinVacantes = document.querySelector('.sin-vacantes');

                const divSinOfertas = document.createElement('DIV');
                divSinOfertas.classList.add('sin-ofertas');
                
                const iconoAlerta = document.createElement('i');
                iconoAlerta.classList.add('fa', 'fa-solid', 'fa-warning');

                const mensajeAlerta = document.createElement('P');
                mensajeAlerta.textContent = 'En este momento no hay vacantes en esta ciudad. Revisa más adelante.';

                divSinOfertas.appendChild(iconoAlerta);
                divSinOfertas.appendChild(mensajeAlerta);

                sinVacantes.appendChild(divSinOfertas);
            }
        }
        mostrarOferta(ofertas);

        const buscarCargo = document.querySelector('#buscar-cargo');
        const buscarSalario = document.querySelector('#buscar-salario');

        buscarSalario.addEventListener('change', () => {            
            const salarioRange = parseInt(buscarSalario.value);
           //filtrar ofertas por salario minimo
            const ofertasFiltradas = ofertas.filter(oferta => oferta.salario >= salarioRange);

            //ordenar las ofertas filtradas de menor a mayor salario
            const ofertasOrdenadas = ofertasFiltradas.sort((a, b) => a.salario - b.salario);

           //mostrar las ofertas filtradas de menor a mayor
            mostrarOferta(ofertasOrdenadas);

        });
        
        buscarCargo.addEventListener('input', e => {
            const cargo = ofertas.filter(oferta => oferta.cargo.toLowerCase().includes(e.target.value.toLowerCase()));

            if(e.target.value.length > 1){
                mostrarOferta(cargo);
            }else{
                mostrarOferta(ofertas);
            }
        });
    }
}

function mostrarOferta(ofertas){
    while(gridVacantes.firstChild){
        gridVacantes.removeChild(gridVacantes.firstChild);
    }

    //DOM Scripting para mostrar las ofertas
    ofertas.forEach(oferta => {
        const{id, cargo, salario, idCiudad, imagen, ciudad} = oferta; 

        if(idURL === idCiudad){
            tituloSpan.textContent = ciudad;
            //Generar la imagen de la oferta
            const imagenOferta = document.createElement('IMG');
            imagenOferta.src = `/images/${imagen}`;
            imagenOferta.setAttribute('alt', `Vacante de ${cargo}`);
            imagenOferta.setAttribute('loading', 'lazy');

            //Generar el nombre del cargo
            const nombreCargo = document.createElement('P');
            const spanCargo = document.createElement('SPAN');
            spanCargo.textContent = cargo;

            //Añadir el Span al P
            nombreCargo.appendChild(spanCargo);

            //Generar el salario
            const salarioOferta = document.createElement('P');
            salarioOferta.textContent = currency(salario);

            //Link para ver la oferta
            const linkOferta = document.createElement('A');
            linkOferta.textContent = 'Ver oferta';
            linkOferta.href = `/vacante?id=${id}`;
            linkOferta.classList.add('btn-vacante');

            //Generar el div de la oferta
            const divOferta = document.createElement('DIV');
            divOferta.classList.add('vacante');

            //Añadir la imagen, el nombre del cargo, el salario y el link a la oferta
            divOferta.appendChild(imagenOferta);
            divOferta.appendChild(nombreCargo);
            divOferta.appendChild(salarioOferta);
            divOferta.appendChild(linkOferta);

            //Añadir la oferta al grid
            gridVacantes.appendChild(divOferta);            
        }
    });
}

function detalleVacante(ofertas){
    if(infoVacante || infoVacante2){
        ofertas.forEach(oferta => {
            const {id, cargo, salario, horario, descripcion, correo, idCiudad, imagen, vencimiento, whatsapp, ciudad} = oferta;
    
            if(idURL === id){
                if(linkCiudad){
                    linkCiudad.href = `/vacantes?id=${idCiudad}`;
                    linkCiudad.dataset.ciudad= idCiudad;
              } 
    
                //generar el título principal
                const tituloPrincipal = document.querySelector('#oferta-actual');
                tituloPrincipal.textContent = `Vacante: ${cargo}`;
    
                //Generar la imagen de fondo del div de la oferta
                infoOferta.style.backgroundImage = `url(/images/${imagen})`;
    
                //**Elementos del div de la izquierda
    
                //Generar la imagen de la oferta
                const imagenOferta = document.createElement('IMG');
                imagenOferta.src = `/images/${imagen}`;
                imagenOferta.setAttribute('alt', `Vacante de ${cargo}`);
                imagenOferta.setAttribute('loading', 'lazy');      
    
                infoVacante.appendChild(imagenOferta);
    
                //**Elementos del Div de la derecha
                
                //Generar un titulo para la ciudad
                const tituloCiudad = document.createElement('H3');
                const spanCiudad = document.createElement('SPAN');
                spanCiudad.textContent= `Ubicación: ${ciudad}`;
                tituloCiudad.appendChild(spanCiudad);  
    
                //Generar el salario del cargo
                const salarioOferta = document.createElement('P');
                salarioOferta.innerHTML = '<span>Salario: </span>' + currency(salario);
    
                //Generar la descripción del cargo
                const descripcionOferta = document.createElement('P');
                descripcionOferta.innerHTML = '<span>Descripción: </span>' + descripcion;
    
                //Generar el horario del cargo
                const horarioOferta = document.createElement('P');
                horarioOferta.innerHTML = '<span>Horario: </span>' + horario;
    
                //Generar el correo del cargo
                const emailOferta = document.createElement('P');
                emailOferta.innerHTML = '<span>Email: </span>' + correo;
    
                //Generar el whatsapp del cargo
                const whatsappOferta = document.createElement('P');
                const linkWhatsapp = document.createElement('A');
                linkWhatsapp.href = `https://wa.me/+57${whatsapp}`;
                linkWhatsapp.setAttribute('target', '_blank');
                const spanWhatsapp = document.createElement('SPAN');
                spanWhatsapp.classList.add('whats');
                spanWhatsapp.textContent = 'O escríbenos por WhatsApp dando click aquí';
                linkWhatsapp.appendChild(spanWhatsapp);
                whatsappOferta.appendChild(linkWhatsapp);
    
                //generar el vencimiento de la oferta
                const vencimientoOferta = document.createElement('P');
                vencimientoOferta.innerHTML = '<span>Esta vacante está disponible hasta el: </span>' + vencimiento;
    
                //Generar el link para postularse
                const linkPostularse = document.createElement('A');
                linkPostularse.textContent = 'Postularse';
                linkPostularse.href = `/postulacion?id=${id}`;
                linkPostularse.classList.add('btn-postularse');
    
                //Añadir los elementos al div de la oferta
                infoVacante2.appendChild(tituloCiudad);
                infoVacante2.appendChild(salarioOferta);
                infoVacante2.appendChild(descripcionOferta);
                infoVacante2.appendChild(horarioOferta);
                infoVacante2.appendChild(emailOferta);
                infoVacante2.appendChild(whatsappOferta);
                infoVacante2.appendChild(vencimientoOferta);
                infoVacante2.appendChild(linkPostularse);           
            } 
       }); 
    }
}

function postulacionVacante(ofertas){
    if(formPostulacion){
        //Comprobar que el idURL exista en el arreglo de ofertas
        const oferta = ofertas.find(oferta => oferta.id === idURL);
        if(!oferta){
            window.location.href = '/ofertas';
        }

        ofertas.forEach(oferta => {
            const {id, cargo, ciudad} = oferta;
    
            if(idURL === id){
                postularCargo.textContent = `Aplicar al cargo de ${cargo} en ${ciudad}`;
            }
            leerPostulacion();
        });
    }
}

function leerPostulacion(){
    if(formPostulacion){
        identificacion.addEventListener('blur', validarCandidato);
        nombreCandidato.addEventListener('blur', validarCandidato);
        apellidoCandidato.addEventListener('blur', validarCandidato);
        edadCandidato.addEventListener('blur', validarCandidato);
        telefonoCandidato.addEventListener('blur', validarCandidato);
        emailCandidato.addEventListener('blur', validarCandidato);
        ciudadCandidato.addEventListener('blur', validarCandidato);
        hdvCandidato.addEventListener('change', validarCandidato, false);
    }
}

function validarCandidato(e){
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

    if(e.target.type === 'number'){
        if(num.test(e.target.value) === false || e.target.value < 18 || e.target.value > 99){
            mostrarError('Edad no válida');
        } 
    }

    if(er.test(emailCandidato.value) && identificacion.value !== '' && nombreCandidato.value !== '' && apellidoCandidato.value !== '' && edadCandidato.value !== '' && ciudadCandidato.value !== '' && telefonoCandidato.value !== '' && hdvCandidato.files.length > 0){
        btnPostular.disabled = false;
        btnPostular.classList.remove('btn-disabled');
        console.log('se puede enviar');
        llenarCandidato();
    }
}

function mostrarError(mensaje){
    const mensajeError = document.createElement('p');
    mensajeError.textContent = mensaje;
    mensajeError.classList.add('alerta', 'alerta__error');

    const errores = document.querySelectorAll('.alerta__error');
    if(errores.length === 0){
        formPostulacion.insertBefore(mensajeError, fieldset);
    }    
}

function llenarCandidato(){
        candidato.identificacion = identificacion.value;
        candidato.nombre = nombreCandidato.value;
        candidato.apellido = apellidoCandidato.value;
        candidato.edad = edadCandidato.value;
        candidato.telefono = telefonoCandidato.value;
        candidato.email = emailCandidato.value;
        candidato.ciudad = ciudadCandidato.value;
        candidato.hdv = hdvCandidato.files[0];
    
    btnPostular.onclick= function(e){
        e.preventDefault();
        //Enviar el candidato a la BD
        enviarCandidato();
    }
}

async function enviarCandidato(){
    const {identificacion, nombre, apellido, edad, telefono, email, ciudad, hdv, idOferta} = candidato;

    const datos = new FormData();
    datos.append('identificacion', identificacion);
    datos.append('nombre', nombre);
    datos.append('apellido', apellido);
    datos.append('edad', edad);
    datos.append('telefono', telefono);
    datos.append('email', email);
    datos.append('ciudad', ciudad);
    datos.append('hdv', hdv);
    datos.append('idOferta', idOferta);

    try{
        const url = 'http://localhost:3000/api/candidatos';

        const response = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const resultado = await response.text();
        if(resultado.resultado){
            Swal.fire({
                title: 'Postulación Enviado',
                text: 'Pronto te contactaremos',
                icon: 'success'
            }).then( () => {
                window.location.reload();
            })
        };

    } catch(error){
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

