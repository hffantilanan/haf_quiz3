<?php
$host="localhost";
$db_name = "haf_quiz3";
$username = "root";
$password = "";

try{
    $con = new PDO("mysql:host={$host}$password");

}
// to handle connection error
catch(PDOExeption $exception){
    echo "Connection Eror:". $exception-> getMessage();

}
?>