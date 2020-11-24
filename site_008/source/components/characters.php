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

    $query = "SELECT * FROM characters";
    $characters = db_query($connection, $query);

?>

<section id="two" class="wrapper style1 special">
    <div class="inner">
        <header>
            <h2>Characters</h2>
        </header>

        <div class="flex flex-4">
        <?php
        foreach($characters as $character) {
        ?>
            <div class="box person">
                <div class="image round">
                    <img src="./source/images/<?php echo $character['photo'] ?>" alt="<?php echo $character['name'] ?>" width="200px" height="200px"/>
                </div>
                <h3><?php echo $character['name'] ?></h3>
                <p><?php echo $character['description'] ?></p>
                <p><?php echo $character['state'] ?></p>
            </div>
        <?php
        }
        ?>
        </div>
    </div>
</section>