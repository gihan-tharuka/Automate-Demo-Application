<?php
$imagePath = 'storage/vehicle-photos/01K5TWBTYPZSBPDAZWRA5DKP6T.jpeg';
echo "<!DOCTYPE html>
<html>
<head>
    <title>Test Image</title>
</head>
<body>
    <h1>Testing Image Display</h1>
    <p>Image path: {$imagePath}</p>
    <img src=\"{$imagePath}\" alt=\"Vehicle Image\" style=\"max-width: 300px;\">
</body>
</html>";