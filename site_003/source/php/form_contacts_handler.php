<?php

// ? We won't use this anymore but c'mon, it's our first php script
// print_r($_POST);
// die();

// ? In case you are wondering, a+ creates the file and appends data to it
$file = fopen("../utils/data.csv", "a+");
$data = $_POST['name'] . ';' . $_POST['email'] . ';' . $_POST['message'] . "\n";

fputs($file, $data);
header("location: ../pages/thanks.html");
