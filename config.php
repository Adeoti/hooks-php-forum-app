<?php
	try
	{
		$con  = new PDO("mysql:dbhost=localhost; dbname=hook", "root", "");
	}catch(PDOException $e)
	{
		echo $e -> getMessage();
	}

?>