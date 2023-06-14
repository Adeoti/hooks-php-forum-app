<?php
session_start();
require("config.php");
require("tcounter.php");
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Home Page</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
		<style>
			.paginationx{
				width:30%;
				height:30px;
				margin:0px auto;
				margin-top:14px;
				font-weight:bold;
				color:#2e9fff;
				padding:18px;
			}
			.paginationx a{
				padding:5px;
				text-decoration:none;
				background:#49ae4d;
				color:#fff;
				margin-left:5px;
				border-radius:4px;
			}
			.paginationx span{
				font-weight:900;
				color:#999;
				margin-left:5px;
				margin-right:5px;
				font-family:arial;
			}
		
		</style>
	</head>
	<body style="background-color:#ebeef2;">
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
		<div class="wrapper">
				<?php //include("announcement.php"); ?>
				<?php //include("advertpan.php"); ?>
				
				
				
				
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
					<center><h5 style="color:#303030;"> <i class="fa fa-flag"></i> Stats</h5>
						<b style="color:#999;">Topics: <span style="font-family:nyala;"><?php echo 200+$num_Off; ?></span></b><br/>
						<b style="color:#999;">Members: <span style="font-family:nyala;"><?php echo 1000+$num_Of; ?></span></b><br/>
						<b style="color:#999;">Discussions: <span style="font-family:nyala;"><?php echo 500+$num_Off+$num_Offf; ?></span></b><br/>
					
					
					
					
					</center>
				
					</div>
					<div class="col-sm-7 col-md-7">
						<div class="middleFrag" style="width:100%;"><br/>
					<!-- <div class="ads-panel">....ADVERT ....ADVERT ....ADVERT ....ADVERT ....ADVERT </div> -->
					<div style="float:right;">
						<a href="creator.php" class="btn btn-sm btn-primary" role="button"><i class="fa fa-pencil"></i> start discussion</a>
						</div>
						<a href="creator.php" class="btn btn-sm btn-warning" role="button"><i class="fa fa-pencil"></i> start discussion</a>
					<div style="clear:both;"></div>
				<br/>
					<!--To be altered by PHP-->
								<!--Start of usage-->
									<?php
										require("timezoner.php");
									echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
									
									<span style='font-weight:900; color:#4a5f70; '><i class='fa fa-book'></i> Hot Threads </span>";
										//## Pagination Starts
											$rn = $con -> prepare("SELECT * FROM discussion");
												$pn = "";
												if($rn -> execute()){
													$row_num = $rn -> rowCount();
													
												}
												$rpp = 10;
											$lastpage = ceil($row_num/$rpp);
												if(isset($_GET['pn'])){
													$pn = preg_replace('/[^0-9]/',"",$_GET['pn']);
											if($pn < 1){
												$pn = 1;
											}else if($pn > $lastpage){
												$pn = $lastpage;
											}
											$centerControl ="";
												$sub1 = $pn - 1;
												$sub2 = $pn - 2;
												$sub3 = $pn - 3;
												//***********************
												$add1 = $pn + 1;
												$add2 = $pn + 2;
												$add3 = $pn + 3;
							
													if($pn > 2 && $pn < ($lastpage - 1)){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add2."'>".$add2."</a>";
										}else if($pn > 3 && $pn < ($lastpage - 2)){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub3."'>".$sub3."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add2."'>".$add2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add3."'>".$add3."</a>";
										}else if($pn == 1){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add2."'>".$add2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add3."'>".$add3."</a>";
										}else if($pn == $lastpage){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub3."'>".$sub3."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn > 1 || $pn < $lastpage){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add1."'>".$add1."</a>";
										}
											
											
										$pageNumber = "";
											if($pn > 1 && $pn < $lastpage){
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?pn=".$sub1."'>prev</a>";
												$pageNumber .= $centerControl;
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?pn=".$add1."'>next</a>";
											}else if($pn == 1){
												$pageNumber .= $centerControl;
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?pn=".$add1."'>next</a>";
											}else if($pn == $lastpage){
												$pageNumber .=  "<a href='$_SERVER[PHP_SELF]?pn=".$sub1."'>prev</a>";
												$pageNumber .= $centerControl;
											}
												}else{
													echo "<script>window.location.href='index.php?pn=1'</script>";
												}
									
											
										$start = ($pn - 1)*$rpp;	
							
										//## Pagination Ends
										$fetchPosts = $con -> prepare("SELECT * FROM discussion ORDER BY ref DESC LIMIT $start,$rpp");
										$fetchPosts -> execute();
											if($fetchPosts -> rowCount()>0){
												$fetchPosts -> setFetchMode(PDO::FETCH_ASSOC);
												while($row = $fetchPosts -> fetch()){
													$ref = $row['ref'];
													$titlea = $row['title'];
													$title = $row['title'];
													$category = $row['category'];
													$mode = $row['mode'];
														switch($mode){
															case 'Guide': $mode = "<a href='#' style=' text-decoration:none; color:#fff; background-color:#f05f70; padding:2px; border-radius:4px;'>".$mode."</a>";
															break;
															case 'News': $mode = "<a href='#' style=' text-decoration:none; color:#fff; background-color:green; padding:2px; border-radius:4px;'>".$mode."</a>";
															break;
															case 'Question': $mode = "<a href='#' style=' text-decoration:none; color:#fff; background-color:orange; padding:2px; border-radius:4px;'>".$mode."</a>";
															break;
															case 'none': $mode = "";
															break;
															
														}
													$creator = $row['creator_ref'];
													$date = time_ago($row['date']);
													$titleb = "";
													$view_counts = $row['view_counts'];
														if(strlen($title)>200){
															$title = substr($title,0,200);
															$title = $title."...";
														}else{
															$title = $title;
														}
														if(strlen($title)>40){
															$titleb = substr($title,0,40);
															$titleb = $titleb."...";
														}else{
															$titleb = $title;
														}
														$get_creator = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_creator -> execute(array($creator));
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
																				$profpp = "<img src=\"hookists/defaultb.png\"/>";
																			break;
																			case 'female':
																				$profpp = "<img src=\"hookists/default.png\"/>";
																			break;
																			default:
																				$profpp = 'Locked';
																		}
																		
																		
																		//######$profpp = "<span class='profpex' style=\"display:block;  font-weight:bold;    border-radius:50%;  background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp = "<img class='profillpix' src=\"hookists/".$profile_pix."\"/>";
																	}
															}
														
														
											?>
													<div class="content-pane" style="margin-top:20px;">
														<div class="profPix"><a href="about-cred.php?ref=<?php echo $creator;?>&pn=1" style="text-decoration:none;" title="<?php echo $creator_gan_gan;?>"><?php  echo $profpp; ?></a></div>
															<div class="caption">
																<strong class="large" ><?php echo $mode." &nbsp; ";?> <a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref; ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $title; ?></a></strong>
																<strong class="medium"><a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $titleb; ?></a></strong>
																<div class="cap-bottom">most recent by <strong><a href="about-cred.php?ref=<?php echo $creator; ?>&pn=1" style="color:#666; text-decoration:none;"><?php echo $creator_gan_gan; ?></a></strong> <span class="date-flix">&dash; <?php echo $date; ?> <i class="fa fa-long-arrow-right"></i></span><span class="cargo-re"><i class="fa fa-tags"></i></span> <strong><?php echo $category; ?></strong></div>
															</div>
															<div class="hint">
																<span class="view-count"><i class="fa fa-eye" style="color:#49ae4d; font-size:18px;"></i> 
																
																<?php
																
									$fetch_view = $con -> prepare("SELECT * FROM views WHERE disc_source=?");
									$fetch_view -> execute(array($ref));
									if($fetch_view -> rowCount() > 0){
										// Squeezing count
										
										$count = $fetch_view -> rowCount();
										$_len = strlen($count);
											_squeezeCount($count,$_len);
											
									}else{
										echo 0;
									}
								?>
																
																</span>
																<span class="comment-count"><i class="fa fa-comments" style="color:#2e9fff; font-size:18px;"></i> 
																<?php
									$fetch_replies = $con -> prepare("SELECT * FROM replies WHERE disc_source=?");
									$fetch_replies -> execute(array($ref));
									if($fetch_replies -> rowCount() > 0){
										$rcount = $fetch_replies -> rowCount();
										$_rlen = strlen($rcount);
											_squeezeCount($rcount,$_rlen);
									}else{
										echo 0;
									}
								?>
																</span>
																<span class="upvote-count"><i class="fa fa-hand-o-up" style="color:#2e9fff; font-size:18px;"></i> 
																	<?php
									$fetch_upvotes = $con -> prepare("SELECT * FROM upvotes WHERE disc_source=? AND status = ?");
									$fetch_upvotes -> execute(array($ref,"yes"));
									if($fetch_upvotes -> rowCount() > 0){
										$ucount = $fetch_upvotes -> rowCount();
										$_ulen = strlen($ucount);
											_squeezeCount($ucount,$_ulen);
									}else{
										echo 0;
									}
								?>
																</span>
																<span class="downvote-count"><i class="fa fa-hand-o-down" style="color:#ffc107; font-size:18px;"></i> 
																	<?php
									$fetch_downvotes = $con -> prepare("SELECT * FROM downvotes WHERE disc_source=? AND status=?");
									$fetch_downvotes -> execute(array($ref,"yes"));
									if($fetch_downvotes -> rowCount() > 0){
										$dcount = $fetch_downvotes -> rowCount();
										$_dlen = strlen($count);
											_squeezeCount($dcount,$_dlen);
									}else{
										echo 0;
									}
								?>
																</span>
															</div>
															<div class="line"></div>
													</div>
													<div class="line"></div>
													<!--End of usage-->


											
											<?php
																							
												};
											}else{
												echo "No post Yet!!!!!!!!!!!!";
											}
										
									?>
											
													
					<!--PHP alteration END-->
					<div class="paginationx"><?php echo $pageNumber; ?></div>
					
				</div>
					</div>
					<div class="col-sm-3 col-md-3">
					
					
				
					<?php include("right-seg.php"); ?>
		
		
					</div>
				
				</div>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
		
		
		
		
		<div class="line"></div>
		<!--
		<div class="channel-list-pannel-box">
				<strong><i class="fa fa-newspaper-o"></i> Channels</strong>
		<div class="channel-list-pannel">
			<a href="#" title="explore" class="expand-channel"><i class="fa fa-expand"></i></a>
			<div class="arrow left"><i class="fa fa-backward"></i></div>
			<div class="arrow right"><i class="fa fa-forward"></i></div>
		<div class="channel-list-pannel-box-pan">
			<div class="chb">Health</div>
			<div class="chb">Farming</div>
			<div class="chb">Campus</div>
			<div class="chb">Exams</div>
			<div class="chb">Politics</div>
			<div class="chb">Geography</div>
			<div class="chb">Science</div>
			<div class="chb">Fashion</div>
			<div class="chb">Love</div>
			<div class="chb">Sport</div>
			<div class="chb">Dating</div>
			<div class="chb">Computer</div>
			<div class="chb">Celebrities</div>
			<div class="chb">Business</div>
			<div class="chb">Food</div>
			<div class="chb">Programming</div>
			<div class="chb">Music</div>
			<div class="chb">Culture</div>
			<div class="chb">Crime</div>
			<div class="chb">Inventories</div>
			<div class="chb">Repairs</div>
		</div>
			<div class="line"></div>
		</div>
		</div>--> <br/><br/><br/>
		<div class="channel-list-pannel-boxn" id="channel-list-pannel-boxn">
				<strong><i class="fa fa-newspaper-o"></i> Channels</strong>
				<br/>
		
			<a href="channel/channel-split.php?channel=health" class="chb">Health</a>
			<a href="channel/channel-split.php?channel=farming" class="chb">Farming</a>
			<a href="channel/channel-split.php?channel=campus" class="chb">Campus</a>
			<a href="channel/channel-split.php?channel=exams" class="chb">Exams</a>
			<a href="channel/channel-split.php?channel=politics" class="chb">Politics</a>
			<a href="channel/channel-split.php?channel=fashion" class="chb">Fashion</a>
			<a href="channel/channel-split.php?channel=sport" class="chb">Sport</a>
			<a href="channel/channel-split.php?channel=celebrities" class="chb">Celebrities</a>
			<a href="channel/channel-split.php?channel=business" class="chb">Business</a>
			<a href="channel/channel-split.php?channel=relationship" class="chb">Relationship</a>
			<a href="channel/channel-split.php?channel=culture" class="chb">Culture</a>
			<a href="channel/channel-split.php?channel=crime" class="chb">Crime</a>
			<a href="channel/channel-split.php?channel=technology" class="chb">Technology</a>
			<a href="channel/channel-split.php?channel=programming" class="chb">Programming</a>
			<a href="channel/channel-split.php?channel=jobs" class="chb">Jobs</a>
			<a href="channel/channel-split.php?channel=webmasters" class="chb">Webmasters</a>
		</div>
		<br/><br/>
		
		<div class="ads-panel footer">....ADVERT ....ADVERT ....ADVERT ....ADVERT ....ADVERT </div>
				
	
	
		</div>
		<br/>
		<!-- <div class="news-and-events">
			<div class="news-inner">
			<strong style="color:#666; font-size:30px;">News Flix</strong><br/><br/>
			<div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div><div class="news-inner-pannel">
			<a href="#" style="text-decoration:none;">
				<div class="news-inner-left"><img src="images/cover.jpg"/></div>
				<div class="news-inner-right">
					<strong>The Earth Quake </strong>
					<p>Little Caption from the sake of the car bon fedricap bon fedricap...</p>
				</div>
					</a>
			</div>
			<div class="line"></div>
			</div>
		</div> -->
			
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