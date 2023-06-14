<?php
session_start();
require("config.php");
	if(!isset($_SESSION['uid'])){
		
		header("Location:index.php");
	}else{
		$ref = preg_replace('/[^0-9]/',"",$_SESSION['uid']);
		$get_creator = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_creator -> execute(array($ref));
															$get_creator -> setFetchMode(PDO::FETCH_ASSOC);
															while($roww = $get_creator -> fetch()){
																$profpp = "";
																$bg = "";
																$creator_id = $roww['ref'];
																$creator_gan_gan = $roww['fname'];
																$creator_gan_ = $roww['lname'];
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
																		$profpp = "<span class='photo' style=\"display:block; font-size:40px; font-weight:bold; height:45px; margin-left:2px; width:45px; border-radius:50%; padding:12px; background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp = "<img src=\"hookists/".$profile_pix."\"/>";
																	}
															}
	
?>
<!DOCTYPE html>
	<html>
	<head>
		<title><?php echo  $creator_gan_gan."'s Favourites"?></title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
	<?php include("toolbox.php"); ?>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
			
					<div class="member-navs">
						<ul>
							<li><a href="profile-slack.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" ><i class="fa fa-book"></i> Threads</a></li>
							<li><a href="about-cred.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" ><i class="fa fa-map-marker"></i> About</a></li>
							<li><a href="#"><i class="fa fa-folder-open"></i> Gallery</a></li>
							<li><a href="favourites.php" class="active"><i class="fa fa-calendar"></i> Favs</a></li>
							<?php
								if(isset($_SESSION['uid']))
								{
								
									?>
							<li><a href="top.php"><i class="fa fa-files-o"></i> Drafts</a></li>
							<li><a href="account-manager.php" title="manage your account"><i class="fa fa-cog"></i> Settings</a></li>		
									<?php
								
								}
							?>
						</ul>
					</div>
			<div class="wrapper">
			
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				<div class="leftFrag"></div>
				<div class="middleFrag">
													
					<!--PHP alteration END-->
					<!--***************************************************************-->
					<!--***************************************************************-->
					<!--***************************************************************-->
					<!--PHP alteration END-->
										<!--Start of usage-->
									<div class="fav-loader">
										<?php
									// fetch favourites
									$fetchFav = $con -> prepare("SELECT * FROM favourites WHERE pinner = ? AND status=?");
										$fetchFav -> execute(array($_SESSION['uid'],'yes'));
											$fetchFav -> setFetchMode(PDO::FETCH_ASSOC);
												if($fetchFav -> rowCount()>0)
												{
													while($rte = $fetchFav -> fetch()){
														$fre = $rte['ref'];
														$pinner = $rte['pinner'];
														$disc_source = $rte['disc_source'];
														$dated = $rte['date'];
														
													
										$fetchPosts = $con -> prepare("SELECT * FROM discussion WHERE ref=? ORDER BY ref DESC");
										$fetchPosts -> execute(array($disc_source));
											if($fetchPosts -> rowCount()>0){
												$fetchPosts -> setFetchMode(PDO::FETCH_ASSOC);
												while($row = $fetchPosts -> fetch()){
													$ref = $row['ref'];
													$titlea = $row['title'];
													$title = $row['title'];
													$category = $row['category'];
													$mode = $row['mode'];
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
														<div class="profPix"><a href="about-cred.php?ref=<?php echo $creator.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20);?>" style="text-decoration:none;" title="<?php echo $creator_gan_gan;?>"><?php  echo $profpp; ?></a></div>
															<div class="caption">
																<strong class="large"><a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $title; ?></a></strong>
																<strong class="medium"><a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $titleb; ?></a></strong>
																<div class="cap-bottom">most recent by <strong><a href="about-cred.php?ref=<?php echo $creator.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="color:#666; text-decoration:none;"><?php echo $creator_gan_gan; ?></a></strong> <span class="date-flix">&dash; <?php echo $date; ?> <i class="fa fa-long-arrow-right"></i></span><span class="cargo-re"><i class="fa fa-tags"></i></span> <strong><?php echo $category; ?></strong>
																&nbsp; &nbsp; <a href="unpin.php?ref=<?php echo $ref; ?>" class="unpin-btn" title="unpin" style="color:#f05f70;"><i class="fa fa-thumb-tack"></i></a> &nbsp; &nbsp; 
																</div>
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
												echo "Not Available";
											}
											}
												}else{
													echo "You have no Favourite Discussion";
												}
										
									?>
									
									</div>
										
					<!--PHP alteration END-->
					
					<div class="pagination">&lt;&lt; ... 2 3 4 5 6 ... &gt;&gt;</div>
				</div>
				<?php include("right-seg.php"); ?>
		
		
		
		
		
		
		
		
		</div>
		<div class="line"></div>
			
			
			
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
		
		<script>
			$(document).ready(function(){
				$('.unpin-btn').on('click',function(evt){
					evt.preventDefault();
					var ref = $(this).attr('href');
					ref = ref.slice(ref.indexOf('?')+1);
					$.get("unpin.php",ref,function(data){
						$('.fav-loader').load('fav-loader.php');
					});
				});
			});
		</script>
	</body>
	</html>
	<?php } ?>