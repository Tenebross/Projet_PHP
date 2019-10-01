<?php

function connectDB()
{
    $_host = 'localhost';
    $_login = 'root';
    $_pwd = '';
    $_DBName = 'jeux_video';

    $connect = mysqli_connect($_host, $_login, $_pwd, $_DBName);

    return $connect;
    
}