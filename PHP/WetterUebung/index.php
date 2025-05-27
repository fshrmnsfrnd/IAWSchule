<?php
//Load Main HTML
$html = file_get_contents("./page.html");

//insert input Form
$input = file_get_contents("./input.html");
$html = str_replace("{input}", $input, $html);

//If input Write in CSV
if( isset($_GET["temperatur"]) 
    && isset($_GET["beschreibung"]) 
    && isset($_GET["windstearke"]) 
    && isset($_GET["windrichtung"])
    ){
        $csv = fopen("./daten.csv", "a");
        $line = $_GET["temperatur"] . ",";
        $line .= $_GET["beschreibung"] . ",";
        $line .= $_GET["windstearke"] . ",";
        $line .= $_GET["windrichtung"] . ",";
        $line .= date('Y-m-d H:i') . "\n";
        fputs($csv, $line);
        fclose($csv);
    }
unset($_GET["temperatur"]);
unset($_GET["beschreibung"]); 
unset($_GET["windstearke"]);
unset($_GET["windrichtung"]);

//Read CSV
$table = "<table>";
$csv = fopen("./daten.csv", "r");
while ($zeile = fgets($csv)) {
    $line = explode(",", $zeile);
    $table .= '<tr>';
    foreach ($line as $value) {
        $table .= "<td>$value</td>";
    }
    $table .= "</tr>";
}
$table .= "</table>";
fclose($csv);
$html = str_replace("{data}", $table, $html);

//Buid Average Temperature
$csv = fopen("./daten.csv", "r");
$allTemperatures = [];
while ($zeile = fgets($csv)) {
    $line = explode(",", $zeile);
    array_push($allTemperatures, $line[0]);
}
fclose($csv);

$sumOfTemperatures = 0;
foreach ($allTemperatures as $value) {
    $sumOfTemperatures += (int) $value;
}

$avgTemperature = 0;
if(sizeof($allTemperatures) > 0){
    $avgTemperature = $sumOfTemperatures / sizeof($allTemperatures);
}

$html = str_replace("{avgTemperatur}", $avgTemperature, $html);

//Seite ausgeben
print $html;
?>