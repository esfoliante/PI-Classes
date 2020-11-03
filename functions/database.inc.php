<?php
/**
 *  ! Code by: Miguel Ferreira
 *  ! github: www.github.com/esfoliante 
 */

// ! NOTE: To better read this code it's recommended for you to install the "BETTER COMMENTS" extension

// ? this function will allow us to connect to the database, it being
// ? a mysql database like MySQL or even a software like Microsoft Access
function connect($database, $servername = "localhost", $username = "root", $password = "", $provider = "mysql") {

    if($provider == "mysql") {

        // ? we will simply start the connection and insert the database parameter right away
        $connection = mysqli($servername, $username, $password, $database);

        // ? and now, if there's any error connecting to the database we will throw an error
        if($connection->connect_error) {
            return "Error";
        }

    } else if($provider == "other") {

        $connection = odbc_connect($database, $username, $password);

        if($connection->connect_error) {
            return "Error";
        }

    }

    return $connection;
    
}

// ? this function is maybe a bit useless but it automatically handles
// ? verifications like if the query was successful and stuff like that
// ? it might avoid some errors
function query($connection, $query, $provider = "mysql") {

    if($provider == "mysql") {

        $result = $connection->query($query);

        // ? if the connection is successful we return the result
        if($connection->query($query)) {
            return $result;
        }

        // ? if not, then we return false
        return false;

    } else if($provider == "other") {

        $result = odbc_exec($connection , $query);

        if($result) {
            return $result;
        }

        return false;


    }
    
}

// ? have you ever wondered about killing a connection...? ahaha just kidding... unless...
// ? anyways, in this function we kill a specified connection
function kill($connection, $provider = "mysql") {

    if($provider == "mysql") {

        // ? and, if the connection is killed successfully we can simply wash our hands and leave
        if($connection->close()) {
            return true;
        }

        // ? however if the connection is not killed successfully we will have some problems
        return false;

    } else {

        if(odbc_close($connection)) {
            return true;
        }

        return false;

    }
    

}