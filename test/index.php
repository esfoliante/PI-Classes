<?php

include_once './vendor/autoload.php';

include './functions/database.inc.php';

$information = [
    "hostname" => "127.0.0.1",
    "username" => "root",
    "password" => "",
    "database" => "test"
];
// ? this is a default connection
$connection = db_connect($information);

$query = "INSERT INTO users (name, email, age) VALUES ('Miguel Ferreira', 'miguel.personal@protonmail.com', '17')";

db_query($connection, $query);

db_close($connection);

