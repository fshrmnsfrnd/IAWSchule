<?php
$pictureDir = "./src/bilder2/";

$htmlTemplate = './rahmen.html';
$html = file_get_contents($htmlTemplate);

$i = 2;
$dir;

if($_GET != NULL){
    $pictureDir = './src/' . $_GET['dir'] . '/';

    $i = (int)$_GET['nr'];

    if($_GET['action'] == 'next'){
        $i++;
    }else if($_GET['action'] == 'back'){
        $i--;
    }

    if($i < 2){
        $i = 2;
    }elseif ($i > 14) {
        $i = 15;
    }
}

$pictures = scandir($pictureDir);
$newPicture = $pictureDir . $pictures[$i];
$html = str_replace("{picnr}", $i, $html);
$html = str_replace('{PicturePath}', $newPicture, $html);

print $html;
?>