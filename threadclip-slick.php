<?php
session_start();
require("config.php");
if(isset($_GET['ref'])){
	$refr = $_GET['ref'];
		if(is_numeric($refr)){
			$refr =  $refr;
		}else{
			$refr = preg_replace('/[^0-9]/',"",$refr);
		}
}else{
	header("Location:index.php");
}
$fetchPostsx = $con -> prepare("SELECT * FROM discussion WHERE ref=? ORDER BY ref DESC ");
										$fetchPostsx -> execute(array($refr));
											if($fetchPostsx -> rowCount()>0){
												$fetchPostsx -> setFetchMode(PDO::FETCH_ASSOC);
												while($rowd = $fetchPostsx -> fetch()){
													$ref = $rowd['ref'];
												$title = $rowd['title'];
												$category = $rowd['category'];
											}}
											// handle view.
											$watcher = "";
											if(isset($_SESSION['uid']))
											{
												$watcher = $_SESSION['uid'];
											}else{
												$watcher = $_SERVER['REMOTE_ADDR'];
											}
											$insertView = $con -> prepare("INSERT INTO views(viewer,disc_source,date) VALUES(?,?,?)");
											if(! $insertView -> execute(array($watcher,$ref,date('d,M-Y')))){
												echo "<script>console.log('Error while counting view')</script>";
											}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title><?php echo "hook /".$category." - ".$title; ?></title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		
		<style>
			.optionHandle{
				position:relative;
				
			}
			.optionDrop{
				position:absolute;
				top:50px;
				left:-40px;
				overflow:hidden;
				border-radius:8px;
				width:120px;
				background:#999;
				z-index:3000;
				display:none;
			}
			.optionDrop a{
				text-decoration:none;
				height:34px;
				display:block;
				font-weight:bold;
				width:100%;
				color:#fff;
				text-align:center;
			}
			.optionDrop a:hover{
				background:#fff;
				color:#999;
			}
			.report-form{
				position:absolute;
				background:#fff;
				left:-60px;
				padding:8px;
				width:200px;
				border-radius:8px;
				display:none;
				box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-webkit-box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-moz-box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-ms-box-shadow:0 1px 4px rgba(0,0,0,0.1);
					-o-box-shadow:0 1px 4px rgba(0,0,0,0.1);
			}
			.report-form form textarea{
				resize:none;
				width:98%;
				height:40px;
				border:1px solid #eee;
			}
			.report-form form input[type=submit]{
				border:none;
				background:#2e9fff;
				color:#fff;
				font-weight:bold;
				padding:6px;
				border-radius:4px;
				cursor:pointer;
			}
		
		</style>
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
		<div class="wrapper">
			<?php include("header.php");?>
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				
				<div class="leftFrag"></div>
				<div class="middleFrag thread-clipper">
					<!--Start Of Usage-->
						<?php
										$fetchPosts = $con -> prepare("SELECT * FROM discussion WHERE ref=? ORDER BY ref DESC ");
										$fetchPosts -> execute(array($refr));
											if($fetchPosts -> rowCount()>0){
												$fetchPosts -> setFetchMode(PDO::FETCH_ASSOC);
												while($row = $fetchPosts -> fetch()){
													$ref = $row['ref'];
													$title = $row['title'];
													$category = $row['category'];
													$content = $row['content'];
													$mode = $row['mode'];
													$creator = $row['creator_ref'];
													$date = $row['date'];
													$upvotes = $row['upvotes'];
													$downvotes = $row['downvotes'];
													$view_counts = $row['view_counts'];
													$link = $row['link'];
														$refer = "";
														if($link === "none")
														{
															$refer = "";
														}else{
															$refer = "<div style='float:right; margin-top:10px;'><b style=\"color:#49ae4d;\">Refer : <a href=\"".$link."\">".$link."</a>&nbsp;&nbsp;</b></div>";
														}
													$get_creator = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_creator -> execute(array($creator));
															$get_creator -> setFetchMode(PDO::FETCH_ASSOC);
															while($roww = $get_creator -> fetch()){
																$creator_id = $roww['ref'];
																$creator_gan_gan = $roww['fname'];
															}
														
														
											?>
					<span class="category-seg-loose"><i class="fa fa-tags"></i> <b><?php echo $category;?></b></span>
					<div class="thread-packer">
					
						<div class="thread-packer-header">
							<div class="thread-poster">
								<div class="prof-picture"><img src="images/profpix.jpg"></div>
								<div class="poster-name">
									<b style="color:999;"><a href="about-cred.php?ref=<?php echo $creator_id.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="color:#f05f70; text-decoration:none;"><?php echo $creator_gan_gan ?></a></b><br/>
									<b style="color:#666;">**Scholar**</b>
								</div>
								<div class="line"></div>
							</div>
								<div class="date-posted" >
									<time><i class="fa fa-clock-o"></i> <?php echo $date; ?></time>
									&nbsp; &nbsp; &nbsp;<span class="category-seg"><i class="fa fa-tags"></i> <b><?php echo $category;?></b></span>
								</div>
							<div class="thread-tools" style="position:relative; max-height:74%;">
								<div class="pinned-display" style="position:absolute; z-index:1000; left:-90px; display:none; padding:2px; background:#3f4257; color:#fff; border-radius:5px;">
							
							</div>
							
								<span class="thumbLogo">
									<?php
									if(isset($_SESSION['uid']))
									{
										
									
									$chkPinned = $con -> prepare("SELECT * FROM favourites WHERE disc_source=? AND pinner=?");
									$chkPinned -> execute(array($ref,$_SESSION['uid']));
									if($chkPinned -> rowCount()>0)
									{
										?>
							<b title="pinned to favourite"><i class="fa fa-thumb-tack" style="color:#f05f70;"></i></b>
										<?php
									}else{
										?>
							<a class="pinHandle" href="fav-pin.php?ref=<?php echo $ref; ?>" title="pin to favourite"><i class="fa fa-thumb-tack" style="color:#2e9fff;"></i></a>			
										<?php
									}
									
									
								?>
								</span>
								&nbsp;
								<a href="javascript:void(0)" class="optionHandle" title="options">
								<i class="fa fa-cog" style="color:#666;"></i>
								
								</a>
												<?php } ?>
									<div class="optionDrop">
										<a href="javascript:void(0)" class="report-btn">Report</a>
										<a href="report.php">Block</a>
										<a href="report.php">Share</a>
									</div>
									<div class="report-form">
									<b>Why Reporting this? </b> &nbsp;  &nbsp;  &nbsp; <b style="cursor:pointer;" title="cancel" class="cancel-report"><i class="fa fa-times-circle"></i></b>
										<form action="report.php?ref=<?php echo $ref; ?>" method="post">
											<textarea placeholder="State why you are reporting this" name="reason"></textarea>
												<input type="submit" value="Report Now " name="report-btn">
										</form>
									</div>
								
							</div>
							<div class="line"></div>
						</div>
							<div class="line"></div>
						
						&nbsp; &nbsp; <strong style="color:#2e9fff; font-size:20px; " class="thread-title"><?php echo $title; ?></strong>
						<!--Alter if picture was used only-->
						<div class="thread-media">
						<img src="images/profpix4.jpg"/>
						</div>
						<!--Alteration Ends -->
					<div class="thread-content-container">
						<p>
							<?php echo $content; ?>
						</p>
						<?php echo $refer; ?>
					</div>
					<div class="line"></div>
					<div class="thread-bottom">
						<?php
							if(isset($_SESSION['uid'])){
								
								?>
									<div class="action-btn">
							<a href="javascript:void(0)" class="reply-trigger" title="reply"><i class="fa fa-comments" style="color:#2e9fff;"></i></a>
							
								<span class="upvoter">
								<?php 
									$chk_if = $con -> prepare("SELECT * FROM upvotes WHERE disc_source = ? AND creator = ? AND status = ?");
										$chk_if -> execute(array($ref, $_SESSION['uid'],"yes"));
										if($chk_if -> rowCount() > 0)
										{
											?>
								<b title="upvotes"><i class="fa fa-hand-o-up" style="color:#f05f70;"></i></b> 		
											<?php
										}else{
											?>
								<a class="up-votes" href="upvotes.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" title="upvote"><i class="fa fa-hand-o-up" style="color:#2e9fff;"></i></a> 			
											<?php
										}
								?>
							<span style="color:#666;">
								<?php
									$fetch_upvotes = $con -> prepare("SELECT * FROM upvotes WHERE disc_source=? AND status = ?");
									$fetch_upvotes -> execute(array($ref,"yes"));
									if($fetch_upvotes -> rowCount() > 0){
										echo $fetch_upvotes -> rowCount();
									}else{
										echo 0;
									}
								?>
							</span>
								</span>
								
								<span class="downvoter">
								<?php 
									$chk_if = $con -> prepare("SELECT * FROM downvotes WHERE disc_source = ? AND creator = ? AND status = ?");
										$chk_if -> execute(array($ref,$_SESSION['uid'],"yes"));
										if($chk_if -> rowCount() > 0)
										{
											?>
								<b title="downvotes"><i class="fa fa-hand-o-down" style="color:#f05f70;"></i></b> 		
											<?php
										}else{
											?>
								<a class="dv-votes" href="downvotes.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" title="downvote"><i class="fa fa-hand-o-down" style="color:#ffc107;"></i></a> <span style="color:#666;">
	
								<?php
										}
								?>
								<span style="color:#666;">
								<?php
									$fetch_downvotes = $con -> prepare("SELECT * FROM downvotes WHERE disc_source=? AND status = ?");
									$fetch_downvotes -> execute(array($ref,"yes"));
									if($fetch_downvotes -> rowCount() > 0){
										echo $fetch_downvotes -> rowCount();
									}else{
										echo 0;
									}
								?>
								</span>
							</span>
							<div style="position:relative; top:-10px;">
							<div class="vote-display" style="position:absolute; z-index:1000; display:none; padding:5px; background:#3f4257; color:#fff; border-radius:5px;"></div>
							</div>
						</div>
							<div class="action-btn2"><a href="#" title="quote"><i class="fa fa-quote-right" style="color:#49ae4d;"></i></a></div>
							
							<?php	
							}else{
								echo "<a href=\"join.php\" style='color:#2e9fff; text-decoration:none;'>Join</a> OR <a href=\"login.php\" style='color:#2e9fff; text-decoration:none;'>Log In</a> to react to this";
							}
						
						?>
					<div class="line"></div>
					</div>
					</div>
													<?php
																							
												};
											}else{
												echo "No post Yet!!!!!!!!!!!!";
											}
										
									?>
					<!--End Of Usage-->
					<div class="reply-form">
						<?php
							if(isset($_SESSION['uid']))
							{
							?>	
					<form action="post-reply.php?ref=<?php echo $ref;?>" method="post" enctype="multipart/form-data" style="position:relative;">
						<label style="display:inline-block; float:left; margin-top:20px; cursor:cell;"><i class="fa fa-picture-o" style="color:#49ae4d; font-size:25px;"></i><input style="width:0px;" type="file" name=""/></label>
						<textarea placeholder="Type Your Opinion here......" class="reply-box" name="reply_content"></textarea>
							<button class="reply-btn" title="Click to reply"><i class="fa fa-reply"></i></button>
						<div class="reply-notific" style="padding:4px; z-index:1000; left:60px; top:40px; border-radius:5px; background:#3f4257; position:absolute; color:#fff; display:none;"></div>
					</form>
							<?php
							}else{
								echo "<br/><br/><a href=\"join.php\" style='color:#2e9fff; text-decoration:none;'>Join</a> OR <a href=\"login.php\" style='color:#2e9fff; text-decoration:none;'>Log In</a> to drop your opinion";
							}
							
							?>
					</div>
					<div class="line"></div>
					<br/><br/>
					<div style="width:90%; margin:0px auto;  border-bottom:1px solid #666;">
						<strong style="color:#999;"><i class="fa fa-share"></i> Relies</strong>
					</div>
					<!--Rely Box Start-->
						<div class="replication">
							<?php
							require("config.php");
							$fetch_reply = $con -> prepare("SELECT * FROM replies WHERE disc_source=? ORDER BY ref DESC");
							$fetch_reply -> execute(array($ref));
								if($fetch_reply -> rowCount()>0){
									while($biik = $fetch_reply -> fetch())
									{
										$ref = $biik['ref'];
										$replier = $biik['replier'];
										$disc_source = $biik['disc_source'];
										$date = $biik['date'];
										$content = $biik['content'];
										$get_replier = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
										$get_replier -> execute(array($replier));
										while($redy = $get_replier -> fetch()){
											$refd = $redy['ref'];
											$nameOf = $redy['fname'];
										}
										?>
										<div class="thread-packer">
						<div class="thread-packer-header">
							<div class="thread-poster">
								<div class="prof-picture"><img src="images/profpix2.jpg"></div>
								<div class="poster-name">
									<b><a href="about-cred.php?ref=<?php echo $refd.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="color:#b180c9; text-decoration:none;"><?php echo $nameOf ?></a></b><br/>
									<b style="color:#666;">**Scholar**</b>
								</div>
								<div class="line"></div>
							</div>
								<div class="date-posted" >
									<time><i class="fa fa-clock-o"></i> <?php echo $date; ?></time>
								</div>
							<div class="thread-tools">
								&nbsp;
								<a href="#" title="options"><i class="fa fa-cog" style="color:#666;"></i></a>
								&nbsp;
							</div>
							<div class="line"></div>
						</div>
						<br/>
						<strong><b style="color:#666;"><i class="fa fa-share"></i> RE :</b> <?php echo $title; ?></strong>
					<div class="thread-media">
						<img src="images/profpix5.jpg"/>
					</div>
					<div class="thread-content-container">
					
						<p>
							<?php echo $content; ?>
						</p>
					</div>
					
					<div class="line"></div>
					<div class="thread-bottom">
						<div class="action-btn">
							<a href="#" title="upvote"><i class="fa fa-hand-o-up" style="color:#2e9fff;"></i></a> <span style="color:#666;">20</span>
							<a href="#" title="downvote"><i class="fa fa-hand-o-down" style="color:#ffc107;"></i></a> <span style="color:#666;">3</span>
						</div>
							<div class="action-btn2"><a href="#" title="quote"><i class="fa fa-quote-right" style="color:#49ae4d;"></i></a></div>
							<div class="line"></div>
					</div>
					</div>
										<?php
									}
								}else{
									echo "No Reply for this discussion yet!";
								}
						?>
						</div>
					<!--Rely Box End-->
				</div>
				<?php include("right-seg.php"); ?>
		</div>
		<div class="line"></div>
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/actions.js"></script>
		<script>
			$(document).ready(function(){
				/*$('.reply-box').emojioneArea({
					pickerPosition: "right",
					tonesStyle: "bullet"
					
				  });*/
				  $('.optionHandle').on('click',function(){
					  $('.optionDrop').fadeToggle(900);
					  $('.report-form').fadeOut(900);
				  });
				  $('.report-btn').on('click',function(){
					  $('.optionDrop').fadeOut(500);
					  $('.report-form').fadeIn(900);
					  
				  });
				  $('.cancel-report').click(function(){
					 $('.report-form').fadeOut(500);
				  });
				 
			});
		</script>
	</body>
	</html>