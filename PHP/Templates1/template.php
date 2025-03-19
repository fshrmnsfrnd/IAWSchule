<?php
$pictureDir = "./src/bilder/";
$pictures = scandir($pictureDir);

$htmlTemplate = './rahmen.html';
$html = file_get_contents($htmlTemplate);

$i = 2;

if($_GET != NULL){
    $i = (int)$_GET['nr'];

    

    if($_GET['action'] == 'next'){
        $i++;
    }else if($_GET['action'] == 'back'){
        $i--;
    }

    if($i < 2){
        $i = 2;
    }elseif ($i > 15) {
        $i = 15;
    }
}

$newPicture = './src/bilder/' . $pictures[$i];
$html = str_replace("{picnr}", $i, $html);
$html = str_replace('{PicturePath}', $newPicture, $html);

print $html;
?>