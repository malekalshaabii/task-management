<?php
$server='localhost' ;
$user='root' ;
$password='';
$db='taskmanagement' ;
$con =mysqli_connect($server,$user,$password,$db) ;
if(!$con)
    {
        die("error :  " . mysqli_connect_error());
    }

?>