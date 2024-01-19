<?php 
$servername = "localhost"; 
$username = "id20406629_ereviveuser"; 
$password = "A<uEL[S\8d/|aedt"; 
$db = "id20406629_erevive"; 

// Create connection 
$conn = new mysqli($servername, $username, $password, $db);

// Check connection 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} else{
    //throughout development display message of successful connection
    // echo "Connected to database successfully."; 
} 
?>