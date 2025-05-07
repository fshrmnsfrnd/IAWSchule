<?php
$html = file_get_contents('./page.html');
$listItemTemplate = '<li>{word}</li>';
session_start();

if (isset($_SESSION['words'])) {
    if (isset($_GET['newWord'])) {
        $_SESSION['words'][] = $_GET['newWord'];
    }
    if (sizeof($_SESSION['words']) > 0) {
        foreach($_SESSION['words'] as $word){
            $newListItem = str_replace('{word}', $word, $listItemTemplate);
            $html = str_replace('{words}', $newListItem . '{words}', $html);
        }
    }
}else {
    $_SESSION['words'] = [];
}
$html = str_replace('{words}', '', $html);
print $html;
?>