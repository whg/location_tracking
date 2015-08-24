<?php

$data = array();

$file = fopen('locations.csv', 'r');
$cols = array('lat', 'lon', 'time', 'hacc', 'vacc');
while (($line = fgetcsv($file)) !== FALSE) {
    foreach($line as &$value) {
        $value = floatval($value);
    }
    $data[] = array_combine($cols, $line);
}
fclose($file);

if (isset($_GET['size'])) {
    echo(json_encode(array('size' => count($data))));
}
else {
    echo(json_encode($data));
}

?>