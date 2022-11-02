<?php
include("../../conexion_be.php");
$res=mysqli_query($conexion,"select DISTINCT grado,rfc,nombres, ap_paterno, ap_materno from eventos,docente where asesor=rfc");
if(mysqli_num_rows($res)>0){
	
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
		$letras="Por su destacada participación como                en el ";
		$asesor='"Asesor"';
		$evento='"Evento de';
		$evento2='Exposistemas 2022"';
		$fecha="07 de septiembre de 2022";
		$director="Mtro. Fermín Parra Luna";
		$mensaje2="el cual se llevó a cabo el día ".$fecha;
		$largo=strlen($name);
		if($largo>30){
			imagettftext($image,25,0,200,405,$color_name,$font_bold,$name);
		}
		else if($largo>=20 && $largo<=30){
			imagettftext($image,25,0,280,405,$color_name,$font_bold,$name);
		}
		else if($largo<20){
			imagettftext($image,25,0,340,405,$color_name,$font_bold,$name);
		}
		//imagettftext($image,25,0,200,405,$color_name,$font_bold,$name);
		imagettftext($image,16,0,145,450,$color,$font,$letras);
		imagettftext($image,16,0,503,450,$color,$font_bold,$asesor);
		imagettftext($image,16,0,645,450,$color,$font_bold,$evento);
		imagettftext($image,16,0,105,470,$color,$font_bold,$evento2);
		imagettftext($image,16,0,315,470,$color,$font,$mensaje2);
		imagettftext($image,12,0,565,570,$color_dir,$font,$fecha);
		imagettftext($image,14,0,370,665,$color_dir,$font_bold,$director);
		$file=time().'_'.$row['rfc'];
		imagejpeg($image,"generados/as".$file.".jpg");
		//imagedestroy($image);
	}
}
?>