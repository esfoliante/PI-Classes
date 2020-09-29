<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
</head>

<body>
    <?php

    $tasks = array("Limpar a casa", "Fazer a cama", "Estudar");
    $done = array("Passear a Saji");

    ?>

    <h1>TO-DO LIST</h1>
    <div class="content">
        <div class="todo">
            <h3>To-do</h3>
            <div class="todo-content">
                <?php
                for ($i = 0; $i < count($tasks); $i++) {
                    echo "<br/><a href='#'>$tasks[$i]</a><br/>";
                }
                ?>
            </div>
        </div>

        <div class="done">
            <h3>Done</h3>
            <div class="done-content">
                <?php
                for ($i = 0; $i < count($done); $i++) {
                    echo "<br/><a href='#'>$done[$i]</a><br/>";
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>