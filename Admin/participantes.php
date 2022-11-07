<?php
    include_once 'funciones/funciones.php';
    try{
        $sql_parti = "SELECT nombres, ap_paterno, ap_materno, eventos_participantes.nc FROM eventos_participantes,alumnos WHERE eventos_participantes.nc=alumnos.nc and id_evento = '" . $even_alumnos['identificador'] . "'";
        $resultado = $conexion->query($sql_parti);
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
    while($participantes = $resultado->fetch_assoc()){
        echo $participantes['nombres'] . " " . $participantes['ap_paterno'] . " " . $participantes['ap_materno']."<br>";
    }                          
                            
?>