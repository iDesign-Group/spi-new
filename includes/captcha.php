<?php
/**
 * CAPTCHA Generator
 * Generates a simple CAPTCHA image for form verification
 */

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if GD library is available
if (!function_exists('imagecreatetruecolor')) {
    die('GD library is not installed');
}

// Generate random CAPTCHA code
$captcha_code = '';
$characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // Removed similar-looking characters
$length = 6;

for ($i = 0; $i < $length; $i++) {
    $captcha_code .= $characters[rand(0, strlen($characters) - 1)];
}

// Store in session
$_SESSION['captcha'] = $captcha_code;

// Create image
$width = 200;
$height = 60;
$image = imagecreatetruecolor($width, $height);

if (!$image) {
    die('Failed to create image');
}

// Colors
$bg_color = imagecolorallocate($image, 240, 240, 240);
$text_color = imagecolorallocate($image, 30, 30, 30);
$line_color = imagecolorallocate($image, 100, 100, 100);
$noise_color = imagecolorallocate($image, 150, 150, 150);

// Fill background
imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

// Add noise lines
for ($i = 0; $i < 5; $i++) {
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $line_color);
}

// Add noise dots
for ($i = 0; $i < 100; $i++) {
    imagesetpixel($image, rand(0, $width), rand(0, $height), $noise_color);
}

// Add text - Draw each character
$x = 20;
$y = 35;

for ($i = 0; $i < strlen($captcha_code); $i++) {
    $char = $captcha_code[$i];
    $char_x = $x + ($i * 28);
    $char_y = $y + rand(-3, 3);
    
    // Use imagestring with built-in font
    imagestring($image, 5, $char_x, $char_y, $char, $text_color);
}

// Clear any previous output
if (ob_get_level()) {
    ob_clean();
}

// Output image headers
header('Content-Type: image/png');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Output image
imagepng($image);
imagedestroy($image);
exit();
?>
