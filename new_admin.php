<?php require_once("../includes/session.php");?>
<?php require_once("../includes/config.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>

<?php
ob_start();
//This page is the registration page for creating a new admin. It was created by following a 
//Lynda.com tutorial that can be found at: http://www.lynda.com/MySQL-tutorials/Creating-login-system/119003/137056-4.html
if (isset($_POST['submit'])) {
  
  if (empty($errors)) {
    //function that posts values to the database. 
    $name = mysql_prep($_POST["name"]);
    $email = mysql_prep($_POST["email"]);
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);
    //Mysql instering values into database. 
    $query  = "INSERT INTO user (";
    $query .= " name, email, username, hashed_password";
    $query .= ") VALUES (";
    $query .= "  '{$name}', '{$email}', '{$username}', '{$hashed_password}'";
    $query .= ")";
    $result = mysqli_query($conn, $query);
    //If the result is successful redirect the user to the log in page. If not then show error message
    if ($result) {
      // Success
      redirect_to("login.php");
    } else {
      // Failure
      $_SESSION["message"] = "Something's gone wrong here, we couldn't register your account.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))?>
<!DOCTYPE html>
<html>
<head>
  <!--html registration form including quotes that change on page refresh using javascript-->
  <title> Register </title>
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

<head>
<!-- Below is needed for JS script to work-->
<body onload="showDiv();" id="register">

  <header class="banner">
      <!--Nav bar include-->
      <?php include('../includes/navigation.php'); ?>

  </header>

<section id="login_register">
    <div class="form">

      <div id="container">
        
        <h2>Register with Apella</h2>

        <?php echo "<em>" . form_errors($errors) . "</em>"; ?>
        <form action="new_admin.php" method="post">
           <p>Name
            <input type="text" name="name" value="" required />
          </p>
          <p>Email
            <input type="email" name="email" value="" required/>
          </p>
          <p>Display name
            <input type="text" name="username" value="" required/>
          </p>
          <p>Password
            <input type="password" name="password" value="" required/>
          </p>
          <input class="reglog_but" id="submit" type="submit" name="submit" value="Register" />
        </form>
        <br />
      </div>
  </div>

<!--  HIDDEN QUOTES-->
  <div id="d1">
    <div class="image">
      <p class="author">Mitchell Kapor</p>
      <p class="quote">"Getting information off the Internet is like taking a drink from a fire hydrant."</p>
      <p class="strapline">YOU ARE THE CONVERSATION</p>
      <!--<img id="logimage_right" src="images/satellite.jpg" alt=""/>-->
      <!--Esther Vargas Flickr https://www.flickr.com/photos/esthervargasc/9657863733/in/photolist-fHr5pX-rJE78p-p8T61y-Fmu8N-6prZBn-dKM4XF-h7ZepJ-q2RzMU-oS7icM-5seCHN-aGSRsr-qJc4je-pSRMiv-qTVnwd-8pJWJV-pwsJsG-BLL8N-msi14x-jDx5Dz-2U2bT-aGSRaM-D3NJb-qBeo56-fQrcw3-9mg3Zz-dMrBxA-dgagZ1-abAkkK-ns8wn8-pEgJf8-aoCJ5H-9gZcFw-oEG1vb-9sVnJf-p2DC8R-abWqzo-nq91UE-dBbSM5-abAknP-bJSXb4-8S4Xsi-penr48-fyzUL4-fyzUEB-fyzUCD-r2tiqT-dKjeRA-8XCXAF-7XHVjx-abAkiv-->
    </div>
  </div>

  <div id="d2">
    <div class="image">
      <p class="author">Daniel J. Boorstin</p>
      <p class="quote">"Technology is so much fun but we can drown in our technology. The fog of information can drive out knowledge."</p>
      <p class="strapline">YOU ARE THE CONVERSATION</p>
      <!--<img id="logimage_right" src="images/satellite.jpg" alt=""/>-->
      <!--Esther Vargas Flickr https://www.flickr.com/photos/esthervargasc/9657863733/in/photolist-fHr5pX-rJE78p-p8T61y-Fmu8N-6prZBn-dKM4XF-h7ZepJ-q2RzMU-oS7icM-5seCHN-aGSRsr-qJc4je-pSRMiv-qTVnwd-8pJWJV-pwsJsG-BLL8N-msi14x-jDx5Dz-2U2bT-aGSRaM-D3NJb-qBeo56-fQrcw3-9mg3Zz-dMrBxA-dgagZ1-abAkkK-ns8wn8-pEgJf8-aoCJ5H-9gZcFw-oEG1vb-9sVnJf-p2DC8R-abWqzo-nq91UE-dBbSM5-abAknP-bJSXb4-8S4Xsi-penr48-fyzUL4-fyzUEB-fyzUCD-r2tiqT-dKjeRA-8XCXAF-7XHVjx-abAkiv-->
    </div>
  </div>

  <div id="d3">
    <div class="image">
      <p class="author">Ralph Nader</p>
      <p class="quote">"People are stunned to hear that one company has data files on 185 million Americans."</p>
      <p class="strapline">YOU ARE THE CONVERSATION</p>
      <!--<img id="logimage_right" src="images/satellite.jpg" alt=""/>-->
      <!--Esther Vargas Flickr https://www.flickr.com/photos/esthervargasc/9657863733/in/photolist-fHr5pX-rJE78p-p8T61y-Fmu8N-6prZBn-dKM4XF-h7ZepJ-q2RzMU-oS7icM-5seCHN-aGSRsr-qJc4je-pSRMiv-qTVnwd-8pJWJV-pwsJsG-BLL8N-msi14x-jDx5Dz-2U2bT-aGSRaM-D3NJb-qBeo56-fQrcw3-9mg3Zz-dMrBxA-dgagZ1-abAkkK-ns8wn8-pEgJf8-aoCJ5H-9gZcFw-oEG1vb-9sVnJf-p2DC8R-abWqzo-nq91UE-dBbSM5-abAknP-bJSXb4-8S4Xsi-penr48-fyzUL4-fyzUEB-fyzUCD-r2tiqT-dKjeRA-8XCXAF-7XHVjx-abAkiv-->
    </div>
  </div>

</section>

    <!--<a href="logout.php"> Logout </a>-->
<?php include('../includes/footer.php'); ?>


<!--NAV-->
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

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


