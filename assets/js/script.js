
//se le asigna una funcion al boto 
document.getElementById("btn_login_al").addEventListener("click", registro_alumnos);
document.getElementById("btn_login_do").addEventListener("click", registro_docentes);
document.getElementById("btn_login_ex").addEventListener("click", registro_externos);
document.getElementById("btn_login").addEventListener("click", mostrar_login);
//declaracion de variables
var contenedor_Form = document.querySelector(".contenedor_formularios");

var lim_Login = document.querySelector(".limite_login");
var lim_Reg = document.querySelector(".limite_registro");

var formulario_login = document.querySelector(".formulario_login");
var formulario_registro_al = document.querySelector(".formulario_registro_alumnos");
var formulario_registro_do = document.querySelector(".formulario_registro_docentes");
var formulario_registro_ex = document.querySelector(".formulario_registro_externos");

function mostrar_login(){
    formulario_login.style.display="block";
    formulario_registro_al.style.display = "none";
    formulario_registro_do.style.display = "none";
    formulario_registro_ex.style.display = "none";
    contenedor_Form.style.left = "10px";
    formulario_login.style.display="block";
    lim_Reg.style.opacity="1";
    lim_Login.style.opacity="0";
}

function registro_alumnos(){
    formulario_registro_al.style.display = "block";
    formulario_registro_do.style.display = "none";
    formulario_registro_ex.style.display = "none";
    contenedor_Form.style.left = "480px";
    formulario_login.style.display="none";
    lim_Reg.style.opacity="0";
    lim_Login.style.opacity="1";

}

function registro_docentes(){
    formulario_registro_al.style.display = "none";
    formulario_registro_do.style.display = "block";
    formulario_registro_ex.style.display = "none";
    contenedor_Form.style.left = "480px";
    formulario_login.style.display="none";
    lim_Reg.style.opacity="0";
    lim_Login.style.opacity="1";

}

function registro_externos(){
    formulario_registro_al.style.display = "none";
    formulario_registro_do.style.display = "none";
    formulario_registro_ex.style.display = "block";
    contenedor_Form.style.left = "480px";
    formulario_login.style.display="none";
    lim_Reg.style.opacity="0";
    lim_Login.style.opacity="1";

}