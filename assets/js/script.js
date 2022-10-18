
//se le asigna una funcion al boto 
document.getElementById("btn_login_al").addEventListener("click", registro_alumnos);
document.getElementById("btn_login_do").addEventListener("click", registro_docentes);
document.getElementById("btn_login_ex").addEventListener("click", registro_externos);
document.getElementById("btn_login").addEventListener("click", mostrar_login);

window.addEventListener("resize", anchoPagina); //esto controla el efecto de la ventena

//declaracion de variables
var contenedor_Form = document.querySelector(".contenedor_formularios");

var lim_Login = document.querySelector(".limite_login");
var lim_Reg = document.querySelector(".limite_registro");

var formulario_login = document.querySelector(".formulario_login");
var formulario_registro_al = document.querySelector(".formulario_registro_alumnos");
var formulario_registro_do = document.querySelector(".formulario_registro_docentes");
var formulario_registro_ex = document.querySelector(".formulario_registro_externos");

//funcion para que la curp y el rfc no acepten caracteres especiales
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


/**Funcion hecha para automatizar el responsive */
function anchoPagina(){
    if (window.innerWidth > 850){
        lim_Login.style.display="block";
        lim_Reg.style.display="block";
    }
    else{
        lim_Reg.style.display="block";
        lim_Reg.style.opacity="1";
        lim_Login.style.display="none";
        formulario_login.style.display="block";
        formulario_registro_al.style.display="none";
        formulario_registro_do.style.display="none";
        formulario_registro_ex.style.display="none";
        contenedor_Form.style.left="0px";
    }
}

anchoPagina(); //hace que la funcion se ejecute cuando se recarga la pagina

/* estos controlan la animacion login registro, estan configurados para actuar cuando la pagina se hace pequeña */
function mostrar_login(){
    if(window.innerWidth>850){
        formulario_login.style.display="block";
        formulario_registro_al.style.display = "none";
        formulario_registro_do.style.display = "none";
        formulario_registro_ex.style.display = "none";
        contenedor_Form.style.left = "10px";
        formulario_login.style.display="block";
        lim_Reg.style.opacity="1";
        lim_Login.style.opacity="0";
    }
    else{
        formulario_login.style.display="block";
        formulario_registro_al.style.display = "none";
        formulario_registro_do.style.display = "none";
        formulario_registro_ex.style.display = "none";
        contenedor_Form.style.left = "0px";
        formulario_login.style.display="block";
        lim_Reg.style.display="block";
        lim_Login.style.display="none";
    }

    
}

function registro_alumnos(){
    if(window.innerWidth>850){
        formulario_registro_al.style.display = "block";
        formulario_registro_do.style.display = "none";
        formulario_registro_ex.style.display = "none";
        contenedor_Form.style.left = "480px";
        formulario_login.style.display="none";
        lim_Reg.style.opacity="0";
        lim_Login.style.opacity="1";
    }
    else{
        formulario_registro_al.style.display = "block";
        formulario_registro_do.style.display = "none";
        formulario_registro_ex.style.display = "none";
        contenedor_Form.style.left = "0px";
        formulario_login.style.display="none";
        lim_Reg.style.display="none";
        lim_Login.style.display="block";
        lim_Login.style.opacity="1";
    }

}

function registro_docentes(){
    if(window.innerWidth>850){
        formulario_registro_al.style.display = "none";
        formulario_registro_do.style.display = "block";
        formulario_registro_ex.style.display = "none";
        contenedor_Form.style.left = "480px";
        formulario_login.style.display="none";
        lim_Reg.style.opacity="0";
        lim_Login.style.opacity="1";
    }
    else{
        formulario_registro_al.style.display = "block";
        formulario_registro_do.style.display = "none";
        formulario_registro_ex.style.display = "none";
        contenedor_Form.style.left = "0px";
        formulario_login.style.display="none";
        lim_Reg.style.display="none";
        lim_Login.style.display="block";
        lim_Login.style.opacity="1";
    }

}

function registro_externos(){
    if(window.innerWidth>850){
        formulario_registro_al.style.display = "none";
        formulario_registro_do.style.display = "none";
        formulario_registro_ex.style.display = "block";
        contenedor_Form.style.left = "480px";
        formulario_login.style.display="none";
        lim_Reg.style.opacity="0";
        lim_Login.style.opacity="1";
    }
    else{
        formulario_registro_al.style.display = "block";
        formulario_registro_do.style.display = "none";
        formulario_registro_ex.style.display = "none";
        contenedor_Form.style.left = "0px";
        formulario_login.style.display="none";
        lim_Reg.style.display="none";
        lim_Login.style.display="block";
        lim_Login.style.opacity="1";
    }
}