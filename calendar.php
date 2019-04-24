<?
function calendar($month){
    $prevmonth = $month-1;
    $thismonth = $month;
    $nextmonth = $month+1;
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
        echo "<td class='arrow'><p id='prev' data-prev='$prevmonth'><<</p></td>";
        echo "<td colspan='5' ><p>$namemonth</p></td>";
        echo "<td class='arrow'><p id='next' data-next='$nextmonth'>>></p></td>";
    echo "</tr>";
    $monfull = date("m", mktime(0, 0, 0, $thismonth, 1, 2019));
    for ($i = 0; $i < count($week); $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            if (!empty($week[$i][$j])) {
                if ($j == 5 || $j == 6)

                    echo "<td><p class='date' data-month='" . $monfull . "'  data-date='" . $week[$i][$j] . "'><font color=red>" . $week[$i][$j] . "</font></p></td>";

                else echo "<td><p class='date' data-month='" . $monfull  . "' data-date='" . $week[$i][$j] . "'>" . $week[$i][$j] . "</p></td>";

            } else echo "<td>&nbsp;</td>";

        }
        echo "</tr>";
    }
    echo "</table>";
}
?>