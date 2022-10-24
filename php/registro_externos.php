<?php
    include("../conexion_be.php");
    $ban=false;
    $nombres=$_POST['nombres_ex'];
    $ap_paterno=$_POST['ap_pat_ex'];
    $ap_materno=$_POST['ap_mat_ex'];
    $procedencia=$_POST['procedencia_ex'];    
    $telefono=$_POST['tel_ex'];
    $email=$_POST['email_ex'];
    $password=$_POST['pass1_ex'];
    $password2=$_POST['pass2_ex'];
    $participacion=$_POST['participacion_ex'];
    //aseguramos que no haya campos vacios
    if($nombres == "" || $ap_paterno == "" || $procedencia == "" || $email == "" || $telefono == "" || $password == "" || $password2 == "" || $participacion == ""){
        echo '<script>alert("No se permiten campos vacios");window.location="../index.php";</script>';
        exit();
    }else{
        $ban=true;
    }    
    if ($participacion=="oyente"){
        $participacion=0;
    }
    else{
        $participacion=1;
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
        $query="INSERT INTO externos (nombres, ap_paterno, ap_materno, procedencia, email_ex, pass, participacion, telefono) 
        VALUES ('$nombres', '$ap_paterno', '$ap_materno', '$procedencia', '$email', '$contra_encriptada', '$participacion', '$telefono')";
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