<?php
	session_start();
	if (isset($_SESSION["Username"]))
	{
		session_unset();	
	}

	header('Location: ../index.php');

?>