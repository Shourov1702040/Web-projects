<?php 
	session_start();
	if($_SESSION['user_phone']==NULL){
		header("Location: frist.php");
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="UTF-8" content="width=content-width">
	<title>Code Learners</title>
	<link rel = "icon" href = "../images/1200px-Python-logo-notext.svg.png" type = "image/x-icon">
	<link rel="stylesheet" href="../css/bootstrap.min.css?v=<?php echo time(); ?>"/>
	<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>" />
</head>
<body>

	<?php 

	$serial_no = 1;
	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

	?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" 
		id="#top">
		<img src="../images/1200px-Python-logo-notext.svg.png" class="logo_class" alt="" />
		  <abbr title="HSTU Python Learners"><a class="navbar-brand font1 title_pad" href="home.php">Code Learners</a></abbr>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link font2" href="home.php">&#x1F3E0;Home<span class="sr-only"></span></a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Python</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="python.php">Basic</a>
				  <a class="dropdown-item" href="ad_python.php">Advanced</a>
				  <a class="dropdown-item" href="py_project.php">Projects</a>
				  
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">M-L</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">Data Science</a>
				  <a class="dropdown-item" href="#">Machine learning</a>
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
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Projects</a>
				</div>
			  </li>
			  <li class="nav-item dropdown active">
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
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
				  <div class="dropdown-divider"></div>
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
    <!-- main body -->

	<div class="Faq_mainBody">
		<h2>Add your question</h2>
		<nav> 
			<div class="Faq_nav"> 
				<ul>
				<li><a href="Faq_python.php" >Laungage</a></li>
				<li><a href="Faq_gui.php">Frame Work</a></li>
				<li><a href="Faq_ml.php">Machine Learning</a></li>
				<li><a href="#" id="faq_menu_active">Add Question</a></li>
				</ul>
			</div>
		</nav>
	</div>


	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype='multipart/form-data'> 
	<div class="Faq_add_user container">
		<img src="<?php echo $image_src ?>">
		<h3><?php echo $res[0]." ".$res[1]; ?></h3>

		<div class="faq_post">
			
				<div class="row">
					<h4 class="color_white">Write on your problem detail </h4>
					<div class="col-md-9">
						<textarea class="form-control" name="user_faq" placeholder="write your problem..." rows="5"></textarea>
					</div>
					<div class="col-md-3">
						<select id="inputState" class="form-control" name="Topic">
							<option selected>Python</option>
							<option >Machine learning</option>
							<option >Frame works</option>
							<option >Game Development</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="check_show_pass form-group">
						<label for="exampleFormControlFile1">Attach an image related to your problem (optional)</label>
						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
					</div>
				</div>

				<input type="submit" class="faq_submit btn btn-info pull-right" name="Post_faq" value="Post">
			
		</div>

	</div>
	</form>




		
	<!-- Footer div -->
	<footer>
	<div class="footer_top container-fluid"> 
		<div class="container"> 
			<div class="row"> 
				<div class="footer_col1 col-2"> 
					<h3>Topics</h3>
					<ul>
						
						<li><a href="#">Python learning</a></li>
						<li><a href="#">Djando</a></li>
						<li><a href="#">Tkinter</a></li>
						<li><a href="#">Mechine learning</a></li>
						<li><a href="#">Artificial Inteligence</a></li>
						<li><a href="#">MySql & Python</a></li>
						<li><a href="#">Python projects</a></li>
						<li><a href="#">ML projects</a></li>
						<li><a href="#">AI projects</a></li>
						
					</ul>
				</div>
				<div class="footer_col2 col-4"> 
					<h3>Get in Touch</h3>
					<p><span>&#9742;</span>&emsp;++8801784950443</p>
					<p><span>&#x2709;</span>&emsp;codelearners_17@gmail.com</p> 
					<ul id="soc_media"> 
						<li><a href="#"><img src="../images/facebook.png" alt="" /></a></li>
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
</body>
</html>



<?php  

	if (isset($_POST['Post_faq'])) {
		$Faq_question = $_POST['user_faq'];
		$Faq_question = htmlspecialchars($Faq_question);
		// echo $Faq_question;
		$cur_date = date('d-m-y');
		$topic = $_POST['Topic'];

		$selectAll_faq_sql = "SELECT * FROM faq WHERE Topic='$topic'";
		$selectAll_faq_query = mysqli_query($con, $selectAll_faq_sql);
		$num_of_faq = intval(mysqli_num_rows($selectAll_faq_query))+1;


		$u_image = $_FILES['file']['name'];
	    $target_dir = "../Faq/";
	    $target_file = $target_dir.basename($_FILES["file"]["name"]);
	    // Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		  // Valid file extensions
		$extensions_arr = array("jpg","jpeg","png","gif");
		if( in_array($imageFileType,$extensions_arr) ){
		    // Upload file
		    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$u_image);
		  }
		 else{
		 	$u_image = NULL;
		 }

	  	$faqQuery = "INSERT INTO `faq` (`Email`, `Faq_serial`, `Date`, `Topic`, `faq_Question`, `Image`) VALUES ('$res[2]', '$num_of_faq', '$cur_date', '$topic', '$Faq_question', '$u_image')";

	    $insert_faq_query = mysqli_query($con,$faqQuery);

		if($insert_faq_query){
			?>
			<script type="text/javascript">
				alert("Successfully added your question");
			</script>
			<?php
			}

		    else{
			?>
			<script type="text/javascript">
				alert("Something went worng");
			</script>
			<?php
		}

	}
	

	if (isset($_POST['Query_submit2'])) {
		$u_name = $_POST['index_query_name2'];
		$user_email = $_POST['index_query_email2'];
		$user_phone = $_POST['index_query_phone2'];
		$user_qurey = $_POST['index_query_query2'];
		$Membership = '';

		
		$check_member_sql = "SELECT Email FROM user_account WHERE Email = '$user_email'";
		$check_member_query = mysqli_query($con,$check_member_sql);
		$check_member = mysqli_fetch_array($check_member_query);

		if ($check_member) {
			$Membership = 'Yes';
		}
		else{
			$Membership = 'No';
		}

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