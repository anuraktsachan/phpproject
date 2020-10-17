<?php

    $dbhost='localhost';
    $dbuser="root";
    $dbpassword='';
    $dbname='phpproject';
    $connection=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname)
    or die("Couldn't connect to server");
    
    