<?php require_once("../includes/session.php");?>
<?php require_once("../includes/functions.php");?>

<?php
ob_start();
//log out script, deletes the sessions saved on the browser. 
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

	// v1: simple logout
	// session_start();
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	redirect_to('login.php');
	//echo 'You are logged out';?>