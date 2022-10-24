<?php

function usuario_logueado(){
    if(!revisar_login()){
        echo '<script>alert("Inicia sesion para poder acceder");window.location="../index.php";</script>';
        exit();
    }
}

function revisar_login(){
    if(isset($_SESSION['usuarioad'])){
        return true;
    }
    else{
        return false;
    }
}
session_start();
usuario_logueado();