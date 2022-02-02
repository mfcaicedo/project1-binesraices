document.addEventListener('DOMContentLoaded', function(){

    eventListener();
    darkMode();
})
//Funciones

function darkMode(){

    //Funcionalidad para que se active el modo claro o oscuro según las preferencias del usuario en la configuracion 
    //del sistema y también para que se haga de manera automatica 
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');//revisa la configuracion del sistema

    if (prefiereDarkMode.matches) {//devuelve en false or true
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    //Usaré un listener para que la página escuche automaticamente las preferencias del sistema
    prefiereDarkMode.addEventListener('change', function(){
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });


    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click',function(){
        
        if (document.body.classList.contains('dark-mode')) {
            document.body.classList.remove('dark-mode');                    
        } else {
            document.body.classList.add('dark-mode');
        }

       // document.body.classList.toggle('dark-mode');
    });
}

function eventListener(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

}
function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }
    //una manera de hacer lo anterior es de la siguiente manera
    // navegacion.classList.toggle('mostrar')
}
