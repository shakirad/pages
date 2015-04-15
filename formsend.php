<?php
if (isset($_POST['submitted'])){
require_once('../includes/config.php');
require_once("../includes/functions.php");
require_once("../includes/session.php");
//ob_start has to be added in otherwise an error about being unable to edit headers comes up. 
ob_start();
//If not logged in display and alert box saying you need to be logged in to post a comment and 
//redirect back to the article page. 
if (!logged_in()) {
	//Extracting the post data so the redirect back to the article works. 
	extract($_POST);
	//JavaScript alert box
	echo ('<script language="javascript">
		alert("Sorry, you have to be logged in to post a comment!");
		window.location = "main.php?id='.$articleid.'";
		</script>');	

}

//Else extract post data and send it to the database. The redirect back to the article page. 
else {
	extract($_POST);
	//Brings in session data so comments are under the name you are logged in as. 
	$userid = $_SESSION['admin_id'];
	//Escapes string to ensure no harmful characters/ SQL injections are sent via the comment box. 
	$comment = mysqli_real_escape_string($conn, $_POST['comment']); //Escaping the comment so special characters can be sent. Also improves safety. 

			
		$sql = "INSERT INTO comment (content, date, time, user_userid, article_idarticle) 
			VALUES ('$comment', CURDATE(), CURTIME(), '$userid', '$articleid')";
		
		//CURTIME is showing the incorrect time as my server is in Texas! 
		$results = mysqli_query($conn, $sql);

		if (!$results) {
        die('error inserting new record') . $comment;
        } else{//end of nested if

        header('location: main.php?id='.$articleid);
		  }
}}

?>
