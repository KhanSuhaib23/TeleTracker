<?php
session_start();

if (isset($_SESSION["Username"]))
{
	$users_username = $_SESSION["Username"];
	$show_title = $_REQUEST["title"];
	$show_year = $_REQUEST["year"];
	$table_name = $_REQUEST["table"];



	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "teletrackerdb";

	$conn = new mysqli($servername, $username, $password, $databasename);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

	$sql = "SELECT * FROM $table_name where (username = '$users_username' and show_title = '$show_title' and show_year = '$show_year');";

	$result = mysqli_query($conn, $sql);

	$num = mysqli_num_rows($result);

	if ($num == 0)
	{
		$sql = "INSERT INTO $table_name (username, show_title, show_year) values('$users_username', '$show_title', '$show_year');";
		$result = mysqli_query($conn, $sql);
	}

	
}
header('Location: ../admin_home.html');


?>
