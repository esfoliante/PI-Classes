<?php

    include_once '../../vendor/autoload.php';
    include_once '../functions/database.inc.php';
    include_once '../functions/functions.inc.php';

    $information = [
        "hostname" => "127.0.0.1",
        "username" => "root",
        "password" => "",
        "database" => "site_008"
    ];

    $connection = db_connect($information);

    $query = "SELECT * FROM menu ORDER BY line";
    $items = db_query($connection, $query);

?>

<header id="header">
    <div class="inner">
        <a class="logo">Depressed Bojack</a>
        <nav id="nav">
            <?php
                foreach ($items as $key => $value) {
                    ?>
                        <a href=""><?php echo $value['name'] ?></a>
                    <?php
                }
            ?>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header>
