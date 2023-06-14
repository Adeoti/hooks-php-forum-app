<?php
	function rank_it($rank,$ranker){
		require("config.php");
		$update_rank = $con -> prepare("UPDATE hookists SET rank = ? WHERE ref = ? ");
		if(!$update_rank -> execute(array($rank,$ranker))){
			echo "<script>console.log('Error Occured')</script>";
		}
	}


?>