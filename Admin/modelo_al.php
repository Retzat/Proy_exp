<?php
    include("../conexion_be.php");

if (isset($_POST['edit_al'])){
    $ban=false;
    $nombres=$_POST['nombres_al'];
    $ap_paterno=$_POST['ap_pat_al'];
    $ap_materno=$_POST['ap_mat_al'];
    $matriculan=$_POST['num_control_al'];
    $semestre=$_POST['semestre_al'];
    $email=$_POST['email_al'];
    $telefono=$_POST['tel_al'];
    $participacion=$_POST['participacion_al'];
    if($nombres == "" || $ap_paterno == "" || $matriculan == "" || $semestre == "" || $email == "" || $telefono == "" || $participacion == ""){
        echo '<script>alert("No se permiten campos vacios");window.location="pag_admin_tables_al.php";</script>';
        exit();
    }else{
        $ban=true;
    }
    $sql = "SELECT * FROM alumnos WHERE email_al = '$email'";
    $resultado = $conexion->query($sql);
    $alumnos = $resultado->fetch_assoc();
    $nc = $alumnos['nc'];
    if($matriculan!=$nc){
        $verificar_nc= mysqli_query($conexion, "SELECT * FROM alumnos WHERE nc='$nc'");
        if (mysqli_num_rows($verificar_nc)>0){
            echo '<script>alert("Este Número de control ya está registrado");window.location="pag_admin_tables_al.php";</script>';
            exit();
            mysqli_close($conexion);
        }
    }else{
    $query="UPDATE alumnos SET nombres='$nombres', ap_paterno='$ap_paterno', ap_materno='$ap_materno', semestre=$semestre,
    nc='$matriculan', telefono='$telefono', participacion=$participacion WHERE email_al='$email'";
        $ejecutar = mysqli_query($conexion, $query);
        if($ejecutar){
            echo '<script>alert("Se ha actualizado correctamente el registro");window.location="pag_admin_tables_al.php";</script>';
        }
        else{
            echo '<script>alert("No se pudo actualizar, intentalo de nuevo");window.location="pag_admin_tables_al.php";</script>';
        }
    }
    mysqli_close($conexion);   
}
    
