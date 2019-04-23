<?php
$date = $_POST["date"];
$note = $_POST["note"];
$f = fopen(__DIR__.'/db.txt','a');
fwrite($f, $date.",".$note."\n");
fclose($f);
?>