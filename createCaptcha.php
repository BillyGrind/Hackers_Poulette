<?php
session_start();

// Generate a random CAPTCHA string
$captchaString = generateCaptchaString(6);

// Save the CAPTCHA string in the session
$_SESSION['captcha'] = $captchaString;

// Generate the CAPTCHA image
$width = 200;
$height = 50;
$font = 'path/to/your/font.ttf'; // Specify the path to your font file

// Create a blank image
$image = imagecreatetruecolor($width, $height);

// Set background color and text color
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);

// Fill the image with the background color
imagefilledrectangle($image, 0, 0, $width - 1, $height - 1, $backgroundColor);

// Add random lines to the image for noise
for ($i = 0; $i < 10; $i++) {
    $lineColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
}

// Add the CAPTCHA text to the image
imagettftext($image, 20, 0, 50, 35, $textColor, $font, $captchaString);

// Output the image as PNG
header('Content-Type: image/png');
imagepng($image);

// Clean up
imagedestroy($image);

// Function to generate a random alphanumeric string
function generateCaptchaString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captchaString = '';
    for ($i = 0; $i < $length; $i++) {
        $captchaString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captchaString;
}
?>
