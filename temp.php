<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		*
		{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
			color: white;
			font-family: arial;
			
		}

	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="text/javascript" src="js/script-home.js"></script>
	<script type="text/javascript" src="js/php-home.php"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style-shows.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TVShows-Home</title>
</head>
<body>

	<div class="unpadded-container content">
		<div class="header">
			<div class="logo">
				<h1><a href="#"><span class="logo-style">TV</span>Shows</a></h1>
			</div>
			
				<div class="navbar">
					<ul>
						<li><a href="user_home.php">Home</a></li>
						<li><a href="#">Top Rated</a></li>
						<li><a href="#">Most Popular</a></li>
						<li><a href="#">All Shows</a></li>
					</ul>
				<div class="alt-navbar">
					<a href="#"><span class="glyphicon glyphicon-user"></a>
				</div>
				</div>
				<div class="header-utils">
					<ul class="leftNav">
						<li><a href="#">Search</a></li>
						<li><a href="#" onclick="loadLogIn()">LogIn</a></li>
						<li><a href="#" onclick="loadSignUp()">SignUp</a></li>
						<li><a href="#"><?php session_start(); echo $_SESSION["Name"]; ?> </a></li>
					</ul>
				</div>
			
		</div>

		<div class="content-body">
			
			<div class="show-listing">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$databasename = "tvshowdb_023";

					// Create connection

					$conn = new mysqli($servername, $username, $password, $databasename);

					// Check connection
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					}


					$sql = "SELECT * FROM shows";	


					$result = mysqli_query($conn, $sql);

					$num = mysqli_num_rows($result);



					for ($i = 0; $i < $num; $i++) 
					{
						$row = mysqli_fetch_assoc($result);
						echo "<div class=\"show-box\">";
					    echo "<h3 class=\"show-title\">" . $row["Title"] . "</h3>";
					    echo "<h3 class=\"show-rating\">&#9733 " . $row["Rating"] . " / 10</h3>";
					    echo "<h3 class=\"show-genre\">" . $row["Genre"] . "</h3>";
					    echo "<h3 class=\"show-seasons\">" . $row["Seasons"] . "</h3>";
					
					    echo "</div>";
					}

				?>
			</div>
			
		</div>




	</div>
</body>
</html>
