<!DOCTYPE html>
<html>
<head>
<!-- The article page (probable could have been named more appropriately! article.php?-->
<title> Apella Articles</title>
<link rel="icon" type="image/png" href="images/favicon.png" />
<meta charset="utf-8"/>

<!--FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600,700' rel='stylesheet' type='text/css'>

<!--CSS-->    
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


</head>

<body>

	    <header class="banner">
 		
 			<?php include('../includes/navigation.php'); ?>

      </header>

<article>

<?php

include('../includes/config.php');
//Configuration with database details. 

//REST GET id from URI if the ID is set then pull the appropriate article from the database. 
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
 
if(isset($id)){ 

//The article.php include has pulls all the relevent articl info dynamically from the database. 
include('../includes/article.php');
//include('../includes/comment.php');

} 
//If there is no id set display this message. 
else {
echo 'No pages here pal, set the ID please.'; 
}
$conn->close();

?>

</article>

<?php include('../includes/footer.php'); ?>

<!--NAV, smooth colour change & change of size-->
<script> 
        $(window).scroll(function(){

           var scroll = $(window).scrollTop();                
              
           if (scroll > 0 ) {
               $('nav').addClass('scrolled');
           }
          
            if (scroll <= 0 ) {
              $('nav').removeClass('scrolled');
            }
          
        });

</script>

</body>

</html>
