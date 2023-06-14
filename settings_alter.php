<?php
session_start();
	require("config.php");
		if(isset($_POST['fname']))
		{
			$fname_new = htmlspecialchars(trim(stripslashes($_POST['fname'])));
			$lname_new = htmlspecialchars(trim(stripslashes($_POST['lname'])));
			$city_new = htmlspecialchars(trim(stripslashes($_POST['city'])));
			$mobile = htmlspecialchars(trim(stripslashes($_POST['tel'])));
				if($fname_new && $lname_new && $city_new && $city_new)
				{
					$alter_ = $con -> prepare("UPDATE hookists SET fname=?, lname=?, city=?, mobile=? WHERE ref=?");
						if($alter_ -> execute(array($fname_new,$lname_new,$city_new,$mobile,$_SESSION['uid'])))
						{
							echo "Changes Saved";
						}else{
							echo "Server Error. Please Try again!";
						}
				}else{
					echo "Affect the form properly, please.";
				}
				
		}


?>