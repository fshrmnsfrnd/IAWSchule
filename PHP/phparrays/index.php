<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
//Aufgabe 1
print "Aufgabe1<br>";
    for($i=1; $i <= 100 ; $i++) { 
        $a1[] = rand(1, 100);
    }
    $sum = 0;
    for ($i=1; $i < 100 ; $i++) { 
        $sum += $a1[$i];
    }
    print $sum;
    print '<br>';
print '<br>';

//Aufgabe 2
print "Aufgabe2<br>";
$summe = 0;
    $a2 = [3, 8, 15, 1, 10];
    $min = $a2[0];
    $max = $a2[0];
    foreach ($a2 as $number) {
        if($number < $min){
            $min = $number;
        }elseif ($number > $max) {
        $max = $number;
        }
        $summe = $summe + $number;
    }
    print "Gesamtpreis: $summe";
    print '<br>';
print '<br>';

//Aufgabe 3
print "Aufgabe3<br>";
    $a3 = [
            'name' => 'Max',
            'alter' => '25',
            'stadt' => 'Berlin'
            ];

    foreach ($a3 as $key => $value) {
        print "$key : $value <br>";
    }
print '<br>';
print '<br>';

//Aufgabe 4
print "Aufgabe4<br>";
    $noten = [
        "Anna" => 2,
        "Ben" => 3,
        "Clara" => 1,
        "David" => 4
    ];

    foreach ($noten as $name => $note) {
        if($note < 3){
            print $name;
        }
    }
print '<br>';
print '<br>';

//Aufgabe 5
print "Aufgabe5<br>";
$produkte = [
    "Apfel" => 1.20,
    "Brot" => 2.50,
    "Milch" => 1.00,
    "Eier" => 2.30
];

foreach($produkte as $produkt => $preis){
    $sum += $preis;
}

print $sum;
print '<br>';
print '<br>';

//Aufgabe 6
print "Aufgabe6<br>";
$mitarbeiter = [
    ["name" => "Max", "position" => "Entwickler", "gehalt" => 5000],
    ["name" => "Anna", "position" => "Designer", "gehalt" => 4500],
    ["name" => "Tom", "position" => "Manager", "gehalt" => 6000]
];
$summe = 0;
$counter = 0;
$html = '<table><tr><th>Name</th><th>Gehalt</th></tr>';
foreach ($mitarbeiter as $key => $value){
    $html .= '<tr><td>';
    $html .= $value['name'];
    $html .= '</td><td>';
    $html .= $value['gehalt'];
    $html .= '</td></tr>';
    $summe += $value['gehalt'];
    $counter++;
}
$html = '</table>';
print $html;
print $summe / $counter;
print '<br>';
print '<br>';

//Aufgabe 7
print "Aufgabe7<br>";
$worter = ["Apfel", "Banane", "Apfel", "Orange", "Banane", "Apfel"];
$countarr = [];
foreach ($worter as $word) {
    if(isset($countarr[$word])){
        $countarr[$word] ++;
    }else{
        $countarr[$word] = 1;
    }
}
var_dump($countarr);
print '<br>';
print '<br>';

//Aufgabe 8
print "Aufgabe8<br>";
$numbers = [5, 3, 8, 1, 4, 3, 7, 8, 10, 1];
$ready = false;

while(!$ready){
    $ready = true;
    for ($i=0; $i < count($numbers) - 1; $i++) { 
        if($numbers[$i] > $numbers[$i+1]){
            $temp = $numbers[$i];
            $numbers[$i] = $numbers[$i+1];
            $numbers[$i+1] = $temp;
            $ready = false;
        }
    }
}

foreach($numbers as $number){
    print "$number, ";
}

?>    
</body>
</html>