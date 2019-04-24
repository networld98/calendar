<?php
$date = $_POST["date"];
$note = $_POST["note"];
$month = $_POST["month"];
$f = fopen(__DIR__.'/db.txt','a');
fwrite($f, $month." | ".$date.".".$month." : ".$note."\n");
fclose($f);
?>