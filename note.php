<?php
$note = "hbfhfdh";
$f = fopen(__DIR__.'/db.txt','a');
fwrite($f, $note."\n");
fclose($f);
?>