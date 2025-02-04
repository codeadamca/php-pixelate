<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Image to Pixelated Image</title>

    <style>

    img {
        image-rendering: pixelated;
    }

    </style>

</head>
<body>

    <h1>Convert Image to Pixelated Image</h1>
        

    <?php

    // https://stackoverflow.com/questions/5752514/how-to-convert-png-to-8-bit-png-using-php-gd-library

    function image_pixelate($source, $destination) 
    {

        $source_image = imagecreatefromjpeg($source);
        list($width, $height) = getimagesize($source);

        $destination_image = imagecreatetruecolor(16, 16);

        imagecopyresized(
            $destination_image,
            $source_image,
            0, 0, 0, 0,
            16, 16, $width, $height
        );

        imagetruecolortopalette($destination_image, false, 8);

        imagegif($destination_image, $destination);
        imagedestroy($destination_image);

    }


    image_pixelate('bird.jpg', 'bird-converted.png');

    echo '<img src="bird.jpg" width="200">';
    echo '&nbsp;';
    echo '<img src="bird-converted.png" width="200">';
    echo '&nbsp;';
    echo '<img src="bird-pixelated.gif" width="200">';  

    ?>

</body>
</html>