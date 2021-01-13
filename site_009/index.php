<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site 009</title>
</head>

<body>
    <?php

        include './vendor/autoload.php';
        include './source/functions/database.inc.php';
        include './source/functions/functions.inc.php';

        $information = [
            "hostname" => "localhost",
            "username" => "root",
            "password" => "root",
            "database" => "site_009"
        ];

        $connection = db_connect($information);

        function menu($parent_id = 0, $level = 1)
        {
            global $connection;

            $query = 'SELECT * FROM catalogo WHERE active = 1 AND parent =' . $parent_id;
            $children = db_query($connection, $query);
            
            foreach ($children as $child) {
                $arrow = "";

                for($j = 0; $j < $level; $j++) { 
                    $arrow .="-->"; 
                } 

                echo ($arrow . $child['name']. "</br>");
                menu($child['ID'], $level + 1); 
            }

        }

        menu();

    ?>
</body>

</html>