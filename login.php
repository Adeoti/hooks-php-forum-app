<!DOCTYPE html>
<html>
	<head>
		<title>Sign In</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
			<style>
				body{
					background-color:#ebeef2;
					margin:0px auto;
				}
				.const{
					margin-top:150px;
					
				}
				.const form{
					width:90%;
					background-color:#fff;
					box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-webkit-box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-moz-box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-ms-box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-o-box-shadow:0 1px 4px rgba(0,0,0,0.1);
					padding:9px;
					
				}
				
			</style>
			<?php require("rel.php"); ?>
	</head>
<body class="container-fluid">	
		<div class="row">
			<div class="col-sm-4 col-md-4"></div>
		<div class="const col-sm-5 col-md-5 ">
			<h2 style="color:#999;"><i class="fa fa-files-o"></i> Supply Your Credential</h2>
			<form action="engine/loginSwitch.php" method="post"><br/>
				<label for="email" style="color:red;">Email *</label></br/>
				<input style="width:100%; padding:5px; border:1px solid #eee; border-radius:4px; height:42px;" type="email" placeholder="Your Email Address" required name="email" id="email" class="email" /><br/><br/>
				<label for="password" style="color:red;">Password *</label></br/>
				<input style="width:100%; padding:5px; border:1px solid #eee; border-radius:4px; height:42px;" type="password" placeholder="Your Password" required name="password" id="password" class="pass" /><br/><br/>
						<!--<label style="float:left; margin-left:40px;"><input type="checkbox" checked/> Remember me</label> -->
					<hr/>
					<div style="float:right;"><button class="btn btn-sm btn-primary" onclick="logIn();"><i class="fa fa-sign-in"></i> Log Me In</button></div>
						<a href="join.php">Create New Account</a></center>
							<div style="clear:both;"></div>
						<!--<center><a href="#">Forgotten Password?</a> |-->
				
			</form>
			<?php
				require("engine/joiner.php");
					if(isset($_POST[''])){
						
					}
			?>
		</div>
		</div>
		
		
		
		<script src="js/qwrs.js"></script>
		
		
</body>
	</html>