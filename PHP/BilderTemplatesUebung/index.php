<?php
$html = file_get_contents("./page.html");
$dir = "./src/bilder/";
$picturePaths = scandir("./src/bilder/");
$nextPictureNr = 2; 

if(isset($_GET["previousNext"])){
    
    if($_GET["previousNext"] == "previous"){
        $nextPictureNr = (int) $_GET["currentPicture"] - 1;
    }else if($_GET["previousNext"] == "next"){
        $nextPictureNr = (int) $_GET["currentPicture"] + 1;
    }
    
}

$pictureToShow = $dir . $picturePaths[$nextPictureNr];

$html = str_replace("{pictureNr}", $nextPictureNr, $html);
$html = str_replace("{picturePath}", $pictureToShow, $html);
print $html;
?>