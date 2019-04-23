<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>Eva test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cointainter">
        <div class="col-2">
            <div class="calendar">
                <?
                $thismonth = date('n');
                $dayofmonth = date("t", mktime(0, 0, 0, $thismonth, 1, 2019));
                $namemonth = date("F", mktime(0, 0, 0, $thismonth, 1, 2019));
                $day_count = 1;

                $num = 0;

                for ($i = 0; $i < 7; $i++) {

                    $dayofweek = date('w',

                        mktime(0, 0, 0, date('m'), $day_count, date('Y')));

                    $dayofweek = $dayofweek - 1;

                    if ($dayofweek == -1) $dayofweek = 6;

                    if ($dayofweek == $i) {

                        $week[$num][$i] = $day_count;

                        $day_count++;

                    } else {
                        $week[$num][$i] = "";
                    }
                }
                while (true) {
                    $num++;

                    for ($i = 0; $i < 7; $i++) {
                        $week[$num][$i] = $day_count;
                        $day_count++;
                        if ($day_count > $dayofmonth) break;
                    }
                    if ($day_count > $dayofmonth) break;
                }

                echo "<table border=1>";
                echo "<tr>";
                echo "<td><p id='prev'><<</p></td>";
                echo "<td colspan='5' ><p>$namemonth</p></td>";
                echo "<td><p id='next'>>></p></td>";
                echo "</tr>";
                for ($i = 0; $i < count($week); $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 7; $j++) {
                        if (!empty($week[$i][$j])) {
                            if ($j == 5 || $j == 6)

                                echo "<td><p class='date' data-date='" . $week[$i][$j] . "." . $thismonth . "'><font color=red>" . $week[$i][$j] . "</font></p></td>";

                            else echo "<td><p class='date' data-date='" . $week[$i][$j] . "." . $thismonth . "'>" . $week[$i][$j] . "</p></td>";

                        } else echo "<td>&nbsp;</td>";

                    }
                    echo "</tr>";
                }
                echo "</table>";
                ?>
            </div>
        </div>
        <div class="col-2">
            <div class="note">
                <div class="col-2">Заметки</div>
                <div class="col-2"><button id="btn">Сохранить</button></div>

                <textarea name="note" id="note" cols="30" rows="20"></textarea>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/app.js" type="text/javascript"></script>
</body>
</html>