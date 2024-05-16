document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
    darkMode();
});

function eventListeners() {
    const menuMobile = document.querySelector('.mobile-menu');
    menuMobile.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    
    if(!navegacion.classList.contains('mostrar')) {
        navegacion.classList.add('mostrar');
    } else {
        navegacion.classList.remove('mostrar');
    }
}

function darkMode() {
    const darkModeSistema = window.matchMedia('(prefers-color-scheme: dark)');

    if(darkModeSistema.matches) {
        document.body.classList.add('dark-mode-body');
    } else {
        document.body.classList.remove('dark-mode-body');
    }

    darkModeSistema.addEventListener('change', function() {
        if(darkModeSistema.matches) {
            document.body.classList.add('dark-mode-body');
        } else {
            document.body.classList.remove('dark-mode-body');
        }
    });

    const btnDarkMode = document.querySelector('.dark-mode');
    btnDarkMode.addEventListener('click', function() {
        if(!document.body.classList.contains('dark-mode-body')) {
            document.body.classList.add('dark-mode-body');
        } else {
            document.body.classList.remove('dark-mode-body');
        }
    });
}

const alertaMensaje = document.querySelector('.alerta.exito');

if(alertaMensaje !== null) {
    setTimeout(() => {
        alertaMensaje.remove();
    }, 2000);
}

const primerAnuncio = document.querySelector('.anuncio-index:nth-child(1)');
const segundoAnuncio = document.querySelector('.anuncio-index:nth-child(2)');
const tercerAnuncio = document.querySelector('.anuncio-index:nth-child(3)');

if(primerAnuncio !== null) {
    primerAnuncio.classList.add('propiedad-uno');
}

if(segundoAnuncio !== null) {
    segundoAnuncio.classList.add('propiedad-dos');
}

if(tercerAnuncio !== null) {
    tercerAnuncio.classList.add('propiedad-tres');
}