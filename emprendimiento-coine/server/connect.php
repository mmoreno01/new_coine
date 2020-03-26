<?php 
	$db = mysqli_connect('localhost','bilanz_user', 'web_contacto2018', 'bilanz_web'); 

	if(mysqli_connect_errno())
	{
		echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	}
 ?>