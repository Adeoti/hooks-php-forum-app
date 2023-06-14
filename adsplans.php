<?php
session_start();
require("config.php");
require("tcounter.php");
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Ads Plans</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
		<div class="wrapper">
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-2 col-md-2">
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
					<center><h5 style="color:#303030;"><i class="fa fa-flag"></i> Stats</h5>
						<b style="color:#999;">Topics: <span style="font-family:nyala;"><?php echo 200+$num_Off; ?></span></b><br/>
						<b style="color:#999;">Members: <span style="font-family:nyala;"><?php echo 1000+$num_Of; ?></span></b><br/>
						<b style="color:#999;">Discussions: <span style="font-family:nyala;"><?php echo 500+$num_Off+$num_Offf; ?></span></b><br/>
					
					
					
					
					</center>
				
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="middleFrag" style="width:100%;">
					<br/><br/><strong style="color:#4a5f70;"><i class="fa fa-bullhorn"></i>Ads Plans</strong>
						<br/>
						<center><a href="adscreator.php" class="btn btn-sm btn-primary"><i class="fa fa-certificate"></i> create ads now</a></center>
						
								
						<br/>
						
						<div class="adsguide">
						It's no more news that <cite>advertisement</cite> is the only herb to enhance business starture. It's higly imperative for a seller to get his product known to the right audience for effective sales.
						In addition, there is no product without addict users/buyers, but how will they get to know that you have their favourite? It's only through advert. Simply put, every business needs to be annouced to the masses inorder to get it's own space.
						<br/><br/>
							<b style="color:#4a5f70;">How we handle adverts</b><br/>
						We display your advert to almost all members and visitors of this network. We've abandoned a mechanism that only targets the right audience for your product or service, and now using the algorithm that display your ads to all viewers (both right and wrong audiences). As a matter of fact, there is actually no wrong audience for your product. Though, it's obvious that some will have interest as they see the ads, and some will not, but the real merit of this plan is to also struggle to make those that don't like your product or service love it and even recommend it to other wrong audience candidates. This is how we'll arrive at nothing than getting you more clients than your need.
						<br/><br/>
							<b style="color:#4a5f70;">How to place advert here</b><br/>
						Though, your advert may not be approved if it didn't meet our desired requirement, but the truth is; anyone can advertise here without any stress. Just complete the form <a href="adscreator.php">here</a> to help us determine your budget and duration. We'll then mail you with the link through which you can finalize the process (it's so easy).
						<br/><br/>
							<b style="color:#4a5f70;">Ads Budget and Price</b><br/>
						We make it easy for you to advertise as easy as nothing else. So, we have tailored spaces in segments.<br/> <b>(1). THE TOP </b> , <b>(2). THE BOTTOM </b> and <b>(3). THE RIGHT </b> <br/>
						
						**Your advert will be displayed in random with it's co-ads on it's corresponding segement in the <a href="index.php">home</a> and channel pages.
						
						</div>
						
						<div class="adspackages">
						<b style="color:#f05f70;">1. Top</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span style="font-family:nyala; color:blue;">N8,000</span> / day) ||  (<span style="font-family:nyala; color:blue;">N55,300</span> / week) || (<span style="font-family:nyala; color:blue;">N220,100</span> / month)<br/>
						<b style="color:#f05f70;">2. Bottom</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span style="font-family:nyala; color:blue;">N5,200</span> / day) ||  (<span style="font-family:nyala; color:blue;">N34,800</span> / week) || (<span style="font-family:nyala; color:blue;">N136,300</span> / month)<br/>
						<b style="color:#f05f70;">3. Right</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span style="font-family:nyala; color:blue;">N2,000</span> / day) ||  (<span style="font-family:nyala; color:blue;">N12,800</span> / week) || (<span style="font-family:nyala; color:blue;">N49,300</span> / month) <br/>
						
						</div><br/><br/>
						
						<div class="bottom-disc">
							We are always on the teriffic work to moving with the latest trend of advertisement platform. Hence, we are dynamically managing our advert patterns. Just give us a try, and get your business a new title of <cite><b>second to none</b></cite> in the heart of your clients.
						</div>
						<br/>
						<center><a href="adscreator.php" class="btn btn-sm btn-warning"><i class="fa fa-certificate"></i> start now!</a></center>

				</div>
							</div>
							<div class="col-sm-3 col-md-3">
								
					<?php include("right-seg.php"); ?>
		
		
							</div>
						</div>
					
					</div>
				
				
				
				
				
				
				
				
		
		
		
		
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