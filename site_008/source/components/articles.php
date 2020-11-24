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

$query = "SELECT * FROM quotes ORDER BY rand() LIMIT 3";
$quotes = db_query($connection, $query);

?>

<section id="one" class="wrapper">
    <div class="inner">
        <div class="flex flex-3">
            <?php
                foreach ($quotes as $quote) {
                    ?>
                        <article>
                            <header>
                                <h3><?php echo $quote['episode'] ?></h3>
                            </header>
                            <p><?php echo $quote['quote'] ?></p>
                            <footer>
                                <a href="#" class="button special">More</a>
                            </footer>
                        </article>
                    <?
                }
            ?>
        </div>
    </div>
</section>