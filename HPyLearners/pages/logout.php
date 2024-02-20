<?php 
	session_start();
	unset($_SESSION['logged_in_session']);
	unset($_SESSION['user_phone']);
	header("Location: frist.php")
?>