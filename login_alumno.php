<?php
    session_start();
    include'conexion_be.php';

    $email=$_POST['correo_login'];
    $pass=$_POST['pass_login'];
    //echo $email.$pass;
    //se encripta para que coincida con la encriptada
    $contra_encriptada=hash('sha512',$pass);
    $validar_login_al=mysqli_query($conexion, "SELECT * FROM alumnos WHERE email_al='$email' AND pass='$contra_encriptada'");
    $validar_login_do=mysqli_query($conexion, "SELECT * FROM docente WHERE email_doc='$email' AND pass='$contra_encriptada'");
    $validar_login_ex=mysqli_query($conexion, "SELECT * FROM externos WHERE email_ex='$email' AND pass='$contra_encriptada'");
    if(mysqli_num_rows($validar_login_al)>0){
        $_SESSION['usuario']=$email;
        echo '<script>alert("Inicia sesion para poder acceder");window.location="pagina_qr.php";</script>';
        header("location: pagina_qr.php");
        //echo '<script>window.location="pagina_qr.php";</script>';
    }
    else if(mysqli_num_rows($validar_login_do)>0){
        $_SESSION['usuarioad']=$email;
        header("location: pagina_adm.php");
    }
    else if(mysqli_num_rows($validar_login_do)>0){
        $_SESSION['usuario_ex']=$email;
        header("location: pagina_qr.php");
    }
    else{
        echo '<script>alert("Usuario o contraseña incorrectos");window.location="index.php";</script>';
        exit();
    }
?>