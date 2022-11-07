<?php
include_once 'funciones/funciones.php';
$nc=$_GET['id'];
$validar_relaciones=mysqli_query($conexion, "SELECT * FROM eventos_participantes WHERE nc='$nc'");
if (mysqli_num_rows($validar_relaciones)>0){
    echo '<script>alert("No se puede eliminar, el alumno tiene eventos registrados");window.location="pag_admin_tables_alumnos.php";</script>';
}
else{
    $eliminar_reg ="DELETE FROM registro_alumnos_oyentes WHERE nc_reg='$nc'";
    $ejecutarEliminar_reg = mysqli_query($conexion, $eliminar_reg);
    $eliminar ="DELETE FROM alumnos WHERE nc='$nc'";
    $ejecutarEliminar = mysqli_query($conexion, $eliminar);
    if ($ejecutarEliminar){
        echo '<script>alert("Se ha eliminado correctamente");window.location="pag_admin_tables_alumnos.php";</script>';
    }
    else{
        echo '<script>alert("No se pudo eliminar, intentalo de nuevo");window.location="pag_admin_tables_alumnos.php";</script>';
    }
}
?>