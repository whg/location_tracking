<?php

include './functions.php';

$data = file2data('locations.csv', array('lat', 'lon', 'time', 'hacc', 'vacc'));

if (isset($_GET['size'])) {
    echo(json_encode(array('size' => count($data))));
}
else {
    echo(json_encode($data));
}

?>