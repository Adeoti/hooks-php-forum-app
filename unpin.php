<?php
session_start();
require("config.php");
	if(!isset($_SESSION['uid'])){
		header("Location:index.php");
	}else{
		if(!isset($_GET['ref'])){
			header("Location:index.php");
		}else{
			$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
				$unpin = $con -> prepare("UPDATE favourites SET status=? WHERE disc_source = ? AND pinner = ?");
				if($unpin -> execute(array('no',$ref,$_SESSION['uid'])))
				{
					echo "Removed ";
				}else{
					echo "Sorry, Something Happened!!";
				}
		}
	}

?>