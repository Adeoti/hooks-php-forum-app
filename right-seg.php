
	<div class="rightFrag" style="width:90%;">
					
					
					<?php
						if(isset($_SESSION['uid']))
						{
						?>
				<div class="rightContainer">
						<div class="short-cut-header"><i class="fa fa-arrows"></i> Subscriptions</div>
						<div class="short-cut-body">
							<?php
								$fetch_subs = $con -> prepare("SELECT * FROM channel_sub WHERE subscriber = ? AND status = ? ORDER BY ref DESC");
									if($fetch_subs -> execute(array($_SESSION['uid'],'yes'))){
										if($fetch_subs -> rowCount() > 0){
											$fetch_subs -> setFetchMode(PDO::FETCH_ASSOC);
												while($rowf = $fetch_subs -> fetch()){
													$ref = $rowf['ref'];
													$channel_name = $rowf['channel'];
														$get_total_topic = $con -> prepare("SELECT * FROM discussion WHERE category = ? ");
															if($get_total_topic -> execute(array($channel_name))){
																//$rowsx = $get_total_topic -> rowCount();
																	$get_total_topic -> setFetchMode(PDO::FETCH_ASSOC);
																while($rud = $get_total_topic -> fetch()){
																		$refud = $rud['ref'];
																			
																}
																$get_real = $con -> prepare("SELECT * FROM views WHERE disc_source = ? AND viewer = ? ");
																				if($get_real -> execute(array($refud,$_SESSION['uid']))){
																					$count_redux = $get_real -> rowCount();
																				}
															}
													?>
													
													<ul>
														<li><a href="channel/channel-split.php?channel=<?php echo $channel_name;?>"><?php echo $channel_name." <sup style='color:#fff; height:20px; display:inline-block; line-height:19px; text-align:center; width:20px; background:#f05f70; border-radius:50%;'>". $count_redux."</sup>"; ?></a></li>
													</ul>
													
													
													<?php
												}
										}else{
											echo "<div style='padding:8px;'>You haven't subscribed to any channel yet
												<a title='Explore' href='#channel-list-pannel-boxn'><i class=\"fa fa-external-link\"></i></a>
											</div>";
										}
									}
							
							
							?>
						</div>
					</div>	
					<?php
						}else{
							?>
							<div class="rightContainer">
								<div style="width:80%; margin:0px auto; font-size:20px; margin-top:20px;">
								<br/>Hi guest, it's gonna be a nice experience to tour through your account
							<br/><br/><br/>
							<a href="join.php" class="btn btn-sm btn-danger"><i class="fa fa-unlock"></i> Sign Up</a>
							<a href="login.php" class="btn btn-sm btn-primary"><i class="fa fa-key"></i> Sign In</a>
							</div>
							</div>
							<?php
						}
					?>
					
					<div class="rightContainer">
						<div class="advert-header"><i class="fa fa-certificate"></i> Sponsored  <a href="adsplans.php" title="create ads" class="ad-handle"><i class="fa fa-bullhorn"></i></a></div>
						<div class="advert-body">
							<a href="#"><img src="images/cover.jpg"/></a>
						</div>
					
					</div>
				</div>