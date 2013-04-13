<?php
$img = imageCreate(500,300);
//$img = imageCreateTrueColor(500,300); 17 млн кольорів


header("Content-type: image/gif");
imgGif($img);
?>