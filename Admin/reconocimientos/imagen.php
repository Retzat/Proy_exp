
<?php
function CargarPNG($imagen)
{
    header("Content-type: image/png");
    /* Intentar abrir */
    $im = @imagecreatefrompng($imagen);

    /* Ver si falló */
    if(!$im)
    {
        /* Crear una imagen en blanco */
        $im  = imagecreatetruecolor(150, 30);
        $fondo = imagecolorallocate($im, 255, 255, 255);
        $ct  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $fondo);

        /* Imprimir un mensaje de error */
        imagestring($im, 1, 5, 5, 'Error cargando ' . $imagen, $ct);
    }

    return $im;
}

header('Content-Type: image/png');

$img = CargarPNG('falso.image');

imagepng($img);
imagedestroy($img);
?>
