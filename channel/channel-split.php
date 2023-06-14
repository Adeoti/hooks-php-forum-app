<?php
session_start();
require("../config.php");
require("../tcounter.php");
	if(isset($_GET['channel']))
	{
		$channel = preg_replace('/[^a-z]/',"",$_GET['channel']);
		
	}else{
		header("Location:../index.php");
	}


?>
<!DOCTYPE html>
	<html>
	<head>
		<title><?php echo "Channel &rArr; ".$channel; ?></title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("../rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
		<div class="wrapper">
				<?php include("../announcement.php"); ?>
				<?php include("../advertpan.php"); ?>
				<div class="leftFrag"></div>
				<div class="middleFrag">
				<?php
					$fetch_count = $con -> prepare("SELECT * FROM discussion WHERE category = ? ");
						if($fetch_count -> execute(array($channel)))
						{
							$total_discz = $fetch_count -> rowCount();
						}else{
							echo "<span style='color:#f00; padding:8px; background-color:#fff;'>Error!</span>";
						}
				
				?>
					<!--To be altered by PHP-->
													<!--Start of usage-->
									<?php
									echo "<br/><div class='top-claim'><i class=\"fa fa-newspaper-o\"></i> Channel <i class=\"fa fa-long-arrow-right\"></i> ".$channel." <a class='new-thr-cr' href='../creator.php?channel=$channel'><i class='fa fa-pencil-square-o'></i> New Thread</a></div><br/>";
										$remark = "";
										switch($channel)
										{
											case 'programming': $remark = "Stay glued to fat and sweet discussion about Programming and the likes. Create and contribute to discussions on <i><b>web design, algorithm, hacking, security, cyber issues and so forth...</b></i>";
											break;
											case 'farming': $remark = "Never stay out of what matters to you about farming activities. Ask and answer questions that relates to your field or idea about farming issues.";
											break;
											case 'health': $remark = "Health is wealth. You + him + her + I + them can always promote health issues collaboratively.  ";
											break;
											case 'technology': $remark = "Is technology your hobby? Oh! don't be left behind the trend of what goes rapidly about technology. Or you have discussion about it? Then, drop it here.";
											break;
											case 'campus': $remark = "You like campus activities right? Here you are to discuss and join discussions on campus life. Start new thread to tell us what it looks like on your side.";
											break;
											case 'politics': $remark = "Issues about politics are best discussed here for bright engagement and enlightenment. Create news, guide or ask question on politics.";
											break;
											case 'exams': $remark = "Throw discussions about exams. Latest news, notice and or question can be used to create thread about your desire exams";
											break;
											case 'fashion': $remark = "Feel free to join discussions on fashion and style. Create one if you wish.";
											break;
											case 'sport': $remark = "Members are dropping quality threads on Sport activities. Your's will be appreciated. Create thread on <b><i>football, boxing, karate, table tennis, swimming and the likes.</i></b> ";
											break;
											case 'celebrities': $remark = "Facts and news about world celebs are turned into useful thread here. Have your own? Drop it now and let members engage with their opinions";
											break;
											case 'business': $remark = "Business issues cannot be overrated. <b><i>Marketing, start up and or promotion </i></b> issues are best discussed here.";
											break;
											case 'relationship': $remark = "Are you having issues in your relationship OR you just want to stay active with the sweet journey? This is the brain-box. <b><i>Dating, romance, heart-broken </i> and related arms are best discussed here.</b> ";
											break;
											case 'culture': $remark = "Culture and ethic matters are rolling up in this channel. Join discussions or create what matters to you about culture. Let's know your feel about <b><i>dressing, dialet, and other culture arms</i></b>";
											break;
											case 'crime': $remark = "Crime and Criminology issues are gaining good postures here. Join quality threads or create your own now.";
											break;
											
											default: $remark = "No channel for this request yet. Please <a href='#'>suggest channel</a>";
											
										
										
										}
										echo "<div class='channel-remark'>
										<div>".$remark."</div>
												<div>
											<b>Topics :</b> ".$total_discz."<br/>
											<b>Discussions :</b> 30,9844
												</div>
										<div class='line'></div>
											</div><br/>";
										?>
										<center>
											<div class="sub_control" id="sub_control">
											<?php
												$avil_ = $con -> prepare("SELECT * FROM channel_sub WHERE channel = ? AND subscriber = ? AND status = ?");
												if($avil_ -> execute(array($channel,$_SESSION['uid'],'yes'))){
													if($avil_ -> rowCount()>0){
														
														?>
											<a href="javascript:void(0)" class="sub-btn2" subscriber="<?php echo $_SESSION['uid']?>" rel="<?php echo $channel;?>"> <i class="fa fa-pencil"></i> Unsubscribe</a>
														<?php
														
													}else{
														?>
											<a href="javascript:void(0)" class="sub-btn" subscriber="<?php echo $_SESSION['uid']?>" rel="<?php echo $channel;?>"> <i class="fa fa-pencil"></i> Subscribe</a>
														
														<?php
													}
												}else{
													echo "Something is not write..";
												}
											?>


											
										</div>
										</center>
										<br/>
										
										<?php
										//## Pagination Starts
											$rn = $con -> prepare("SELECT * FROM discussion WHERE category=? ORDER BY ref DESC");
												$pn = "";
												$pageNumber = "";
												$sex = "";
												if($rn -> execute(array($channel))){
												$row_num = $rn -> rowCount();
													if($row_num > 0){
												$rpp = 8;
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
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add2."'>".$add2."</a>";
										}else if($pn > 3 && $pn < ($lastpage - 2)){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub3."'>".$sub3."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add2."'>".$add2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add3."'>".$add3."</a>";
										}else if($pn == 1 && $lastpage == 1){
											$centerControl .= "";
										}else if($pn == 1 && $lastpage < 3){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>".$add1."</a>";
										}else if($pn == 1 && $lastpage > 3){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add2."'>".$add2."</a>";
										}else if($pn == 1 && $lastpage < 4){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add2."'>".$add2."</a>";
										}else if($pn == 1 && $lastpage > 4){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add2."'>".$add2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add3."'>".$add3."</a>";
										}else if($pn == $lastpage && $lastpage <3){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn == $lastpage && $lastpage >3){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn == $lastpage && $lastpage <4){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn == $lastpage && $lastpage > 4){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub3."'>".$sub3."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn > 1 || $pn < $lastpage){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>".$add1."</a>";
										}
											
											
										
											if($pn > 1 && $pn < $lastpage){
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>prev</a>";
												$pageNumber .= $centerControl;
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>next</a>";
											}else if($pn == 1 && $lastpage !=1){
												$pageNumber .= $centerControl;
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$add1."'>next</a>";
											}else if($pn == 1 && $lastpage == 1){
												$pageNumber .= $centerControl;
											}else if($pn == $lastpage){
												$pageNumber .=  "<a href='$_SERVER[PHP_SELF]?channel=".$channel."&pn=".$sub1."'>prev</a>";
												$pageNumber .= $centerControl;
											}
												}else{
													echo "<noscript>Please Enable Javascript to get moving!</noscript>";
													echo "<script>window.location.href='channel-split.php?channel=$channel&pn=1'</script>";
												}
									
											
										$start = ($pn - 1)*$rpp;	
											
										//## Pagination Ends
										$fetchPosts = $con -> prepare("SELECT * FROM discussion WHERE category=? ORDER BY ref DESC LIMIT $start,$rpp");
										$fetchPosts -> execute(array($channel));
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
													$date = $row['date'];
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
																		$profpp = "<span class='profpex' style=\"display:block;  font-weight:bold;    border-radius:50%;  background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp = "<img src=\"../hookists/".$profile_pix."\"/>";
																	}
															}
														
														
											?>
													<div class="content-pane">
														<div class="profPix"><a href="../about-cred.php?ref=<?php echo $creator;?>&pn=1" style="text-decoration:none;" title="<?php echo $creator_gan_gan;?>"><?php  echo $profpp; ?></a></div>
															<div class="caption">
																<strong class="large"><?php echo $mode." &nbsp; ";?> <a  title="<?php echo $titlea; ?>" href="../threadclip.php?ref=<?php echo $ref; ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $title; ?></a></strong>
																<strong class="medium"><a  title="<?php echo $titlea; ?>" href="../threadclip.php?ref=<?php echo $ref; ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $titleb; ?></a></strong>
																<div class="cap-bottom">most recent by <strong><a href="../about-cred.php?ref=<?php echo $creator; ?>&pn=1" style="color:#666; text-decoration:none;"><?php echo $creator_gan_gan; ?></a></strong> <span class="date-flix">&dash; <?php echo $date; ?> <i class="fa fa-long-arrow-right"></i></span><span class="cargo-re"><i class="fa fa-tags"></i></span> <strong><?php echo $category; ?></strong></div>
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
												echo "<br/>No post for ".$channel." Yet!!!!!!!!!!!!";
											}
										}else{
											echo "<br/><center>No post for ".$channel." Yet!</center>";
										}
												}else{
													echo "SORRY: Something's not right";
												}
									?>
											
													
					<!--PHP alteration END-->
					<div class="pagination"><?php echo $pageNumber; ?></div>
										
				</div>
					<?php include("../right-seg.php"); ?>
		
		
		
		
		
		
		<div class="line"></div>
	
	
	
		</div>
		<br/><br/>
			<?php include("../footer.php"); ?>
			<?php include("../message-box.php"); ?>
			<script src="../js/qwrs.js"></script>
		<script src="../js/jquery ui/jquery-ui.min.js"></script>
		<script src="../js/custom.js"></script>
		<script>
			$(document).ready(function(){
				$('.sub-btn').click(function(){
					var channel = $(this).attr('rel');
					var subscriber = $(this).attr('subscriber');
						var datu = {channel:channel, subscriber:subscriber};
						$.post("../channel_sub.php",datu,function(data){
							$('.sub-btn').fadeOut();
							$('.sub-btn2').fadeIn();
						});
				});
			//////////////////##########////////////
				$('.sub-btn2').click(function(){
					var channel = $(this).attr('rel');
					var subscriber = $(this).attr('subscriber');
						var datu = {channel:channel, subscriber:subscriber};
						$.post("../channel_unsub.php",datu,function(data){
							$('.sub-btn2').fadeOut();
							$('.sub-btn').fadeIn();
						});
				});
			});
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		</script>
	</body>
	</html>