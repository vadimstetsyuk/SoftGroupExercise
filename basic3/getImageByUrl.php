<?php

function returnURL($path, $alt = 'Hand', $height = 'auto', $width = 'auto') {
    $img = '<img src="'.$GLOBALS['domain'].$path.'" alt="'.$alt.'" height="'.$height.'" width="'.$width.'" />';
    return $img;
}