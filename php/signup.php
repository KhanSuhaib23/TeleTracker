<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "tvshowdb_023";

$users_name = $_POST['full-name'];
$users_username = $_POST['username'];
$users_password = $_POST['password'];

$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create connection
$sql = "INSERT INTO user (Username, Name, Password) VALUES ('$users_username','$users_name' ,'$users_password');";	
if ($conn->query($sql) === TRUE) 
{
    echo "Your Profile has been Added Please Continue to Log In";
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>