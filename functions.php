<?php

function file2data($filename, $cols) {

    $data = array();
    $file = fopen($filename, 'r');
    
    while (($line = fgetcsv($file)) !== FALSE) {
        foreach($line as &$value) {
            $value = floatval($value);
        }
        $data[] = array_combine($cols, $line);
    }
    fclose($file);

    return $data;
}


}

?>