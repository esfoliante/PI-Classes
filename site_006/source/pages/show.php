<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriculas</title>
</head>
<body>
    
    <?php

        $file = fopen('../utils/data.csv', 'r');

        echo "<table border=1px>";

        while($data = fgetcsv($file, 1000, ';')) {

            echo "<tr>";

            for($i = 0; $i < count($data); $i++) {
                echo "<td> $data[$i] </td>";
            }

            echo "</tr>";

        }

        echo "</table>";     

    ?>

</body>
</html>