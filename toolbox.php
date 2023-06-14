
<div class="tool-box">
			<div class="tool-control">
			<a href="javascript:void(0)" class="tool-controler" title="Quick Tools"><i class="fa fa-cogs" style="color:#;"></i></a>
			</div>
			<div class="sec">
			
			<?php
	if(isset($_SESSION['uid']))
	{	
	?>
	<ul>
				<li><a href="creator.php" title="Start New Discussion"><i class="fa fa-pencil"></i></a></li>
				<li><a href="account-manager.php" title="settings"><i class="fa fa-cog"></i></a></li>
				<!--<li><a href="draft-collapsed.php" title="drafts"><i class="fa fa-book"></i></a></li> -->
				<li><a href="#"><i class="fa fa-text-height"></i></a></li>
				<!-- <li><a href="javascript:void(0)" class="compose-tool" title="compose message"><i class="fa fa-envelope"></i></a></li> -->
				<li><a href="javascript:void(0)" class="searchHandle" title="search threads"><i class="fa fa-search-plus"></i></a></li>
				<li><a href="favourites.php?pn=1" title="favourites"><i class="fa fa-thumb-tack"></i></a></li>
				<li><a href="adsplans.php" title="Create Ads"><i class="fa fa-bullhorn"></i></a></li>
				<li><a href="#" title="help" style="cursor:help;"><i class="fa fa-question"></i></a></li>
				<li><a href="engine/logout.php" title="Log out" style="cursor:cell;"><i class="fa fa-power-off"></i></a></li>
				<br/>
				<br/>
				<br/>
			</ul>
	<?php
	}else{
		?>
		<ul>
				<li><a href="join.php" title="Create Account"><i class="fa fa-user"></i></a></li>
				<li><a href="login.php" title="Sign In"><i class="fa fa-sign-in"></i></a></li>
				<br/>
				<br/>
				<br/>
			</ul>
		
		<?php
	}
?>
			</div>
		
		</div>