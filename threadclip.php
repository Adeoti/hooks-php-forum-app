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
require("timezoner.php");
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
													$contenty = $row['content'];
														
										if(strlen($content) > 600){
											$content = substr($content,0,600)." <a href='javascript:void(null)'  class='btn showallof btn-sm btn-primary'><i class='fa fa-arrow-circle-down'></i> read more</a> ";
										}
													$mode = $row['mode'];
													$creator = $row['creator_ref'];
													$date = time_ago($row['date']);
													$link = $row['link'];
													
													$downvotes = $row['downvotes'];
													$view_counts = $row['view_counts'];
													$link = $row['link'];
														$refer = "";
														if($link === "none")
														{
															$refer = "";
														}else{
															$refer = "<i class='fa fa-link'></i> <a href=\"$link\" title='click to explore'>".$link."</a>";
														}
													$get_creator = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_creator -> execute(array($creator));
															$get_creator -> setFetchMode(PDO::FETCH_ASSOC);
															while($roww = $get_creator -> fetch()){
																$creator_id = $roww['ref'];
																$creator_gan_gan = $roww['fname'];
																$country = $roww['country'];
																$dated = $roww['date'];
																$rank = $roww['rank'];
																$profile_pix = $roww['profile_pix'];
																$gender = $roww['gender'];
																	if($profile_pix === "nill"){
																		$nameAlpha = substr($creator_gan_gan,0,1);
																	
																		switch($gender){
																			case 'male':
																				$profppx = "<img class='profillpix' src=\"hookists/defaultb.png\"/>";
																			break;
																			case 'female':
																				$profppx = "<img class='profillpix' src=\"hookists/default.png\"/>";
																			break;
																			default:
																				$profppx = 'Locked';
																		}
																		
																		//$profpp = "<span class='photo' style=\"display:block; text-align:center; font-size:40px; font-weight:bold; height:45px; margin-left:2px; width:45px; border-radius:50%; padding:12px; background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profppx = "<img class='profillpix' src=\"hookists/".$profile_pix."\"/>";
																	}
																
															}
															if(isset($_SESSION['uid'])){
																$get_commenter = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_commenter -> execute(array($_SESSION['uid']));
															$get_commenter -> setFetchMode(PDO::FETCH_ASSOC);
															while($roww = $get_commenter -> fetch()){
																$commenter_id = $roww['ref'];
																$commenter_gan_gan = $roww['fname'];
																$commenter_country = $roww['country'];
																$commenter_dated = $roww['date'];
																$commenter_rank = $roww['rank'];
																
																
															}
															}
															$fetch_part_disc = $con -> prepare("SELECT * FROM discussion WHERE creator_ref=?");
																if($fetch_part_disc -> execute(array($creator_id))){
																	$num_post = $fetch_part_disc -> rowCount();
																}
																	
														
														
											?>
					<div class="container-fluid">
						<div class="row">
							
							<div class="col-sm-2 col-md-2"></div>
							
							<div class="col-sm-7 col-md-7">
									<div class="middle-pannel" style="width:100%;">
				
						<div class="icon-dvd"><i class="fa fa-book"></i></div><strong class="thread-title"><?php echo $title; ?> &nbsp;&nbsp;&nbsp;&nbsp; <a href="channel/channel-split.php?channel=<?php echo $category; ?>" style="text-decoration:none; color:inherit;"><i class="fa fa-tags"></i>  <b><?php echo $category;?></b></a></strong>
						<div class="line"></div>
				<div class="color-thread">
								
						<div class="userInfoBox">
							<div class="info-user">
								<div class=""><center><?php echo $profppx; ?></center></div>
								<div class="bit-details">
									<center>
									<a href="about-cred.php?ref=<?php echo $creator;?>"><?php echo $creator_gan_gan;?></a><br>
									<span class="level"><?php echo $rank; ?></span>
									</center>
									<span class="start-indc">Thread Starter</span>
									<br/>
									<div class="user-what"><b>Credits:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="text-align:right;">10</b><br/>
									<b>Posts:</b>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="text-align:right;"><?php echo $num_post; ?></b><br/>
									<b>Location:</b>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="text-align:right;"><?php echo $country; ?></b><br/>
									<b>Joined:</b>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="text-align:right;"><?php echo $dated; ?></b><br/>
									</div>
								</div>
							</div>
						</div>
						<div class="messageBox">
							<div class="message-details"><div class="hideout" style="display:none;"><?php echo $contenty; ?></div> <br/><?php echo $content?></div>
							<div class="discussion-details">
								<div class="date-time">
								<span class="ass">&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php echo $date; ?></span>
								<span class="ass2"> <?php echo $refer; ?></span>
								<div class="line"></div>
								</div><br/>
							</div>
							<div class="discussion-reactions">
							
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
							<div class="thread-tools" style="position:relative; max-height:74%;">
								<div class="pinned-display" style="position:absolute; z-index:1000; left:-90px; display:none; padding:2px; background:#3f4257; color:#fff; border-radius:5px;">
							
							</div>
							
								<span class="thumbLogo">
									<?php
									if(isset($_SESSION['uid']))
									{
										
									
									$chkPinned = $con -> prepare("SELECT * FROM favourites WHERE disc_source=? AND pinner=? AND status=?");
									$chkPinned -> execute(array($ref,$_SESSION['uid'],'yes'));
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
									<b>Why Reporting This? </b> &nbsp;  &nbsp;<b style="cursor:pointer; color:#f05f70;" title="cancel" class="cancel-report"><i class="fa fa-times-circle"></i></b>
										<form action="report.php?ref=<?php echo $ref; ?>" method="post">
											<textarea placeholder="State why you are reporting this" name="reason"></textarea>
												<input type="submit" value="Report Now " name="report-btn">
										</form>
									</div>
								
							</div>
							
							<?php	
							}else{
								echo "<a href=\"join.php\" style='color:#2e9fff; text-decoration:none;'>Join</a> OR <a href=\"login.php\" style='color:#2e9fff; text-decoration:none;'>Log In</a> to react to this";
							}
						
						?>
					<div class="line"></div>
							
							</div>
						
						</div>
						<div class="line"></div>
				</div>
					<?php
																							
												};
											}else{
												echo "No post Yet!!!!!!!!!!!!";
											}
										
									?>
				<h3>Sponsored</h3>
				<div class="color-thread">
						<div class="userInfoBox">
							<div class="info-user">
								<div class="profile-pix"><br/><br/>Logo Here	</div>
								<div class="bit-details">
									<center>
								
									<span class="level" style="font-weight:bold; color:#999;">Sponsored</span>
									</center>
									<br/>
										<span class="sponsored-descrip">Get going with our Android App</span>
									<a href="#" class="sponsored-href"> Download</a>
								</div>
							</div>
						</div>
						<div class="messageBox">
							<div class="message-details">nnn</div>
							<div class="discussion-details">
							
							
							<br/>
							</div>
							<div class="discussion-reactions" style="font-family:times new roman;"><center><i class="fa fa-globe" style="color:green;"></i> Need a website/app for your business? visit: <a href="http://www.adesquareit.com" style="color:#49ae4d;">www.paramountcomputers.com</a> today!</center></div>
						
						</div>
						<div class="line"></div>
				</div>
				
				<!--Start Of Replies-->
					<?php
					
						
					
					
					
						$fetch_replies = $con -> prepare("SELECT * FROM replies WHERE disc_source = ? ");
						if($fetch_replies -> execute(array($refr))){
							if($fetch_replies -> rowCount()>0)
							{
									echo "<br/><hr/>
										<span class='badge badge-pill badge-warning'>::::::Replies:::::::</span>
									";
								$fetch_replies -> setFetchMode(PDO::FETCH_ASSOC);
								while($rowty = $fetch_replies -> fetch()){
									$reply_ref = $rowty['ref'];
									$reply_contentx = $rowty['content'];
									$reply_contenty = $rowty['content'];
									$reply_poster = $rowty['replier'];
									$reply_date = time_ago($rowty['date']);
										if(strlen($reply_contentx) > 500){
											$reply_contentx = substr($reply_contentx,0,500)." <a href='javascript:void(null)' data-all='$reply_contenty' class='btn showall btn-sm btn-primary'><i class='fa fa-arrow-circle-down'></i> read more</a> ";
										}
									//$reply_channel = $rowty['channel'];
							
											$fetch_replier = $con -> prepare("SELECT * FROM hookists WHERE ref = ? ");
												if($fetch_replier -> execute(array($reply_poster))){
													$fetch_replier -> setFetchMode(PDO::FETCH_ASSOC);
														while($rut = $fetch_replier -> fetch()){
															$ref_of_repl = $rut['ref'];
															$namefd = $rut['fname'];
															$datedd = $rut['date'];
															$countryf = $rut['country'];
															$rankff = $rut['rank'];
																$profile_pix3 = $rut['profile_pix'];
																$gender2 = $rut['gender'];
																	if($profile_pix3 === "nill"){
																		switch($gender2){
																			case 'male':
																				$profpp3 = "<img class='profillpix' src=\"hookists/defaultb.png\"/>";
																			break;
																			case 'female':
																				$profpp3 = "<img class='profillpix' src=\"hookists/default.png\"/>";
																			break;
																			default:
																				$profpp3 = 'Locked';
																		}
																		
																		//$profpp = "<span class='photo' style=\"display:block; text-align:center; font-size:40px; font-weight:bold; height:45px; margin-left:2px; width:45px; border-radius:50%; padding:12px; background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp3 = "<img class='profillpix' src=\"hookists/".$profile_pix."\"/>";
																	}
																$fetch_post_all = $con -> prepare("SELECT * FROM discussion WHERE creator_ref = ?");
																	if($fetch_post_all -> execute(array($reply_poster))){
																		$num_of_total = $fetch_post_all -> rowCount();
																	}
														}
												}else{
													echo "Something is not right.";
												}
									?>
									
									
							
				<div class="color-thread row" style="height:auto;">
						<div class=" col-sm-3 col-md-3" style="height:auto;">
							<div class="info-user">
								<div><center><?php echo $profpp3; ?></center></div>
								<div class="bit-details" >
									<center>
									<a href="about-cred.php?ref=<?php echo $ref_of_repl;?>"><?php echo $namefd?></a><br>
									<span class="level"><?php echo $rankff; ?></span>
									</center>
										<center><a href="about-cred.php?ref=<?php echo $ref_of_repl;?>" style="color:#fff;" class="badge badge-pill badge-sm badge-primary"><i class="fa fa-play"></i> visit</a></center>
								</div>
							</div>
						</div>
						<div class=" col-sm-9 col-md-9" style="padding:0px; height:auto;">
							<div class="message-details" style="min-height:100px; background:#fff; padding-top:15px; padding:15px;"><?php echo $reply_contentx; ?></div>
							<div class="discussion-details">
								
							
							</div>
							<!--------Reply Reactions------->
								<div class="discussion-reactions">
							
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
							<div class="thread-tools" style="position:relative; max-height:74%;">
								<div class="pinned-display" style="position:absolute; z-index:1000; left:-90px; display:none; padding:2px; background:#3f4257; color:#fff; border-radius:5px;">
							
							</div>
							
								<span class="thumbLogo">
									<?php
									if(isset($_SESSION['uid']))
									{
										
									
									$chkPinned = $con -> prepare("SELECT * FROM favourites WHERE disc_source=? AND pinner=? AND status=?");
									$chkPinned -> execute(array($ref,$_SESSION['uid'],'yes'));
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
									<b>Why Reporting this? </b> &nbsp;  &nbsp;<b style="cursor:pointer; color:#f05f70;" title="cancel" class="cancel-report"><i class="fa fa-times-circle"></i></b>
										<form action="report.php?ref=<?php echo $ref; ?>" method="post">
											<textarea placeholder="State why you are reporting this" name="reason"></textarea>
												<input type="submit" value="Report Now " name="report-btn">
										</form>
									</div>
								
							</div>
							
							<?php	
							}else{
								echo "<a href=\"join.php\" style='color:#2e9fff; text-decoration:none;'>Join</a> OR <a href=\"login.php\" style='color:#2e9fff; text-decoration:none;'>Log In</a> to react to this";
							}
						
						?>
					<div class="line"></div>
							
							</div>
							<!--------Reply Reactions Ends------->
						
						</div>
						<div class="line"></div>
				</div>
						<?php
									}
							}else{
								echo "<center>No Reply yet</center>";
							}
						}
					
					?>
				<!--End Of Replies-->
				
			
				
				<br/>
									<div class="Hreplycyc" style="height:90px;"></div>

				<div class="reply-box-custom">
												<?php
							if(isset($_SESSION['uid']))
							{
							?>	
						<div class="user">
							<div class="user-pix" style="height:100px; overflow:hidden; width:100px; margin:0px auto; margin-top:20px; border-radius:50%; ">
									<?php echo $profpp; ?>
							</div>
							<span style="color:#999; font-weight:bold;"><?php echo $commenter_gan_gan;?></span>
							<br/>
							<span style="color:#000;"><i class="fa fa-trophy"></i> <?php echo $commenter_rank;?></span>
						</div>
							<?php } ?>
						<div class="form">
							<div class="form-pannel">
							
														<!--Reply Ops A-->
															<?php
							if(isset($_SESSION['uid']))
							{
							?>	
					<!-- <form action="post-reply.php?ref=" method="post" enctype="multipart/form-data" style="position:relative;">
						<textarea placeholder="Type Your Opinion here......" class="reply-box" name="reply_content"></textarea><br/>
						<label style="display:inline-block; float:left; margin-top:20px; cursor:cell;"><i class="fa fa-picture-o" style="color:#49ae4d; font-size:25px;"></i><input style="width:0px;" type="file" name=""/></label>
							<button class="reply-btn" title="Click to reply"><i class="fa fa-reply"></i></button>
						<div class="reply-notific" style="padding:4px; z-index:1000; left:60px; top:40px; border-radius:5px; background:#3f4257; position:absolute; color:#fff; display:none;"></div>
					</form> -->
					
					
					
					<!--New Reply Altered Start-->
					<form action="post-reply.php?ref=<?php echo $ref;?>" method="post" enctype="multipart/form-data" style="position:relative;" class="replycyc">
						<textarea style="display:none;" name="content" id="textpane"></textarea>
							<div class="typing-format-tool" style="display:block;">
								<span onclick="_bold_();"><i class="fa fa-bold"></i></span>
								<span onclick="__bend_();"><i class="fa fa-italic"></i></span>
								<span onclick="__rule_under();"><i class="fa fa-underline"></i></span>
								<span onclick="__ul_list();"><i class="fa fa-list-ul"></i></span>
								<span onclick="__ol_list();"><i class="fa fa-list-ol"></i></span>
								<span onclick="_justifyLeft_();"><i class="fa fa-align-left"></i></span>
								<span onclick="_justifyCenter_();"><i class="fa fa-align-center"></i></span>
								<span onclick="_justifyRight_();"><i class="fa fa-align-right"></i></span>
								<span onclick="_justifyAll_();"><i class="fa fa-align-justify"></i></span>
								<span onclick="__indent();"><i class="fa fa-indent"></i></span>
								<span onclick="_outdent_();"><i class="fa fa-outdent"></i></span>
								<span onclick="__cutOff_();"><i class="fa fa-scissors"></i></span>
							</div>
							<iframe id="myEditor" name="myEditor" class="myEditor"></iframe>
							<br/>
							<label style="display:inline-block; float:left; margin-top:20px; cursor:pointer;"><i class="fa fa-picture-o" style="color:#49ae4d; font-size:25px;"></i><input style="width:0px;" type="file" name=""/></label>
							
							<button class="reply-btn sec btn btn-sm btn-warning" style="padding:0px;" title="Click to comment"><i class="fa fa-reply"></i> comment</button>
					
					</form>
					<!--New Reply Altered End-->
					
					
					
					
					
					
					
					
					
							<?php
							}else{
								echo "<br/><br/><a href=\"join.php\" style='color:#2e9fff; text-decoration:none;'>Join</a> OR <a href=\"login.php\" style='color:#2e9fff; text-decoration:none;'>Log In</a> to drop your opinion";
							}
							
							?>
														<!--Reply Ops B-->
							
							
							</div>
						</div>
				</div>
				</div>
							</div>
							<div class="col-sm-3 col-md-3">
				<?php include("right-seg.php"); ?>
							
							</div>
						</div>
					</div>
		</div>
		<div class="line"></div>
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<!--<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>-->
		<script src="js/custom.js"></script>
		<script src="js/actions.js"></script>
		<script>
			var editor;
			editor = document.getElementById("myEditor");
			editor = editor.contentWindow.document;
			function __wake(){
				editor.designMode = "on";
				editor.spellcheck = false;
					editor.addEventListener("focus", function(){
						$('.typing-format-tool').slideDown(1000);
					});
					
			}
		__wake();
			function _bold_(){
				editor.execCommand('bold',false,null);
			}
			function __bend_(){
				editor.execCommand('italic',false,null);
			}
			function __cutOff_(){
				editor.execCommand('cut',false,null);
			}
			function __rule_under(){
				editor.execCommand('underline',false,null);
			}
			function __ul_list(){
				editor.execCommand('insertUnOrderedList',false,null);
			}
			function __ol_list(){
				editor.execCommand('insertOrderedList',false,null);
			}
			function __remove_(){
			
				editor.execCommand('forwardDelete',false,null);
			}
			function __indent(){
			
				editor.execCommand('indent',false,null);
			}
			function _outdent_(){
			
				editor.execCommand('outdent',false,null);
			}
			function _justifyCenter_(){
			
				editor.execCommand('justifyCenter',false,null);
			}
			function _justifyLeft_(){
			
				editor.execCommand('justifyLeft',false,null);
			}
			function _justifyRight_(){
			
				editor.execCommand('justifyRight',false,null);
			}
			function _justifyAll_(){
			
				editor.execCommand('justifyAll',false,null);
			}
				function processDiscussion(){
					// var content = $('.emojionearea-editor').html();
					var form = document.getElementById("posterim");
					form.action = "post-discussion.php";
					var content = window.frames['myEditor'].document.body.innerHTML;
					var pane = document.getElementById("textpane");
						pane.value = content;
						document.forms['discussionPer'].submit();
					
					
					
					
				}
				function processDraft(){
					
					var form = document.getElementById("posterim");
					form.action = "draft-discussion.php";
					// var content = $('.emojionearea-editor').html();
					var content = window.frames['myEditor'].document.body.innerHTML;
					var pane = document.getElementById("textpane");
						pane.value = content;
						document.forms['discussionPer'].submit();
					
				}
		</script>
		<script>
			$(document).ready(function(){
				$('.reply-btn.sec').click(function(event){
					event.preventDefault();
					var comment = window.frames['myEditor'].document.body.innerHTML;
					//var comment = $('.reply-box').attr('value');
					//var comment = $('.emojionearea-editor').html();
					var comment = window.frames['myEditor'].document.body.innerHTML;
					
					var ref = $(this).parent('form').attr('action');
					ref = ref.slice(ref.indexOf('ref')+4);
					var data = {ref:ref, reply_content:comment};
					$.post("post-reply.php",data,function(data){
						$('.reply-notific').html(data).fadeIn(500).delay(1000).fadeOut('slow');
						$.post("replication.php",{ref:ref},function(data){
							$('.replication').html(data);
							alert("Thanks for droping your thought.");
							window.location.reload();
							//$('.emojionearea-editor').html("");
						});
					});
					});
					$('.btn.showall').on('click', function(event){
						event.preventDefault();
							let all_ = $(this).data('all');
								let y_pane = $(this).parent('.message-details');
									y_pane.html(all_);
					});
					$('.btn.showallof').on('click', function(event){
						event.preventDefault();
							let all_ = $(this).siblings('.hideout').html;
								let y_pane = $(this).parent;
									//y_pane.html(all_);
								alert(y_pane);
					});
				/*$('.reply-btn.sec').click(function(event){
					event.preventDefault();
					var comment = window.frames['myEditor'].document.body.innerHTML;
					
					var ref = $(this).parent('form').attr('action');
					ref = ref.slice(ref.indexOf('ref')+4);
					var data = {ref:ref, reply_content:comment};
					$.post("post-reply.php",data,function(data){
						$('.reply-notific').html(data).fadeIn(500).delay(1000).fadeOut('slow');
						$.post("replication.php",{ref:ref},function(data){
							$('.replication').html(data);
							$('.emojionearea-editor').html("");
						});
					});
				});	*/
					
					
					$(document).on('click','.reply-trigger',function(){
						
						$('.myEditor').focus();
						//$('html,body').animate({ scrollTop: 9999 }, 10000);
						$('html, body').animate({scrollTop: ($('.Hreplycyc').offset().top)}, 1000);
					
					})
				
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
				 
				/*$('.reply-box').emojioneArea({
					pickerPosition: "right",
					tonesStyle: "bullet"
					
				  });*/
				 
			});
		</script>
	</body>
	</html>