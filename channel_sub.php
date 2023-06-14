<?php
session_start();
require_once("config.php");

	if($_POST['channel']){
		$channel = $_POST['channel'];
		$subscriber = $_POST['subscriber'];
		$date = date("M, m-d-Y");
			$chk_ = $con -> prepare("SELECT * FROM channel_sub WHERE channel = ? AND subscriber = ?");
				if($chk_ -> execute(array($channel,$subscriber))){
					if(!$chk_ -> rowCount() > 0){
						//##################Create Fresh ////
							$insert = $con -> prepare("INSERT INTO channel_sub(subscriber,channel,date,status) VALUES(?,?,?,?)");
								if($insert -> execute(array($subscriber,$channel,$date,'yes'))){
									echo "Subscribed";
								}else{
									echo "Sorry, ERROR!!";
								}
								
					}else{
						//##################Alter Power ////
						$alter = $con -> prepare("UPDATE channel_sub SET status = ? WHERE channel = ? AND subscriber = ? ");
								if($alter -> execute(array("yes",$channel,$subscriber))){
									echo "Subscribed";
								}else{
									echo "Sorry, ERROR!!";
								}
					}
				}
	}else{
		header("Location:index.php");
	}
	
?>