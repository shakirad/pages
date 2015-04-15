<?php require_once("../includes/session.php");?>
<?php require_once("../includes/config.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>

<?php
ob_start();
//Log in form created using Lynda.com tutorial that can be found at:
//http://www.lynda.com/MySQL-tutorials/Creating-login-system/119003/137056-4.html
$email = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("email", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

    //post to the database
		$email = $_POST["email"];
		$password = $_POST["password"];
		
    //Calls to the attempt_login function in functions.php that checks entered values against stored values. 
		$found_admin = attempt_login($email, $password);

    if ($found_admin) {
      // Success
			// Mark user as logged in
			$_SESSION["admin_id"] = $found_admin["userid"];
			$_SESSION["username"] = $found_admin["username"];
      redirect_to('userdash.php');
      //$_SESSION["message"] = "You are logged in!";
    } else {
      // Failure
      $_SESSION["message"] = "Email / password not found";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!--Log in html form including javascript quotes that change on page refresh-->
  <title> Log in </title>
  <meta charset="utf-8"/>
  <link rel="icon" type="image/png" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <!--RANDOM QUOTE-->
<script>
//http://bytes.com/topic/javascript/answers/632707-rotate-random-div-layers-page-refresh
divs = ['d1','d2','d3'];

function hideDivs() {
for (var i=0; i<divs.length; i++)
document.getElementById(divs[i]).style.display = 'none';
}

function showDiv() {
hideDivs(); //hide them all before we show the next one.
var randomDiv = divs[Math.floor(Math.random()*divs.length)];
var div = document.getElementById(randomDiv).style.display =
'inline-block';
}

</script>

</head>
<!-- below needed for change quotes script-->
<body onload="showDiv();" id="login_page">

  <header class="banner">
    
      <?php include('../includes/navigation.php'); ?>

  </header>

   
<section id="login_register">
    
    <div class="form">
      <div id="container">
        <h2 class="nomargin">Login</h2>
          <form action="login.php" method="post">
            <?php echo "<em>". message() . "</em>" ;?>
            <?php echo "<em>". form_errors($errors) . "</em>" ;?>
              <p>Email
                <input type="text" name="email" value="<?php echo htmlentities($email); ?>" />
              </p>
              <p>Password
                <input type="password" name="password" value="" />
              </p>
                <input class="reglog_but" id="submit" type="submit" name="submit" value="Log in" />
          </form>
          <button class="facebook_button">Log in with Facebook</button>
          <p class="extra_form_info"> Apella will never post on your behalf or use your Facebook profile
          to access your personal information.</p>
   
          <h2> Not a member? </h2>

          <div class="reglog_but">
              <a href="new_admin.php">Sign up</a>
          </div>
      </div>
   
    </div>

  <div id="d1">
    <div class="image">
      <p class="author">Albert Einstein</p>
      <p class="quote">"It has become appallingly obvious that our technology has exceeded our humanity."</p>
      <p class="strapline">YOU ARE THE CONVERSATION</p>
    </div>
  </div>

  <div id="d2">
    <div class="image">
      <p class="author">Arthur C. Clarke </p>
      <p class="quote">"Any sufficiently advanced technology is indistinguishable from magic."</p>
      <p class="strapline">YOU ARE THE CONVERSATION</p>
    </div>
  </div>

  <div id="d3">
    <div class="image">
      <p class="author">Tim Berners-Lee</p>
      <p class="quote">"The Web as I envisaged it, we have not seen it yet. The future is still so much bigger than the past."</p>
      <p class="strapline">YOU ARE THE CONVERSATION</p>
    </div>
  </div>

</section>

<!--footer include-->
<?php include('../includes/footer.php'); ?>

<!--jquery for nav js-->
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<!--NAV JS-->
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

