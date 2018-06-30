<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="text/javascript" src="js/script-all-show.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style-all-show.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User-Home</title>
</head>
<body>



	<div class="unpadded-container content">
		<div class="header">

				<div class="logo">
					<h1><a href="index.php"><span class="logo-style">TELE</span>TRACKER</a></h1>
				</div>
			
				<div class="navbar">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="temp.php">TOP RATED</a></li>
						<li><a href="temp.php">MOST POPULAR</a></li>
						<li><a href="temp.php">ALL SHOWS</a></li>
					</ul>
				<div class="alt-navbar">
					<a href="#"><span class="glyphicon glyphicon-user"></a>
				</div>
				</div>
				<div class="header-utils">
					<ul>
		
						<?php 
							session_start(); 
							// if (!isset($_SESSION["pageNumber"]))
							// {
							// 	$_SESSION["pageNumber"] = 1;
							// 	echo "Session Wasn't Set";
							// 	echo "Session Set To " . $_SESSION["pageNumber"];
							// }
							// else
							// {
							// 	echo "Session Was Set";
							// 	echo "Session Value Is " . $_SESSION["pageNumber"];
							// }
							
							if (isset($_SESSION["Username"]))
							{
								echo "<li class=\"user_clickable\"><a href=\"#\" onclick=\"loadUserOptions()\"><img src=\"res\\icons\\user.png\" width=\"32px\" height=\"32px\"></a>
									<ul>
									<div class=\"arrow-up\"></div>
									<li>" . $_SESSION["Username"] . "</li>
									<hr>
									<li><a href=\"#\">Tracker</a></li>
									<li><a href=\"#\">My Reviews</a></li>
									<li><a href=\"#\">My Account</a></li>
									<li><a href=\"php\\logout.php\">Log Out</a></li>
									</ul></li>"; 
							}
							else
							{
								echo "<li><a href=\"#\" onclick=\"loadLogIn()\">LOGIN</a></li>
										<li><a href=\"#\" onclick=\"loadSignUp()\">SIGN UP</a></li>";
							}
						?> 
						
					</ul>
				</div>
			
		</div>
		<div class="content-body">
			 
			<div class="show-listing">



				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$databasename = "TeleTrackerDB";

					// Create connection

					$conn = new mysqli($servername, $username, $password, $databasename);

					// Check connection
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					}


					$sql = "SELECT * FROM shows";	


					$result = mysqli_query($conn, $sql);

					$num = mysqli_num_rows($result);

					// $startShow = ($_SESSION["pageNumber"] - 1) * 10;
					// $endShow = $startShow + 10;

					// if ($num < $endShow)
					// {
					// 	$endShow = $num;
					// }

					// for ($i = 0; $i < $startShow; $i++)
					// {
					// 	$row = mysqli_fetch_assoc($result);
					// }


					for ($i = 0; $i < $num; $i++) 
					{
						$row = mysqli_fetch_assoc($result);
						echo "<div class=\"individual-show\">";
					    echo "<img src=\"" . $row["imageSource"] . "\">";
					    echo "<h2>" . $row["title"] . " (" . $row["year"] . ")" . "</h2>";

					    if ($row["totalReviews"] != 0.0)
					    {
					    	echo "<h3>" . $row["totalScore"] / $row["totalReviews"] . "<span>&#9733;</span></h3>";
					    }
					    else
					    {
					    	echo "<h3>NA<span>&#9733;</span></h3>";
					    }
					    echo "<p>" . $row["overview"] . "</p>";
					    echo "
						    <div class=\"operations\">
							<a href=\"#\" onclick=\"addLiked('" . addslashes($row["title"]) . "', '" . $row["year"] . "')\"><img src=\"res\\icons\\like.png\"></a>
							<a href=\"#\" onclick=\"addDisliked('" . addslashes($row["title"]) . "', '" . $row["year"] . "')\"><img src=\"res\\icons\\dislike.png\"></a>
							<a href=\"#\" onclick=\"addFavourited('" . addslashes($row["title"]) . "', '" . $row["year"] . "')\"><img src=\"res\\icons\\favourite.png\"></a>
							<a href=\"#\" onclick=\"addWishList('" . addslashes($row["title"]) . "', '" . $row["year"] . "')\"><img src=\"res\\icons\\add.png\"></a>

							</div>
					    ";

					    
					
					    echo "</div>";
					}

				?>

		

			</div>
		</div>



	</div>
</body>
</html>



