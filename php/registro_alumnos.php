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
    if($nombres == "" || $ap_paterno == "" || $matricula == "" || $semestre == "" || $email == "" || $telefono == "" || $password == "" || $password2 == "" || $participacion == ""){
        echo '<script>alert("No se permiten campos vacios");window.location="../index.php";</script>';
        exit();
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

    //verificar que el correo y el nc no este registrado
    $verificar_nc= mysqli_query($conexion, "SELECT * FROM alumnos WHERE nc='$matricula'");
    if (mysqli_num_rows($verificar_nc)>0){
        echo '<script>alert("Este numero de control ya está registrado");window.location="../index.php";</script>';
        exit();
        mysqli_close($conexion);
    }
    $verificar_correo1= mysqli_query($conexion, "SELECT * FROM docente WHERE email_doc='$email'");
    $verificar_correo2= mysqli_query($conexion, "SELECT * FROM alumnos WHERE email_al='$email'");
    $verificar_correo3= mysqli_query($conexion, "SELECT * FROM externos WHERE email_ex='$email'");
    if (mysqli_num_rows($verificar_correo1)>0 || mysqli_num_rows($verificar_correo2)>0 || mysqli_num_rows($verificar_correo3)>0){
        echo '<script>alert("Este correo ya está registrado, intenta con otro diferente");window.location="../index.php";</script>';
        exit();
        mysqli_close($conexion);
    }
    //ejecutar la consulta si 
    if ($password==$password2 && $ban==true){
        //Encriptamiento de contraseña
        $contra_encriptada=hash('sha512',$password);
        $ejecutar = mysqli_query($conexion, $query);
        $query="INSERT INTO alumnos (nombres, ap_paterno, ap_materno, nc, semestre, email_al, pass, participacion, telefono) 
        VALUES ('$nombres', '$ap_paterno', '$ap_materno', '$matricula', '$semestre', '$email', '$contra_encriptada', '$participacion', '$telefono')";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Te has registrado correctamente, ya puedes iniciar sesion");window.location="../index.php";</script>';
        }
        else{
            echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="../index.php";</script>';
        }
    }
    else{
        echo '<script>alert("Las contraseñas no coinciden");window.location="../index.php";</script>';
    }
    mysqli_close($conexion);
?>