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
	<link rel="stylesheet" href="../css/font-awesome.min.css?v=<?php echo time(); ?>"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css?v=<?php echo time(); ?>"/>
	<link rel="stylesheet" href="../css/bootstrap-select.css?v=<?php echo time(); ?>" />
	<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>" />
	
</head>
<body>

	<?php 

	$check_selected_key_28 = '';
	$search_key = '';
	$one_info_to_update = array("","","","","","","");
	$full_message = '';
	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = $query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

	$selectforTable1 = "SELECT * FROM `visitor_query` WHERE 1";
	$Tquery = mysqli_query($con,$selectforTable1);
	$num_row = mysqli_num_rows($Tquery);
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
			  <li class="nav-item active">
				<a class="nav-link font2" href="home.php">&#x1F3E0;Home<span class="sr-only">(current)</span></a>
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
			  <li class="nav-item dropdown active">
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

	<div class="container-fluid">
	<div class="row">
		<div class="em_sidebar_div col-md-2">
			<ul id="em_menu">
				<li ><a href="admin_c.php">Members</a></li>
				<li ><a href="admin_vid_con.php">Videos</a></li>
				<li><a href="admin_mcq_con.php">MCQ</a></li>
				<li id="active_style"><a href="admin_mcq_con.php">Feedback</a></li>
				<li><a href="#">Profile</a></li>
			</ul>
		</div>
		
		<div class="up_top_body1 col-md-10">
			<h1>Visitors Feedback</h1>
			<b><p class="admin_j_000976"><u>Only admin has the right to control</u></p></b>
		
		<?php  
			if (isset($_POST['Search_user_001'])) {
				$search_key = $_POST['Search_user_val_001'];

				if ($search_key!='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `visitor_query` WHERE `Email`='$search_key'";
				}
				else{
					$selectforTable1 = "SELECT * FROM `visitor_query` WHERE 1";
				}
				$Tquery = mysqli_query($con,$selectforTable1);
				$num_row = mysqli_num_rows($Tquery);
			}

		// if display button is called 
			if (isset($_POST['display_btn'])) {
				$search_key = $_POST['Search_user_val_001'];

				if ($search_key!='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `visitor_query` WHERE `Email`='$search_key'";
				}
				else{
					$selectforTable1 = "SELECT * FROM `visitor_query` WHERE 1";
				}
				$Tquery = mysqli_query($con,$selectforTable1);
				$num_row = mysqli_num_rows($Tquery);
				$num_of_row_select = 0;
				$selected_rows = array();
				while ($Tres = mysqli_fetch_array($Tquery)) {
					$check_key_hh1 = $Tres[5];
					
					if (isset($_POST[$check_key_hh1])) {
						array_push($selected_rows, $check_key_hh1);
						$num_of_row_select = $num_of_row_select + 1;
					}
				}					
				if ($num_of_row_select==1) {
					$te_h_array = $selected_rows[0];
					$select_single_row = "SELECT * FROM `visitor_query` WHERE id='$te_h_array'";
					$Single_query = mysqli_query($con,$select_single_row);
					
					while ($up_row_info = mysqli_fetch_array($Single_query)) {
						$one_info_to_update[0] = $up_row_info[0];
						$one_info_to_update[1] = $up_row_info[1];
						$one_info_to_update[2] = $up_row_info[2];
						$one_info_to_update[3] = $up_row_info[3];
						$one_info_to_update[4] = $up_row_info[4];
						$one_info_to_update[5] = $up_row_info[5];
					}
					$_SESSION['selected_query_item'] = $one_info_to_update[5];
					$check_selected_key_28 = $one_info_to_update[5];
					$full_message = "Name: ".$one_info_to_update[0]."\nEmail: ".$one_info_to_update[1]."\nContact: ".$one_info_to_update[2]."\nMembership: ".$one_info_to_update[4]."\n__________________________________________\nQuery: \n".$one_info_to_update[3];
					$_SESSION['main_message_to_display'] = $full_message;
				}
				else{
					?>
						<script type="text/javascript">
							alert("Can't display more than one row");
						</script>
					<?php
				}
				$search_key = $_POST['Search_user_val_001'];
				if ($search_key!='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `visitor_query` WHERE `Email`='$search_key'";
				}
				else{
					$selectforTable1 = "SELECT * FROM `visitor_query` WHERE 1";
				}
				$Tquery = mysqli_query($con,$selectforTable1);
				$num_row = mysqli_num_rows($Tquery);
			}
		?>

		<!-- video informations -->
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="admin_table_buttons">
				<button type="button" class="select_all_admin btn btn-primary" id="checkall">Select all</button>
				<input type="submit" class="admin_display btn btn-primary" name="display_btn" value="Display">
				<input type="submit"class="admin_delete btn btn-primary" name="" value="Delete">
				<input type="submit" class="ad_refresh_btn btn btn-primary mb-2" name="" value="Refresh">
			  
			    <input type="text" class="search_box form-control" name="Search_user_val_001" placeholder="search" value="<?php echo $search_key; ?>">
			  	<input type="submit" class="btn btn-primary mb-2" name="Search_user_001" value="Search">
			
			</div>
			
			<div class = "center-div-admin">
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th>Select</th>
								<th>Name</th>
								<th>Email</th>
								<th>Membership</th>
								<th>Replay Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								while ($vid_info = mysqli_fetch_array($Tquery)) {

									$checkbox_key = $vid_info[5];

									?>
									<tr>
										<td><input type="checkbox" name="<?php echo $checkbox_key; ?>" class="checkhour1" value="<?php echo $checkbox_key; ?>" <?php if ($checkbox_key==$check_selected_key_28) {
											echo "checked"; } ?>> </td>
										<td><?php echo $vid_info[0]; ?></td>
										<td><?php echo $vid_info[1]; ?></td>
										<td><?php echo $vid_info[4]; ?></td>
										<td><?php echo $vid_info[6]; ?></td>
									</tr>
									<?php
								}
							 ?>
						</tbody>
					</table>
				</div>
			</div>
			

			<!-- Single  full information -->
			<div class="user_display_div">
				<!-- row 1 -->
				<div class="row">
					<div class="form-group col-12">
						<label class="color_white">Visitors Query</label>
						<?php  
							if (isset($_POST['send_mail_btn'])){
								$full_message = $_SESSION['main_message_to_display'];
							}
						?>
				     	<textarea class="form-control" name="main_message_body" placeholder="" rows="10"><?php echo $full_message; ?></textarea>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-6">
				      <label class="color_white">Send a mail to this visitor</label>
				      <input type="text" class="form-control" name="mail_sending_sub" placeholder="Subject">
				    </div>
				</div>

				<div class="row">
					<div class="form-group col-11">
				     	<textarea class="form-control" name="mail_sending_msg" placeholder="Descritopn" rows="4"></textarea>
					</div>

					<div class="form-group col-1">
				      <input type="submit" class="ad_send_main_btn btn btn-primary" name="send_mail_btn" id="" value="SEND">
				    </div>
				</div>

			</div>
			</form>
	<!-- @@@@@@@@@@@@ end of main body @@@@@@@@@@@@@ -->
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
						<li><a href="#">Java</a></li>
						<li><a href="#">JavaScript</a></li>
						<li><a href="#">Djando</a></li>
						<li><a href="#">Tkinter</a></li>
						<li><a href="#">Mechine learning</a></li>
						<li><a href="#">Artificial Inteligence</a></li>
						<li><a href="#">MySql & Python</a></li>
						<li><a href="#">Python projects</a></li>
						<li><a href="#">ML projects</a></li>
					
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
	<script type="text/javascript" src="../js/bootstrap-select.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/myJs.js?v=<?php echo time(); ?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#show_post_002").click(function(){
				$(".center-div-admin_2").toggle(1200);
			});

			$("#show_result_002").click(function(){
				$(".center-div-admin_1").toggle(1200);
			});
		});

		var clicked1 = false;
		$("#checkall").on("click", function() {
		  $(".checkhour1").prop("checked", !clicked1);
		  clicked1 = !clicked1;
		});
		
		
	</script>
</body>
</html>


<?php  

	if (isset($_POST['send_mail_btn'])){
		$mail_finding_primary_key = $_SESSION["selected_query_item"];
	    $get_mail_sql = "SELECT * FROM `visitor_query` WHERE id='$mail_finding_primary_key'";
		$get_mail_query = mysqli_query($con,$get_mail_sql);
		$to_email = '';
		while ($up_row_info = mysqli_fetch_array($get_mail_query)) {
			$to_email = $up_row_info[1];
		}
		$message_to_send = $_POST['mail_sending_msg'];
		$subject_to_send = $_POST['mail_sending_sub'];
		$headers = "From: HPyLearners.org";

		if (mail('shourovhstu17@gmail.com', $subject_to_send, $message_to_send, $headers)) {

			$update_replay_sql = "UPDATE `visitor_query` SET `replay_status` = 'Replied' WHERE `visitor_query`.`id` = '$mail_finding_primary_key'";
			$update_replay_query = mysqli_query($con,$update_replay_sql);
			?>
			echo '<META HTTP-EQUIV="Refresh" content="0">';
			<script type="text/javascript">
				alert("Mail sent successfully");
			</script>
			<?php
		} 
		else{
		?><script type="text/javascript">
			alert("Failed to send mail");
		</script><?php
		}
	}



	
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