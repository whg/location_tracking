<?php

$lat = $_GET['lat'];
$lon = $_GET['lon'];
$time = $_GET['time'];
$vaccuracy = $_GET['hacc'];
$haccuracy = $_GET['vacc'];

$line = "$lat, $lon, $time, $haccuracy, $vaccuracy\n";

$file = "locations.csv";

file_put_contents($file, $line, FILE_APPEND);

echo("wrote $line to $file");
?>