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
    for ($i=1; $i <= 100 ; $i++) { 
        $a1[] = rand(1, 100);
    }
    $sum = 0;
    for ($i=1; $i < 100 ; $i++) { 
        $sum += $a1[$i];
    }
    print $sum;

//Aufgabe 2
    $a2[] = [3, 8, 15, 1, 10];
    $min = $a2[0];
    $max = $a2[0];
    foreach ($a2 as $number) {
        if($number < $min){
            $min = $number;
        }elseif ($number > $max) {
        $max = $number;
        }
    }

//Aufgabe 3
    $a3[] = [
            'name' => 'Max',
            'alter' => '25',
            'stadt' => 'Berlin'
            ];

    var_dump($a3);

//Aufgabe 4
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

//Aufgabe 5

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

//Aufgabe 6
$mitarbeiter = [
    ["name" => "Max", "position" => "Entwickler", "gehalt" => 5000],
    ["name" => "Anna", "position" => "Designer", "gehalt" => 4500],
    ["name" => "Tom", "position" => "Manager", "gehalt" => 6000]
];

foreach ($mitarbeiter as $key => $value) {
    print $value['name'];
    $summe = $value['gehalt'];
}
print $summe;

//Aufgabe 7
function wordcount($inarr){
    $countarr = [];
    foreach ($inarr as $word) {
        if(array_key_exists($word, $countarr)){
            $countarr[$word] ++;
        }else{
            array_push($countarr, [$word, 1]);
        }
    }
}
$worter = ["Apfel", "Banane", "Apfel", "Orange", "Banane", "Apfel"];
print wordcount($worter);
?>
    
</body>
</html>