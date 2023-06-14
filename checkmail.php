<?php
require_once("config.php");
	if($_POST['mail']){
		$email = $_POST['mail'];
			if(strlen($email) != 0){
					$chk = $con -> prepare("SELECT * FROM hookists WHERE email = ? ");
			if($chk -> execute(array($email))){
				if($chk -> rowCount() > 0){
					echo "<span style='border-radius:8px; line-height:10px; padding:4px; color:#f00; border:1px solid #f00; background:#fff;'>We recognize this email address.</span>";
				}else{
					echo "<span style='color:green;'></span>";
				}
			}else{
				echo "SORRY, Payload Error: We're working to keep you steady. ";
			}
			}else{
				echo "Empty field";
			}
		
	}
?>
