<?php
function notify($owner,$message,$icon,$status,$date){
		require("config.php");
			$notify_script = $con -> prepare("INSERT INTO notifications(owner,message,icon,status,date) VALUES(?,?,?,?,?)");
				if(!$notify_script -> execute(array($owner,$message,$icon,$status,$date))){
					echo "<script>console.log(' Notification Error ')</script>";
				}
		
	}


?>