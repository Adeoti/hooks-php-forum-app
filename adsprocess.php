<?php
session_start();
require("config.php");
require("tcounter.php");
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Create Ads</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
		<div class="wrapper">
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				<div class="leftFrag">
						<br/><br/>
						<?php
							$fetch_members = $con -> prepare("SELECT * FROM hookists");
								if($fetch_members -> execute()){
									$num_Of = $fetch_members -> rowCount();
								}
								$fetch_topics = $con -> prepare("SELECT * FROM discussion");
								if($fetch_topics -> execute()){
									$num_Off = $fetch_topics -> rowCount();
								}
							
								$fetch_discussions = $con -> prepare("SELECT * FROM replies");
								if($fetch_discussions -> execute()){
									$num_Offf = $fetch_discussions -> rowCount();
								}
							
						?>
					<center><h3 style="color:#303030;">Stats</h3>
						<b style="color:#999;">Topics: <?php echo 200+$num_Off; ?></b><br/>
						<b style="color:#999;">Members: <?php echo 1000+$num_Of; ?></b><br/>
						<b style="color:#999;">Discussions: <?php echo 500+$num_Off+$num_Offf; ?></b><br/>
					
					
					
					
					</center>
				</div>
				<div class="middleFrag">
					<?php
						if(isset($_POST['bookads']))
						{
							$mail = trim(htmlspecialchars($_POST['email']));
							$package = trim(htmlspecialchars($_POST['package']));
							$adsfrom = trim(htmlspecialchars($_POST['adsfrom']));
							$adsto = trim(htmlspecialchars($_POST['adsto']));
							$date = date("D, d - m, Y");
								if($mail && $package && $adsfrom && $adsto){
									$_insert = $con -> prepare("INSERT INTO adsbooking(email,package,adsfrom,adsto,date) VALUES(?,?,?,?,?)");
									if($_insert -> execute(array($mail,$package,$adsfrom,$adsto,$date))){
										echo "<center><br/><br/><h3><i class='fa fa-thumbs-up' style='color:#4adf50; font-size:27px;'></i> Thanks For Your Attempt</h3></center><div class='donest'>Our promise remains absolute. We'll rather ameliorate the status of your business than exacerbating it. Sit back as we'll inbox you through the email you supplied. The email will guide you through the rest of the application. Thanks!</div>";
									}else{
										echo "SORRY: Server too busy, try again. <a href='adscreator.php'>Return</a>";
									}
								}else{
									echo "<center><br/><br/><br/><br/><br/><b style='color:#f00; background-color:#fff; padding:8px;'><i class='fa fa-warning'></i> Please let's know your target by filling the form. <a href='adscreator.php'>Return</a></b></center>";
								}
						}else{
							header("Location:adscreator.php");
						}
					
					?>
				</div>
					<?php include("right-seg.php"); ?>
		
		
		
		
		
		
		<div class="line"></div>
	
			
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
		<script>
			document.getElementById("rigo").onclick=function(){
				alert("Rigo Rag");
			};
		</script>
	</body>
	</html>