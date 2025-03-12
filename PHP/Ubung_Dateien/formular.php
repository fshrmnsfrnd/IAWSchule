<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="formular2.php" method="get" enctype="multipart/form-data">
        <p>Temperatur in C: </p>
        <input required type="number" name="temperatur" id="temperatur"><br>
        <p>Wetterbeschreibung: </p>
        <input required type="text" name="wetterbeschreibung" id="wetterbeschreibung"><br>
        <p>Windstärke in km/h: </p>
        <input required type="number" name="windstärke" id="windstärke"><br>
        <p>Windrichtung: </p>
        <input required type="text" name="windrichtung" id="windrichtung"><br>
        <p>Messzeit: </p>
        <input required type="datetime-local" name="messzeit" id="messzeit" value="<?php print(date('Y-m-d\TH:i')) ?>"><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>