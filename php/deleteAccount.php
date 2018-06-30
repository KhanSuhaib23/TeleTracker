<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "tvshowdb_023";

	$users_username = $_POST['username'];
	$users_password = $_POST['password'];
		// Create connection
	$conn = new mysqli($servername, $username, $password, $databasename);
		// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "DELETE FROM user where Username = '$users_username' and Password = '$users_password';";	
	$result = mysqli_query($conn, $sql);

	if ($conn->query($sql) === TRUE) 
	{
	    echo "Account Deleted";
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>