<?php

    include("conexion_be.php");

    $ban=false;
    $nombres=$_POST['nombres_al'];
    $ap_paterno=$_POST['ap_pat_al'];
    $ap_materno=$_POST['ap_mat_al'];
    $matricula=$_POST['num_control_al'];
    $semestre=$_POST['semestre_al'];
    $email=$_POST['email_al'];
    $telefono=$_POST['tel_al'];
    $password=$_POST['pass1_al'];
    $password2=$_POST['pass2_al'];
    $participacion=$_POST['participacion_al'];
    //aseguramos que no haya campos vacios
    if($nombres == "" || $ap_paterno == "" || $ap_materno == "" || $matricula == "" || $semestre == "" || $email == "" || $telefono == "" || $password == "" || $password2 == "" || $participacion == ""){
        echo '<script>alert("No se permiten campos vacios")</script>';
    }else{
        $ban=true;
    }    
    //Aqui se hace el cambio a una varable int para poder insertarla en la base de datos

    if ($participacion=="oyente"){
        $participacion=0;
    }
    else{
        $participacion=1;
    }
    //echo $nombres.$ap_paterno.$ap_materno.$matricula.$semestre.$email.$telefono.$password.$password2.$participacion;


    if ($password==$password2 && $ban==true){
        $query="INSERT INTO alumnos (nombres, ap_paterno, ap_materno, nc, semestre, email_al, pass, participacion, telefono) 
        VALUES ('$nombres', '$ap_paterno', '$ap_materno', '$matricula', '$semestre', '$email', '$password', '$participacion', '$telefono')";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Te has registrado correctamente, ya puedes iniciar sesion");window.location="index.php";</script>';
        }
    }
    else{
        echo '<script>alert("Las contraseñas no coinciden")</script>';
    }