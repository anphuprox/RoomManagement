<?php

$host=DB_HOST;
$port=DB_PORT;
$username=DB_USERNAME;
$pass=DB_PASSWORD;
$dbname=DB_NAME;
try{
if(class_exists('PDO')){
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}

} 
catch(Exception $exception){
echo $exception->getMessage().'<br>';
die();

}
