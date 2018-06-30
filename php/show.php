<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "tvshowdb_023";

	$show_operation = $_POST['operations']; 
	$show_title = $_POST['title'];
	$show_genre = $_POST['genre'];
	$show_rating = $_POST['rating'];
	$show_seasons = $_POST['seasons'];

	$conn = new mysqli($servername, $username, $password, $databasename);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if ($show_operation == 'add')
	{
		$sql = "INSERT INTO shows (Title, Rating, Seasons, Genre) values('$show_title', $show_rating, $show_seasons, '$show_genre');";
		$result = mysqli_query($conn, $sql);
		header('Location: ../admin_home.html');
	}
	else if ($show_operation == 'remove')
	{

		$sql = "DELETE FROM shows where Title = '$show_title';";
		$result = mysqli_query($conn, $sql);
		header('Location: ../admin_home.html');
	}
	else if ($show_operation == 'update')
	{
		$sql = "UPDATE shows SET Genre = '$show_genre', Rating = $show_rating, Seasons = $show_seasons WHERE Title = '$show_title';";
		$result = mysqli_query($conn, $sql);
		header('Location: ../admin_home.html');
	}
	else
	{
		
	}


?>