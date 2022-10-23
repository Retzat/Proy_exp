<?php
include("conexion_be.php");

$ban=false;
$nombres=$_POST['nombres_do'];
$ap_paterno=$_POST['ap_pat_do'];
$ap_materno=$_POST['ap_mat_do'];
$rfc=$_POST['rfc_do'];    
$telefono=$_POST['tel_do'];
$email=$_POST['email_do'];
$password=$_POST['pass1_do'];
$password2=$_POST['pass2_do'];
$grado=$_POST['grado'];   
$puesto=$_POST['puesto'];
//aseguramos que no haya campos vacios
if($nombres == "" || $ap_paterno == "" || $ap_materno == "" || $rfc == "" || $email == "" || $telefono == "" || $password == "" || $password2 == ""|| $grado == "" || $puesto == ""){
    echo '<script>alert("No se permiten campos vacios");window.location="index.php";</script>';
}else{
    $ban=true;
}
//verificar que el correo y el nc no este registrado
$verificar_nc= mysqli_query($conexion, "SELECT * FROM docente WHERE rfc='$rfc'");
if (mysqli_num_rows($verificar_nc)>0){
    echo '<script>alert("Este RFC ya está registrado");window.location="index.php";</script>';
    exit();
    mysqli_close($conexion);
}
$verificar_correo1= mysqli_query($conexion, "SELECT * FROM docente WHERE email_doc='$email'");
$verificar_correo2= mysqli_query($conexion, "SELECT * FROM alumnos WHERE email_al='$email'");
$verificar_correo3= mysqli_query($conexion, "SELECT * FROM externos WHERE email_ex='$email'");
if (mysqli_num_rows($verificar_correo1)>0 || mysqli_num_rows($verificar_correo2)>0 || mysqli_num_rows($verificar_correo3)>0){
    echo '<script>alert("Este correo ya está registrado, intenta con otro diferente");window.location="index.php";</script>';
    exit();
    mysqli_close($conexion);
}
//ejecutar la consulta si 
if ($password==$password2 && $ban==true){
    //Encriptamiento de contraseña
    $contra_encriptada=hash('sha512',$password);
    $query="INSERT INTO docente (nombres, ap_paterno, ap_materno, puesto, rfc, grado, email_doc, telefono, pass, permiso) 
    VALUES ('$nombres', '$ap_paterno', '$ap_materno',$puesto, '$rfc', '$grado', '$email','$telefono', '$contra_encriptada', '0')";
    $ejecutar = mysqli_query($conexion, $query);
    if($ejecutar){
        echo '<script>alert("Se ha registrado correctamente, por favor, espere que un administrador acepte su registro");window.location="index.php";</script>';
    }
    else{
        echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="index.php";</script>';
    }
}
else{
    echo '<script>alert("Las contraseñas no coinciden");window.location="index.php";</script>';
} 
mysqli_close($conexion);   
