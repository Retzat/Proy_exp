<?php
include_once 'funciones/funciones.php';

    if (isset($_POST['mod_con'])){
        $director=$_POST['nombres_dir'];
        $graddir=$_POST['grado_dir'];
        $date=$_POST['fecha_dir'];
        $anio=$_POST['anio_dir'];
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

    if (isset($_POST['add_for'])){
        //echo '<script>alert("Si entro")</script>';
        if ($_FILES['subirconst']['error']>0){
            //echo '<script>alert("Si entro2")</script>';
            echo '<script>alert("Error al cargar archivo");window.location="Reg_DatCert.php";</script>';
        }
        else{
            //echo '<script>alert("Si entro3")</script>';
            $permitidos = array("image/jpg", "image/jpeg", "image/png");
            $limite_kb = 1000;
            //verificar si el archivo corresponde a lo que pedimos y el tamaño
            if (in_array($_FILES['subirconst']['type'], $permitidos) && $_FILES['subirconst']['size'] <= $limite_kb * 1024){
                //echo '<script>alert("Si entro4")</script>';
                $ruta = 'reconocimientos/';
                //echo $_FILES['subirconst']['name'];
                $archivo = $ruta.$_FILES['subirconst']['name'];
                $resultado = @move_uploaded_file($_FILES['subirconst']['tmp_name'], $archivo);                    
                if ($resultado){
                    echo '<script>alert("Archivo guardado con exito");window.location="Reg_DatCert.php";</script>';
                }
                else{
                    echo '<script>alert("Error al guardar el archivo");window.location="Reg_DatCert.php";</script>';
                }
            }
            else{
                echo '<script>alert("Archivo no permitido o excede el tamaño");window.location="Reg_DatCert.php";</script>';
            }
        }
        

    }
    if (isset($_POST['add_firma'])){
        //echo '<script>alert("Si entro")</script>';
        if ($_FILES['subirconst']['error']>0){
            //echo '<script>alert("Si entro2")</script>';
            echo '<script>alert("Error al cargar archivo");window.location="Reg_DatCert.php";</script>';
        }
        else{
            //echo '<script>alert("Si entro3")</script>';
            $permitidos = array("image/jpg", "image/jpeg", "image/png");
            $limite_kb = 1000;
            //verificar si el archivo corresponde a lo que pedimos y el tamaño
            if (in_array($_FILES['subirconst']['type'], $permitidos) && $_FILES['subirconst']['size'] <= $limite_kb * 1024){
                //echo '<script>alert("Si entro4")</script>';
                $ruta = 'reconocimientos/';
                //echo $_FILES['subirconst']['name'];
                $archivo = $ruta.$_FILES['subirconst']['name'];
                $resultado = @move_uploaded_file($_FILES['subirconst']['tmp_name'], $archivo);                    
                if ($resultado){
                    echo '<script>alert("Archivo guardado con exito");window.location="Reg_DatCert.php";</script>';
                }
                else{
                    echo '<script>alert("Error al guardar el archivo");window.location="Reg_DatCert.php";</script>';
                }
            }
            else{
                echo '<script>alert("Archivo no permitido o excede el tamaño");window.location="Reg_DatCert.php";</script>';
            }
        }
        

    }
?>