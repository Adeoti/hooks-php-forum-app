<?php
require("../config.php");
if(isset($_SESSION['uid']))
{
	

						$get_creator = $con -> prepare("SELECT * FROM hookists WHERE ref = ?");
														$get_creator -> execute(array($_SESSION['uid']));
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
																		$profpp = "<span style=\"border:2px solid #fff; display:block; font-size:30px; font-weight:bold;  margin-left:2px;  border-radius:50%; text-align:center; padding:11px; background-color:".$bg."; color:#ffffff;\">".$nameAlpha."</span>";
																	}else{
																		$profpp = "<img class='profillpix' src=\"../hookists/".$profile_pix."\"/>";
																	}
															}
															}
					
					
					?>
	<div class="header">
				
					<div class="hot-bar">
						<div class="profile">
							<?php
								if(isset($_SESSION['uid']))
								{
									?>
									
							<a href="../about-cred.php?ref=<?php echo $_SESSION['uid']?>" style="text-decoration:none;"><?php echo $profpp; ?></a>
									<?php
								}
							?>
						</div>
						<div class="hot-navs reserve">
						<?php
							if(isset($_SESSION['uid'])){
								
								?>
						<ul>
							<li><a href="#" class="notification" title="notifications"><i class="fa fa-bell"></i></a>
							</li>
							<li><a href="../index.php" title="Home" class="members"><i class="fa fa-home"></i></a></li>
							<li><a href="../about-cred.php?ref=<?php echo $_SESSION['uid'].substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20)?>" class="messages" title="My Profile"><i class="fa fa-user-plus"></i></a></li>
							<li><a href="../creator.php" class="messages" title="Start new discussion"><i class="fa fa-pencil-square-o"></i></a></li>
							<li><a href="javascript:void(0)" title="Pop Shortcut" id="rigo" class="bar-trigger"><i class="fa fa-bars"></i></a></li>
						</ul>
								<?php
							}else{
								?>
						<ul>
							<li><a href="../join.php" title="Create Account"><i class="fa fa-user"></i> join</a></li>
							<li><a href="../login.php" title="Log In"><i class="fa fa-sign-in"></i> log in</a></li>
						</ul>
								<?php
							}
						?>
						<form action="search-filter.php" method="get" style="position:relative;" class="medium">
							<span class="board">Type Your Search Here</span>
							<input type="text" class="search-box" name="qkey" placeholder="Search Discussions"/>
							<button class="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
						<form action="search-filter.php" method="get" style="position:relative;" class="large">
							<span class="board">Type Your Search Here</span>
							<input type="text" class="search-box" name="qkey" placeholder="Search Discussions"/>
							<button class="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<div class="hot-navs">
						<?php
							if(isset($_SESSION['uid'])){
								
								?>
						<ul>
							<li  class="notific-hang"><a href="javascript:void(0)" class="notification-bell" title="notifications"><i class="fa fa-bell"></i> 
							
							<span class="notific-count" id="notific-count"></span></a>
								
								<div class="notific-pan">
									<div class="notific-header">
									&nbsp; &nbsp; &nbsp; <strong>Notifications</strong></div>
									<div class="notification-body-body">
										&nbsp; &nbsp; <i class="fa fa-cog spine"></i> Loading...
									</div>
								</div>
								
							</li>
							<li><a href="../index.php?pn=1" title="Home" class="members"><i class="fa fa-home"></i></a></li>
							<li><a href="../about-cred.php?ref=<?php echo $_SESSION['uid']?>&pn=1" class="messages" title="My Profile"><i class="fa fa-user-plus"></i></a></li>
							<li><a href="../creator.php" class="messages" title="Start new discussion"><i class="fa fa-pencil-square-o"></i></a></li>
						</ul>
								<?php
							}else{
								?>
						<ul>
							<li><a href="../join.php" title="Create Account"><i class="fa fa-user"></i> join</a></li>
							<li><a href="../login.php" title="Log In"><i class="fa fa-sign-in"></i> log in</a></li>
						</ul>
								<?php
							}
						?>
					</div>
					
			</div>