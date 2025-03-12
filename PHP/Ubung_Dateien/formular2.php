<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<pre>
    <?php
        $csv = fopen("Messwerte.csv", "a");
        //Schreiben
        print "GET: ";
        var_dump($_GET);
        /*
        $werte = $_GET['temperatur'] . ",";
        $werte .= $_GET['wetterbeschreibung'] . ",";
        $werte .= $_GET['windstärke'] . ",";
        $werte .= $_GET['windrichtung'] . ",";
        $werte .= $_GET['messzeit'] . "\n";
        print $werte;
        fputs($csv, $werte);
        */
        fclose($csv);
        ?>
</pre>

<body>
    <a href="./formular.php">Formular</a>
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
</body>

</html>