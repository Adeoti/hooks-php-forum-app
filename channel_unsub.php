<?php
session_start();
require_once("config.php");

	if($_POST['channel']){
		$channel = $_POST['channel'];
		$subscriber = $_POST['subscriber'];
		$date = date("M, m-d-Y");
			$chk_ = $con -> prepare("SELECT * FROM channel_sub WHERE channel = ? AND subscriber = ?");
				if($chk_ -> execute(array($channel,$subscriber))){
					if($chk_ -> rowCount() > 0){
						//##################Alter Power ////
						$alter = $con -> prepare("UPDATE channel_sub SET status = ? WHERE channel = ? AND subscriber = ?");
								if($alter -> execute(array("no",$channel,$subscriber))){
									echo "Unsubscribed";
								}else{
									echo "Sorry, ERROR!!";
								}
					}
				}
	}else{
		header("Location:index.php");
	}
	
?>