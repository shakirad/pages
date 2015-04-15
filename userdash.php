<?php require_once("../includes/session.php");?>
<?php require_once("../includes/config.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_functions.php");?>
<!--If the user is not logged on they will be redirected to the log in page-->
<?php confirm_logged_in(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- This is the user dashboard that the user is redirected to once they log in. Most details are 
	static but the username is taken from the session data and displays differently depending on what
	username you are logged on under.-->

	<title>User dashboard</title>
	<meta charset="utf-8"/>
	<link rel="icon" type="image/png" href="images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/userdash.css">
  	<!--FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600,700' rel='stylesheet' type='text/css'>

</head>

<body>

	<header class="banner">
    
      <?php include('../includes/navigation.php'); ?>

  	</header>

  	<div class="menubar">
  		<div id="menu_container">
	  		
	  			<a id="logout" href="logout.php"> Logout </a>
	  		
  		</div>
  	</div>
<div id="centralise">

<div id="dash_container">
  	<article id="main">

	  	<section id="personal_details">
	  		<img src="images/commentavatar.jpg" alt=""/>

	  		<p id="username"><?php echo $_SESSION['username'] ?></p>
	  		<p id="expertise"> Specialises in: Web design, User experience</p>
	  		<p id="bio">Designer who loves web animation. Lecturer at the University
	  			of the West of England. Bristol Post columnist.</p> 

	  	</section>

	  	<section id="articles">
	  		<h2> Your articles </h2>
	  		<div id="article_container">
	  			<div class="article">
	  				<h3> The Apple cult </h3>
	  				<!--NOT WORKING!!-->
	  				<div class="tint">
						<img src="images/apple_store.jpg" alt=""/>
					</div>

					    <div class="stats">
			                <span class="date">07/11/2014</span>
			                <span class="rating">*****</span>
			               	<span class="subject">Opinion</span>
			            </div>

					<p>Apple are geniuses. Not because of their fantastic technical innovations, but because of
					their masterful ability to disguise flimsy aluminium rectangles as the... </p> 
	  			</div>

	  			<div class="article">
	  				<h3> Ubiquitous technology and us </h3>
	  				<div class="tint">
	  					<img src="images/satellite2.jpg" alt=""/> 
	  				</div>

	  				<div class="stats">
			                <span class="date">01/11/2014</span>
			                <span class="rating">*****</span>
			               	<span class="subject">In Detail</span>
			            </div>
	  				<p>It is rapidly becoming more and more difficult to seperate technology and humanity. With the 
	  					development of AI and virtual reality the point where we...<p> 
	  			</div>
	  		</div>
		</section>

		<section id="following">
			<h2> Following</h2>
			<div id="following_wrapper">
				<div class="following padding">
					<img src="images/youssef.jpg" alt=""/>
					<span class="follow_name">Youssef</span>
				</div>

				<div class="following padding">
					<img src="images/donna.jpg" alt=""/>
					<span class="follow_name">Donna Day</span>
				</div>

				<div class="following">
					<img src="images/julia.jpg" alt=""/>
					<span class="follow_name">Julia Cheung</span>
				</div>

				<div class="following padding">
					<img src="images/anarchy.jpg" alt=""/>
					<span class="follow_name">VoteForAnarchy</span>
				</div>


				<div class="following padding">
					<img src="images/thetourist.jpg" alt=""/>
					<span class="follow_name">The Tourist</span>
				</div>

				<div class="following">
					<img src="images/agda.jpg" alt=""/>
					<span class="follow_name">Agda Fridtjof</span>
				</div>

			</div>
		</section>

	</article>

	<article id="sidebar">
		<h2> Your recent comments </h2>
		<div id="recent_comment_wrap">
			<div class="recent_comment">
				<span class="date">29/10/2014</span>
				<p>I am relieved that I am not bringing up children in today's greedy, appalling society. I am still very concerned with the youth in today's milieux; the children and parents, and all of society must protect our young people from what I am only able to call a new type of predator....that's to you, google</p>
				<span class="thread"><a href="#">View thread</a></span>
			</div>

			<div class="recent_comment">
				<span class="date">29/10/2014</span>
				<p>And, of course, remembering that privacy isn't just an individual concern; pretty much everything you do will have some sort of knock-on effect on someone else, whether they asked for it or not (from the extreme example of someone like Ian Tomlinson who was in the wrong place at the wrong time to simple cases of people being tagged inaccurately on Facebook without their consent.)</p>
				<span class="thread"><a href="#">View thread</a></span>
			</div>

			<div class="recent_comment">
				<span class="date">03/10/2014</span>
				<p>"within the bounds of the current laws" is the problem I think. We may not now be enjoying a benevolent reigiem at the moment by a monumentally inept on which amounts to the same thing. But if that were to change?... And it could very quickly in this age of spin and knee jerk reaction. Then a culture of cyber-survailence would be catastrophicaly tailor made for repression</p>
				<span class="thread"><a href="#">View thread</a></span>
			</div>

			<div class="recent_comment">
				<span class="date">01/10/2014</span>
				<p>Don't know about the number of product recalls of Toyota (Apple had quite a number of recalls) but Apple and Toyota share the same way of dealing with product flaws - hide them and ignore complaints until the public pressure has grown large enough that acting is unavoidable.</p>
				<span class="thread"><a href="#">View thread</a></span>
			</div>
		</div>
	</article>

</div>
</div>

<?php include('../includes/footer.php'); ?>

<!--nav script and jquery-->
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script> 
        $(window).scroll(function(){

           var scroll = $(window).scrollTop();                
              
           if (scroll > 0 ) {
               $('.menubar' ).addClass('menuscrolled');
               $('nav' ).addClass('scrolled');
           }
          
            if (scroll <= 0 ) {
              $('.menubar').removeClass('menuscrolled');
               $('nav' ).removeClass('scrolled');
            }
          
        });
</script>

</body>

</html>