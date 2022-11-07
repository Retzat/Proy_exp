<?php
include_once 'funciones/funciones.php';
$rfc=$_GET['rfc'];
$validar_relaciones=mysqli_query($conexion, "SELECT * FROM eventos WHERE asesor='$rfc'");
if (mysqli_num_rows($validar_relaciones)>0){
    echo '<script>alert("No se puede eliminar, el docente tiene eventos registrados");window.location="pag_admin_tables_alumnos.php";</script>';
}
else{
    
    $eliminar ="DELETE FROM docente WHERE rfc='$rfc'";
    $ejecutarEliminar = mysqli_query($conexion, $eliminar);
    if ($ejecutarEliminar){
        echo '<script>alert("Se ha eliminado correctamente");window.location="pag_admin_tables_alumnos.php";</script>';
    }
    else{
        echo '<script>alert("No se pudo eliminar, intentalo de nuevo");window.location="pag_admin_tables_alumnos.php";</script>';
    }
}
?>