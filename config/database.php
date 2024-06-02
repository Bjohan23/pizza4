<?php

define('DB_SERVER', 'localhost'); // 
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'piza4');

function dbConnect()
{
    $connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}
