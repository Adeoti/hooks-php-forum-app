<?php
require("config.php");
session_start();
if(!isset($_SESSION['uid']))
{
	header("Location:join.php");
}else{
if($_GET['ref']){
	$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
	$chk_first = $con -> prepare("SELECT * FROM favourites WHERE disc_source = ? AND pinner = ?");
		if($chk_first -> execute(array($ref,$_SESSION['uid'])))
		{
			if(!$chk_first -> rowCount()>0){
					$pin_fav = $con -> prepare("INSERT INTO favourites(pinner,disc_source,date,status) VALUES(?,?,?,?)");
		if($pin_fav -> execute(array($_SESSION['uid'],$ref,date('d,M-Y'),'yes')))
		{
			echo "Added To Favourite";
		}else{
			echo "Sorry, Server Error....!";
		}
			}else{
				$update_ = $con -> prepare("UPDATE favourites SET status=? WHERE disc_source = ? AND pinner = ?");
				if($update_ -> execute(array('yes',$ref,$_SESSION['uid'])))
		{
			echo "Added To Favourite";
		}else{
			echo "Sorry, Server Error....!";
		}
			}
		}
			
}else{
	header("Location:join.php");
}
}

?>