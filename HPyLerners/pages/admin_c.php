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

	$te_h_array = '';
	$search_key = '';
	$one_info_to_update = array("","","","","","","","","","","","");

	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

	$selected_mail_id_667 = '';
	$selectforTable1 = "SELECT * FROM `user_account` WHERE 1";
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
				<li id="active_style"><a href="">Members</a></li>
				<li ><a href="admin_vid_con.php">Videos</a></li>
				<li><a href="admin_mcq_con.php">MCQ</a></li>
				<li><a href="admin_feedback.php">Feedback</a></li>
				<li><a href="#">Profile</a></li>
			</ul>
		</div>
		
		<div class="up_top_body1 col-md-10">
			<h1>Admin Control Panel</h1>
			<b><p class="admin_j_000976"><u>Only admin has the right to control</u></p></b>


			<?php  

				if (isset($_POST['Search_user_001'])) {
					$search_key = $_POST['Search_user_val_001'];

					$selectforTable1 = "SELECT * FROM `user_account` WHERE Email='$search_key' OR Phone = '$search_key'";
					$Tquery = mysqli_query($con,$selectforTable1);
					$num_row = mysqli_num_rows($Tquery);
				}


				if (isset($_POST['display_btn'])) {
					$search_key = $_POST['Search_user_val_001'];
					if ($search_key!='') {

						$selectforTable1 = "SELECT * FROM `user_account` WHERE Email='$search_key' OR Phone = '$search_key'";
						$Tquery = mysqli_query($con,$selectforTable1);
						$num_row = mysqli_num_rows($Tquery);
					}

					
					$num_of_row_select = 0;
					$selected_rows = array();

					while ($Tres = mysqli_fetch_array($Tquery)) {
						$check_name_468 = explode('@', $Tres[2]);

						if (isset($_POST[$check_name_468[0]])) {
							array_push($selected_rows, $_POST[$check_name_468[0]]);
							$num_of_row_select = $num_of_row_select + 1;
						}
					}
					

					if ($num_of_row_select==1) {
						// echo $selected_rows[0];

						$te_h_array = $selected_rows[0];
						$check_mail = $te_h_array."@gmail.com";
						$selected_mail_id_667 = $check_mail;

						$select_single_row = "SELECT * FROM `user_account` WHERE Email='$check_mail'" ;
						$Single_query = mysqli_query($con,$select_single_row);
						

						while ($up_row_info = mysqli_fetch_array($Single_query)) {
							$one_info_to_update[0] = $up_row_info[0];
							$one_info_to_update[1] = $up_row_info[1];
							$one_info_to_update[2] = $up_row_info[2];
							$one_info_to_update[3] = $up_row_info[3];
							$one_info_to_update[4] = $up_row_info[4];
							$one_info_to_update[5] = $up_row_info[5];
							$one_info_to_update[6] = $up_row_info[6];
							$one_info_to_update[7] = $up_row_info[7];
							$one_info_to_update[8] = $up_row_info[8];
							$one_info_to_update[9] = $up_row_info[9];
							$one_info_to_update[10] = $up_row_info[10];
							$one_info_to_update[11] = $up_row_info[11];
						}


					}

					else{
						?>
							<script type="text/javascript">
								alert("Can't display more than one row");
							</script>
						<?php
					}


					$search_key = $_POST['Search_user_val_001'];
					if ($search_key!='') {

						$selectforTable1 = "SELECT * FROM `user_account` WHERE Email='$search_key' OR Phone = '$search_key'";
						$Tquery = mysqli_query($con,$selectforTable1);
						$num_row = mysqli_num_rows($Tquery);
					}

					else{
						$selectforTable1 = "SELECT * FROM `user_account` WHERE 1";
						$Tquery = mysqli_query($con,$selectforTable1);
						$num_row = mysqli_num_rows($Tquery);
					}


					
				}
			?>

			<!-- members informations -->
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
								<th>First_Name</th>
								<th>Last_Name</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Profession</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								while ($member_info = mysqli_fetch_array($Tquery)) {

									$Email0044 = explode('@', $member_info[2]);
									$checkbox_name = $Email0044[0];

									?>
									<tr>
										<td><input type="checkbox" name="<?php echo $checkbox_name; ?>" class="checkhour1" value="<?php echo $checkbox_name; ?>" <?php if ($checkbox_name==$te_h_array) {
											echo "checked"; } ?>> </td>
										<td><?php echo $member_info[0]; ?></td>
										<td><?php echo $member_info[1]; ?></td>
										<td><?php echo $member_info[2]; ?></td>
										<td><?php echo $member_info[3]; ?></td>
										<td><?php echo $member_info[4]; ?></td>
									</tr>
									<?php
								}
							 ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="user_display_div">

				<div class="row">
					<div class="col-3">
						<?php 
							$image_member = $one_info_to_update[8];
							$image_member_src = "upload/".$image_member;
						 ?>
						<img src="<?php if($one_info_to_update[8]==''){echo"../images/user_oic.png";} else{echo $image_member_src;} ?>">
					</div>
					<div class="col-9">
						<div class="row">
							<div class="form-group col-6">
							    <label for="inputCity" class="color_white">First Name</label>
							    <input type="text" class="form-control" name="fname_inp" id="fname_inp" value="<?php echo $one_info_to_update[0]; ?>">

							</div>
							<div class="form-group col-6">
							    <label for="inputCity" class="color_white">Last Name</label>
							    <input type="text" class="form-control" name="lname_inp" id="lname_inp" value="<?php echo $one_info_to_update[1]; ?>">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-6">
							    <label for="inputCity" class="color_white">Email</label>
							    <input type="text" class="form-control" name="email_inp" id="email_inp" value="<?php echo $one_info_to_update[2]; ?>">

							</div>
							<div class="form-group col-6">
							    <label for="inputCity" class="color_white">Contact no.</label>
							    <input type="text" class="form-control" name="contact_inp" id="contact_inp" value="<?php echo $one_info_to_update[3]; ?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="em_form_label form-group col-4">
				    	<p class="color_white">Gender</p>
				        <div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline1" name="gender_inp" class="custom-control-input" <?php if ($one_info_to_update[6]=='male') {
						  	echo "checked"; } ?>>
						  <label class="radio_button001_lbl custom-control-label" for="customRadioInline1" >Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline2" name="gender_inp" class="custom-control-input" <?php if ($one_info_to_update[6]=='female') {
						  	echo "checked"; } ?>>
						  <label class="radio_button001_lbl custom-control-label" for="customRadioInline2">Female</label>
						</div>
					</div>

					<div class="em_form_label form-group col-4">
					      <label for="inputCity" class="color_white">Profession</label>
					      <select id="" class="form-control" name="profession_inp" id="" required>
					        <option <?php if($one_info_to_update[4]=="Student"){?> selected= <?php echo "selected"; } ?> >Student</option>

					        <option <?php if($one_info_to_update[4]=="Teacher"){?> selected= <?php echo "selected"; } ?> >Teacher</option>

					        <option <?php if($one_info_to_update[4]=="Trainer"){?> selected= <?php echo "selected"; } ?> >Trainer</option>

					        <option <?php if($one_info_to_update[4]=="Employee"){?> selected= <?php echo "selected"; } ?> >Employee</option>

					        <option <?php if($one_info_to_update[4]=="Others"){?> selected= <?php echo "selected"; } ?> >Others</option>
					      </select>
					</div>

					<div class="multi_select form-group col-4">
					    <label for="inputCity" class="color_white">Interested in</label>
					    <select id="" class="form-control" multiple name="interested_inp" id="">
					        <option <?php if (interest_fun($one_info_to_update[7],"Web Development")=="Yes") {?> selected= <?php echo "selected";} ?> >Web Development</option>

					        <option <?php if (interest_fun($one_info_to_update[7],"Game Development")=="Yes") {?> selected= <?php echo "selected";} ?>>Game Development</option>

					        <option <?php if (interest_fun($one_info_to_update[7],"Mechine Learning")=="Yes") {?> selected= <?php echo "selected";} ?>>Mechine Learning</option>

					        <option <?php if (interest_fun($one_info_to_update[7],"Aritficial Inteligence")=="Yes") {?> selected= <?php echo "selected";} ?>>Aritficial Inteligence</option>
					    </select>

				    </div>			    
				</div>

				<div class="row">
					<div class="form-group col-4">
					      <label for="inputCity" class="color_white">Address</label>
					      <select id="" class="form-control" name="address_inp" id="" required>
					        <option <?php if($one_info_to_update[5]=="Dhaka"){?> selected= <?php echo "selected"; } ?> >Dhaka</option>
					        <option <?php if($one_info_to_update[5]=="Rajshahi"){?> selected= <?php echo "selected"; } ?> >Rajshahi</option>
					        <option <?php if($one_info_to_update[5]=="Dinajpur"){?> selected= <?php echo "selected"; } ?> >Dinajpur</option>
					        <option <?php if($one_info_to_update[5]=="Khulna"){?> selected= <?php echo "selected"; } ?> >Khulna</option>
					        <option <?php if($one_info_to_update[5]=="Chattagong"){?> selected= <?php echo "selected"; } ?> >Chattagong</option>
					      </select>
					</div>

				    <div class="form-group col-4">
					      <label for="inputCity" class="color_white">Role</label>
					      <select id="" class="form-control" name="role_inp" id="" required>
					        <option <?php if($one_info_to_update[11]=="User"){?> selected= <?php echo "selected"; } ?> >Member</option>
					        <option <?php if($one_info_to_update[11]=="Admin"){?> selected= <?php echo "selected"; } ?> >Admin</option>
					        <option <?php if($one_info_to_update[11]=="Sub Admin"){?> selected= <?php echo "selected"; } ?> >Sub Admin</option>
					      </select>
					</div>

				    <div class="form-group col-4">
				      <label for="inputCity" class="color_white">Password</label>
				      <input type="text" class="form-control" name="pass_inp" id="pass_inp" value="<?php echo $one_info_to_update[9]; ?>">
				    </div>
				</div>

				<div class="row">
					<div class="form-group col-4">
				     <button type="button" class="admin_clear_btn_1 btn btn-primary" name="" id="admin_clear1" >CLEAR </button>
				    </div>

				    <div class="form-group col-4">
				    	<button type="button" name="show_post_002" class="admin_user_posts_btn btn btn-primary" id="show_post_002">show post</button>
				    	<button type="button" name="show_result_002" class="admin_user_result_btn btn btn-primary" id="show_result_002">show result</button>
				    </div>

				    <div class="form-group col-4">
				      <input type="submit" class="admin_update_btn btn btn-primary" name="update_user" id="" value="<?php echo "Update" ?>">
				    </div>
				</div>
			</div>
		</form>


			<div class = "center-div-admin_2">
				<h4>User post list</h4>
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th>Test no</th>
								<th>Date</th>
								<th>Marks</th>
								<th>Video no</th>
								<th>Page</th>
								<th>Go to test</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$selectforTable = "SELECT * FROM `mcq_resutls` WHERE `Email` = '$res[2]'";
							

							$Tquery1 = mysqli_query($con,$selectforTable);
							$num_row = mysqli_num_rows($Tquery1);
							// print($num_row);

							while ($Tres1 = mysqli_fetch_array($Tquery1)) { 

								$temp_page_Name = $Tres1[4];
								if ($temp_page_Name=="Bpython") {
									$temp_page_Name = "Basic Python";
								}
								elseif ($temp_page_Name=='Adpython') {
									$temp_page_Name = "Advanced Python";
								}
								$up_link = '';

								?>
								<tr>
									<td><?php echo $Tres1[0]; ?></td>
									<td><?php echo $Tres1[5]; ?></td>
									<td><?php echo $Tres1[2]; ?></td>
									<td><?php echo $Tres1[3]; ?></td>
									<td><?php echo $temp_page_Name; ?></td>
									<td><a href="Mcq.php?mcq_id=<?php echo $Tres1[4]."_".$Tres1[3]; ?>" class="profile_to_test_link">Go</a></td>
								</tr>
							<?php } 
							?>
						</tbody>
					</table>
				</div>
			</div>




			<div class = "center-div-admin_1">
				<h4>User Result details</h4>
			<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>Test no</th>
							<th>Date</th>
							<th>Marks</th>
							<th>Video no</th>
							<th>Page</th>
							<th>Go to test</th>
						</tr>
					</thead>
					<tbody>
						<?php 

						$selectforTable = "SELECT * FROM `mcq_resutls` WHERE `Email` = '$selected_mail_id_667'";
						
						$Tquery1 = mysqli_query($con,$selectforTable);
						$num_row = mysqli_num_rows($Tquery1);

						while ($Tres1 = mysqli_fetch_array($Tquery1)) { 

							$temp_page_Name = $Tres1[4];
							if ($temp_page_Name=="Bpython") {
								$temp_page_Name = "Basic Python";
							}
							elseif ($temp_page_Name=='Adpython') {
								$temp_page_Name = "Advanced Python";
							}
							$up_link = '';

							?>
							<tr>
								<td><?php echo $Tres1[0]; ?></td>
								<td><?php echo $Tres1[5]; ?></td>
								<td><?php echo $Tres1[2]; ?></td>
								<td><?php echo $Tres1[3]; ?></td>
								<td><?php echo $temp_page_Name; ?></td>
								<td><a href="Mcq.php?mcq_id=<?php echo $Tres1[4]."@@".$Tres1[3]; ?>" class="profile_to_test_link">Go</a></td>
							</tr>
						<?php } 
						?>
					</tbody>
				</table>
			</div>
		</div>


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

	if (isset($_POST['update_user'])){

		$first_name_inp = $_POST['fname_inp'];
		$last_name_inp = $_POST['lname_inp'];
		$email_inp = $_POST['email_inp'];
		$contact_inp = $_POST['contact_inp'];
		$gender_inp = $_POST['gender_inp'];
		$profession_inp = $_POST['profession_inp'];

		$interested_inp = $_POST['interested_inp'];
		$address_inp = $_POST['address_inp'];
		$role_inp = $_POST['role_inp'];
		$pass_inp = $_POST['pass_inp'];

		// echo $first_name_inp;
		// echo "<br>";
		// echo $last_name_inp;
		// echo "<br>";
		// echo $email_inp;
		// echo "<br>";
		// echo $contact_inp;
		// echo "<br>";
		// echo $gender_inp;
		// echo "<br>";
		// echo $profession_inp;
		// echo "<br>";
		// echo $interested_inp;
		// echo "<br>";
		// echo $address_inp;
		// echo "<br>";
		// echo $role_inp;
		// echo "<br>";
		// echo $pass_inp;
		// echo "<br>";

		$update_u_info_sql = "UPDATE `user_account` SET `FirstName` = '$first_name_inp', `LastName`='$last_name_inp',`Email`='$email_inp',`Phone`='$contact_inp',`Profession`='$profession_inp',`Address`='$address_inp',`Gender`='$gender_inp',`Interest`='$interested_inp',`Password`='$pass_inp',`Role`='$role_inp' WHERE `user_account`.`Phone` = '$contact_inp'";
		$update_u_info_query = mysqli_query($con, $update_u_info_sql);

		// echo $update_u_info_sql;

		if ($update_u_info_query){
			?>
			<script type="text/javascript">
				alert("Data updated properly");
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Something went wrong");
			</script>
			<?php
		}
		echo '<META HTTP-EQUIV="Refresh" content="0">';
		
	}


	if (isset($_POST[''])) {
		# code...
	}

	function interest_fun($interest_zip,$option_ch){
		$interest_arr = explode(', ', $interest_zip);

		foreach ($interest_arr as $s_i) {
			if ($option_ch==$s_i) {
				return "Yes";
				break;
			}
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