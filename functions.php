<?php

function file2data($filename, $cols, $number=true) {

    $data = array();
    $file = fopen($filename, 'r');
    
    while (($line = fgetcsv($file)) !== FALSE) {
        if ($number) {
            foreach($line as &$value) {
                $value = floatval($value);
            }
        }
        $data[] = array_combine($cols, $line);
    }
    fclose($file);

    return $data;
}

function get_points() {
    return file2data('locations.csv', array('lat', 'lon', 'time', 'hacc', 'vacc'));
}

?>