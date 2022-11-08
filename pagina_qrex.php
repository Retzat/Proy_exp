<?php
    session_start();
    //echo "entre exitosamente";
    if(!isset($_SESSION['usuario_ex'])){
        //echo "entre exitosamente a donde no debia";
        echo '<script>alert("Inicia sesion para poder acceder");window.location="index.php";</script>';
        //header("location: index.php");
        session_destroy();
        die();
    }
    else{
        include_once 'conexion_be.php';
        $email=$_SESSION['usuario_ex'];
        $sql = "SELECT * FROM externos WHERE email_ex = '$email'";
        $resultado = $conexion->query($sql);
        $us_externo = $resultado->fetch_assoc();
        //echo "<pre>";
        //var_dump($docente);
        //echo "</pre>";    
        $nombres = $us_externo['nombres'];
        $ap_paterno = $us_externo['ap_paterno'];
        $ap_materno = $us_externo['ap_materno'];
        $procedencia = $us_externo['procedencia'];
        $email_ex = $us_externo['email_ex'];
        $telefono = $us_externo['telefono'];
        $participacion = $us_externo['participacion'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo_user.css" />
    <script src="https://gorosito.red/componentes"></script>
    <title>Codigo QR de Estudiante</title>
</head>
<body>
    <div class="header">
        <h1 class="user-name">Bienvenido/a</h1>
        <h1 class="user-name">Hola <?php echo $nombres." ".$ap_paterno?></h1>
        <codigo-qr>
            <?php 
            echo $email_ex;
            ?>
        </codigo-qr>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <ul class="funciones">
        <li>
            <i class="icon cs"></i>
            <a href="cerrar_sesion.php">Cerrar sesion</a>
        </li>
        <li>
        <i class="icon fb"></i>
            <a href="https://www.facebook.com/profile.php?id=100063955207064">Facebook</a>
        </li>
    </ul>
    <div class="about">
    <h2>Información para el asistente</h2>
        <P>Conserva este código QR, pues se te pedirá durante el evento</P>
        <P>Toma una foto con tu celular o imprímelo, es parte del registro de asistencia</P>
    </div>
</body>
</html>