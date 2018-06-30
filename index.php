<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="text/javascript" src="js/script-home.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style-home.css">
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
						<li><a href="all-shows.php">ALL SHOWS</a></li>
					</ul>
				<div class="alt-navbar">
					<a href="#"><span class="glyphicon glyphicon-user"></a>
				</div>
				</div>
				<div class="header-utils">
					<ul>
		
						<?php 
							session_start(); 
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

		<div class="hero">
			
			<h3>Journey into the interesting world of TV Shows</h3>
			<div class="hero-button">
				<?php
					if (!isset($_SESSION["Username"]))
					{
						echo "<h3><a href=\"#\" onclick=\"loadSignUp()\">SIGN UP</a></h3>"; 
					}
				?>
				
			</div>
			
		</div>




	</div>
</body>
</html>



