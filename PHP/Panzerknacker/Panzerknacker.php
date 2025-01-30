<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Panzerknacker.css">
    <title>Document</title>
</head>

<body>
    <?php
    $possibleNumbers[] = [];
    $counter = 0;

    for ($i = 0; $i <= 9; $i++) {
        for ($j = 0; $j <= 9; $j++) {
            for ($k = 0; $k <= 9; $k++) {
                $possibleNumbers[$counter] = $i . $j . $k;
                $counter++;
            }
        }
    }

    $count = 0;
    $html = "";

    for ($k=0; $k < 10; $k++) {
        $html .= "<div class=green>";
        for ($j = 0; $j < 10; $j++) { //hierdrin 10 rote Kastchen 
            $html .= "<div class=red>";
            for ($i = 1; $i <= 10; $i++) { //hierdrin 10 Kombinationen
                $html .= "<div>";
                $html .= $possibleNumbers[$count];
                $html .= " ";
                $html .= "</div>";
                $count++;
            }
            $html .= "</div>";
        }
        $html .= "</div>";
    }
    print $html;
    ?>
</body>

</html>