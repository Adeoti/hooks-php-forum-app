<?php
session_start();
	require("config.php");
	if(isset($_POST['status']))
	{
		$status = htmlspecialchars(trim(stripslashes($_POST['status'])));
			if($status){
				$run_update = $con -> prepare("UPDATE hookists SET status=? WHERE ref=?");
				if($run_update -> execute(array($status,$_SESSION['uid'])))
				{
					echo "Changes Saved!";
				}else{
					echo "Server Error !";
				}
			}else{
				echo "<b>Mustn't be empty!</b>";
			}
	}
	?>