<?php

    function printArrow($level) {
        return ("-->" * $level);
    }

    function showChild($child) {
        return printArrow(2) . $child['name'];
    }
 
    function showData($data) {
        $query = "SELECT * FROM catalogo WHERE active=1 AND parent=".$data['ID'];
        $child = db_query($connection, $query);

        echo printArrow(1) . $data['name'];
        echo showChild();
    }

    $query = "SELECT * FROM catalogo WHERE active=1 AND parent=0";
    $data = db_query($connection, $query);

    echo showData($data);

?>