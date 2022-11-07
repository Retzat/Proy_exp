<?php
include_once 'funciones/funciones.php';
$identificador=$_GET['id'];
$eliminar ="DELETE FROM eventos_participantes WHERE id_evento='$identificador'";
$ejecutarEliminar = mysqli_query($conexion, $eliminar);
$eliminar_evento ="DELETE FROM eventos WHERE identificador='$identificador'";
$ejecutarEliminar = mysqli_query($conexion, $eliminar_evento);
if ($ejecutarEliminar){
    echo '<script>alert("Se ha eliminado correctamente");window.location="pag_admin_tables_eventos.php";</script>';
}
else{
    echo '<script>alert("No se pudo eliminar, intentalo de nuevo");window.location="pag_admin_tables_eventos.php";</script>';
}
?>