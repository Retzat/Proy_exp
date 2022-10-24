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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hola</h1>
    <a href="cerrar_sesion.php">Cerrar sesion</a>
</body>
</html>