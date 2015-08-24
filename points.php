<?php

include './functions.php';

$data = get_points();

if (isset($_GET['size'])) {
    echo(json_encode(array('size' => count($data))));
}
else {
    echo(json_encode($data));
}

?>