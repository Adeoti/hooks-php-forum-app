<!DOCTYPE html>
	<html>
	<head>
		<title>Admin Control Panel</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox2.php"); ?>
		<div class="wrapper ">
			<?php include("header.php"); ?>
			<div class="empty-left"></div>
		<div class="posting-pannel-j">
		<?php
		require("config.php");
			$fetch_user_data = $con -> prepare("SELECT * FROM hookists ORDER BY ref DESC");
	$fetch_user_data -> execute();
		if($fetch_user_data -> rowCount()>0){
			$fetch_user_data -> setFetchMode(PDO::FETCH_ASSOC);
			while($pen = $fetch_user_data -> fetch()){
				$ref = $pen['ref'];
				$fname = $pen['fname'];
				$lname = $pen['lname'];
				$email = $pen['email'];
				$date = $pen['date'];
				$mobile = $pen['mobile'];
				$status = $pen['status'];
				$dob = $pen['dob'];
				$gender = $pen['gender'];
				$country = $pen['country'];
				$city = $pen['city'];
					$get_thread_count = $con -> prepare("SELECT * FROM discussion WHERE creator_ref=?");
					if($get_thread_count -> execute(array($ref)))
					{
						$get_thread_count -> setFetchMode(PDO::FETCH_ASSOC);
						$times = $get_thread_count -> rowCount();
					}else{
						echo "Server Reating...";
					}
					
						$get_creator = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_creator -> execute(array($ref));
															$get_creator -> setFetchMode(PDO::FETCH_ASSOC);
															while($roww = $get_creator -> fetch()){
																$profpp = "";
																$bg = "";
																$creator_id = $roww['ref'];
																$creator_gan_gan = $roww['fname'];
																$profile_pix = $roww['profile_pix'];
																	if($profile_pix === "nill"){
																		$nameAlpha = substr($creator_gan_gan,0,1);
																		switch($nameAlpha){
																			case 'A': $bg = "#f05f70";
																				break;
																			case 'B': $bg = "#2e9fff";
																				break;
																			case 'C': $bg = "#b180c9";
																				break;
																			case 'D': $bg = "#b180c9";
																				break;
																			case 'E': $bg = "#ff9b51;";
																				break;
																			case 'F': $bg = "#8bcf93;";
																				break;
																			case 'G': $bg = "#687a86;";
																				break;
																			case 'H': $bg = "#ffd34f;";
																				break;
																			case 'I': $bg = "#bccd95;";
																				break;
																			case 'J': $bg = "#eadcae;";
																				break;
																			case 'K': $bg = "#0671a7;";
																				break;
																			case 'L': $bg = "#f05f70;";
																				break;
																			case 'L': $bg = "#2e9fff;";
																				break;
																			case 'M': $bg = "#b180c9;";
																				break;
																			case 'N': $bg = "#ff9b51;";
																				break;
																			case 'O': $bg = "#8bcf93;";
																				break;
																			case 'P': $bg = "#f05f70;";
																				break;
																			case 'Q': $bg = "#3f4257;";
																				break;
																			case 'R': $bg = "#0671a7;";
																				break;
																			case 'S': $bg = "#bccd95;";
																				break;
																			case 'T': $bg = "#3f4257;";
																				break;
																			case 'U': $bg = "#3f4257;";
																				break;
																			case 'V': $bg = "#3f4257;";
																				break;
																			case 'W': $bg = "#3f4257;";
																				break;
																			case 'X': $bg = "#3f4257;";
																				break;
																			case 'Y': $bg = "#3f4257;";
																				break;
																			case 'Z': $bg = "#f05f70;";
																				break;
																				default: $bg = "#8bcf93";
																		}
																		$profpp = "<span class='photo' style=\"display:block; font-size:30px; margin-top:-15px; font-weight:bold; height:25px; margin-left:2px; width:25px; border-radius:50%; padding:10px; background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp = "<img src=\"hookists/".$profile_pix."\"/>";
																	}
															}
					
					
					?>
				
			
			
		<!-- Usage Start-->
					<div class="user-clip-top-admin">
						<div class="user-clip-top-admin-top">
							<div class="left">
								<div style="float:left;">
									&nbsp;&nbsp;&nbsp;<?php echo $profpp; ?>
								</div>
								<div style="float:left;">
									&nbsp;&nbsp;&nbsp;<strong style="color:#999;"><a href="about-cred.php?ref=<?php echo $ref; ?>" style="color:#2e9fff; text-decoration:none;"><?php echo $fname." ".$lname?></a></strong>
										<br/><i title="rank">**Scholar**</i>
								</div>
								<div style="float:left; line-height:60px;">
									&nbsp; &nbsp; &nbsp; <strong><i class="fa fa-clock-o"></i> Joined on </strong> <?php echo $date; ?>.
								</div>
								<div class="line"></div>
							</div>
							<div class="right">
								<span title="Contents"><i class="fa fa-book"></i> <?php echo $times; ?> </span>
							</div>
							<div class="line"></div>
						</div>
						<div class="user-clip-top-admin-bottom">
							<a href="#"><i class="fa fa-recycle"></i> Banne</a>
							<a href="#"><i class="fa fa-trash"></i> Unlink</a>
							<a href="#"><i class="fa fa-envelope"></i> Message</a>
							<a href="#"><i class="fa fa-tree"></i> Rank</a>
						</div>
					</div>
					<!--Usage End-->
					<?php
			}
			}else{
				echo "No Member Now!!";
			}
		
		?>
				</div>
				<?php include("posting-guide.php"); ?>
				
		</div>
		<div class="line"></div>
		
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
		<script>
			
		</script>
	</body>
	</html>