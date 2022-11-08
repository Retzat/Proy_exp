<?php
include("../../conexion_be.php");
$sql = "SELECT * FROM datos_constancias WHERE id = 1";
  $resultado = $conexion->query($sql);
  $director = $resultado->fetch_assoc();
  $nom_dir = $director['nombre_completo'];
  $date_con = $director['Fecha'];
  $grado_dir = $director['grado'];
  $anio_dir = $director['anio'];
  if ($grado_dir==1) {
	$grado_d="Ing.";
	}
	else if($grado_dir==0){
		$grado_d="Mtro.";
	}
	else if($grado_dir==2){
		$grado_d="Mtro.";
	}
	else if($grado_dir==3){
		$grado_d="Dr.";
	}
	$querydel="delete from certificado";
    $ejecutardel = mysqli_query($conexion, $querydel);
$res=mysqli_query($conexion,"select nc,nombres, ap_paterno, ap_materno from alumnos,registro_alumnos_oyentes where alumnos.nc = registro_alumnos_oyentes.nc_reg and reg1=1 and reg2=1 and reg3=1");
if(mysqli_num_rows($res)>0){
	
	$font="arial.ttf";
	$font_bold="arial-bold.ttf";
	$image=imagecreatefromjpeg("Constancia.jpg");
	$color_name=imagecolorallocate($image,119,46,46);
	$color=imagecolorallocate($image,98,98,79);
	$color_dir=imagecolorallocate($image,0,51,0);
	while($row=mysqli_fetch_assoc($res)){		
		$image=imagecreatefromjpeg("Constancia.jpg");
		$name=$row['nombres']." ".$row['ap_paterno']." ".$row['ap_materno'];
		$letras="Por su destacada participación en el ";
		$evento='"Evento de Exposistemas '.$anio_dir. '"';
		$fecha=$date_con." de ".$anio_dir;
		$director=$grado_d." ".$nom_dir;
		$mensaje2="el cual se llevó a cabo el día ".$fecha;
		$largo=strlen($name);
		if($largo>30){
			imagettftext($image,25,0,200,405,$color_name,$font_bold,$name);
		}
		else if($largo>20 && $largo<30){
			imagettftext($image,25,0,280,405,$color_name,$font_bold,$name);
		}
		else if($largo<20){
			imagettftext($image,25,0,340,405,$color_name,$font_bold,$name);
		}
		//imagettftext($image,25,0,200,405,$color_name,$font_bold,$name);
		imagettftext($image,16,0,145,450,$color,$font,$letras);
		imagettftext($image,16,0,499,450,$color,$font_bold,$evento);
		imagettftext($image,16,0,205,470,$color,$font,$mensaje2);
		imagettftext($image,12,0,565,570,$color_dir,$font,$fecha);
		imagettftext($image,14,0,370,665,$color_dir,$font_bold,$director);
		$file=$row['nc'];
		imagejpeg($image,"pruebas/oa".$file.".jpg");
		$ruta="pruebas/oa".$file.".jpg";
		$query="INSERT INTO certificado (nc_gen, ruta) 
        VALUES ('$file','$ruta')";
        $ejecutar = mysqli_query($conexion, $query);
		//imagedestroy($image);
	}
}
mysqli_close($conexion);
?>