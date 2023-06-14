<?php
session_start();
require("config.php");
require("tcounter.php");
require("timezoner.php");
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Notifications</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
		<div class="wrapper">
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				<div class="leftFrag"></div>
				<div class="middleFrag">
					<br/><span >Notifications</span><br/><br/>
						<div class="notification-pane-clip container" id="notification-pane-clip">
							<div class="notific-reporter"></div>
								<div class="row">
									<?php
										$fetch_notofication = $con -> prepare("SELECT * FROM notifications WHERE owner = ? ORDER BY ref DESC");
											if($fetch_notofication -> execute(array($_SESSION['uid']))){
												if($fetch_notofication -> rowCount()>0){
													$fetch_notofication -> setFetchMode(PDO::FETCH_ASSOC);
													while($rew = $fetch_notofication -> fetch()){
														$reffr = $rew['ref'];
														$owner = $rew['owner'];
														$message = $rew['message'];
														$icon = $rew['icon'];
														$status = $rew['status'];
														$date = time_ago($rew['date']);
															
														?>
														<div class="notification-zeg col-sm-12 col-md-12" style="padding:3px; background:#fdfdfd;" id="notification-zeg">
															
															<div class="icon"><?php echo $icon; ?></div>
															<div class="message"><?php echo $message; ?>
																<i class="fa fa-clock-o"></i> <strong style="font-family:nyala; color:#f05f70;"><?php echo $date; ?></strong>
															</div>
															<button id="kila"  onclick="alert('clicked')" class="btn btn-sm btn-primary"> BFHFB</button><a title="remove" href="delete-notification.php?ref=<?php echo $reffr; ?>" id="remove-notification" class="remove-notification"><i class="fa fa-trash"></i></a>
															
															<div class="line"></div>
																
														</div>
														<?php
													}
												}else{
													echo "<center>No Notification yet</center>";
												}
											}
									
									?>
								</div>
						<br/>
						</div>
				</div>
					<?php include("right-seg.php"); ?>
		
		
		
		
		
		
		<div class="line"></div>

	
		
		
	
	
		</div>
		<br/><br/><br/><br/>
		
			
			<?php include("footer.php"); ?>
			
			
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
	
	</body>
	</html>