<?php

$filename = date('d.m.y|H:i:s');
$filename = "backups/" . $filename;
$filehandle = fopen($filename, 'w') or die("can't open file");
fclose($filehandle);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $filename)) {
  echo($filename);
}

?>