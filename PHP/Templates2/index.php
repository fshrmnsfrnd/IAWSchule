<?php
    $logintemplate = './login.html';
    $page = './page.html';
    $html = file_get_contents($logintemplate);
    $html = str_replace('{username}', '', $html);
    $html = str_replace('{password}', '', $html);
    $html = str_replace('{errormessage}', '', $html);


    if ($_POST != NULL){
        if ($_POST['username'] == 'user1' && $_POST['password'] == 'Pa$$w0rd') {
            $html = file_get_contents($page);
            $csv = fopen("Messwerte.csv", "r");
            $table = '<table>';

            while ($zeile = fgets($csv)) {
                $line = explode(",", $zeile);
                $table .= '<tr>';
                foreach ($line as $value) {
                    $table .= "<td>$value</td>";
                }
                $table .= "</tr>";
            }

            $table .= "</table>";
            fclose($csv);
            
            $html = str_replace('{table}', $table, $html);
        }else{
            $newhtml = file_get_contents($logintemplate);
            $newhtml = str_replace('{username}', $_POST['username'], $newhtml);
            $newhtml = str_replace('{password}', $_POST['password'], $newhtml);
            $newhtml = str_replace('{errormessage}', 'Falscher Login', $newhtml);
            $html = $newhtml;
        }
    }

    print($html);
?>