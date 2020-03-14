<?php
header('Content-type: image/png');
include("char.php");
    // string random
    $font = 'resource/ANGSA.ttf';
    //array imagettftext ( resource image, float size, float angle, int x, int y, int color, string fontfile, string text )
    //$sesstest = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    $sesstest = randword(5);
    $im = imagecreatefrompng('resource/background.png');
    $text_color = imagecolorallocate($im, 0, 0, 0);
// imagettftext($im,rand(30,40),0,20,30,
// $text_color, $font,$humanread);
    for($i=0;$i<5;$i++)
        {
            imagettftext($im,rand(30,40),rand(-10,10),20+($i*15),30, $text_color, $font,$sesstest[$i]);
        } //end
// PNG
/* imagepng($im, "c.png"); */
    imagepng($im);
    // memory
    imagedestroy($im);
?>
