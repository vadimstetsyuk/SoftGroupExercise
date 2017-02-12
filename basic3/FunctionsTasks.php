<?php

/**
 * Write a function to return an HTML 
 * The function should accept a mandatory argument of the image URL 
 * and optional arguments for alt text, height, and width
 */

echo '<h1>#First task</h1>';

function returnURL($path, $alt = 'Hand', $height = 'auto', $width = 'auto'){
    $img = '<img src="'.$GLOBALS['domain'].$path.'" alt="'.$alt.'" height="'.$height.'" width="'.$width.'" />';
    return $img;
}
echo returnURL('http://datasort.cc.ua/design/hand1.png');


/**
 * Modify the function in the previous exercise so that only the filename is passed to the function in the URL argument. 
 * Inside the function, prepend a global variable to the filename to make the full URL. 
 * For example, if you pass photo.png to the function, and the global variable contains /images/ , 
 * then the src attribute of the returned  tag would be /images/photo.png . 
 * A function like this is an easy way to keep your image tags correct, 
 * even if the images move to a new path or server. Just change the global variable for example, 
 * from /images/ to http://images.example.com/.
 */

echo '<h1>#Second task</h1>';

$GLOBALS['domain'] = 'http://datasort.cc.ua/design/';

echo returnURL('hand1.png');

/**
 * Put your function from the previous exercise in one file. 
 * Then make another file that loads the first file and uses it to print out some  tags.
 */

 echo '<h1>#Trird task</h1>';

 require_once 'getImageByUrl.php';
 echo returnURL('hand1.png');


 /**
 * What does the following code print out?
 */

 echo '<h1>#Fourth task</h1>';

 echo 'Expected such outcome as';
 echo '
    I can afford a tip of 11% (30)
    I can afford a tip of 12% (30.25)
    I can afford a tip of 13% (30.5)
    I can afford a tip of 14% (30.75)
 ';