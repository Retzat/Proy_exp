<?php
include("../../conexion_be.php");
$res=mysqli_query($conexion,"select nc,nombres, ap_paterno, ap_materno from alumnos,registro_alumnos_oyentes where alumnos.nc = registro_alumnos_oyentes.nc_reg and reg1=1 and reg2=1 and reg3=1");
if(mysqli_num_rows($res)>0){
	
	$font="arial.ttf";
	$font_bold="arial-bold.ttf";
	$image=imagecreatefromjpeg("Constancia.jpg");
	$color_name=imagecolorallocate($image,119,46,46);
	$color=imagecolorallocate($image,98,98,79);
	$color_dir=imagecolorallocate($image,0,51,0);
	while($row=mysqli_fetch_assoc($res)){		
		$image=imagecreatefromjpeg("certificate.jpg");
		$name=$row['nombres']." ".$row['ap_paterno']." ".$row['ap_materno'];
		imagettftext($image,50,0,365,420,$color,$font,$name);
		$date="6th may 2020";
		imagettftext($image,20,0,450,595,$color,"AGENCYR.TTF",$date);
		$file=time().'_'.$row['nc'];
		imagejpeg($image,"generados/".$file.".jpg");
		//imagedestroy($image);
	}
}
?>