<?php

    include("conexion_be.php");

    $ban=false;
    $nombres=$_POST['nombres_al'];
    $ap_paterno=$_POST['ap_pat_al'];
    $ap_materno=$_POST['ap_mat_al'];
    $matricula=$_POST['num_control_al'];
    $semestre=$_POST['semestre_al'];
    $email=$_POST['email_al'];
    $telefono=$_POST['tel_al'];
    $password=$_POST['pass1_al'];
    $password2=$_POST['pass2_al'];
    $participacion=$_POST['participacion_al'];