<?php
session_start();
include("joiner.php");

	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
			$hnd = new Master();
				$hnd -> logIn($email,$password);
	}
?>