<?php
include_once 'funciones/funciones.php';
$identificador=$_GET['id'];
$eliminar ="DELETE FROM eventos_externos WHERE identificador='$identificador'";
$ejecutarEliminar = mysqli_query($conexion, $eliminar);
if ($ejecutarEliminar){
    echo '<script>alert("Se ha eliminado correctamente");window.location="pag_admin_tables_eventos.php";</script>';
}
else{
    echo '<script>alert("No se pudo eliminar, intentalo de nuevo");window.location="pag_admin_tables_eventos.php";</script>';
}
?>