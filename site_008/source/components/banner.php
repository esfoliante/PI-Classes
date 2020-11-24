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

    $query = "SELECT * FROM banner ORDER BY rand() LIMIT 1";
    $banner = db_query($connection, $query);

?>

<section id="banner" style="background-image: url('<?php echo $banner[0]['image_path'] ?>')">
    <strong><h1><?php echo $banner[0]['title'] ?></h1></strong>
    <strong><p><?php echo $banner[0]['quote'] ?></p></strong>
</section>