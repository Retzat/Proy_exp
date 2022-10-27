<?php
include("../../conexion_be.php");
$res=mysqli_query($conexion,"select * from alumnos where participacion=0");
echo mysqli_num_rows($res);
if(mysqli_num_rows($res)>0){
	
	$font="BRUSHSCI.TTF";
	$image=imagecreatefromjpeg("certificate.jpg");
	$color=imagecolorallocate($image,19,21,22);
	while($row=mysqli_fetch_assoc($res)){		
		$image=imagecreatefromjpeg("certificate.jpg");
		$name=$row['nombres']." ".$row['ap_paterno']." ".$row['ap_materno'];
		imagettftext($image,50,0,365,420,$color,$font,$name);
		$date="6th may 2020";
		imagettftext($image,20,0,450,595,$color,"AGENCYR.TTF",$date);
		$file=time().'_'.$row['nc'];
		imagejpeg($image,"certificate/".$file.".jpg");
		//imagedestroy($image);
	}
}
?>