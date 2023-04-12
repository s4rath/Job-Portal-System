<?php
$servername="localhost";
$username="root";
$password="";
$db="jobreg";

$connection= new mysqli($servername,$username,$password,$db);

if($connection->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>