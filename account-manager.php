<?php
session_start();
require("config.php");
require("timezoner.php");
if(!isset($_SESSION['uid'])){
header("Location:index.php");
}else{
	$ref = $_SESSION['uid'];
	// get total Threads 
			$threads_ = $con -> prepare("SELECT * FROM discussion WHERE creator_ref = ?");
				if($threads_ -> execute(array($ref))){
					$total_threads = $threads_ -> rowCount();
				}else{
					echo "SORRY: Error!!";
				}
	$fetch_user_data = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
	$fetch_user_data -> execute(array($ref));
		if($fetch_user_data -> rowCount()>0){
			$fetch_user_data -> setFetchMode(PDO::FETCH_ASSOC);
			while($pen = $fetch_user_data -> fetch()){
				$ref = $pen['ref'];
				$fname = $pen['fname'];
				$lname = $pen['lname'];
				$email = $pen['email'];
				$dated = $pen['date'];
				$mobile = $pen['mobile'];
				$status = $pen['status'];
				$gender = $pen['gender'];
				$country = $pen['country'];
				$rank = $pen['rank'];
			}
			}

?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Manage Account</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
	<?php include("toolbox.php"); ?>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
		<br/><br/>
			<div class="wrapper">
			
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-2 col-md-2"></div>
								<div class="col-sm-7 col-md-7">
									<div class="middleFrag" style="width:100%;">
					<div class="member-navs">
					
						<ul>
							<li><a  class="btn btn-sm " href="about-cred.php?ref=<?php echo $ref; ?>&pn=1"><i class="fa fa-map-marker"></i> About</a></li>
							<li><a class="btn btn-sm" href="favourites.php?pn=1"><i class="fa fa-calendar"></i> Favs</a></li>
							<li><a class="btn btn-sm btn-primary" href="account-manager.php" class="active" title="manage your account"><i class="fa fa-cog"></i> Settings</a></li>
						</ul>
					</div>
					<div class="setting-pan">
						<div class="setting-header">
							<span style="color:#666;">&nbsp;&nbsp;<i class="fa fa-user" style="color:#49ae4d;"></i> Profile Pix</span> 
			
						</div>
					<div class="image-setter">
								<?php
						$get_creator = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_creator -> execute(array($ref));
															$get_creator -> setFetchMode(PDO::FETCH_ASSOC);
															while($roww = $get_creator -> fetch()){
																$profpp = "";
																$bg = "";
																$creator_id = $roww['ref'];
																$creator_gan_gan = $roww['fname'];
																$profile_pix = $roww['profile_pix'];
																$gender = $roww['gender'];
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
																		
																			switch($gender){
																			case 'male':
																				$profpp = "<img class='profillpix' src=\"hookists/defaultb.png\"/>";
																			break;
																			case 'female':
																				$profpp = "<img class='profillpix' src=\"hookists/default.png\"/>";
																			break;
																			default:
																				$profpp = 'Locked';
																		}
																		
																		//$profpp = "<span class='photo' style=\"display:block; text-align:center; font-size:40px; font-weight:bold; height:45px; margin-left:2px; width:45px; border-radius:50%; padding:12px; background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp = "<img style='height:70px; width:70px;' src=\"hookists/".$profile_pix."\"/>";
																	}
															}
					
					
					?>
				
					</div>
					<div class="simple-feilds">
					&nbsp; &nbsp; <br/><?php echo $profpp; ?><br/>
					<label class="lbl-btn" for="profpix"><i class="fa fa-picture-o"></i> Change</label>
					<br/>
						<form action="tune-pix.php" method="post" enctype="multipart/form-data">
								<input id="profpix" type="file" value="<?php echo $profile_pix; ?>" name="profpix" style="width:0px;"/>
									<span class="output_" style="color:#fff; padding:8px; border-radius:9px; background-color:#f05f70; font-weight:bold; display:none;"></span>
									<button class="setting-saver btn btn-sm btn-primary" ><i class="fa fa-cog"></i> Save Changes</button>
									<!-- <button class="setting-saver  alter" ><i class="fa fa-cog"></i> Save Changes</button> -->
									
									

						</form>
						
					</div>
					<div class="line"></div>
					</div>
					<!-- #SECOND -->
					<div class="setting-pan">
						<div class="setting-header">
							<span style="color:#666;">&nbsp;&nbsp;<i class="fa fa-pencil-square-o" style="color:#49ae4d;"></i> Status</span> 
			
						</div>
					
					<div class="simple-feilds-f">
						<form action="" method="post" enctype="multipart/form-data">
								<textarea name="status" style="border:2px solid #eee; border-radius:4px; outline:none;" class="status-content"> <?php echo $status; ?> </textarea><br/>
								<span class="output_Y" style="color:#fff; padding:8px; border-radius:9px; background-color:#f05f70; font-weight:bold; display:none;"></span>	<button class="setting-saver status btn btn-sm btn-primary"><i class="fa fa-cog"></i> Save Changes</button>
																

						</form>
						
					</div>
					<div class="line"></div>
					</div>
				</div>
								</div>
								<div class="col-sm-3 col-md-3">
								
				<?php include("right-sege.php"); ?>
								</div>
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
			$(document).ready(function(){
				var signer = $('.setting-saver.status');
					signer.on('click',function(evt){
						evt.preventDefault();
						var newStatus = $('.status-content').val();
							$.post("statusSettings.php", {status:newStatus}, function(data){
								$('.output_Y').html(data);
								$('.output_Y').fadeIn(500).delay(1000).fadeOut(500);
							});
					});
				$('.setting-saver.alter').on('click',function(evt){
					evt.preventDefault();
					var fname = $('.fname').val();
					var lname = $('.lname').val();
					var city = $('.city').val();
					var mobile = $('.mobile').val();
						var datu = {
							fname:fname,
							lname:lname,
							city:city,
							tel:mobile
						};
						$.post("settings_alter.php",datu,function(data){
							$('.output_').html(data);
							$('.output_').fadeIn(500).delay(1000).fadeOut(500);
						});
				});
				
			});
		
		</script>
	</body>
	</html>
		<?php }; ?>