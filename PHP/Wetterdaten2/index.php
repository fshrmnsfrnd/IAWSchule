<?php
//Ausgeben
$csv = fopen("Messwerte.csv", "r");
print '<table>';
while ($zeile = fgets($csv)) {
    $line = explode(",", $zeile);
    print '<tr>';
    foreach ($line as $value) {
        print "<td>$value</td>";
    }
    print "</tr>";
}
print "</table>";
fclose($csv);
?>