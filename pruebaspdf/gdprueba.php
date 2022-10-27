<?php

    if(isset($_POST['submit'])){
        $font = "tutorial/BRUSHSCI.TTF";
        $name = $_POST['uname'];
        $image= imagecreatefromjpeg('tutorial/certificate.jpg');
        $color = imagecolorallocate($image,19,21,22);
        imagettftext($image,30,0,500,470,$color,$font,$name);
        imagejpeg($image,"tutorial/certificate/".$name.".jpg");
        //imagedestroy($image);
        echo "Certificate Generated";
    }    
?>

<form method="post">
    <input type="text" name="uname" placeholder="Introduce tu nombre">
    <input type="submit" name="submit" value="GENERATE">
</form>