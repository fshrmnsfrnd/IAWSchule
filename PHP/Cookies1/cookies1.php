<?php
    $html = file_get_contents("./cookie1.html");
    $begrusung = "<h1>Hallo {name}";
    if(isset($_COOKIE['name'])){
        $begrusung = str_replace('{name}', $_COOKIE['name'], $begrusung);
        $html = str_replace('{begrusung}', $begrusung, $html);
        
    } else {
        $html = str_replace('{username}', '', $html);
        
    }

    if(isset($_GET['name'])){
        setcookie('name', $_GET['name'], time() + 3600,'/');
    }

    print $html;
?>