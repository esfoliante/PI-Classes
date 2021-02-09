<?php

@session_start();

$_SESSION['language'] = 'pt';

header('location: ./src/demo/index.php');

?>