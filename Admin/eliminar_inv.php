<?php
include_once 'funciones/funciones.php';
$email=$_GET['email'];
$eliminar ="DELETE FROM curriculum WHERE email='$email'";
$ejecutarEliminar = mysqli_query($conexion, $eliminar);
if ($ejecutarEliminar){
    echo '<script>alert("Se ha eliminado correctamente");window.location="pag_admin_tables_inv.php";</script>';
}
else{
    echo '<script>alert("No se pudo eliminar, intentalo de nuevo");window.location="pag_admin_tables_inv.php";</script>';
}
?>