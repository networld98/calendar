<?session_start();
require "calendar.php"; ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>Eva test</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="cointainter">
        <div class="col-2">
            <div class="calendar">
                <h3>Календарь</h3>
               <?
               if(!empty($_GET['month'])){
                   $month = $_GET['month'];
               }else{
                   $month = date('n');
               }
               calendar($month);
               ?>
            </div>
        </div>
        <div class="col-2">
            <div class="note">
                <h3>Заметки текущего месяца</h3>
                <div class="conteiner-notes">
                    <?
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
                            if(ltrim($note[0], '0') == $month){
                                echo trim($note[1])."\n";
                            }}?></textarea>
                </div>
                <h3>Добавить новую заметку</h3>
               <textarea name="note" id="note" cols="30" rows="4" placeholder="Выберите дату, на календаре, на которую необходимо сделать запись"></textarea>
                   <button id="btn">Сохранить</button> <span class="error" >Не выбрали дату!!!</span>
            </div>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/app.js" type="text/javascript"></script>
</body>
</html>