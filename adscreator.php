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
	<body style="background:#ebeef2;">
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
		<div class="wrapper">
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				
				
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-3 col-md-3">
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
								<div class="col-sm-5 col-md-5">
					<div style="padding:8px; margin-top:70px; width:100%;">
									<strong>Book for advert</strong><br/><br/>
					<form action="adsprocess.php" style="background:#fff; padding:12px;" method="POST">
						<label for="email" style="color:#f00;">Email*</label><br/>
							<input type="email" style="border:1px solid #eee; width:100%; border-radius:6px; height:32px;" id="email" name="email" required />
							<br/><br/>
							<label for="package" style="color:#f00;">Package*</label>
							<br/>
								<select name="package" id="package" style="border:1px solid #eee; border-radius:6px; width:100%; height:32px;">
									<optgroup label="HOME PAGE">
									<option value="top">Top</option>
									<option value="top">Bottom</option>
									<option value="top">Right</option>
									</optgroup>
									
								</select><br/><br/>
								<label for="duration" style="color:#f00;">Duartion*</label><br/>
									<b style="color:orange;">from :</b> <input type="date" style="border:1px solid #eee; border-radius:6px;  height:32px;" name="adsfrom" required />
									 <b style="color:green;">to :</b> 
									<input type="date" style="border:1px solid #eee; border-radius:6px;  height:32px;" name="adsto" required />
								<br/>
								<br/>
								<hr/>
								<div style="float:right;"><button type="submit" class="btn btn-sm btn-primary" name="bookads"><i class="fa fa-check"></i> create now</button></div>
								<div style="clear:both;"></div>
					</form>
					</div>
				
								</div>
								<div class="col-sm-3 col-md-3">
								
					<?php include("right-seg.php"); ?>
								
								</div>
							</div>
						</div>
				
				
		
		
		
		
		
		
		
	
			
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