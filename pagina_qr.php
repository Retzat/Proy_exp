<?php
    session_start();
    //echo "entre exitosamente";
    if(!isset($_SESSION['usuario'])){
        //echo "entre exitosamente a donde no debia";
        echo '<script>alert("Inicia sesion para poder acceder");window.location="index.php";</script>';
        //header("location: index.php");
        session_destroy();
        die();
    }
    else{
        include_once 'conexion_be.php';
        $email=$_SESSION['usuario'];
        $sql = "SELECT * FROM alumnos WHERE email_al = '$email'";
        $resultado = $conexion->query($sql);
        $alumno = $resultado->fetch_assoc();
        //echo "<pre>";
        //var_dump($docente);
        //echo "</pre>";    
        $nombres = $alumno['nombres'];
        $ap_paterno = $alumno['ap_paterno'];
        $ap_materno = $alumno['ap_materno'];
        $nc = $alumno['nc'];
        $semestre = $alumno['semestre'];
        $email_doc = $alumno['email_al'];
        $telefono = $alumno['telefono'];
        $participacion = $alumno['participacion'];
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
            echo $nc;
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
            <a href="cerrar_sesion.php">Cerrar sesión</a>
        </li>
        <li>
        <i class="icon fb"></i>
            <a href="https://www.facebook.com/profile.php?id=100063955207064">Facebook</a>
        </li>
        <?php
        $res=mysqli_query($conexion,"select ruta from certificado where nc_gen='$nc'");
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                $ruta=$row['ruta'];
                //echo $ruta;
            echo '<li>
            <i class="icon fb"></i>
                <a href="Admin/reconocimientos/'.$ruta.'">Certificado</a>
            </li>';
            }
        }
        ?>
    </ul>
    <div class="about">
        <h2>Información para el estudiante</h2>
        <P>Conserva este código QR, pues se te pedirá durante el evento</P>
        <P>Toma una foto con tu celular o imprímelo, es parte del registro de asistencia</P>
    </div>
</body>
</html>
