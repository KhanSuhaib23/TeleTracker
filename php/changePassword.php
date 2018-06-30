<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "tvshowdb_023";

	$users_username = $_POST['username'];
	$users_newpassword = $_POST['new_password'];
	$users_oldpassword = $_POST['old_password'];
		// Create connection
	$conn = new mysqli($servername, $username, $password, $databasename);
		// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE user SET Password = '$users_newpassword' where Username = '$users_username' and Password = '$users_oldpassword';";	
	$result = mysqli_query($conn, $sql);

	if ($conn->query($sql) === TRUE) 
	{
	    echo "Your Password has been changed";
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>