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
	<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>" />
</head>
<body>

	<?php 
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
		
		<!-- My profile part @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->


	<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?php echo $image_src ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4><?php echo $res[0]. " ".$res[1] ?></h4>
									<p class="text-secondary mb-1">Full Stack Developer</p>
									<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
									<button class="btn btn-primary">Follow</button>
									<button class="btn btn-outline-primary">Message</button>
								</div>
							</div>
							<hr class="my-4">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
									<span class="text-secondary">https://bootdey.com</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
									<span class="text-secondary">bootdey</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
									<span class="text-secondary">@bootdey</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
									<span class="text-secondary">bootdey</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
									<span class="text-secondary">bootdey</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-4 text-secondary">
									<input type="text" class="form-control" name="fname__1" placeholder="First name" value="<?php echo $res[0]; ?>">
								</div>

								<div class="col-sm-4 text-secondary">
									<input type="text" class="form-control" name="lname__1" placeholder="Last name" value="<?php echo $res[1]; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="email__1" value="<?php echo $res[2]; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="phone__1" value="<?php echo $res[3]; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="addres__1" value="<?php echo $res[5]; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="pass__1" value="<?php echo $res[9] ;?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" name="update_info" value="Save Changes">
								</div>
							</div>
						</div>
					</form>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="d-flex align-items-center mb-3">Project Status</h5>
									<p>Web Design</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Website Markup</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>One Page</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Mobile Template</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Backend API</p>
									<div class="progress" style="height: 5px">
										<div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>


		<!-- My profile part khatam @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
	<div class="res_table_name">
		<h2>Your test results</h2>
		<button type="button" id="show_result_btn">show/hide</button>
	</div>

	<div class = "center-div_profile">
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
						if ($temp_page_Name=="Basic_python") {
							$temp_page_Name = "Basic Python";
						}
						elseif ($temp_page_Name=='Advance_python') {
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

	<div class="post_show_div">
		<p>Your post list</p>
		<button id="show_post_btn">show/hide</button>
	</div>
	<?php  
		$post_list_sql = "SELECT `Date`, Faq_serial, Topic FROM `faq` WHERE `Email` = '$res[2]' ORDER BY `Faq_serial` DESC";
		$post_list_query = mysqli_query($con, $post_list_sql);
		$total_num_post = mysqli_num_rows($post_list_query);
	?>

	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
	<div class="post_list">
		<div class="sell_table_title">
			<button type="button" class="select_all_btn btn btn-primary" id="checkall">Select all</button>
			<input type="submit"class="ad_select_del_btn btn btn-primary" name="ad_delete_check" value="Delete">
		</div>
		<table>
			<tr>
				<th id="text_center">Select</th>
				 <th>Date</th>
				 <th>Faq no.</th>
				 <th>Topic</th>
				 <th>Go To Post</th>
			</tr>
			<?php  
			$i = 1;
			while ($faq_list = mysqli_fetch_array($post_list_query)) {
				$target_button_val = "Go_".$i;
				$hidden_name = "hidden_".$i;
				$target_praimary_val = $faq_list['Faq_serial']."@".$faq_list['Topic'];
				?>
					<tr>
						<td id="text_center"><input type="checkbox" name="<?php  ?>" class="checkhour" value=""> </td>
						<td><?php echo $faq_list['Date']; ?></td>
						<td><?php echo $faq_list['Faq_serial']; ?></td>
						<td><?php echo $faq_list['Topic']; ?></td>
						<td> 
							<input type="hidden" name="<?php echo $hidden_name ?>" value="<?php echo $target_praimary_val ?>">
							<input type="submit" class="go_to_post_btn btn btn-primary" name="<?php echo $target_button_val; ?>" value="Go to post"></input> 
						</td>
					</tr>

				<?php

				$i = $i +1; 
			}
			?>
		</table>
	</div>
</form>
			
			<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
			<!--@@@@@@@@@@@@@@@@ pop up form @@@@@@@@@@@@@@-->
			
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<div class="modal_my_class modal-content">
				  <div class="modal-header">
					<h5 class="color_white modal-title" id="exampleModalLabel">Change Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<!--pop up form body here --> 
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
						<div class="row"> 
						<div class="sign_pad form-group col-md-6">
							<label class = "color_white" for="u_name">Frist name</label>
							<input type="text" class="form-control" id="u_name" name="pop_fname" value = "<?php echo $res[0]; ?>" placeholder="Enter frist name ">
						</div>
						<div class="form-group col-md-6">
							<label class = "color_white" for="u_f_name">Last name</label>
							<input type="text" class="form-control" id="u_f_name" name="pop_lname" value = "<?php echo $res[1]; ?>" placeholder="Enter last name ">
						</div>
						</div>
						
						<div class="row"> 
						<div class="sign_pad form-group col-md-6">
							  <label class = "color_white" for="u_email">Email</label>
							  <input type="email" class="form-control" id="u_email" name="pop_email" value = "<?php echo $res[2]; ?>" placeholder="xyz@gmail.com">
						</div>
						
						<div class="form-group col-md-6">
						  <label class = "color_white" for="inputState">Profession</label>
						  <select id="inputState" class="form-control" name="pop_profession">
							<option selected>Choose</option>
							<option <?php if ($res[4]=="Student"): ?> selected="selected" <?php endif; ?>>Student</option>
							<option <?php if ($res[4]=="Teacher"): ?> selected="selected" <?php endif; ?>>Teacher</option>
							<option <?php if ($res[4]=="Trainer"): ?> selected="selected" <?php endif; ?>>Trainer</option>
							<option <?php if ($res[4]=="Employee"): ?> selected="selected" <?php endif; ?>>Employee</option>
							<option <?php if ($res[4]=="Others"): ?> selected="selected" <?php endif; ?>>Others</option>
						  </select>
						</div>
					</div>
					
					<div class="row">
						<div class="sign_pad form-group col-md-6">
							<label class="color_white" for="u_contact">Contact no.</label>
							<input type="text" class="form-control" id="u_contact" name="pop_contact" value = "<?php echo $res[3]; ?>" placeholder="01719........">
						</div>
						
						<div class="form-group col-md-6">
						  <label class = "color_white" for="inputState">District</label>
						  <select id="inputState" class="form-control" name="pop_address">
							<option selected>Choose</option>
							<option <?php if ($res[5]=="Dhaka"): ?> selected="selected" <?php endif; ?>>Dhaka</option>
							<option <?php if ($res[5]=="Rajshahi"): ?> selected="selected" <?php endif; ?>>Rajshahi</option>
							<option <?php if ($res[5]=="Khulna"): ?> selected="selected" <?php endif; ?>>Khulna</option>
							<option <?php if ($res[5]=="Dinajpur"): ?> selected="selected" <?php endif; ?>>Dinajpur</option>
							<option <?php if ($res[5]=="Chittagong"): ?> selected="selected" <?php endif; ?>>Chittagong</option>
							<option <?php if ($res[5]=="Barishal"): ?> selected="selected" <?php endif; ?>>Barishal</option>
							<option <?php if ($res[5]=="Rangpur"): ?> selected="selected" <?php endif; ?>>Rangpur</option>
							<option <?php if ($res[5]=="Joypurhat"): ?> selected="selected" <?php endif; ?>>Joypurhat</option>
							<option <?php if ($res[5]=="Mymensing"): ?> selected="selected" <?php endif; ?>>Mymensing</option>
						  </select>
						</div>
					</div>
					
					<div class="row">
						<div class="sign_pad clr_white form-group col-md-6">
						<label class="color_white">Change image</label>
						<input type="file" class="form-control-file" id="exampleFormControlFile1">
						</div>
						
						<div class="sign_pad form-group col-md-6">
							<label class="color_white" for="u_password2">Password</label>
							<input type="password" class="form-control" id="u_password1" name="pop_pass" value = "<?php echo $res[9]; ?>" placeholder="********">
						</div>
					</div>
					
					<div class="row">
					<div class="col-sm-9">
						<div class="form-check">
							<?php if ($res[10]=='Yes'){
								$notyfy_check_78w = 'checked';
							} 
							else{
								$notyfy_check_78w = '';
							}?>
							<input class="form-check-input" type="checkbox" id="check_notify" name="check_notify" <?php echo $notyfy_check_78w; ?>>
							<label class="check_notify_1 form-check-label" for="check_notify">
							  Allow Notification via Gmail
							</label>
						</div>
					</div>
					<div class="col-sm-3">
					  <div class="form-check">
							<input class="sign_pad form-check-input" type="checkbox" id="gridCheck5" onclick="show_pass()">
							<label class="check_show_pass form-check-label" for="gridCheck5">
							  show password
							</label>
						</div>
					</div>
					</div>
				  </div>
				</form>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" name="popup_update" value="UPDATE"></input>
				  </div>
				</div>
			  </div>
			</div> <!--Pop up form finished-->
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
	<script type="text/javascript" src="../js/myJs.js?v=<?php echo time(); ?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#show_post_btn").click(function(){
				$(".post_list").toggle(1200);
			});

			$("#show_result_btn").click(function(){
				$(".center-div_profile").toggle(1200);
			});

		});

		var clicked = false;
		
		$("#checkall").on("click", function() {
		  $(".checkhour").prop("checked", !clicked);
		  clicked = !clicked;
		});
	</script>
</body>
</html>


<?php  

	for ($i=1; $i <= $total_num_post ; $i = $i+1) { 

		$target_button_val = "Go_".$i;	
		
		if (isset($_POST[$target_button_val])) {
			$hidden_name = "hidden_".$i;
			$target_praimary_val = $_POST[$hidden_name];
			// echo $target_praimary_val;
			$faq_serial_topic = explode("@", $target_praimary_val);

			if ($faq_serial_topic[1]=="Python") {
				$_SESSION['top_sl'] = $faq_serial_topic[0];
				
				?>
				<script type="text/javascript">
					window.location = "Faq_python.php";
				</script>

				<?php
			}
			elseif ($faq_serial_topic[1]=="Frame works") {
				$_SESSION['top_sl2'] = $faq_serial_topic[0];
				
				?>
				<script type="text/javascript">
					window.location = "Faq_gui.php";
				</script>

				<?php
			}
			elseif ($faq_serial_topic[1]=="Mechine learning") {
				$_SESSION['top_sl1'] = $faq_serial_topic[0];
				
				?>
				<script type="text/javascript">
					window.location = "Faq_ml.php";
				</script>

				<?php
			}
		}
	}

	if (isset($_POST['popup_update'])) {
		$pop_fname = $_POST['pop_fname'];
		$pop_lname = $_POST['pop_lname'];
		$pop_email = $_POST['pop_email'];
		$pop_profession = $_POST['pop_profession'];
		$pop_contact = $_POST['pop_contact'];
		$pop_addres = $_POST['pop_address'];
		$pop_pass = $_POST['pop_pass'];
		$pop_check_notify = '';

		if(isset($_POST['check_notify'])){
			$pop_check_notify= 'Yes';
		}
		else{
			$pop_check_notify= 'No';
		}

		$popQuery = "UPDATE `user_account` SET `FirstName` = '$pop_fname',`LastName` = '$pop_lname',Email = '$pop_email', Profession='$pop_profession', `Phone` = '$pop_contact', Address='$pop_addres', Password='$pop_pass', Notification ='$pop_check_notify' WHERE `user_account`.`Phone` = '$res[3]'";
		$popquery = mysqli_query($con,$popQuery);
		// echo $popQuery;

		if ($popquery){ 
			?>
			<script type="text/javascript">
				alert("Data Successfully Updated");
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


		if (isset($_POST['update_info'])){

		$first_name_inp = $_POST['fname__1'];
		$last_name_inp = $_POST['lname__1'];
		$email_inp = $_POST['email__1'];
		$contact_inp = $_POST['phone__1'];
		$pass_inp = $_POST['pass__1'];

		$update_u_info_sql = "UPDATE `user_account` SET `FirstName` = '$first_name_inp', `LastName`='$last_name_inp',`Email`='$email_inp',`Phone`='$contact_inp',`Password`='$pass_inp' WHERE `user_account`.`Phone` = '$contact_inp'";
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
?>