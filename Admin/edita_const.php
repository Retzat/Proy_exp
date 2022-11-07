<?php
include_once 'funciones/funciones.php';
$director=$_POST['nombres_dir'];
$graddir=$_POST['grado_dir'];
$date=$_POST['fecha_dir'];
$anio=$_POST['anio_dir'];
if (isset($_POST['mod_con'])){
    $query="UPDATE datos_constancias SET nombre_completo='$director', Fecha='$date', grado='$graddir', anio='$anio'
    WHERE id=1";
    $ejecutar = mysqli_query($conexion, $query);
    if($ejecutar){
        echo '<script>alert("Se han actualizado correctamente los datos");window.location="Reg_DatCert.php";</script>';
    }
    else{
        echo '<script>alert("No se pudo actualizar, intentalo de nuevo");window.location="Reg_DatCert.php";</script>';
    }    
mysqli_close($conexion);
}
?>