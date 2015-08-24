<?php

include './functions.php';
$filename = 'posts.csv';

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $url = $_GET['url'];

    $last_point = end(get_points());
    
    
    $line = "$title, $url, " . $last_point['lat'] . ", " . $last_point['lon'] . "\n";
    
    file_put_contents($filename, $line, FILE_APPEND);
    echo("wrote $line");
}
else {
    echo(json_encode(file2data($filename, array('title', 'url', 'lat', 'lon'), false)));
}

?>