<?php

use BU\VictorBocharsky\Exam\Resizer;
use BU\VictorBocharsky\Exam\Image;

require_once __DIR__ . '/../vendor/autoload.php';
$image = new Image(640, 480);
$resizer = new Resizer($image, 50, 50);
print $resizer->thumbnail();