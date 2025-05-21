<?php
    $login = file_get_contents("./loginPage.html");

    $addComment = file_get_contents("./newComment.html");
    $commentsHTML = file_get_contents("./comments.html");
    $commentsHTML .= file_get_contents("./newComment.html");

    $page = file_get_contents("./page.html");

    $csv = fopen("users.csv", "r");

    session_start();

    //login-Page
    if (isset($_GET['userName']) && isset($_GET['pwd']) && !(isset($_SESSION['loggedIn'])) ) {
        
        $csv = fopen("./users.csv", "r");

        while ($zeile = fgets($csv)) {

            $user = (explode(",", $zeile))[0];
            $pwd = (explode(",", $zeile))[1];
        
            if($user == $_GET['userName'] && $pwd == $_GET['pwd']){
                $html = str_replace("{site}", $commentsHTML, $page);
                $_SESSION['loggedIn'] = true;
                $_SESSION['userName'] = $_GET['userName'];
                break;
            }else{
                $html = str_replace("{site}", $login, $page);
            }
        }
    } else if (!(isset($_SESSION['loggedIn']))) {
        $html = str_replace("{site}", $login, $page);
    }
    
    //already logged in
    if(isset($_SESSION['loggedIn'])){
        $html = str_replace("{site}", $commentsHTML, $page);

        if(isset($_GET['commentHeader']) && isset($_GET['commentText'])){
            $commenthtml = "<div><i>" . $_SESSION['userName'] . "</i><h2>" . $_GET['commentHeader'] . "</h2><p>" . $_GET['commentText'] . "</p></div>";
            $commentsFile = fopen("./comments.html", "a");
            fputs($commentsFile, $commenthtml);
            fclose($commentsFile);

            $commentsHTML = file_get_contents("./comments.html");
            $commentsHTML .= file_get_contents("./newComment.html");

            $html = str_replace("{site}", $commentsHTML, $page);
        }
    }

    fclose($csv);
    print $html;
?>