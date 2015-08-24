<?php

$filename = 'posts.csv';

if (isset($_GET('title'))) {
    $title = $_GET['title'];
    $url = $_GET['url'];

    $line = "$title, $url";
    file_put_contents($filename, $line, FILE_APPEND);
    echo('wrote');
}
else {
    include './functions.php';
    return json_encode(file2data($filename));
}

?>