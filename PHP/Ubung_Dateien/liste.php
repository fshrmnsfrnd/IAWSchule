<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./liste.php" method="post">
        <p>Temperatur in C: </p> <input required type="number" name="temperatur" id="temperatur"><br>
        <p>Wetterbeschreibung: </p> <input required type="text" name="wetterbeschreibung" id="wetterbeschreibung"><br>
        <p>Windstärke in km/h: </p> <input required type="number" name="windstärke" id="windstärke"><br>
        <p>Windrichtung: </p> <input required type="text" name="windrichtung" id="windrichtung"><br>
        <p>Messzeit: </p> <input required type="datetime-local" name="messzeit" id="messzeit" value="<?php fputs($csv, date('d.m.Y,h:i'));?>"><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>

<?php
$werte[] = [];
$csv = fopen("Messwerte.csv", "a");
//Schreiben
foreach ($_POST as $key => $value) {
    $werte[] .= "$value ,";
    fputs($csv, "$value,");
}
//fputs($csv, date("d.m.Y/h:i"));
fputs($csv, "\n");
fclose($csv);

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