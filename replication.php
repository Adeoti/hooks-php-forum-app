<div id="replex">
<?php
session_start();
require("config.php");
if(isset($_POST['ref'])){
	$ref = preg_replace('/[^0-9]/',"",$_POST['ref']);
	$fetchPosts = $con -> prepare("SELECT * FROM discussion WHERE ref=? ORDER BY ref DESC ");
										$fetchPosts -> execute(array($ref));
											if($fetchPosts -> rowCount()>0){
												$fetchPosts -> setFetchMode(PDO::FETCH_ASSOC);
												while($row = $fetchPosts -> fetch()){
													$ref = $row['ref'];
													$title = $row['title'];
											}
											}
							
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
						
					<div class="thread-content-container">
						<strong><b style="color:#666;"><i class="fa fa-share"></i> RE :</b> <?php echo $title; ?></strong>
						<p>
							<?php echo $content; ?>
						</p>
					</div>
					<div class="thread-media">
						<img src="images/profpix5.jpg"/>
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
								}
						?>
						</div>
					