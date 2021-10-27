<?php

function generateColor($num = 0) {
    $hash = md5('color' . $num); // modify 'color' to get a different palette
    $color = array(
        hexdec(substr($hash, 0, 2)), // r
        hexdec(substr($hash, 2, 2)), // g
        hexdec(substr($hash, 4, 2))); //b
        
    return 'rgb(' . implode(',', $color) . ')';
}