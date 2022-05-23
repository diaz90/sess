<?php

//connection mysql to phpmyadmin database
$hostname='localhost';
$user='root';
$pass='';
$dbname='';
$linkdb=mysqli_connect($hostname,$user,$pass,$dbname);
if(mysqli_connect_error()){
    die('there was an error while connecting database');
}
else{
    echo"successfully connected to database";
}

?>