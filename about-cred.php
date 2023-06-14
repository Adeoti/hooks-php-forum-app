<?php
session_start();
require("config.php");
require("tcounter.php");
require("timezoner.php");
		if(isset($_GET['ref']))
		{
			$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
			
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
			while($pen = $fetch_user_data -> fetch()){
				$ref = $pen['ref'];
				$fname = $pen['fname'];
				$lname = $pen['lname'];
				$email = $pen['email'];
				$dated = $pen['date'];
				$mobile = $pen['mobile'];
				$status = substr($pen['status'],0,40);
				$rank = $pen['rank'];
				$gender = $pen['gender'];
				$country = $pen['country'];
			}
		}else{
			header("Location: index.php");
		}
		}else{
			header("Location:index.php");
		}
		
?>
<!DOCTYPE html>
	<html>
	<head>
		<title><?php echo $fname; ?>'s Profile</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
	<?php include("toolbox.php"); ?>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
			
				<br/><br/>
			<div class="wrapper loc">
			
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				
				
				
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-2 col-md-2">
						
						</div>
						<div class="col-sm-7 col-md-7">
							<div class="middleFrag" style="width:100%;">
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
																		$profpp = "<img class='profillpix' src=\"hookists/".$profile_pix."\"/>";
																	}
															}
					
				
				?>
					<!--To be altered by PHP-->
					<div class="small-title"><?php echo $profpp; ?></div>
					<div class="big-title"><strong style="color:#4a5f70; font-size:18pt;"> <?php echo $fname."'s Profile "; ?> </strong><br/>
					<?php echo $status; ?>
					</div>
					<div class="line"></div>
					
					<?php  
						if(isset($_SESSION['uid'])){
							if($ref === $_SESSION['uid']){
								echo "
										<div class=\"member-navs\">
						<ul>
							<li><a class='btn btn-sm btn-primary' href=\"about-cred.php?ref=$ref&pn=1\" class=\"active\"><i class=\"fa fa-map-marker\"></i> About</a></li>
							<li><a class='btn btn-sm ' href=\"favourites.php?pn=1\"><i class=\"fa fa-calendar\"></i> Favs</a></li>
							<li><a class='btn btn-sm ' href=\"account-manager.php\" title=\"manage your account\"><i class=\"fa fa-cog\"></i> Settings</a></li>		
									
						</ul>
					</div>
								";
							}else{
							echo "<hr/>";
						}
						}
					
					?>
					<br/><br/>
					<?php
					?>
					
						<!--To be altered by PHP-->
													<!--Start of usage-->
									<?php
										//## Pagination Starts
											$rn = $con -> prepare("SELECT * FROM discussion WHERE creator_ref = ? ");
												$pn = "";
												$pageNumber = "";
												$sex = "";
												if($rn -> execute(array($ref))){
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
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add2."'>".$add2."</a>";
										}else if($pn > 3 && $pn < ($lastpage - 2)){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub3."'>".$sub3."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add2."'>".$add2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?pn=".$add3."'>".$add3."</a>";
										}else if($pn == 1 && $lastpage == 1){
											$centerControl .= "";
										}else if($pn == 1 && $lastpage < 3){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>".$add1."</a>";
										}else if($pn == 1 && $lastpage > 3){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add2."'>".$add2."</a>";
										}else if($pn == 1 && $lastpage < 4){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add2."'>".$add2."</a>";
										}else if($pn == 1 && $lastpage > 4){
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>".$add1."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add2."'>".$add2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add3."'>".$add3."</a>";
										}else if($pn == $lastpage && $lastpage <3){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn == $lastpage && $lastpage >3){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn == $lastpage && $lastpage <4){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn == $lastpage && $lastpage > 4){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub3."'>".$sub3."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub2."'>".$sub2."</a>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
										}else if($pn > 1 || $pn < $lastpage){
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>".$sub1."</a>";
											$centerControl .= "<span class='activePage'>".$pn."</span>";
											$centerControl .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>".$add1."</a>";
										}
											
											
										
											if($pn > 1 && $pn < $lastpage){
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>prev</a>";
												$pageNumber .= $centerControl;
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>next</a>";
											}else if($pn == 1 && $lastpage !=1){
												$pageNumber .= $centerControl;
												$pageNumber .= "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$add1."'>next</a>";
											}else if($pn == 1 && $lastpage == 1){
												$pageNumber .= $centerControl;
											}else if($pn == $lastpage){
												$pageNumber .=  "<a href='$_SERVER[PHP_SELF]?ref=".$ref."&pn=".$sub1."'>prev</a>";
												$pageNumber .= $centerControl;
											}
												}else{
													echo "<noscript>Please Enable Javascript to get moving!</noscript>";
													echo "<script>window.location.href='about-cred.php?ref=$ref&pn=1'</script>";
												}
									
											
										$start = ($pn - 1)*$rpp;	
											
										//## Pagination Ends
										$fetchPosts = $con -> prepare("SELECT * FROM discussion WHERE creator_ref = ? ORDER BY ref DESC LIMIT $start,$rpp");
										$fetchPosts -> execute(array($ref));
											if($fetchPosts -> rowCount()>0){
							
						if(isset($_SESSION['uid'])){
							if($ref === $_SESSION['uid']){
							$sex = "Your";
						}else{
						switch($gender)
						{
							case 'female': $sex = "Her";
							break;
							case 'male': $sex = "His";
							break;
						}
						}
						}else{
						switch($gender)
						{
							case 'female': $sex = "Her";
							break;
							case 'male': $sex = "His";
							break;
						}
						}
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span style='font-weight:900; color:#4a5f70; '><i class='fa fa-book'></i> ".$sex." Thread so far</span>";
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
																				$profpp = "<img class='profillpix' src=\"hookists/defaultb.png\"/>";
																			break;
																			case 'female':
																				$profpp = "<img class='profillpix' src=\"hookists/default.png\"/>";
																			break;
																			default:
																				$profpp = 'Locked';
																		}
																		
																		//$profpp = "<span class='profpex' style=\"display:block;  font-weight:bold;    border-radius:50%;  background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp = "<img src=\"hookists/".$profile_pix."\"/>";
																	}
															}
														
														
											?>
													<div class="content-pane">
														<div class="profPix"><a href="about-cred.php?ref=<?php echo $creator;?>&pn=1" style="text-decoration:none;" title="<?php echo $creator_gan_gan;?>"><?php  echo $profpp; ?></a></div>
															<div class="caption">
																<strong class="large"><?php echo $mode." &nbsp; ";?> <a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref; ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $title; ?></a></strong>
																<strong class="medium"><a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref; ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $titleb; ?></a></strong>
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
												echo "<br/>No post by ".$fname." Yet!!!!!!!!!!!!";
											}
										}else{
											echo "<br/><center>No post by ".$fname." Yet!</center>";
										}
												}else{
													echo "SORRY: Something's not right";
												}
									?>
											
													
					<!--PHP alteration END-->
					<div class="pagination"><?php echo $pageNumber; ?></div>
							
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
	</body>
	</html>