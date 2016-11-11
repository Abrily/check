<?php
$servername = "localhost";
$username = "mycitymyapp_root";
$password = "mycitymyapp@123";
$dbName="mycitymyapp";




// Create connection
$conn = new mysqli($servername, $username, $password,$dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



function createTable($name, $query)
{   echo $sql= "CREATE TABLE  $name($query)";
    
           
    
    
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_escape_string ($var);
}


?>
