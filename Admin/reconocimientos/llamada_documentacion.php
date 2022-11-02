<?php

include("certificados_bd_docentes.php");

include("certificados_bd_ponentes_al.php");
include("certificados_bd_ponentes_ex.php");

include("certificados_bd_oyentes_ex.php");
include("certificados_bd_asesores.php");

include("certificados_bd_oyentes.php");
echo '<script>alert("Se han generado todos los documentos exitosamente");window.location="../pag_admin_tables_acreditados.php";</script>';
?>