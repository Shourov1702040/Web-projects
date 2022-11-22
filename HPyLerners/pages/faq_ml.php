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
	$top_serial = NULL;
	$serial_no = 1;
	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

	$faq_select_sql545 = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' ORDER BY Faq_serial DESC";
	$faq_select_query545 = mysqli_query($con,$faq_select_sql545);
	$top_serial545 = mysqli_num_rows($faq_select_query545);
	
	$main_post_665 = '';

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
				 <a href="frist.php" class="dropdown-item"><img src="../images/logout.jpg" class="bd_img_round" alt="" />Logout</a>
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
		<h2>Machine Learning</h2>
		<nav> 
			<div class="Faq_nav"> 
				<ul>
				<li><a href="Faq_python.php">Laungage</a></li>
				<li><a href="Faq_gui.php">Frame Work</a></li>
				<li><a href="Faq_ml.php" id="faq_menu_active">Machine Learning</a></li>
				<li><a href="Faq_add.php">Add Question</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<?php  
		if (isset($_POST['go_to_top'])) {
			$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' ORDER BY Faq_serial DESC";
			$faq_select_query = mysqli_query($con,$faq_select_sql);
			$top_serial = mysqli_num_rows($faq_select_query);
			$_SESSION['top_sl1'] = $top_serial;
		}

		if($top_serial==NULL) {
			
			$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' ORDER BY Faq_serial DESC";
			$faq_select_query = mysqli_query($con,$faq_select_sql);
			$faq_selected_row = mysqli_fetch_array($faq_select_query);
			$top_serial = intval($faq_selected_row[1]);
		}
		


		if (isset($_POST['faq_go_btn'])) {
			$get21Serial_1 =$_POST['sl_text'];
			
			if ($get21Serial_1!='') {
				$top_serial = $get21Serial_1;
			}
			else{
				$top_serial =$_POST['faq_selector'];
			}

			$_SESSION['top_sl1'] = $top_serial;
			$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' AND Faq_serial='$top_serial'";
			$faq_select_query = mysqli_query($con,$faq_select_sql);
			$faq_selected_row = mysqli_fetch_array($faq_select_query);

		}

		if (isset($_POST['prev'])) {
			$top_serial =intval($_POST['faq_selector']);
			if ($top_serial>1) {
				$top_serial =intval($_POST['faq_selector']) - 1;
				$_SESSION['top_sl1'] = $top_serial;
				$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' AND Faq_serial='$top_serial'";
				$faq_select_query = mysqli_query($con,$faq_select_sql);
				$faq_selected_row = mysqli_fetch_array($faq_select_query);
			}
			else{
				?>
				<script type="text/javascript">
					alert("No more post");
				</script>
				<?php
			}

		}
		if (isset($_POST['next'])) {
			$top_serial =intval($_POST['faq_selector']);
			if ($top_serial<$top_serial545) {
				$top_serial =intval($_POST['faq_selector']) + 1;
				$_SESSION['top_sl1'] = $top_serial;
				$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' AND Faq_serial='$top_serial'";
				$faq_select_query = mysqli_query($con,$faq_select_sql);
				$faq_selected_row = mysqli_fetch_array($faq_select_query);
			}
			else{
				?>
				<script type="text/javascript">
					alert("No more post");
				</script>
				<?php
			}

		}



		if (isset($_POST['Faq_com_submit'])) {

			$top_serial = $_POST['faq_selector'];
			$_SESSION['top_sl1'] = $top_serial;
			$faq_com = $_POST['faq_ans'];
			$cur_date = date('d-m-y');
			$replay_to_mail = $_POST['custId_mail'];
			
			$selectAll_commenter_sql = "SELECT id FROM faq_comment WHERE Faq_serial = '$top_serial' AND Topic='Mechine learning' ORDER BY id DESC";
						$selectAll_commenter_query = mysqli_query($con, $selectAll_commenter_sql);
			$num_of_comment = mysqli_fetch_array($selectAll_commenter_query);
			$id_896 = intval($num_of_comment[0]) + 1;

			$faq_comment_insert_sql = "INSERT INTO `faq_comment` VALUES('$res[2]','$cur_date','$top_serial','Mechine learning', '$faq_com', '$id_896')";
			$faq_comment_insert_query = mysqli_query($con, $faq_comment_insert_sql);

			//################ send notification start #######################
			$flag_mail = 0;
			$ckeck_allow_notify_sql = "SELECT `Notification` FROM `user_account` WHERE `Email` LIKE '$replay_to_mail'";
			$ckeck_allow_notify_query = mysqli_query($con, $ckeck_allow_notify_sql);
			$ckeck_allow_notify_res = mysqli_fetch_array($ckeck_allow_notify_query);

			if ($faq_com[0]=="@" and $replay_to_mail!=NULL and $ckeck_allow_notify_res[0]=='Yes') {
				$mentioned_name = explode(",", $faq_com);
				$mentioned_name = str_replace('@', '', $mentioned_name);

			$to_email = $replay_to_mail;
			$subject = "Notification_Faq_Python_{$top_serial}_{$id_896}";
			$body = "Hi {$mentioned_name[0]}, {$res[0]} {$res[1]} mentioned you in a comment on Faq = {$id_896}, Topic = Mechine learning";
			$headers = "From: Hpylearners.org new notification";
			}
			$flag_mail = 0;
			if (mail($to_email, $subject, $body, $headers)) {
				$flag_mail = 1;
			}
			//################ send notification end #########################

			if ($faq_comment_insert_query){
				?>
				<script type="text/javascript">
					alert("Comment added");
				</script>
				<?php
				echo '<META HTTP-EQUIV="Refresh" content="0">';
				$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' AND Faq_serial='$top_serial'";
				$faq_select_query = mysqli_query($con,$faq_select_sql);
				$faq_selected_row = mysqli_fetch_array($faq_select_query);
			}else{
				?>
				<script type="text/javascript">
					alert("Something went wrong");
				</script>
				<?php
			}
			$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' AND Faq_serial='$top_serial'";
			$faq_select_query = mysqli_query($con,$faq_select_sql);
			$faq_selected_row = mysqli_fetch_array($faq_select_query);

			
		}
		elseif($_SESSION['top_sl1']!=NULL){

			$top_serial = $_SESSION['top_sl1'];
			$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' AND Faq_serial='$top_serial'";
			$faq_select_query = mysqli_query($con,$faq_select_sql);
			$faq_selected_row = mysqli_fetch_array($faq_select_query);
		}

			// Get owner info of the post 
			$main_post_665 = $faq_selected_row['faq_Question'];
			$select_post_person_sql = "SELECT * FROM `user_account` WHERE `Email` = '$faq_selected_row[0]'";
			$select_post_person_query = mysqli_query($con,$select_post_person_sql);
			$person_6425 = mysqli_fetch_array($select_post_person_query);

			?>

				<div class="main_Faq_div container">
					<div class="question_serial">
						<p>Faq no: <?php echo $faq_selected_row['Faq_serial'] ?></p>
					</div>

					<div class="ask_persion row">
						<div class="col-md-2">
							<?php 
								$image_of_post_owner = $person_6425['Image'];
								$image_post_owner_src = "upload/".$image_of_post_owner;
							 ?>
							<img src="<?php echo $image_post_owner_src; ?>">
						</div>
						<div class="col-md-4">
							<h3><?php echo $person_6425[0]." ".$person_6425[1]; ?></h3>
						</div>
						<div class="col-md-5">
							<p>@ <?php echo $faq_selected_row['Date']; ?></p>
						</div>
						<div id="options_del_edit" class="col-md-1">
							<?php 
								if ($res[2]==$person_6425[2]){
								echo '<a href="#"><img src="../images/3dots.png" id="faq_3dots">';
							} 
							?>
							
							<ul>
								<li>
									<button type="button" data-toggle="modal" data-target=".bd-example-modal-lg-002">Edit</button>
								</li>
								<li>
									<button type="button" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</button>
								</li>
							</ul>
							</a>
						</div>
					</div>

					<div class="question_part">
						<pre><?php echo $faq_selected_row['faq_Question']; ?></pre>
					</div>

					<!-- show Image button  -->
					<div class="row">
						<button type="button" class="show_faq_img btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg-001">show images</button>
					</div>

					<div class="comment_pane">
						<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"> 
							<h4>Post your comment</h4>
							<textarea class="form-control" name="faq_ans" id="faq_ans" placeholder="write a comment..." rows="3"></textarea>
							<input type="submit" class="btn btn-info pull-right" name="Faq_com_submit" value="Post"></input>
							<input type="hidden" name="custId_mail" id="custId_mail">
					</div>

					<!-- Getting comments -->
					<?php  
						$selectAll_commenter_sql = "SELECT * FROM faq_comment WHERE Faq_serial = '$faq_selected_row[1]' AND Topic='$faq_selected_row[3]' ORDER BY id DESC";
						$selectAll_commenter_query = mysqli_query($con, $selectAll_commenter_sql);
						$num_of_comment = mysqli_num_rows($selectAll_commenter_query);

						while ($single_commenter = mysqli_fetch_array($selectAll_commenter_query)) {

							$select_commenterInfo_sql = "SELECT * FROM user_account WHERE Email = '$single_commenter[0]'";
							$select_commenterInfo_query = mysqli_query($con,$select_commenterInfo_sql);
							$comenter_of_faq = mysqli_fetch_array($select_commenterInfo_query);
							?>

							<div class="Faq_comments row">
								<div class="col-md-2">
									<?php  
										$image_of_commenter = $comenter_of_faq['Image'];
										$image_of_commenter_src = "upload/".$image_of_commenter;
									?>
									<img src="<?php echo $image_of_commenter_src ?>">
								</div>
								<div class="col-md-10">
									<div class="row">
										<h4><?php echo $comenter_of_faq[0]." ".$comenter_of_faq[1]; ?></h4>
										<h5><?php echo $single_commenter['Date'] ?></h5>
										<?php 
											$replay_name = $comenter_of_faq[0]." ".$comenter_of_faq[1];
											$commenter_mail = $comenter_of_faq["Email"];

											echo '<button type="button" onclick="replay(\''.$replay_name.'\',\''.$commenter_mail.'\');" class="btn btn-primary" >replay</button>';
										 ?>

										 <!-- HIdden input to throw the email -->
										 
										
									</div>
									<div class="com_faltu row">
										<p><?php echo $single_commenter['faq_ans'] ?></p>
									</div>
								</div>
							</div>

							<?php
						}
					?>
				</div>

	
	<div class="selector_btn_grp">
		
			<div class="row">
				
				<select id="inputState" class="form-control" name="faq_selector">
				<?php 
				$faq_serial_arr = array();
				if ($top_serial>20) {
					for ($i=0; $i < 20; $i++) { 
						$temp_val7612 = $top_serial-$i;
						array_push($faq_serial_arr, $temp_val7612);
					}
				}
				elseif ($top_serial>10) {
					for ($i=0; $i < 10; $i++) { 
						$temp_val7612 = $top_serial-$i;
						array_push($faq_serial_arr, $temp_val7612);
					}
				}

				elseif ($top_serial<=10) {
				 	for ($i=0; $i < $top_serial; $i++) { 
						$temp_val7612 = $top_serial-$i;
						array_push($faq_serial_arr, $temp_val7612);
					}
				 }

				 foreach ($faq_serial_arr as $skd_554) {
				  	?>
				  		<option><?php echo $skd_554 ?></option>
				  	<?php
				  } 
				?>
				
			</select>
			<input type="text" name="sl_text" class="sl_text">
			</div>
			<div class="row">
				
				<input type="submit" class="faq_go_btn btn btn-primary" name="faq_go_btn" value="Go to">
				<input type="submit" name="go_to_top" class="top_serial_trans btn btn-primary" value="go to top">
				<input type="submit" class="btn btn-primary" name="prev" value="<<">
				<p><?php echo $faq_serial_arr[0]; ?></p>
				<input type="submit" class="btn btn-primary" name="next" value=">>">
			</div>
		</form>
	</div>

		<!-- pop up form 1 -->

				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="modal fade bd-example-modal-lg-001" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-lg1 modal-dialog modal-lg">
						<div class="modal_my_class modal-content">
						  <div class="modal-header">
							<h5 class="color_white modal-title" id="exampleModalLabel">Related Image</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="no_padding modal-body">
							<!--pop up form body here --> 
								<div class="row">
									<?php  
										$image_faq = $faq_selected_row['Image'];
										$note_img = "";
										if ($image_faq) {
											$image_src_faq = "../Faq/".$image_faq;
										}
										else{
											$note_img = "No image";
										}
									?>
									 <img class="pop_up_img" src="<?php echo $image_src_faq; ?>">
									 <?php echo $note_img; ?>
								</div>

						  </div>
						</div>
					  </div>
					</div>
				</form>
		<!--Pop up form  1 finished-->



		<!-- pop up form edit post -->

			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="modal fade bd-example-modal-lg-002" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<div class="modal_my_class modal-content">
				  <div class="modal-header">
					<h5 class="color_white modal-title" id="exampleModalLabel">Edit your post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  	<div class="modal-body">
					<!--pop up form body here --> 
						 
						<div class="pd-10 row form-group ">
							<textarea class="form-control" id="main_post" name="main_post" placeholder="" rows="18"><?php echo $main_post_665; ?></textarea>
						</div>

					</div>	
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" name="edit_post" value="UPDATE"></input>
				  </div>
				</div>
			  </div>
			</div> 
			</form>
		<!--Pop up form  for edit post finished-->


		<!-- pop up form delete post -->

			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-sm">
				<div class="modal_my_class modal-content">
				  <div class="modal-header">
					<h5 class="color_white modal-title" id="exampleModalLabel">Conform choise</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<!--pop up form body here --> 
						<div class="row"> 
							<p class = "para_small sign_pad color_white">Are you sure to delete post?</p>
						</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<input type="submit" class="btn btn-primary" name="del_post" value="Delete"></input>
				  </div>
				</div>
			  </div>
			</div>
			</form>
		<!--Pop up form  for delete post finished-->

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
		<p>&copy;All rights reserved by codelearns</p>
	</div>
	</footer>
	<script type="text/javascript" src="../js/jquery-3.5.1.min.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js?v=<?php echo time(); ?>"></script>

	<script type="text/javascript">
		function replay(ss,ssMail){
			var ho = ss;
			document.getElementById("faq_ans").value="@"+ho+", ";
			document.getElementById("custId_mail").value = ""+ssMail;
		}
	</script>
</body>
</html>



<?php  

	if (isset($_POST['del_post'])) {
		$faq_serial_no = $faq_selected_row['Faq_serial'];
		$del_post_sql = "DELETE FROM `faq` WHERE `faq`.`Faq_serial` = '$faq_serial_no' AND `faq`.`Topic` = 'Mechine learning'";
		$del_post_query = mysqli_query($con, $del_post_sql);

		if ($del_post_query) {
			?>
			<script type="text/javascript">
				alert("Post deleted successfully");
			</script>
			<?php
			
			$faq_select_sql = "SELECT * FROM `faq` WHERE `Topic` = 'Mechine learning' ORDER BY Faq_serial DESC";
			$faq_select_query = mysqli_query($con,$faq_select_sql);
			$top_serial = mysqli_num_rows($faq_select_query);
			$_SESSION['top_sl1'] = $top_serial;
			echo '<META HTTP-EQUIV="Refresh" content="0">';
		}
	}

	if (isset($_POST['edit_post'])) {
		
		$edited_post = $_POST['main_post'];
		$faq_serial_no = $faq_selected_row['Faq_serial'];

		$update_post_sql = "UPDATE `faq` SET `faq_Question` = '$edited_post' WHERE `faq`.`Faq_serial` = '$faq_serial_no' AND `faq`.`Topic` = 'Mechine learning'";
		$update_post_query = mysqli_query($con, $update_post_sql);

		if ($update_post_query) {
			?>
			<script type="text/javascript">
				alert("Post updated successfully");
			</script>
			<?php
			
			echo '<META HTTP-EQUIV="Refresh" content="0">';
		}
		else{
			?>
			<script type="text/javascript">
				alert("Post update failed ");
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