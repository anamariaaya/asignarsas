document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp(){
    eventListeners();
    if(botonDarkMode){
        darkMode();
    }
    inboxColor();
    showPassword();
    subMenu();
}

//Variables
let passbtn = document.querySelector('#passview');
const pass = document.querySelector('#password');
let slides = document.getElementsByClassName("slide");
let dots = document.getElementsByClassName("dot");
const botonDarkMode = document.querySelector('.dark-mode-boton');

function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark');

    //Si tiene dark mode en el navegador
    if(prefiereDarkMode.matches){
        document.body.classList.add('.dark-mode');
    } else{
        document.body.classList.remove('.dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('.dark-mode');
        } else{
            document.body.classList.remove('.dark-mode');
        }
    });

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
        botonDarkMode.classList.toggle('fa-moon');
        botonDarkMode.classList.toggle('fa-sun');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('modo-oscuro','true');
        } else {
            localStorage.setItem('modo-oscuro','false');
        }
    });

    if (localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
        botonDarkMode.classList.remove('fa-moon');
        botonDarkMode.classList.add('fa-sun');
    } else {
        document.body.classList.remove('dark-mode');
        botonDarkMode.classList.remove('fa-sun');
        botonDarkMode.classList.add('fa-moon');
    }
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');  

    if(mobileMenu){
        mobileMenu.addEventListener('click', navegacionResponsive);   
    }
}

function navegacionResponsive(){
    const barra = document.querySelector('.barra');
    const navegacion = document.querySelector('.navegacion');
    const btnMenu = document.querySelector('.btnMenu');

    navegacion.classList.toggle('mostrar');
    barra.classList.toggle('no-borde');
    btnMenu.classList.toggle('fa-bars');
    btnMenu.classList.toggle('fa-xmark');
}

function inboxColor(){
    const mensaje = document.querySelectorAll(".grid-inbox");
    mensaje.forEach(function(mensaje){
        if(mensaje.dataset.status == 1){
                mensaje.classList.add('leido');
        };
    });
}

function showPassword(){
    if(passbtn){
        
        passbtn.onclick = () => {
            if(passbtn.checked === true){
                pass.type = 'text'
            } else{
                pass.type = 'password'
            }        
        };
    }
}

function subMenu(){
    const submenuBtn = document.querySelectorAll('.submenu-btn');

    submenuBtn.forEach(function(submenuBtn){        
        submenuBtn.addEventListener('mouseover', (e) => {
            const id = e.target.id
            const submenu = document.querySelector('#menu-' + id);

            if(submenu){
                submenu.classList.add('ver-menu');

                submenuBtn.addEventListener('mouseleave', (e) => {
                    submenu.classList.remove('ver-menu');
                });

                submenu.addEventListener('mouseleave', (e) => {
                    submenu.classList.remove('ver-menu');
                });
            }            
        });
    });    
}
