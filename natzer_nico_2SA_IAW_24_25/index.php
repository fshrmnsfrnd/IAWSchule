<?php
session_start();
$html = file_get_contents("./template.html");

//Farbe
$color = "rot";
if (isset($_SESSION['color'])) {
    $color = $_SESSION['color'];
}
if (isset($_GET["farbe"])) {
    if($_GET["farbe"] != ""){
        $color = $_GET["farbe"];
    }
}
$_SESSION['color'] = $color;
$html = str_replace("{" . $color . "}", "selected", $html);
$html = str_replace("{rot}", "", $html);
$html = str_replace("{gruen}", "", $html);
$html = str_replace("{blau}", "", $html);
$html = str_replace("{gelb}", "", $html);


//Date
$html = str_replace("{date}", date('Y-m-d H:i'), $html);

//Gruss
$hour = (int) date('H');
$gruss;
if($hour <= 10){
    $gruss = "Guten Morgen ";
}else if ($hour <= 17) {
    $gruss = "Guten Tag ";
}else{
    $gruss = "Guten Abend ";
}
$html = str_replace("{gruss}", $gruss, $html);

//Username
$userName = "Gast";
if(isset($_SESSION['userName'])){
    $userName = $_SESSION['userName'];
}
if(isset($_GET["username"])){
    if($_GET["username"] != ""){
        $userName = $_GET["username"];
    }
}
$_SESSION['userName'] = $userName;
$html = str_replace("{userName}", $userName, $html);

//Buchstabe filtern
$buchstabe;
$filter = false;
if(isset($_GET["buchs"])){
    $buchstabe = $_GET["buchs"];
    $filter = true;
}

//create Table
$csv = fopen("adressen.csv", "r");
$table = '<table class="' . $color . '">';
$lineNr = 0;
while ($zeile = fgets($csv)) {
    $line = explode(",", $zeile);
    $firstLetter = substr($line[1], 0, 1);
    if($lineNr == 0){
        $table .= '<tr>';
        $table .= "<th>Name</th>";
        $table .= "<th>Vorname</th>";
        $table .= "<th>Straße</th>";
        $table .= "<th>Nr.</th>";
        $table .= "<th>PLZ</th>";
        $table .= "<th>Stadt</th>";
        $table .= "<th>Bundesland</th>";
        $table .= "</tr>";
    }else if($filter == true && $buchstabe == $firstLetter){
        $table .= '<tr>';
        $table .= "<td>" . $line[1] . "</td>";
        $table .= "<td>" . $line[0] . "</td>";
        $table .= "<td>" . $line[2] . "</td>";
        $table .= "<td>" . $line[3] . "</td>";
        $table .= "<td>" . $line[4] . "</td>";
        $table .= "<td>" . $line[5] . "</td>";
        $table .= "<td>" . $line[6] . "</td>";
        $table .= "</tr>";
    }else if($filter == false){
        $table .= '<tr>';
        $table .= "<td>" . $line[1] . "</td>";
        $table .= "<td>" . $line[0] . "</td>";
        $table .= "<td>" . $line[2] . "</td>";
        $table .= "<td>" . $line[3] . "</td>";
        $table .= "<td>" . $line[4] . "</td>";
        $table .= "<td>" . $line[5] . "</td>";
        $table .= "<td>" . $line[6] . "</td>";
        $table .= "</tr>";
    }
    
    $lineNr++;
}
$table .= "</table>";
$html = str_replace("{data}", $table, $html);
fclose($csv);



print $html;
?>