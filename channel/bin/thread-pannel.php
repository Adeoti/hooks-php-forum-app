<?php
session_start();
require("../config.php");

	if(isset($_GET['sub']))
	{
		$channel = preg_replace('/[^a-z]/',"",$_GET['channel']);
		$sub = preg_replace('/[^a-z]/',"",$_GET['sub']);
	}else{
		header("Location:../index.php");
	}

?>
<!DOCTYPE html>
	<html>
	<head>
		<title><?php echo "Channel &rArr; ".$channel."/".$sub; ?></title>
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
					<!--To be altered by PHP-->
													<!--Start of usage-->
									<?php
									echo "<br/><div class='top-claim'><i class=\"fa fa-newspaper-o\"></i> Channel <i class=\"fa fa-long-arrow-right\"></i> ".$channel." <i class=\"fa fa-long-arrow-right\"></i> ".$sub." <a class='new-thr-cr' href='../creator.php?channel=$channel&sub=$sub'><i class='fa fa-pencil-square-o'></i> New Thread</a></div><br/>";
										$fetchPosts = $con -> prepare("SELECT * FROM discussion WHERE category=? ORDER BY ref DESC");
										$fetchPosts -> execute(array($sub));
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
														if(strlen($title)>65){
															$title = substr($title,0,65);
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
																		$profpp = "<img src=\"hookists/".$profile_pix."\"/>";
																	}
															}
														
														
											?>
													<div class="content-pane">
														<div class="profPix"><a href="../about-cred.php?ref=<?php echo $creator.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20);?>" style="text-decoration:none;" title="<?php echo $creator_gan_gan;?>"><?php  echo $profpp; ?></a></div>
															<div class="caption">
																<strong class="large"><?php echo $mode." &nbsp; ";?><a  title="<?php echo $titlea; ?>" href="../threadclip.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $title; ?></a></strong>
																<strong class="medium"><a  title="<?php echo $titlea; ?>" href="../threadclip.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $titleb; ?></a></strong>
																<div class="cap-bottom">most recent by <strong><a href="../about-cred.php?ref=<?php echo $creator.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="color:#666; text-decoration:none;"><?php echo $creator_gan_gan; ?></a></strong> <span class="date-flix">&dash; <?php echo $date; ?> <i class="fa fa-long-arrow-right"></i></span><span class="cargo-re"><i class="fa fa-tags"></i></span> <strong><?php echo $category; ?></strong></div>
															</div>
															<div class="hint">
																<span class="view-count"><i class="fa fa-eye" style="color:#49ae4d; font-size:18px;"></i> <?php echo $view_counts; ?></span>
																<span class="comment-count"><i class="fa fa-comments" style="color:#2e9fff; font-size:18px;"></i> 
																<?php
									$fetch_replies = $con -> prepare("SELECT * FROM replies WHERE disc_source=?");
									$fetch_replies -> execute(array($ref));
									if($fetch_replies -> rowCount() > 0){
										echo $fetch_replies -> rowCount();
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
										echo $fetch_upvotes -> rowCount();
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
										echo $fetch_downvotes -> rowCount();
									}else{
										echo 0;
									}
								?>
																</span>
															</div>
													</div>
													<!--End of usage-->


											
											<?php
																							
												};
											}else{
												echo "No post Yet!!!!!!!!!!!!";
											}
										
									?>
											
													
					<!--PHP alteration END-->
					<div class="pagination">&lt;&lt; ... 2 3 4 5 6 ... &gt;&gt;</div>
				</div>
					<?php include("../right-seg.php"); ?>
		
		
		
		
		
		
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
		<div class="channel-list-pannel-boxn">
				<strong><i class="fa fa-newspaper-o"></i> Channels</strong>
				<br/>
		
			<a href="channel/health.php" class="chb">Health</a>
			<a href="channel/farming.php" class="chb">Farming</a>
			<a href="channel/campus.php" class="chb">Campus</a>
			<a href="channel/exams.php" class="chb">Exams</a>
			<a href="channel/politics.php" class="chb">Politics</a>
			<a href="channel/fashion.php" class="chb">Fashion</a>
			<a href="channel/sport.php" class="chb">Sport</a>
			<a href="channel/celebrities.php" class="chb">Celebrities</a>
			<a href="channel/business.php" class="chb">Business</a>
			<a href="channel/relationship.php" class="chb">Relationship</a>
			<a href="channel/culture.php" class="chb">Culture</a>
			<a href="channel/crime.php" class="chb">Crime</a>
			<a href="channel/technology.php" class="chb">Technology</a>
		</div>
		
		
		
	
	
		</div>
		<br/><br/><br/><br/>
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
			
			<?php include("../footer.php"); ?>
			<?php include("../message-box.php"); ?>
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