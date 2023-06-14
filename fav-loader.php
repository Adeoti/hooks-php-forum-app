<?php
session_start();
require("config.php");
require("tcounter.php");
if(!isset($_SESSION['uid'])){
	header("Location: index.php");
	}
				//## Pagination Starts
				$ref = preg_replace('/[^0-9]/',"",$_SESSION['uid']);
					$rn = $con -> prepare("SELECT * FROM favourites WHERE pinner = ? AND status=? ");
						$pn = "";
						$pageNumber = "";
						$sex = "";
						if($rn -> execute(array($_SESSION['uid'],'yes'))){
							$row_num = $rn -> rowCount();
							if($row_num > 0){
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
						<span style='font-weight:900; color:#4a5f70; '><i class='fa fa-tags'></i> Your Favourite Threads </span>";
														
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
										}else if($lastpage < 2){
												$centerControl .= "nnnnn";
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
													echo "<noscript>Please Enable Javascript to get moving!</noscript>";
													echo "<script>window.location.href='favourites.php?pn=1'</script>";
												}
									
											
										$start = ($pn - 1)*$rpp;	
											
										//## Pagination Ends
										$rn -> setFetchMode(PDO::FETCH_ASSOC);
														while($rte = $rn -> fetch()){
														$fre = $rte['ref'];
														$pinner = $rte['pinner'];
														$disc_source = $rte['disc_source'];
														$dated = $rte['date'];
														
										$fetchPosts = $con -> prepare("SELECT * FROM discussion WHERE ref=? ORDER BY ref DESC LIMIT $start,$rpp");
										$fetchPosts -> execute(array($disc_source));
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
														if(strlen($title)>45){
															$title = substr($title,0,38);
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
														<div class="profPix"><a href="about-cred.php?ref=<?php echo $creator;?>" style="text-decoration:none;" title="<?php echo $creator_gan_gan;?>"><?php  echo $profpp; ?></a></div>
															<div class="caption">
																<strong class="large"><?php echo $mode." &nbsp; ";?> <a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $title; ?></a></strong>
																<strong class="medium"><a  title="<?php echo $titlea; ?>" href="threadclip.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" style="text-decoration:none; color:#2e9fff;"><?php echo $titleb; ?></a></strong>
																<div class="cap-bottom">most recent by <strong><a href="about-cred.php?ref=<?php echo $creator; ?>" style="color:#666; text-decoration:none;"><?php echo $creator_gan_gan; ?></a></strong> <span class="date-flix">&dash; <?php echo $date; ?> <i class="fa fa-long-arrow-right"></i></span><span class="cargo-re"><i class="fa fa-tags"></i></span> <strong><?php echo $category; ?></strong>
																&nbsp; &nbsp; <a href="unpin.php?ref=<?php echo $ref; ?>" class="unpin-btn" title="unpin" style="color:#f05f70;"><i class="fa fa-thumb-tack"></i></a> &nbsp; &nbsp; 
																</div>
																
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
													</div>
													<!--End of usage-->


											
											<?php
																							
												};
											}else{
												echo "<br/>No Favourite post Yet!";
											}
											}
										}else{
											echo "<br/><center>No Favourite post Yet!</center>";
										}
												}else{
													echo "SORRY: Something's not right";
												}
									?>
											
													
					<!--PHP alteration END-->
					<div class="pagination"><?php echo $pageNumber; ?></div>
							
									<script src="js/qwrs.js"></script>
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