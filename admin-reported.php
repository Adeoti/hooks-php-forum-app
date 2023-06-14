<!DOCTYPE html>
	<html>
	<head>
		<title>Reports</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox2.php"); ?>
		<div class="wrapper ">
			<?php include("header.php"); ?>
			<div class="empty-left"></div>
		<div class="posting-pannel-hf" >
					<i class="fa fa-exclamation-triangle"></i> Reports
					<!--Usage From -->
					<?php
						require("config.php");
							$fetch_report = $con -> prepare("SELECT * FROM reports ORDER BY ref DESC");
							if($fetch_report -> execute()){
								if($fetch_report -> rowCount()){
									$fetch_report -> setFetchMode(PDO::FETCH_ASSOC);
									while($row = $fetch_report -> fetch())
									{
										$ref = $row['ref'];
										$reporter = $row['reporter'];
										$disc_source = $row['disc_source'];
										$reason = $row['reason'];
										$dated = $row['date'];
											$get_publisher = $con -> prepare("SELECT * FROM discussion WHERE ref = ?");
											$get_publisher -> execute(array($disc_source));
												$get_publisher -> setFetchMode(PDO::FETCH_ASSOC);
												while($ree = $get_publisher -> fetch()){
													$id = $ree['ref'];
													$creator_pal = $ree['creator_ref'];
													$title_pal = $ree['title'];
													$thread = $ree['category'];
														$get_creator_source = $con -> prepare("SELECT * FROM hookists WHERE ref =?");
														if($get_creator_source -> execute(array($creator_pal)))
														{
															$get_creator_source -> setFetchMode(PDO::FETCH_ASSOC);
															while($rid = $get_creator_source->fetch())
															{
																$handle = $rid['ref'];
																$j_fname = $rid['fname'];
																$j_lname = $rid['lname'];
															}
														}
												}
												$get_reporter = $con -> prepare("SELECT * FROM hookists WHERE ref =? ");
												if($get_reporter -> execute(array($reporter)))
												{
													$get_reporter -> setFetchMode(PDO::FETCH_ASSOC);
													while($rue = $get_reporter->fetch())
													{
														$cog_ref = $rue['ref'];
														$reporter_fname = $rue['fname'];
													}
												}
									?>
					<div class="segus">
						<div class="draft-header">
							<div class="header-left">
							&nbsp;&nbsp;
								<strong><a href="threadclip.php?ref=<?php echo $id; ?>" style="color:#2e9fff; text-decoration:none;" ><?php echo substr($title_pal,0,50); ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#666;"><i class="fa fa-tags"></i> <?php echo $thread; ?></span>
								</div>
							<div class="header-right">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span style="color:#666;"><i class="fa fa-clock-o"></i> Reported on <?php echo $dated; ?>.</span>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
							<div class="line"></div>
						</div>
							<div class="draft-main">
								<div class="draft-main-left" style="float:none; width:100%;">
									<?php echo $reason; ?>
								</div>
								
								<div class="line"></div>
							</div>
						<div class="draft-footer">
							<span style="color:#999;">Created by <a href="about-cred.php?ref=<?php echo $handle; ?>"><b><?php echo $j_fname; ?></b></a></span> ||
							<span style="color:#999;">Reported by <a href="about-cred.php?ref=<?php echo $cog_ref?>"><b><?php echo $reporter_fname; ?></b></a></span>
						</div>
					
					
						</div>
						<?php
									}
								}else{
									echo "No Report Yet!!";
								}
							}else{
								echo "Something got crashed";
							}
					?>
						<!-- Usage To -->
					
					
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