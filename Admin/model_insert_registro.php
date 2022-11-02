<?php
//echo '<script>alert("sI ENTRO")</script>';
include_once 'funciones/funciones.php';
if(isset($_POST['add_reg1'])){
    if (isset($_POST['text1'])){
        $text=$_POST['text1'];
        $largo=strlen($text);
        //echo $text.$largo;
        if(filter_var($text, FILTER_VALIDATE_EMAIL)){        
            //echo $text;
            //echo '<script>alert("Soy un email externo")</script>';
            $verificar_correo_externos= mysqli_query($conexion, "SELECT * FROM externos WHERE email_ex='$text'");
            if (mysqli_num_rows($verificar_correo_externos)>0){
                $verificar_correo= mysqli_query($conexion, "SELECT * FROM registro_externos WHERE email_registro='$text'");
                if (mysqli_num_rows($verificar_correo)>0){
                    echo '<script>alert("Este correo ya completo este registro");window.location="LectorQR_1.php";</script>';
                    exit();
                    mysqli_close($conexion);
                }
                else{
                    $query="INSERT INTO registro_externos (email_registro, reg1, reg2, reg3) 
                    VALUES ('$text', 1, 0, 0)";
                    $ejecutar = mysqli_query($conexion, $query);
                    if($ejecutar){
                        echo '<script>alert("Se ha registrado correctamente la primer asistencia");window.location="LectorQR_1.php";</script>';
                    }
                    else{
                        echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="LectorQR_1.php";</script>';
                    }
                }
            }
            else{
                echo '<script>alert("Este codigo no corresponde a un externo valido");window.location="LectorQR_1.php";</script>';
                exit();
                mysqli_close($conexion);
            }
        
        }
        //verifica si es un nc
        else if($largo==9){
            //echo $text;
            //echo '<script>alert("Soy un string externo")</script>';
            $verificar_nc_alumnos= mysqli_query($conexion, "SELECT * FROM alumnos WHERE nc='$text'");
            if (mysqli_num_rows($verificar_nc_alumnos)>0){
                $verificar_nc= mysqli_query($conexion, "SELECT * FROM registro_alumnos_oyentes WHERE nc_reg='$text'");
                if (mysqli_num_rows($verificar_nc)>0){
                    echo '<script>alert("Este alumno ya completo este registro");window.location="LectorQR_1.php";</script>';
                    exit();
                    mysqli_close($conexion);
                }
                else{
                    $query="INSERT INTO registro_alumnos_oyentes (nc_reg, reg1, reg2, reg3) 
                    VALUES ('$text', 1, 0, 0)";
                    $ejecutar = mysqli_query($conexion, $query);
                    if($ejecutar){
                        echo '<script>alert("Se ha registrado correctamente la primer asistencia");window.location="LectorQR_1.php";</script>';
                    }
                    else{
                        echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="LectorQR_1.php";</script>';
                    }
                }
            }
            else{
                echo '<script>alert("Este codigo no corresponde a un alumno valido");window.location="LectorQR_1.php";</script>';
                exit();
                mysqli_close($conexion);
            }
        }
        else{
            echo $text;
            echo '<script>alert("Error: Dato no valido")</script>';
        }
    }
}
if(isset($_POST['add_reg2'])){
    if (isset($_POST['text2'])){
        $text=$_POST['text2'];
        $largo=strlen($text);
        if(filter_var($text, FILTER_VALIDATE_EMAIL)){
            $verificar_correo_externos= mysqli_query($conexion, "SELECT * FROM externos WHERE email_ex='$text'");
            if (mysqli_num_rows($verificar_correo_externos)>0){
                $verificar_asistencia1= mysqli_query($conexion, "SELECT * FROM registro_externos WHERE email_registro='$text'");
                if (mysqli_num_rows($verificar_asistencia1)>0){
                    $verificar_asistencia2= mysqli_query($conexion, "SELECT * FROM registro_externos WHERE email_registro='$text' AND reg2=1");
                    if (mysqli_num_rows($verificar_asistencia2)>0){
                        echo '<script>alert("Este correo ya completo este registro");window.location="LectorQR_2.php";</script>';
                        exit();
                        mysqli_close($conexion);
                    }
                    else{
                        $query="UPDATE registro_externos SET reg2=1 WHERE email_registro='$text'";
                        $ejecutar = mysqli_query($conexion, $query);
                        if($ejecutar){
                            echo '<script>alert("Se ha registrado correctamente la segunda asistencia");window.location="LectorQR_2.php";</script>';
                        }
                        else{
                            echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="LectorQR_2.php";</script>';
                        }
                    }                    
                }
                else{
                    echo '<script>alert("Este correo no completo el primer registro, imposible poner segunda asistencia");window.location="LectorQR_2.php";</script>';
                    exit();
                    mysqli_close($conexion);
                    
                }
            }
            else{
                echo '<script>alert("Este codigo no corresponde a un externo valido");window.location="LectorQR_2.php";</script>';
                exit();
                mysqli_close($conexion);
            }
        }
        else if($largo==9){
            $verificar_nc_alumnos= mysqli_query($conexion, "SELECT * FROM alumnos WHERE nc='$text'");
            if (mysqli_num_rows($verificar_nc_alumnos)>0){
                $verificar_nc= mysqli_query($conexion, "SELECT * FROM registro_alumnos_oyentes WHERE nc_reg='$text'");
                if (mysqli_num_rows($verificar_nc)>0){
                    $verificar_asistencia2= mysqli_query($conexion, "SELECT * FROM registro_alumnos_oyentes WHERE nc_reg='$text' AND reg2=1");
                    if (mysqli_num_rows($verificar_asistencia2)>0){
                        echo '<script>alert("Este alumno ya completo este registro");window.location="LectorQR_2.php";</script>';
                        exit();
                        mysqli_close($conexion);
                    }
                    else{
                        $query="UPDATE registro_alumnos_oyentes SET reg2=1 WHERE nc_reg='$text'";
                        $ejecutar = mysqli_query($conexion, $query);
                        if($ejecutar){
                            echo '<script>alert("Se ha registrado correctamente la segunda asistencia");window.location="LectorQR_2.php";</script>';
                        }
                        else{
                            echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="LectorQR_2.php";</script>';
                        }
                    }
                }
                else{
                    echo '<script>alert("Este alumno no completo el primer registro, imposible poner segunda asistencia");window.location="LectorQR_2.php";</script>';
                    exit();
                    mysqli_close($conexion);
                }
            }
        }
        else{
            echo $text;
            echo '<script>alert("Error: Dato no valido")</script>';
        }

    }
}

if(isset($_POST['add_reg3'])){
    if (isset($_POST['text3'])){
        $text=$_POST['text3'];
        $largo=strlen($text);
        if(filter_var($text, FILTER_VALIDATE_EMAIL)){
            $verificar_correo_externos= mysqli_query($conexion, "SELECT * FROM externos WHERE email_ex='$text'");
            if (mysqli_num_rows($verificar_correo_externos)>0){
                $verificar_asistencia1= mysqli_query($conexion, "SELECT * FROM registro_externos WHERE email_registro='$text' AND reg2=1");
                if (mysqli_num_rows($verificar_asistencia1)>0){
                    $verificar_asistencia3= mysqli_query($conexion, "SELECT * FROM registro_externos WHERE email_registro='$text' AND reg3=1");
                    if (mysqli_num_rows($verificar_asistencia3)>0){
                        echo '<script>alert("Este correo ya completo este registro");window.location="LectorQR_3.php";</script>';
                        exit();
                        mysqli_close($conexion);
                    }
                    else{
                        $query="UPDATE registro_externos SET reg3=1 WHERE email_registro='$text'";
                        $ejecutar = mysqli_query($conexion, $query);
                        if($ejecutar){
                            echo '<script>alert("Se ha registrado correctamente la tercera asistencia");window.location="LectorQR_3.php";</script>';
                        }
                        else{
                            echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="LectorQR_3.php";</script>';
                        }
                    }                    
                }
                else{
                    echo '<script>alert("Este correo no completo los anteriores registros, imposible poner tercera asistencia");window.location="LectorQR_3.php";</script>';
                    exit();
                    mysqli_close($conexion);
                    
                }
            }
            else{
                echo '<script>alert("Este codigo no corresponde a un externo valido");window.location="LectorQR_3.php";</script>';
                exit();
                mysqli_close($conexion);
            }            
        }
        else if($largo==9){
            $verificar_nc_alumnos= mysqli_query($conexion, "SELECT * FROM alumnos WHERE nc='$text'");
            if (mysqli_num_rows($verificar_nc_alumnos)>0){
                $verificar_asistencia1= mysqli_query($conexion, "SELECT * FROM registro_alumnos_oyentes WHERE nc_reg='$text' AND reg2=1");
                if (mysqli_num_rows($verificar_asistencia1)>0){
                    $verificar_asistencia3= mysqli_query($conexion, "SELECT * FROM registro_alumnos_oyentes WHERE nc_reg='$text' AND reg3=1");
                    if (mysqli_num_rows($verificar_asistencia3)>0){
                        echo '<script>alert("Este alumno ya completo este registro");window.location="LectorQR_3.php";</script>';
                        exit();
                        mysqli_close($conexion);
                    }
                    else{
                        $query="UPDATE registro_alumnos_oyentes SET reg3=1 WHERE nc_reg='$text'";
                        $ejecutar = mysqli_query($conexion, $query);
                        if($ejecutar){
                            echo '<script>alert("Se ha registrado correctamente la tercera asistencia");window.location="LectorQR_3.php";</script>';
                        }
                        else{
                            echo '<script>alert("No se pudo registrar, intentalo de nuevo");window.location="LectorQR_3.php";</script>';
                        }
                    }
                }
                else{
                    echo '<script>alert("Este alumno no completo los anteriores registros, imposible poner tercera asistencia");window.location="LectorQR_3.php";</script>';
                    exit();
                    mysqli_close($conexion);
                }
            }
        }

        else{
            echo $text;
            echo '<script>alert("Error: Dato no valido")</script>';
        }
    }
}
?>