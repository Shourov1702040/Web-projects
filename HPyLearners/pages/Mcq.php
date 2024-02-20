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
	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

	$mcq_mix_id = '';
	$ans_submit_btn = '';
	$correct_ans = array();
	$mark = 0;
	$timer_is = 1;

	?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" 
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
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Python</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="python.php">Basic</a>
				  <a class="dropdown-item" href="ad_python.php">Advanced</a>
				  <a class="dropdown-item" href="py_project.php">Projects</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="IDE.php">Online IDE</a>
				  
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle font2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">M-L</a>
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

		<?php 
		// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		// Evaluate mcq result 
		if (isset($_POST['mcq_submit'])) {
			$ans_submit_btn = 'disabled';
			$mcq_mix_id = $_SESSION['mcq_mixed'];
			$timer_is = 0;
			?>
			<script>countDown(1,"mc_timer");</script>
			<?php
			$Page_vid_no = explode("@@", $mcq_mix_id);
			$mcq_find_sql1 = "SELECT * FROM `mcq` WHERE `Page_Name` = '$Page_vid_no[0]' AND `Serial_no` = '$Page_vid_no[1]'";
			$mcq_query1 = mysqli_query($con,$mcq_find_sql1);

			$given_answer = array();
			while ($mqc_q_no = mysqli_fetch_array($mcq_query1)) {
				$question_identifier = "Answer_".$mqc_q_no['Q_no'];
				$temp_ans = $_POST[$question_identifier];
				array_push($given_answer, $temp_ans);
				array_push($correct_ans, $mqc_q_no['Answer']);
			}
			// print_r($given_answer);
			// print_r($correct_ans);

			for ($i=0; $i < count($given_answer); $i++) { 
				if ($given_answer[$i] == $correct_ans[$i]) {
					$mark = $mark +1;
				}
			}

			$check_frist_test_sql = "SELECT Email FROM mcq_resutls WHERE Email='$res[2]' AND Serial_no= '$Page_vid_no[1]' AND Page_Name='$Page_vid_no[0]'";
			$check_frist_test_query = mysqli_query($con,$check_frist_test_sql);
			$check_frist_test_res = mysqli_fetch_array($check_frist_test_query);

			if ($check_frist_test_res) {
				// echo "This is not frist";
			}
			else{
				// echo "This is frist <br>";
				// echo $res[2]."<br>";
				// echo $mark."<br>";
				// echo "Serial = ".$Page_vid_no[1]."<br>";
				// echo "Page_name = ".$Page_vid_no[0]."<br>";
				$cur_date = date('d-m-y');

				$check_frist_test_sql = "SELECT Email FROM mcq_resutls WHERE Email='$res[2]'";
				$check_frist_test_query = mysqli_query($con,$check_frist_test_sql);
				$T_no = intval(mysqli_num_rows($check_frist_test_query))+1;

				$insert_result_sql = "INSERT INTO `mcq_resutls` (T_no, `Email`, `Mark`, `Serial_no`, `Page_Name`, `Date`) VALUES ('$T_no','$res[2]', '$mark', '$Page_vid_no[1]', '$Page_vid_no[0]','$cur_date')";
				$insert_result_query = mysqli_query($con, $insert_result_sql);

			}

		}

		// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
		// Get The page name and serial no

			if ($mcq_mix_id=='' or $mcq_mix_id==NULL) {
				$mcq_mix_id = $_GET['mcq_id'];
				$_SESSION['mcq_mixed'] = $mcq_mix_id;
			}
			$Page_vid_no = explode("@@", $mcq_mix_id);

			$mcq_find_sql = "SELECT * FROM `mcq` WHERE `Page_Name` = '$Page_vid_no[0]' AND `Serial_no` = '$Page_vid_no[1]'";
			$mcq_query = mysqli_query($con,$mcq_find_sql);

			$num_008 = mysqli_num_rows($mcq_query);
			
		?>
		
		<div class="plang_header container">
			<h1>Multiple Choise Question</h1>
		</div>

		<div class="mcq_timer_div">
			<p class="mcq_identifier_p"><b><?php echo str_replace('_', ' ', $Page_vid_no[0])." || test no: ".$Page_vid_no[1] ?></b></p>
			<div id="mc_timer"></div>
		</div>

		<!-- MCQ Part -->
		<div class="MCQ_div">
			<?php 

				while ($mcq_questions = mysqli_fetch_array($mcq_query)) {
				$options_zip = $mcq_questions['Options'];
				$options_extracted = explode("@@@", $options_zip);

			 ?>

			<form id="mcq_form_test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<p class="question_mqc"> <?php echo $mcq_questions['Q_no'].". ".$mcq_questions['Question']; ?></p>
			<div class="op_a form-check">
			  <input class="form-check-input" type="radio" name="<?php echo "Answer_".$mcq_questions['Q_no'] ?>" id="<?php echo $mcq_questions['Q_no']."_".$options_extracted[0]; ?>" value="a" checked>
			  <label class="form-check-label" for="<?php echo $mcq_questions['Q_no']."_".$options_extracted[0]; ?>">
				a) <?php echo "   ".$options_extracted[0]; ?>
			  </label>
			</div>

			<div class="op_a form-check">
			  <input class="form-check-input" type="radio" name="Answer_<?php echo $mcq_questions['Q_no'] ?>" id="<?php echo $mcq_questions['Q_no']."_".$options_extracted[1]; ?>" value="b">
			  <label class="form-check-label" for="<?php echo $mcq_questions['Q_no']."_".$options_extracted[1]; ?>">
				b) <?php echo "   ".$options_extracted[1]; ?>
			  </label>
			</div>

			<div class="op_a form-check">
			  <input class="form-check-input" type="radio" name="Answer_<?php echo $mcq_questions['Q_no'] ?>" id="<?php echo $mcq_questions['Q_no']."_".$options_extracted[2]; ?>" value="c">
			  <label class="form-check-label" for="<?php echo $mcq_questions['Q_no']."_".$options_extracted[2]; ?>">
				c) <?php echo "   ".$options_extracted[2]; ?>
			  </label>
			</div>

			<div class="op_a form-check">
			  <input class="form-check-input" type="radio" name="Answer_<?php echo $mcq_questions['Q_no'] ?>" id="<?php echo $mcq_questions['Q_no']."_".$options_extracted[3]; ?>" value="d">
			  <label class="form-check-label" for="<?php echo $mcq_questions['Q_no']."_".$options_extracted[3]; ?>">
				d) <?php echo "   ".$options_extracted[3]; ?>
			  </label>
			</div>

		<?php
			}
		?>
			<input type="submit" name="mcq_submit" class="mqc_submit btn btn-primary" value="Submit" <?php echo $ans_submit_btn; ?> ><a href = "#show_mcq_result"></a>
			</form>
		</div>


		<div id="show_mcq_result" class="mcq_result">
			<h4>Result</h4>
			<p>Your score: <?php echo $mark ?></p>
			<p>Correct Answers:</p>
			<p>
			<?php 
				$num_of_ques = count($correct_ans);
				echo "---- ";
				for ($i=0; $i < $num_of_ques; $i++) { 
					echo ($i+1).") ".$correct_ans[$i]." ----- ";
				}
			 ?>
			</p> 
			<?php 
				$go_to_page = explode("@@", $_SESSION['mcq_mixed']);
				$vir_pn = array("Basic_python","Advance_python");
				$ori_pn = array("python.php","ad_python.php");

				$key = array_search($go_to_page[0], $vir_pn); 
			 ?>
			<a href="<?php echo $ori_pn[$key]; ?>">Go to video</a>
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
						<li><a href="#">Java</a></li>
						<li><a href="#">JavaScript</a></li>
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
					<p><span>&#9742;</span>&emsp;+880 1987128</p>
					<p><span>&#x2709;</span>&emsp;hpylearners_17@gmail.com</p> 
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
		<p>&copy; All rights reserved by codelearners</p>
	</div>
	</footer>
	<script type="text/javascript" src="../js/jquery-3.5.1.min.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js?v=<?php echo time(); ?>"></script>

	<script type="text/javascript">
		function countDown(secs,elem) {
		    var element = document.getElementById(elem);

		    var minutest = Math.floor(secs / 60);
		    var secondst = Math.floor(secs % 60);

		    var var_0 = '';
		    if (secondst<10) {
		      var_0 = '0';
		    }
		    element.innerHTML = "0"+minutest+" : "+var_0+secondst;

		    if(secs <1) {
		    clearTimeout(timer);
		    element.innerHTML = '00:00';

		    }
		    $(document).ready(function(){
		  		$(".mqc_submit").click(function(){
		  			element.innerHTML = '00:00';
		  		})
		  	});
		    secs--;
		    var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
		  	}

	</script>
	<?php 
	$timer_time = 0;
		if(isset($_POST['mcq_submit'])){
				$timer_time = 00;
		}
		else{
			$timer_time= $num_008*2*60 -1;
		}
	 ?>
	 <script>countDown(<?php echo $timer_time; ?>,"mc_timer");</script> 
	<!-- <script>countDown(7,"mc_timer");</script>  -->

</body>
</html>

<?php  

	// viewers query
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