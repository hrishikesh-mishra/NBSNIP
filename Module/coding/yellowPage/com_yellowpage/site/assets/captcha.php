<?php
   

function random_text($count, $rm_similar = false)
	{
		// create list of characters
	    $chars = array_flip(array_merge(range(0, 9), range('A', 'Z')));

		// remove similar looking characters that might cause confusion
	    if ($rm_similar)
		{
				unset($chars[0], $chars[1], $chars[2], $chars[5], $chars[8],
				$chars['B'], $chars['I'], $chars['O'], $chars['Q'],
				$chars['S'], $chars['U'], $chars['V'], $chars['Z']);
		}

	    // generate the string of random text
		for ($i = 0, $text = ''; $i < $count; $i++)
	    {
		    $text .= array_rand($chars);
	    }

		return $text;
	}


// create a 65x20 pixel image
$width = 65;
$height = 20;
$image = imagecreate(65, 20);

// fill the image background color
$bg_color = imagecolorallocate($image, 0x33, 0x66, 0xFF);
imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

// fetch random text
$text = $_GET['scode'];

// determine x and y coordinates for centering text
$font = 5;
$x = imagesx($image) / 2 - strlen($text) * imagefontwidth($font) / 2;
$y = imagesy($image) / 2 - imagefontheight($font) / 2;

// write text on image
$fg_color = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
imagestring($image, $font, $x, $y, $text, $fg_color);

// save the CAPTCHA string for later comparison
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

?>


