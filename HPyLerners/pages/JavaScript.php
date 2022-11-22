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
	error_reporting(0);
	$serial_no = 1;
	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

	?>
		<div>
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
			  <li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">JavaSCript</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="JavaScript.php">Basic</a>
				  <a class="dropdown-item" href="#">Advanced</a>
				  <a class="dropdown-item" href="#">Projects</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="IDE.php">Online IDE</a>
				  
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Framework
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">React JS</a>
				  <a class="dropdown-item" href="#">Node JS</a>
				  <a class="dropdown-item" href="#">Angular JS</a>
				  <a class="dropdown-item" href="#">Ajax</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Projects</a>
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
		
		<div class="plang_header container">
			<h1>Basic JavaScript LanguagE</h1>
			<b><p><u>Welcome to our Basic javascript tutorial</u></p></b>
		</div>
			
		<div class="plang_top2_body container-fluid">
		
		</div>
	</div>
		<!-- Video show portion -->

		<?php  
			$get_sl_sql = "SELECT Serial_no FROM videos WHERE videos.`PageName` = 'Basic_python'";
			$get_sl_query = mysqli_query($con,$get_sl_sql);


			if (isset($_POST['go_video'])) {
				$serial_no = $_POST['vid_sl_num'];
				$_SESSION['sl_no'] = $serial_no;

			}

			if (isset($_POST['previous'])) {
				$serial_no = $_POST['vid_sl_num'];

				if (intval($serial_no)>1) {
					$serial_no = intval($serial_no)-1;
					$_SESSION['sl_no'] = $serial_no;
				}
				else{
					?>
						<script type="text/javascript">
							alert("No more video left");
						</script>
					<?php
				}

			}
			if (isset($_POST['next'])) {
				$get_last_sl_sql = "SELECT Serial_no FROM videos WHERE videos.`PageName` = 'Basic_python' ORDER BY Serial_no DESC";
				$get_last_sl_query = mysqli_query($con,$get_last_sl_sql);
				$last_serial = mysqli_fetch_array($get_last_sl_query);

				$serial_no = $_POST['vid_sl_num'];
				if (intval($serial_no)<intval($last_serial[0])) {
					$serial_no = intval($serial_no)+1;
					$_SESSION['sl_no'] = $serial_no;
				}
				
				else{
					?>
						<script type="text/javascript">
							alert("No more video left");
						</script>
					<?php
				}


			}


			if (isset($_POST['Com_submit'])) {

				// echo "Serial no pai na = ".$_SESSION['sl_no'];
				$serial_no = $_SESSION['sl_no'];

				$cur_date = date('d-m-y');
				$Commenter = "".$res[0]." ".$res[1];
				$CommenterEmail = $res[2];
				$py_comment = $_POST['user_comment'];
				$replay_to_mail = $_POST['custId_mail'];

				$CinsertQuery = "INSERT INTO `video_comments` (`Date`, `Email`, `Comment`, `Serial_no`, `Page_Name`, `id`) VALUES ('$cur_date', '$CommenterEmail', '$py_comment', '$serial_no', 'Basic_python', NULL)";
				$Cquery = mysqli_query($con, $CinsertQuery);

				//################ send notification start #######################
				$flag_mail = 0;
				$ckeck_allow_notify_sql = "SELECT `Notification` FROM `user_account` WHERE `Email` LIKE '$replay_to_mail'";
				$ckeck_allow_notify_query = mysqli_query($con, $ckeck_allow_notify_sql);
				$ckeck_allow_notify_res = mysqli_fetch_array($ckeck_allow_notify_query);

					

				if ($py_comment[0]=="@" and $replay_to_mail!=NULL and $ckeck_allow_notify_res[0]=='Yes') {
					$mentioned_name = explode(",", $py_comment);
					$mentioned_name = str_replace('@', '', $mentioned_name);

					$to_email = $replay_to_mail;
					$subject = "Notification_Faq_Python_{$top_serial}_{$id_896}";
					$body = "Hi {$mentioned_name[0]}, {$res[0]} {$res[1]} mentioned you in a comment on Faq = {$id_896}, Topic = Python";
					$headers = "From: Hpylearners.org new notification";
				}
				$flag_mail = 0;
				if (mail($to_email, $subject, $body, $headers)) {
					$flag_mail = 1;
				}
			
			//################ send notification end #########################
				
				if ($Cquery){ 
					?>
					<script type="text/javascript">
						alert("Comment added");
					</script>
					<?php
					echo '<META HTTP-EQUIV="Refresh" content="0">';
				}else{
					?>
					<script type="text/javascript">
						alert("Something went wrong");
					</script>
					<?php
				}
				
			}
			

			if ($serial_no==NULL or $_SESSION['sl_no']!='') {
				$serial_no = $_SESSION['sl_no'];
			}
			

			$video_selectSql = "SELECT Serial_no, Video_Name, Link, Code_link, Description FROM videos WHERE videos.`PageName` = 'Basic_python' AND videos.`Serial_no`='$serial_no'";
			$query1 = mysqli_query($con,$video_selectSql);
			$current_videdo_row = mysqli_fetch_array($query1);

		?>
		
		<div class="plang_body1 container">
			<!-- main video -->
			<div class="vid_show_vid row">
				<?php 
					$new_vid_embed_link = getYoutubeEmbedUrl($current_videdo_row[2]);
				 ?>
				<iframe src="https://www.youtube.com/embed/uGRZ2CzkFUo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class=" row">
				<div class="vid_show col-md-6">
					<h3>JavaScript Tutorials in Hindi Part 1: Introduction to JavaScript</h3>
				</div>
				
				<div class="vid_title col-md-6">
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form_no_mar container-fluid row">
					<input type="submit" class="btn btn-primary" name="previous" value="previous">

					<p class="vid_titlep1">video: <?php echo $current_videdo_row[0]; ?></p>

					<select id="inputState" class="form-control" name="vid_sl_num">
						<option selected><?php echo $serial_no; ?></option>
						<?php 
							$vid_list = array();
							while ( $vid_list_u = mysqli_fetch_array($get_sl_query)) {
								array_push($vid_list, $vid_list_u[0]);
							}
							sort($vid_list);

							foreach ($vid_list as $video_serial) {
								
								?>
								<option><?php echo $video_serial; ?></option>
								<?php
							}

						 ?>
					</select>
					<input type="submit" class="but_mar_right btn btn-primary" name="go_video" value="Play">
					<input type="submit" class="btn btn-primary" name="next" value="next">
					</form>
				</div>
				
			</div>
			<div class="row">
				<div class="vide_desc form-group col-12">
						<?php  
							$vid_desc_temp = $current_videdo_row[4];
							$vid_desc_temp = substr_replace($vid_desc_temp, '@@', 140, 1);

							$vid_splited_desc = explode('@@',$vid_desc_temp);
						?>
				     	<p><?php echo $vid_splited_desc[0]; ?><span id="dots">...</span><span id="more"> <?php echo $vid_splited_desc[1]; ?> <br> <br> For source code go to Github <a href="<?php echo $current_videdo_row[3]; ?>" target="_blank">github</a> </span></p>
					<button  onclick="readMore()" id="readMoreBtn">Read more</button>
				</div>
				
			</div>

			<div class="try_now row">
				<p><a href="IDE.php" target="_blank">Try yourself now</a></p>
			</div>
			<div class="mqc_offer">
				<p>Try simple mcq and test yourself <a href="Mcq.php?mcq_id=<?php echo "Basic_python@@".$serial_no; ?>">Test</a></p>
			</div>
			
		</div>

		


	<!-- Comment part -->
	<div class="pylang_comment_box container">
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"> 
			<h4>Post your comment</h4>
			<textarea class="form-control" id="user_comment" name="user_comment" placeholder="write a comment..." rows="3"></textarea>
			<input type="submit" class="btn btn-info pull-right" name="Com_submit" value="Post"></input>
			<input type="hidden" name="custId_mail" id="custId_mail">
		</form>
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
		<p>&copy;  All rights reserved by codelearns</p>
	</div>
	</footer>
	<script type="text/javascript" src="../js/jquery-3.5.1.min.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/myJs.js?v=<?php echo time(); ?>"></script>
</body>
</html>



<?php  
	
	// Get youtube link:
	function getYoutubeEmbedUrl($url)
	{
	     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

	    if (preg_match($longUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }

	    if (preg_match($shortUrlRegex, $url, $matches)) {
	        $youtube_id = $matches[count($matches) - 1];
	    }
	    return 'https://www.youtube.com/embed/' . $youtube_id ;
	}


	// viewers query
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