<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>

    <?php
    $column = 0;
    $row = 0;
    $table = "<table>";
    $sum = 0;
    $cellCounter = 0;

    for ($row = 1; $row <= 50; $row++) {
        $table .= "<tr>";
        for ($column = 1; $column <= 10; $column++) {
            $randNum = rand(-10000, 10000);
            $sum += $randNum;
            $cellCounter++;
            $table .= "<td";
            if ($randNum > 0) {
                $table .= " style='color: blue'>";
            } else if ($randNum < 0) {
                $table .= " style='color: red'>";
            } else {
                $table .= ">";
            }
            $table .= $randNum;
            $table .= "</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</table>";
    print "Durchschnitt: " . $sum / $cellCounter . "<br/><br/><br/>";
    print $table;
    ?>
    </table>

</body>

</html>