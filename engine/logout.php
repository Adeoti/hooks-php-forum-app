<?php
session_start();
require("joiner.php");
$sneek_out = new Master();
$sneek_out -> logout("signedout.php");
?>