<?php

include './functions/database.inc.php';

// ? this is a default connection
$connection = connect("test");

query($connection, "INSERT INTO users (name, email, age) VALUES ('Miguel Ferreira', 'miguel.personal@protonmail.com', '17')");

kill($connection);

