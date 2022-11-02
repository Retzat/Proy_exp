<?php
try{
    $sql2 = "SELECT nombres, ap_paterno, ap_materno FROM externos WHERE email_ex = '" . $externos['email'] . "'";
    $resultado = $conexion->query($sql2);
  }catch(Exception $e){
    echo "Error: " . $e->getMessage();
  }
  while($externos2 = $resultado->fetch_assoc()){
    echo $externos2['nombres'] . " " . $externos2['ap_paterno'] . " " . $externos2['ap_materno'];
  }

?>