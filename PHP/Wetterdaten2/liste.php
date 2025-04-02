<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
        //print("$zeile<br>");

    }
    print "</table>";
    fclose($csv);
    ?>
</body>
</html>
