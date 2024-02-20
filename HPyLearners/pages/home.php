<?php 
	session_start();
	if($_SESSION['user_phone']==NULL){
		header("Location: frist.php");
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Code Learners</title>
	<link rel="stylesheet" href="../css/font-awesome.min.css?v=<?php echo time(); ?>"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css?v=<?php echo time(); ?>"/>
	<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>" />
	<link rel = "icon" href = "../images/1200px-Python-logo-notext.svg.png" type = "image/x-icon">
</head>
<body>
	<?php 
	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);
	?>
	<div id="header">	
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" 
		id="#top">
		<img src="../images/1200px-Python-logo-notext.svg.png" class="logo_class" alt="" />
		  <abbr title="HSTU Python Learners"><a class="navbar-brand font1 title_pad" href="#top">Code Learners</a></abbr>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="#navbarSupportedContentToggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link font2" href="#">&#x1F3E0;Home<span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="python.php">Python</a>
				  <a class="dropdown-item" href="Java.php">Java</a>
				  <a class="dropdown-item" href="JavaScript.php">JavaScript</a>
				  <a class="dropdown-item" href="#">PHP</a>
				  
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Applied</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">Data Science</a>
				  <a class="dropdown-item" href="#">Mechine learning</a>
				  <a class="dropdown-item" href="#">OpenCV</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="ml_project.php">Projects</a>
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Framework
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">Tkinter</a>
				  <a class="dropdown-item" href="#">PyQT5</a>
				  <a class="dropdown-item" href="#">Django</a>
				  <a class="dropdown-item" href="#">Flask</a>
				  <a class="dropdown-item" href="#">Java swing</a>
				  <a class="dropdown-item" href="#">Java FX</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="Framework_project.php">Projects</a>
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Help</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="Faq_python.php">FAQ</a>
				  <a class="dropdown-item" href="about.php">About</a>
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Profile
				</a>
				<div class="index_profile dropdown-menu" aria-labelledby="navbarDropdown">
				  <?php 
						$image = $res['Image'];
						$image_src = "upload/".$image;
					?>
				  <a href="profile.php" class="dropdown-item"><img src="<?php echo $image_src ?>" class="bd_img_round" alt="" /><?php echo $res[0]." ".$res[1]; ?></a>

				  <?php  
				  	if ($res[11]=='Admin') {
				  		echo '<div class="index_profile dropdown-divider"></div>';
						echo '<a class="dropdown-item" href="admin_c.php"><img src="../images/control.png" class="bd_img_round" alt="" />Control Pane</a>';
					}
				  ?>
				  <div class="index_profile dropdown-divider"></div>
				  <a href="logout.php" class="dropdown-item"><img src="../images/logout.jpg" class="bd_img_round" alt="" />Logout</a>
				  
				</div>
			  </li>
			</ul>
			<form class="form-inline my-2 my-lg-0 search_pad">
			  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		  </div>
		</nav>
	
		<div class="container animated-text">
			<div class="neons col-12">
				<h1><em>-Easy Learning-</em></h1>
			</div>
		</div>
		<div class="container-fluid row">
			<div class="our_col col-6">
				<p> Welcome To Our Site</p>
				<h2>Learn Coding</h2>
				<h3>& Change the world</h3>
				<h4>
			Build a beautiful, modern website with 
			flexible componentsand modular pages 
			built from scratch.
				</h4>
			</div>
			<div class="our_col col-6">
				<img src="../images/home_b.png" class="box1" alt="" />
			</div>
		</div>
		<div class="example1 container-fluid sticky-bottom">
		<h3>.....Learn programming laungage and accelerate your career..... </h3>
		</div>
	</div>
	
	
	<!-- Slider -->
	<div class="container slider1">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="../images/Ai1.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="../images/ml.png" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="../images/dj.jpg" class="d-block w-100" alt="...">
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
	</div>
	</div>

	
	<!-- Second div -->
	<div class="container">
		<div class="second_div row">
			<div class="our_class col">
				<h2>Why to learn Python?</h2>
				<p>Python is an interpreted, high-level and general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python's design philosophy emphasizes code readability with its notable use of significant whitespace.
				Python is one of the most widely used programming languages, and it has been around for more than 28 years now. One common question arises in mind of most people, especially beginners and newbies, that why Python is popular in mainstream despite being slow? or why programmers or developers don’t care about speed and performance limitations in Python? But after all the python is better todey</p>
				</div>
			<div class="our_class col-3">
				<h2>Why to learn PHP?</h2>
				<p>The ease of use and popularity of PHP makes it an obvious choice for programmers who want to find jobs in cybersecurity, development, and IT. Also, it's a programming language that's used by entry-level and advanced developers, so there's no right or wrong time to learn PHP.</p>
			</div>
			<div class="our_class col-3">
				<h2>Why to learn javascript?</h2>
				<p>The most obvious reason for learning JavaScript is if you have hopes of becoming a web developer. Even if you haven't got your heart set on a tech career, being proficient in this language will enable you to build websites from scratch—a pretty useful skill to have in today's job market! </p>
			</div>
		</div>
	</div>
	
	

<!-- main body starts here-->	
<div class="container">
	<div class="row"> 
	<div class="left-col col-9"> <!-- Left col -->
	
	<!-- Third div 1st part -->
	<div class="container">
		<div class="third_div row">
			<div class="our_class1 col-6">
				
				<h2><b>Looking for stable platform?</b></h2>
				<p>Such as,Python is an interpreted, high-level and general-purpose programming language.Why programmers or developers don’t care about speed and performance limitations in Python? Because it makes data Science, mechine learning very easy. Don't waste time, go to our youtube channel and subscribe us. <br /> <b><a target="_blank" href="https://www.youtube.com/watch?v=gfDE2a7MKjA&t=21s">"Click Here"</a></b></p>
			</div>
			<div class="our_class1 col-6">
				<img src="../images/how_to_learn.jpg" width="480" height="430" alt="" />
			</div>
		</div>
	</div>
	
	<!-- Third div 2nd part -->
	<div class="container">
		<div class="third_div row">
			<div class="our_class2 col-6">
				<img src="../images/python-2.png" width="480" height="430" alt="" />
			</div>
			
			<div class="our_class2 col-6">
				<h2><b>Be a Developer from beginner</b></h2>
				<p>We will start from begining of any course. Frist we learn in basic to advance. After finishing we have to learn about Data Science, then Mechine learning and some project on it. Then we will be able to get ready for Artificial Inteligence. Stay with us, to get update things subscribe our youtube channel. <br /><b><a target="_blank" href="https://www.youtube.com/watch?v=gfDE2a7MKjA&t=21s">"Click Here"</a></b></p>
				
				
			</div>
		</div>
	</div>
	
		<div class="div4 container">
			<h2>Importance of these laungage</h2>
			<p>Here,you can learn Phython,PHP,java,javascript.These are use in general purpose and high level programming language. You can use Python for developing desktop GUI applications, websites and web applications. Also, Python, as a high level programming language, allows you to focus on core functionality of the application by taking care of common programming tasks.</p>
			<ul>
				<li><a href="#">Programming language</a></li>
				<li><a href="#">Software Design & Development</a></li>
				<li><a href="#">Web Development</a></li>
				<li><a href="#">Game Development</a></li>
				<li><a href="#">Mechine Learning</a></li>
				<li><a href="#">Atrificial Inteligency</a></li>
			</ul>
		</div>
		
		<div class="div5 container">
			<div class="row">
			<div class="col-8"> 
				<h2>Be a developer in 8 months!!!</h2>
				<p> 
				Sure, 8 months is more than enough. It will cover a lot of stuff and will be hard to follow, but if you really like it, you will take more time little by little. You need to be careful to not burn out, because being full time a self learner it gets really hard. I hope this is useful!	
				</p>
			</div>
			
			
			<div class="col-4"> 
				<img src="../images/astonished.png" alt="" />
			</div>
			</div>
			<div class="row">
				<h2>Standard Schedule for 8 months your time budget</h2>
			<table>
				<tr>
					 <th>Cource Name</th>
					 <th>Time Period</th>
					 <th>Experience</th>
					 <th></th>
				</tr>
				
				<tr>
					<td>Pyhton Language</td>
					<td>3 months</td>
					<td>100 problem solved</td>
					<td> 
						<a  href="python.php"><button type="button" class="start_now btn btn-primary">Start now</button></a>
					</td>
				</tr>
				
				<tr>
					<td>Java Language</td>
					<td>2 months</td>
					<td><5 projects</td>
					<td> 
						<a  href="java.php"><button type="button" class="start_now btn btn-primary">Start now</button></a>
					</td>
				</tr>
				
				<tr>
					<td>Java Script</td>
					<td>2 months</td>
					<td>5 projects</td>
					<td> 
						<a  href="javaScript.php"><button type="button" class="start_now btn btn-primary">Start now</button></a>
					</td>
				</tr>
				
				<tr>
				<td>Mechine Learning</td>
					<td>3 months</td>
					<td><10 projects</td>
					<td> 
						<a  href="ml_project.php"><button type="button" class="start_now btn btn-primary">Start now</button></a>
					</td>
				</tr>
				<tr>
					<td>Data Science</td>
					<td>3 months</td>
					<td><10 projects</td>
					<td> 
						<a  href="#"><button type="button" class="start_now btn btn-primary">Start now</button></a>
					</td>
				</tr>
				
			</table>
			</div>
		</div>
		
	</div> 
	
		<div class="right-col col-3"> <!-- right col  -->
			<img class="guranty_img" src="../images/Python-Programming-Edureka.png" alt="" />
			<div class="index_query">
				<h3>SEND US QUERY</h3>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="form-group col-md-12">
					  <input type="text" class="form-control" id="index_query_name" name="index_query_name1" placeholder="Name">
					</div>
					
					<div class="form-group col-md-12">
					  <input type="email" class="form-control" id="index_query_email" name="index_query_email1" placeholder="Email">
					</div>
					
					<div class="form-group col-md-12">
					  <input type="text" class="form-control" id="index_query_phone" name="index_query_phone1" placeholder="Contact no.">
					</div>
					
					<div class="form-group col-md-12">
					<textarea type="text" class="form-control " id="index_query_query" name="index_query_query1" rows="3" placeholder="Your Query"></textarea>
				  </div>
					
					
				  <div class="form-group">
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" id="gridCheck1">
					  <label class="form-check-label" for="gridCheck1">
						I agree to be contacted via e-mail
					  </label>
					</div>
				  </div>
				  <input type="submit" class="index_query_btn btn btn-primary" name="Query_submit1" value="Send"></input> 
				</form>
			</div>
			
			<div class="index_ad1">
				<img src="../images/tkinter.png" alt="" />
				<h3>Python-Tkinter</h3>
				<p>Amazing graphical user interface. Easy to design & works properly. Lorem ipsum dolor sit amet, consectetuer adipiscing elitdewwe. </p>
			</div>
			
			<div class="index_ad2">
				<img src="../images/django_site.png" alt="" />
				<h3>Web development with Python</h3>
				<p>Django is on way! It is very nice feature of python. Make your website with python programming. Lorem ipsum dolor sit amet, consectetuer adipiscing elitunasdh </p>
			</div>
			
			<div class="index_ad3">
			<img src="../images/dataScience1.jpg" alt="" />
				<h3>Data Science</h3>
				<p>This is advertise</p>
			</div>
			
			<div class="index_ad4">
			<img src="../images/face_recog.jpg" alt="" />
				<h3>Face Recognition</h3>
				<p>Awesome project, as you can use it for class attedendence. Something like digital classroom. </p>
			</div>
			
		</div>
	
	</div>
</div>
	<!-- Footer div -->
	<footer>
	<div class="footer_top container-fluid"> 
		<div class="container"> 
			<div class="row"> 
				<div class="footer_col1 col-2"> 
					<h3>Topics</h3>
					<ul>
						
						<li><a href="#">Python learning</a></li>
						<li><a href="#">JavaScript</a></li>
						<li><a href="#">Djando</a></li>
						<li><a href="#">Tkinter</a></li>
						<li><a href="#">Mechine learning</a></li>
						<li><a href="#">Artificial Inteligence</a></li>
						<li><a href="#">PHP</a></li>
						<li><a href="#">Python projects</a></li>
						<li><a href="#">Java</a></li>
						<li><a href="#">AI projects</a></li>
					
					</ul>
				</div>
				<div class="footer_col2 col-4"> 
					<h3>Get in Touch</h3>
					<p><span>&#9742;</span>&emsp;++8801784950443</p>
					<p><span>&#x2709;</span>&emsp;codelearners_17@gmail.com</p> </br></br>
					<ul id="soc_media"> 
						<li><a href="https://www.facebook.com/"><img src="../images/facebook.png" alt="" /></a></li>
						<li><a href="#"><img src="../images/instagram.png" alt="" /></a></li>
						<li><a href="#"><img src="../images/whatsapp.png" alt="" /></a></li>
						<li><a href="#"><img src="../images/youtube.png" alt="" /></a></li>
					</ul>
					
				</div>
				<div class="col-6"> 
					<div class="footer_col3">
						<h3>SEND US QUERY</h3>
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
							<div class="form-group col-md-12">
							  <input type="text" class="form-control" id="index_query_name" name="index_query_name2" placeholder="Name">
							</div>
							
							<div class="form-group col-md-12">
							  <input type="email" class="form-control" id="index_query_email" name="index_query_email2" placeholder="Email">
							</div>
							
							<div class="form-group col-md-12">
							  <input type="text" class="form-control" id="index_query_phone" name="index_query_phone2" placeholder="Contact no.">
							</div>
							
							<div class="form-group col-md-12">
							<textarea type="text" class="form-control " id="index_query_query" name="index_query_query2" rows="3" placeholder="Your Query"></textarea>
						  </div>
							
							
						  <div class="form-group">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" id="gridCheck">
							  <label class="form-check-label" for="gridCheck">
								I agree to be contacted via e-mail
							  </label>
							</div>
						  </div>
						  <input type="submit" class="footer_query_btn btn btn-primary" name="Query_submit2" onclick=""></input> 

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer container-fluid">
		<p>&copy; All rights reserved by codelearns</p>
	</div>
	</footer>
	<script type="text/javascript" src="../js/jquery-3.5.1.min.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/myJs.js?v=<?php echo time(); ?>"></script>
</body>
</html>

<?php  
	
	if (isset($_POST['Query_submit2'])) {
		$u_name = $_POST['index_query_name2'];
		$user_email = $res['Email'];
		$user_phone = $_POST['index_query_phone2'];
		$user_qurey = $_POST['index_query_query2'];
		$Membership = 'Yes';

		$insertQuery = "INSERT INTO visitor_query (`Name`, `Email`, `Phone`, `Comment`, `Membership`, `id`) VALUES ('$u_name', '$user_email', '$user_phone', '$user_qurey', '$Membership',NULL)";
		$query1 = mysqli_query($con, $insertQuery);
		if ($query1){ 
			?>
			<script type="text/javascript">
				alert("Data inserted properly");
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Something went wrong");
			</script>
			<?php
		}
	}
?>