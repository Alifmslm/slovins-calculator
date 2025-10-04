<?php
    $databaseHost = 'localhost';
    $databaseName = 'slovins_db';
    $databaseUsername = 'root';
    $databasePassword = '';

    $connection_db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName, 3308);

    if($connection_db->connect_error) {
        echo'Connection Failed: ' . $connection_db->connect_error;
    }
?>