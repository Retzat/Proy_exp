<?php
    include_once 'funciones/funciones.php';
    if (isset($_POST['add_desc'])){
        $email=$_POST['email'];
        $presentacion=$_POST['presentacion'];
        $grado=$_POST['grado'];
        $curriculum=$_POST['curriculum'];
        $validar_curriculum=mysqli_query($conexion, "SELECT * FROM curriculum WHERE email='$email'");
        if(mysqli_num_rows($validar_curriculum)>0){
            $query="INSERT INTO curriculum (email,descripcion,grado,tema) VALUES ('$email','$presentacion','$grado','$curriculum')";
            $ejecutar = mysqli_query($conexion, $query);
            if($ejecutar){
                echo '<script>alert("Se han registrado correctamente tus datos");window.location="../pagina_qrex.php";</script>';
            }
            else{
                echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="Datos_ex.php";</script>';
            }
        }
        else{
            echo '<script>alert("Ya has registrado tus datos");window.location="../pagina_qrex.php";</script>';
        }
    }
?>