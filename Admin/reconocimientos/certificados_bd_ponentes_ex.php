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
$res=mysqli_query($conexion,"select email_ex,nombres, ap_paterno, ap_materno, nombre_pon, grado from externos,eventos_externos,curriculum 
where eventos_externos.email=email_ex and curriculum.email=email_ex; ");
	
	$font="arial.ttf";
	$font_bold="arial-bold.ttf";
	$image=imagecreatefromjpeg("Constancia.jpg");
	$color_name=imagecolorallocate($image,119,46,46);
	$color=imagecolorallocate($image,98,98,79);
	$color_dir=imagecolorallocate($image,0,51,0);
	while($row=mysqli_fetch_assoc($res)){
		$grado=$row['grado'];
		//echo $grado;
		if ($grado==1) {
			$grado="Ing.";
		}
		else if($grado==2){
			$grado="Mtro.";
		}
		else if($grado==3){
			$grado="Dr.";
		}
		$image=imagecreatefromjpeg("Constancia.jpg");
		$name=$grado." ".$row['nombres']." ".$row['ap_paterno']." ".$row['ap_materno'];
		$letras="Por su destacada participación en el ";
		$men_tema="con su tema: ";
		$Tema='"'.$row['nombre_pon'].'"';
		$evento='"Evento de Exposistemas '.$anio_dir. '"';
		$fecha=$date_con." de ".$anio_dir;
		$director=$grado_d." ".$nom_dir;
		$mensaje2="el cual se llevó a cabo el día ".$fecha;
		$largo=strlen($name);
		$largotema=strlen($Tema);
		if($largo>35){
			imagettftext($image,25,0,200,405,$color_name,$font_bold,$name);
		}
		else if($largo>30 && $largo<=35){
			imagettftext($image,25,0,225,405,$color_name,$font_bold,$name);
		}
		else if($largo>=20 && $largo<=30){
			imagettftext($image,25,0,270,405,$color_name,$font_bold,$name);
		}
		else if($largo<20){
			imagettftext($image,25,0,340,405,$color_name,$font_bold,$name);
		}
		//imagettftext($image,25,0,200,405,$color_name,$font_bold,$name);
		imagettftext($image,16,0,145,450,$color,$font,$letras);
		imagettftext($image,16,0,145,450,$color,$font,$letras);
		imagettftext($image,16,0,499,450,$color,$font_bold,$evento);

		if($largotema>50){
			imagettftext($image,16,0,265,470,$color,$font_bold,$Tema);
			imagettftext($image,16,0,130,470,$color,$font,$men_tema);
		}
		else if($largotema>40 && $largotema<=50){
			imagettftext($image,16,0,300,470,$color,$font_bold,$Tema);
			imagettftext($image,16,0,165,470,$color,$font,$men_tema);
		}
		else if($largotema>30 && $largotema<=39){
			imagettftext($image,16,0,350,470,$color,$font_bold,$Tema);
			imagettftext($image,16,0,215,470,$color,$font,$men_tema);
		}
		else if($largotema>=20 && $largotema<=30){
			imagettftext($image,16,0,400,470,$color,$font_bold,$Tema);
			imagettftext($image,16,0,265,470,$color,$font,$men_tema);
		}
		else if($largotema<20){
			imagettftext($image,16,0,450,470,$color,$font_bold,$Tema);
			imagettftext($image,16,0,315,470,$color,$font,$men_tema);
		}


		imagettftext($image,16,0,205,490,$color,$font,$mensaje2);
		imagettftext($image,12,0,565,570,$color_dir,$font,$fecha);
		imagettftext($image,14,0,370,665,$color_dir,$font_bold,$director);
		$file=time().'_'.$row['email_ex'];
		imagejpeg($image,"generados/pe".$file.".jpg");
		//imagedestroy($image);
	}
?>
