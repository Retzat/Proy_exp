<?php

include_once 'funciones/funciones.php';

if (isset($_POST['edit_eval'])){
    $identificador=$_POST['id_even_al'];
    $nombre_evento=$_POST['nom_even_al'];
    $hora_in=$_POST['hora_in_al'];
    $hora_fin=$_POST['hora_fin_al'];
    $asesor=$_POST['asesor_even_al'];
    $participantes=$_POST['lista_part_al']; 


    $query_delte="DELETE FROM eventos_participantes
    WHERE id_evento='$identificador'";
    $ejecutar_delte = mysqli_query($conexion, $query_delte);

    foreach($participantes as $i)
    {
        $query_INSERT="INSERT INTO eventos_participantes values ('$identificador', '$i')";
        $ejecutar_INSERT = mysqli_query($conexion, $query_INSERT);
    }


    $query="UPDATE eventos SET nombre_evento='$nombre_evento', hora_in='$hora_in', hora_fin='$hora_fin', asesor='$asesor'
    WHERE identificador='$identificador'";
    $ejecutar = mysqli_query($conexion, $query);
    if($ejecutar){
        echo '<script>alert("Se ha actualizado correctamente el evento");window.location="pag_admin_tables_eventos.php";</script>';
    }
    else{
        echo '<script>alert("No se pudo actualizar, intentalo de nuevo");window.location="pag_admin_tables_eventos.php";</script>';
        exit();
    }

    mysqli_close($conexion);  
}
if (isset($_POST['edit_evex'])){
    $identificador=$_POST['id_even_ex'];
    $nombre_evento=$_POST['nom_even_ex'];
    $hora_in=$_POST['hora_in_ex'];
    $hora_fin=$_POST['hora_fin_ex'];
    $ponente=$_POST['participante_even_ex'];
    //echo $ponente;
    $validar_unicidad=mysqli_query($conexion, "SELECT * FROM eventos_externos WHERE email='$ponente'");
    if(mysqli_num_rows($validar_unicidad)>0){
        echo '<script>alert("Ya existe un evento con este ponente");window.location="pag_admin_tables_eventos.php";</script>';
        exit();
    }
    else{
        $query="UPDATE eventos_externos SET nombre_pon='$nombre_evento', hora_in='$hora_in', hora_fin='$hora_fin', email='$ponente'
        WHERE identificador='$identificador'";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Se ha actualizado correctamente el evento");window.location="pag_admin_tables_eventos.php";</script>';
        }
        else{
            echo '<script>alert("No se pudo actualizar, intentalo de nuevo");window.location="pag_admin_tables_eventos.php";</script>';
            exit();
        }
    }
    mysqli_close($conexion); 
}     
if (isset($_POST['crear_evex'])){
    $identificador=$_POST['cid_even_ex'];
    $nombre_evento=$_POST['cnom_even_ex'];
    $hora_in=$_POST['chora_in_ex'];
    $hora_fin=$_POST['chora_fin_ex'];
    $ponente=$_POST['cparticipante_even_ex'];
    //echo $ponente." ".$nombre_evento." ".$hora_in." ".$hora_fin." ".$identificador;
    $validar_unicidad=mysqli_query($conexion, "SELECT * FROM eventos_externos WHERE email='$ponente' or identificador='$identificador'");
    if(mysqli_num_rows($validar_unicidad)>0){
        echo '<script>alert("Ya existe un evento con este ponente");window.location="pag_admin_tables_eventos.php";</script>';
        exit();
    }
    else{
        $query="INSERT INTO eventos_externos values ('$identificador', '$nombre_evento', '$ponente', '$hora_in', '$hora_fin')";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Se ha creado correctamente el evento");window.location="pag_admin_tables_eventos.php";</script>';
        }
        else{
            echo '<script>alert("No se pudo crear, intentalo de nuevo");window.location="pag_admin_tables_eventos.php";</script>';
            exit();
        }
    }
    mysqli_close($conexion);
} 
if (isset($_POST['crear_eval'])){
    $identificador=$_POST['id_even_al'];
    $nombre_evento=$_POST['nom_even_al'];
    $hora_in=$_POST['hora_in_al'];
    $hora_fin=$_POST['hora_fin_al'];
    $asesor=$_POST['asesor_even_al'];
    $participantes=$_POST['lista_part_al'];
    //echo $ponente." ".$nombre_evento." ".$hora_in." ".$hora_fin." ".$identificador;
    $validar_unicidad=mysqli_query($conexion, "SELECT * FROM eventos WHERE identificador='$identificador'");
    if(mysqli_num_rows($validar_unicidad)>0){
        echo '<script>alert("Ya existe un evento con este identificador");window.location="crear_evento_al.php";</script>';
        exit();
    }
    else{
        
        $query="INSERT INTO eventos values ('$nombre_evento', '$hora_in', '$hora_fin', '$asesor','$identificador')";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Se ha creado correctamente el evento");window.location="pag_admin_tables_eventos.php";</script>';
        }
        else{
            echo '<script>alert("No se pudo crear, intentalo de nuevo");window.location="pag_admin_tables_eventos.php";</script>';
            exit();
        }
        foreach($participantes as $i){
            $query_INSERT="INSERT INTO eventos_participantes values ('$identificador', '$i')";
            $ejecutar_INSERT = mysqli_query($conexion, $query_INSERT);
        }
    }
    mysqli_close($conexion);
} 


?>