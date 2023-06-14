<?php
	class Config{
		
		public function connect(){
			try{
				return new PDO("mysql:dbhost=localhost; dbname=hook", "root","");
			}catch(PDOException $e){
				echo $e -> getMessage();
			}
		}
	}

?>