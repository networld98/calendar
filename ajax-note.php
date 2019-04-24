<?
    $month = $_COOKIE['month'];
    $filedb = fopen('db.txt','r');
    while (($data = fgetcsv($filedb, 0, "\t")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
            $str = explode(' | ', $data[$c]);
            $db[] = $str;
        }
    }
    ?>

    <textarea name="notes" id="notes" rows="8"><?foreach ($db as $note){
           if(ltrim($note[0], '0') == ltrim($month, '0')){
               echo trim($note[1])."\n";
            }
        }?>
    </textarea>