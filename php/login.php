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
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	$sql = "SELECT Name FROM user where Username = '$users_username' and Password = '$users_password';";	

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) != 0)
	{
		
		echo "Ya you are a user<br>";
		$row = mysqli_fetch_assoc($result);
		$name = $row["Name"];

		
		session_start();
		$_SESSION["Username"] = $users_username;



		if ($users_username == 'Admin')
		{
			// echo 'Real Admin';
			header('Location: ../admin_home.html');
		}
		else
		{
			// echo 'Not Admin';
			header('Location: ../index.php');
		}
		
		

	}
	else
	{
		echo "Definitely Not from here";
	}



	$conn->close();

?>	


