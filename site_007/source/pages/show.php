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
        $count = 1;

        echo "<table border=1px>";

        while($data = fgetcsv($file, 1000, ';')) {

            echo "<tr>";

            for($i = 0; $i < count($data); $i++) {

                if($i == count($data) - 1 && $count != 1) {

                    echo "<td><img src='$data[$i]' alt='$data[$i]' width='100px'/></td>";

                } else {

                    echo "<td width='100px'> $data[$i] </td>";

                }
            }

            echo "</tr>";

            $count++;

        }

        echo "</table>";     

    ?>

</body>
</html>