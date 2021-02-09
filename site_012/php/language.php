<?php

@session_start();

if(!isset($_SESSION['language']) || $_GET['lang'] == "") {
    $_SESSION['language'] = "pt";
} else {
    $_SESSION['language'] = $_GET['lang'];
}

header('location: ../src/demo/index.php');