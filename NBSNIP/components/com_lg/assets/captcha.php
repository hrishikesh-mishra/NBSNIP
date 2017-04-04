<?php
// Generate a CAPTCHA graphic.

// Start off by defining a new image, define our dimensions
$w = 300;
$h = 50;
$gfx = imagecreatetruecolor($w, $h);

// Turn on antialiasing so that curvy things look better.
imageantialias($gfx, true);

// Declare white as our background color:
$white = imagecolorallocate($gfx, 255, 255, 255);
imagefilledrectangle($gfx, 0, 0, $w-1, $h-1, $white);

// Generate a 6-8 character string of only uppercase characters:
$str = '';
foreach (range(0, rand(5,7)) as $r) {
    $str .= chr(rand(65,90));
}

// Now, divide the width by the length to find approximate positions
// for each character to appear:
$pos = $w / strlen($str);

// Now we can loop through printing out these characters
foreach(range(0, strlen($str) - 1) as $s) {
    // Randomly generate a grayscale color, but only 'dark' ones
    $shade = rand(0, 100);

    // Declare this color:
    $tmpgray = imagecolorallocate($gfx, $shade, $shade, $shade);

    // Now, we can draw this one character, messing with it as much as
    // possible while we do so:
    imagettftext($gfx,     // The graphics object to draw on
        rand($h/3, $h/2),  // Font Size, between 1/3 and 1/2 full height
        rand(-60, 60),     // Slant angle, highly variable
        $s*$pos+($pos*.4), // X, stabilized at equal places
        rand($h*.5,$h*.7), // Y, Variable between half or a bit lower.
        $tmpgray,          // The color to do it with - gray
        null,           // The font to use.
        $str{$s});         // Just print this character
}

// Now crosshatch the entire background with various shades of gray lines
// Loop from negative height to width to ensure we draw over everything
foreach(range(-$h, $w, 5) as $x) {
    // Randomly generate a shade of gray, but not the darkest ones.
    $shade = rand(50,254);
    $tmpgray = imagecolorallocate($gfx, $shade, $shade, $shade);

    // Now draw two lines from here, One diagonally down, one diagonally up
    // at slightly random angles
    imageline($gfx, $x, 0, $x+$h+rand(0,25), $h-1, $tmpgray);
    imageline($gfx, $x, $h-1, $x+$h+rand(0,25), 0, $tmpgray);
}

// We are now done with our manipulations.  Before we output this, set
// the actual string as part of a session variable:


// Let the browser know that we are going to output this as a PNG


// And then output our new image:
imagepng($gfx);
?>
