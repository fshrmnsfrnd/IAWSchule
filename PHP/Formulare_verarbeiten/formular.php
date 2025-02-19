<?php   
    print "<table>";
    print "<tr><th>Key</th><th>Value</th></tr>";
    foreach ($_POST as $key => $value) {
        print "<tr>";
        print "<td>$key</td>";
        print "<td>$value</td>";
        print "</tr>";
    }
    var_dump($_POST);
    print "</table>";
?>