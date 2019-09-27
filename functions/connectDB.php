<?php

function connectDB()
{
    $_host = 'localhost';
    $_login = 'dawan';
    $_pwd = 'dawan';
    $_DBName = 'jeux video';

    $connect = mysqli_connect($_host, $_login, $_pwd, $_DBName);

    return $connect;
    
}