<?php
session_start();
require("config.php");
	if(isset($_POST['chk'])){
		$zero_ = $con -> prepare("UPDATE notifications SET status = ? WHERE owner = ? ");
		if(!$zero_ -> execute(array(0,$_SESSION['uid']))){
			echo "<script>console.log('Error Zeroing')</script>";
		}
	}

?>