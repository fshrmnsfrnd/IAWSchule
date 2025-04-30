<?php
    $html = file_get_contents("./page.html");
    
    if(isset($_COOKIE['counter']) && isset($_COOKIE['time'])){
        $timediff = Time() - $_COOKIE['time'];
        print("Timediff: ");
        print($timediff);
        if($timediff <= 10){
            setcookie('counter', ++$_COOKIE['counter'], Time() + 3600 * 200);
            setcookie('time', Time(), Time() + 3600 * 200);
        }else{
            setcookie('counter', 0, Time() + 3600 * 200);
            setcookie('time', Time(), Time() + 3600 * 200);
        }
    }else{
        setcookie('counter', 0, Time() + 3600 * 200);
        setcookie('time', Time(), Time() + 3600 * 200);
    }

    $html = str_replace('{counter}', $_COOKIE['counter'], $html);
    print("\n Counter: ");
    print($_COOKIE['counter']);
?>