<?php
session_start();
require("config.php");
	if(!isset($_SESSION['uid'])){
		header("Location:index.php");
	}else{
		if(isset($_GET['ref'])){
			$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
				$remove_ = $con -> prepare("DELETE FROM notifications WHERE ref = ? AND owner = ? ");
					if($remove_ -> execute(array($ref,$_SESSION['uid']))){
						echo "removed";
					}else{
						echo "Server busy!";
					}
		}
	}
?>