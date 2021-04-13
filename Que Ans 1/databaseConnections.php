<?php
function createdb(){
$server_name = "localhost";
$user_name = "root";
$pass_word = "";
$db_name = "information";
$conn = mysqli_connect($server_name,$user_name,$pass_word);

if (!$conn){
    die("connection failed : ".mysqli_connect_error());
}


$sql = "CREATE DATABASE IF NOT EXISTS $db_name ";

if(mysqli_query($conn,$sql)){
    $conn = mysqli_connect($server_name,$user_name,$pass_word,$db_name);
    $sql ="
        CREATE TABLE IF NOT EXISTS info( 
            name VARCHAR(25),
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            age VARCHAR(25) NOT NULL,
            user_name VARCHAR(25),
            password VARCHAR(25));";

    if(mysqli_query($conn,$sql)){
        return $conn;
    }
    else{
        echo "can't create table ";
    }
}
else{
    echo "can't create database ".mysqli_connection_error($conn);
}

}

?>