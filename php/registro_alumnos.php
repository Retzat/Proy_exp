<?php

    $nombres=$_POST['nombres_al'];
    $ap_paterno=$_POST['ap_paterno_al'];
    $ap_materno=$_POST['ap_materno_al'];
    $matricula=$_POST['num_control_al'];
    $semestre=$_POST['semestre_al'];
    $email=$_POST['email_al'];
    $telefono=$_POST['telefono_al'];
    $password=$_POST['pass1_al'];
    $password2=$_POST['pass2_al'];
    $participacion=$_POST['participacion_al'];
    echo $nombres.$ap_paterno.$ap_materno.$matricula.$semestre.$email.$telefono.$password.$password2.$participacion;