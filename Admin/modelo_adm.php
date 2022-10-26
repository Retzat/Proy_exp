<?php
//variables de conexion a ambas funciones
include_once 'funciones/funciones.php';
$ban=false;
$nombres=$_POST['nombres_do'];
$ap_paterno=$_POST['ap_pat_do'];
$ap_materno=$_POST['ap_mat_do'];
$rfcn=$_POST['rfc_do'];    
$telefono=$_POST['tel_do'];
$email=$_POST['email_do'];
$password=$_POST['pass1_do'];
$password2=$_POST['pass2_do'];
$grado=$_POST['grado'];   
$puesto=$_POST['puesto'];
$permiso=$_POST['permiso'];

if (isset($_POST['add_adm'])){
    //die(json_encode($_POST));

    //aseguramos que no haya campos vacios
    if($nombres == "" || $ap_paterno == ""  || $rfc == "" || $email == "" || $telefono == "" || $password == "" || $password2 == ""|| $grado == "" || $puesto == ""){
        echo '<script>alert("No se permiten campos vacios");window.location="reg_adm.php";</script>';
    }else{
        $ban=true;
    }
    //verificar que el correo y el nc no este registrado
    $verificar_nc= mysqli_query($conexion, "SELECT * FROM docente WHERE rfc='$rfc'");
    if (mysqli_num_rows($verificar_nc)>0){
        echo '<script>alert("Este RFC ya está registrado");window.location="reg_adm.php";</script>';
        exit();
        mysqli_close($conexion);
    }
    $verificar_correo1= mysqli_query($conexion, "SELECT * FROM docente WHERE email_doc='$email'");
    $verificar_correo2= mysqli_query($conexion, "SELECT * FROM alumnos WHERE email_al='$email'");
    $verificar_correo3= mysqli_query($conexion, "SELECT * FROM externos WHERE email_ex='$email'");
    if (mysqli_num_rows($verificar_correo1)>0 || mysqli_num_rows($verificar_correo2)>0 || mysqli_num_rows($verificar_correo3)>0){
        echo '<script>alert("Este correo ya está registrado, intenta con otro diferente");window.location="reg_adm.php";</script>';
        exit();
        mysqli_close($conexion);
    }
    //ejecutar la consulta si 
    if ($password==$password2 && $ban==true){
        //Encriptamiento de contraseña
        $contra_encriptada=hash('sha512',$password);
        $query="INSERT INTO docente (nombres, ap_paterno, ap_materno, puesto, rfc, grado, email_doc, telefono, pass, permiso) 
        VALUES ('$nombres', '$ap_paterno', '$ap_materno',$puesto, '$rfc', '$grado', '$email','$telefono', '$contra_encriptada', '1')";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Se ha registrado correctamente, ya puedes iniciar sesion");window.location="reg_adm.php";</script>';
        }
        else{
            echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="reg_adm.php";</script>';
        }
    }
    else{
        echo '<script>alert("Las contraseñas no coinciden");window.location="reg_adm.php";</script>';
    } 
    mysqli_close($conexion);   
}

if (isset($_POST['edit_adm'])){
    //die(json_encode($_POST));
    $password='xxx';
    $password2='xxx';
    //aseguramos que no haya campos vacios
    if($nombres == "" || $ap_paterno == "" || $rfcn == "" || $email == "" || $telefono == "" || $grado == "" || $puesto == "" || $permiso == ""){
        echo '<script>alert("No se permiten campos vacios");window.location="pag_admin_tables.php";</script>';
    }else{
        $ban=true;
    }
    //verificar que el correo y el nc no este registrado
    $sql = "SELECT * FROM docente WHERE email_doc = '$email'";
    $resultado = $conexion->query($sql);
    $docente = $resultado->fetch_assoc();
    $rfc = $docente['rfc'];
    if ($rfc != $rfcn){
        $verificar_nc= mysqli_query($conexion, "SELECT * FROM docente WHERE rfc='$rfc'");
        if (mysqli_num_rows($verificar_nc)>0){
            echo '<script>alert("Este RFC ya está registrado");window.location="pag_admin_tables.php";</script>';
            exit();
            mysqli_close($conexion);
        }
    }else{
    $query="UPDATE docente SET nombres='$nombres', ap_paterno='$ap_paterno', ap_materno='$ap_materno', puesto=$puesto,
    rfc='$rfc', grado='$grado', telefono='$telefono', permiso=$permiso WHERE email_doc='$email'";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Se ha actualizado correctamente el registro");window.location="pag_admin_tables.php";</script>';
        }
        else{
            echo '<script>alert("No se pudo actualizar, intentalo de nuevo");window.location="pag_admin_tables.php";</script>';
        }
    }
    mysqli_close($conexion);   
}
