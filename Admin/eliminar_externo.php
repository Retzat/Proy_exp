<?php
include_once 'funciones/funciones.php';
$email=$_GET['email'];
$validar_relaciones=mysqli_query($conexion, "SELECT * FROM eventos_externos WHERE email='$email'");
if (mysqli_num_rows($validar_relaciones)>0){
    echo '<script>alert("No se puede eliminar, la persona tiene eventos registrados");window.location="pag_admin_tables_alumnos.php";</script>';
}
else{
    $eliminar_reg ="DELETE FROM registro_externos WHERE email_registro='$email'";
    $ejecutarEliminar_reg = mysqli_query($conexion, $eliminar_reg);
    $eliminar_cur ="DELETE FROM curriculum WHERE email='$email'";
    $ejecutarEliminar_reg = mysqli_query($conexion, $eliminar_cur);
    $eliminar ="DELETE FROM externos WHERE email_ex='$email'";
    $ejecutarEliminar = mysqli_query($conexion, $eliminar);
    if ($ejecutarEliminar){
        echo '<script>alert("Se ha eliminado correctamente");window.location="pag_admin_tables_alumnos.php";</script>';
    }
    else{
        echo '<script>alert("No se pudo eliminar, intentalo de nuevo");window.location="pag_admin_tables_alumnos.php";</script>';
    }
}
?>