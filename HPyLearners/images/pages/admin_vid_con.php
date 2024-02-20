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
	$search_key2 = '';
	$one_info_to_update = array("","","","","","");
	$limit_num = " LIMIT 12";

	include 'connections.php';
	$get_phone = $_SESSION['user_phone'];
	$SelectQuery = "SELECT * FROM user_account WHERE Phone='$get_phone'";
	$query = $query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

	$selectforTable1 = "SELECT * FROM `videos` WHERE 1".$limit_num;
	$Tquery = mysqli_query($con,$selectforTable1);

	// without limit
	$selectforTable1_wl = "SELECT * FROM `videos` WHERE 1";
	$Tquery_wl = mysqli_query($con,$selectforTable1_wl);
	$num_row = mysqli_num_rows($Tquery_wl);
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
				<li id="active_style"><a href="#">Videos</a></li>
				<li><a href="admin_mcq_con.php">MCQ</a></li>
				<li><a href="admin_feedback.php">Feedback</a></li>
				<li><a href="#">Profile</a></li>
			</ul>
		</div>
		
		<div class="up_top_body1 col-md-10">
			<h1>Videos controling interface</h1>
			<b><p class="admin_j_000976"><u>Only admin has the right to control</u></p></b>
		<?php  
			
			if (isset($_POST['see_all_vid'])) {
				$limit_num = "";
			}

			if (isset($_POST['Search_user_001'])) {
				$search_key = $_POST['Search_video_val_0023'];
				$search_key2 = $_POST['vid_page_name'];
				$search_key2 = get_pageName_fun($search_key2);

				if ($search_key!='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR `Video_Name` = '$search_key') AND (`PageName`='$search_key2')";
					$selectforTable1_wl = $selectforTable1;
				}
				else if($search_key=='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`PageName`='$search_key2')";
					$selectforTable1_wl = $selectforTable1;
				}
				else if($search_key!='' AND $search_key2=='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR  `Video_Name` = '$search_key')";
					$selectforTable1_wl = $selectforTable1;
				}
				else{
					$selectforTable1 = "SELECT * FROM `videos` WHERE 1 LIMIT 12";
					$selectforTable1_wl = "SELECT * FROM `videos` WHERE 1 ";
				}
				$Tquery = mysqli_query($con,$selectforTable1);

				$Tquery_wl = mysqli_query($con,$selectforTable1_wl);
				$num_row = mysqli_num_rows($Tquery_wl);
			}

		// if display button is called 
			if (isset($_POST['display_btn'])) {
				$search_key = $_POST['Search_video_val_0023'];
				$search_key2 = $_POST['vid_page_name'];
				$search_key2 = get_pageName_fun($search_key2);

				if ($search_key!='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR  `Video_Name` = '$search_key') AND (`PageName`='$search_key2')";
					$selectforTable1_wl = $selectforTable1;
				}
				else if($search_key=='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`PageName`='$search_key2')";
					$selectforTable1_wl = $selectforTable1;
				}
				else if($search_key!='' AND $search_key2=='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR  `Video_Name` = '$search_key')";
					$selectforTable1_wl = $selectforTable1;
				}
				else{
					$selectforTable1 = "SELECT * FROM `videos` WHERE 1 LIMIT 12";
					$selectforTable1_wl = "SELECT * FROM `videos` WHERE 1 ";
				}
				$Tquery = mysqli_query($con,$selectforTable1);

				$Tquery_wl = mysqli_query($con,$selectforTable1_wl);
				$num_row = mysqli_num_rows($Tquery_wl);

					
				$num_of_row_select = 0;
				$selected_rows = array();

				while ($Tres = mysqli_fetch_array($Tquery)) {
					$key_vid_page_001 = $Tres[0];
					$key_vid_page_002 = $Tres[4];
					$check_key_hh1 = $key_vid_page_001."@".$key_vid_page_002;

					if (isset($_POST[$check_key_hh1])) {
						array_push($selected_rows, $check_key_hh1);
						$num_of_row_select = $num_of_row_select + 1;
					}
				}
					

				if ($num_of_row_select==1) {
					$check_selected_key_28 = $selected_rows[0];
					$te_h_array = explode("@", $check_selected_key_28); 

					$select_single_row = "SELECT * FROM `videos` WHERE Serial_no='$te_h_array[0]' AND PageName='$te_h_array[1]'" ;
					$Single_query = mysqli_query($con,$select_single_row);
					

					while ($up_row_info = mysqli_fetch_array($Single_query)) {
						$one_info_to_update[0] = $up_row_info[0];
						$one_info_to_update[1] = $up_row_info[1];
						$one_info_to_update[2] = $up_row_info[2];
						$one_info_to_update[3] = $up_row_info[3];
						$one_info_to_update[4] = $up_row_info[4];
						$one_info_to_update[5] = $up_row_info[5];
					}
					$_SESSION['selected_video_item'] = $one_info_to_update[0].'@'.$one_info_to_update[4];
				}

				else{
					// echo $num_of_row_select;
					?>
						<script type="text/javascript">
							alert("Can't display more than one row");
						</script>
					<?php
				}

				if (isset($_POST['see_all_vid'])) {
				$limit_num = "";
				}

				$search_key = $_POST['Search_video_val_0023'];
				$search_key2 = $_POST['vid_page_name'];
				$search_key2 = get_pageName_fun($search_key2);

				if ($search_key!='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR  `Video_Name` = '$search_key') AND (`PageName`='$search_key2')";
					$selectforTable1_wl = $selectforTable1;
				}
				else if($search_key=='' AND $search_key2!='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`PageName`='$search_key2')";
					$selectforTable1_wl = $selectforTable1;
				}
				else if($search_key!='' AND $search_key2=='Choose') {
					$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR  `Video_Name` = '$search_key')";
					$selectforTable1_wl = $selectforTable1;
				}
				else{
					$selectforTable1 = "SELECT * FROM `videos` WHERE 1".$limit_num;
					$selectforTable1_wl = "SELECT * FROM `videos` WHERE 1 ";
				}
				$Tquery = mysqli_query($con,$selectforTable1);

				$Tquery_wl = mysqli_query($con,$selectforTable1_wl);
				$num_row = mysqli_num_rows($Tquery_wl);

				$selected_video_item = $one_info_to_update[0]."@".$one_info_to_update[4];
			}
		?>

			<!-- video informations -->
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="admin_table_buttons">
				<button type="button" class="select_all_admin btn btn-primary" id="checkall">Select all</button>
				<input type="submit" class="admin_display btn btn-primary" name="display_btn" value="Display">
				<input type="submit"class="admin_delete btn btn-primary" name="Delete_selected_vid" value="Delete">
				<input type="submit" class="ad_vid_refresh_btn btn btn-primary mb-2" name="" value="Refresh">
				<select id="inputState" class="ad_vid_select form-control col-2" name="vid_page_name">
					<option  <?php if($search_key2=="Choose"){?> selected= <?php echo "selected"; } ?> >Choose</option>
					<option <?php if($search_key2=="Basic_python"){?> selected= <?php echo "selected"; } ?> >Basic python</option>
					<option <?php if($search_key2=="Advance_python"){?> selected= <?php echo "selected"; } ?> >Advance python</option>
					<option <?php if($search_key2=="Python_project"){?> selected= <?php echo "selected"; } ?> >Python project</option>
					<option <?php if($search_key2=="ML_project"){?> selected= <?php echo "selected"; } ?> >ML project</option>

				</select>
			    <input type="text" class="search_box form-control" name="Search_video_val_0023" placeholder="search" value="<?php echo $search_key; ?>">
			  	<input type="submit" class="btn btn-primary mb-2" name="Search_user_001" value="Search">
			
			</div>
			
			<div class = "center-div-admin">
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th>Select</th>
								<th width="150px">Serial no</th>
								<th width="350px">Video title</th>
								<th>Link</th>
								<th width="200px">Page name</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								while ($vid_info = mysqli_fetch_array($Tquery)) {

									$key_vid_page_001 = $vid_info[0];
									$key_vid_page_002 = $vid_info[4];
									$checkbox_key = $key_vid_page_001."@".$key_vid_page_002;

									?>
									<tr>
										<td><input type="checkbox" name="<?php echo $checkbox_key; ?>" class="checkhour1" value="<?php echo $checkbox_key; ?>" <?php if ($checkbox_key==$check_selected_key_28) {
											echo "checked"; } ?>> </td>
										<td><?php echo $vid_info[0]; ?></td>
										<td><?php echo $vid_info[1]; ?></td>
										<td><?php echo $vid_info[2]; ?></td>
										<td><?php echo $vid_info[4]; ?></td>
									</tr>
									<?php
								}
							 ?>
						</tbody>
					</table>
					<div class="ad_vid_total">
						<p class="ad_vid_total_p"><?php echo "Total number of video :".$num_row; ?></p>
						<input type="submit" name="see_all_vid" class="btn btn-primary", value="See all">
					</div>
				</div>
			</div>
			

			<!-- Single Video full information -->
			<div class="user_display_div">
				<!-- row 1 -->
				<div class="row">
				    <div class="form-group col-2">
				      <label class="color_white">Serial no.</label>
				      <input type="text" class="form-control" name="input_serial_no" id="input_serial_no" value="<?php echo $one_info_to_update[0] ?>">
				    </div>

				    <div class="form-group col-5">
				      <label class="color_white">Video Title</label>
				      <input type="text" class="form-control" name="input_Video_Name" id="input_Video_Name" value="<?php echo $one_info_to_update[1] ?>">
				    </div>

				    <div class="form-group col-5">
				      <label class="color_white">Code link</label>
				      <input type="text" class="form-control" name="input_Code_link" id="input_Code_link" value="<?php echo $one_info_to_update[3] ?>">
				    </div>
				</div>

				<!-- row 2 -->
				<div class="row">

				    <div class="form-group col-7">
				     	<label class="color_white">Video link (simple youtube url)</label>
				      	<input type="text" class="form-control" name="input_Video_link" id="input_Video_link" value="<?php echo $one_info_to_update[2] ?>" placeholder="https://www.youtube.com/v?kxla8k2r">
				    </div>
				    <div class="form-group col-5">
					    <label for="inputCity" class="color_white">Category</label>
					    <select id="inputState" class="form-control" name="page_Name_002" id="page_Name_002">
					    	<option>Choose</option>
					    	<?php 
					    	$all_VidPage_list = array('Basic_python', "Advance_python", "Python_project","ML_project");

					    	foreach ($all_VidPage_list as $pN_ss) { ?>

					    	<option <?php if($one_info_to_update[4]==$pN_ss){?> selected= <?php echo "selected"; } ?> ><?php echo $pN_ss; ?></option> <?php 
					    	} ?>
					     </select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12">
						<label class="color_white">Video Description</label>
				     	<textarea id="vid_desc" class="form-control" name="vid_desc" placeholder="Description of video" rows="4"><?php echo $one_info_to_update[5]; ?></textarea>
				    </div>
					
				</div>
				<!-- Buttons -->
				<div class="row">
					<div class="form-group col-4">
				     <button type="button" class="admin_clear_btn_1 btn btn-primary" onclick="clear_functionJS()">CLEAR</button>
				    </div>

				    <div class="form-group col-4">
				      <input type="submit" class = "admin_vid_insert_btn btn btn-primary" name="vid_insert" id="" value="INSERT">
				    </div>

				    <div class="form-group col-4">
				      <input type="submit" class="admin_update_btn btn btn-primary" name="update_vid_info" id="" value="UPDATE">
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

	function interest_fun($interest_zip,$option_ch){
		$interest_arr = explode(', ', $interest_zip);

		foreach ($interest_arr as $s_i) {
			if ($option_ch==$s_i) {
				return "Yes";
				break;
			}
		}
	}

	function get_pageName_fun($x){

		$return_val = '';
		if ($x=="Basic python") {
			$return_val = 'Basic_python';
		}
		else if ($x=="Advance python") {
			$return_val = 'Advance_python';
		}
		else if ($x=="Python project") {
			$return_val = 'Python_project';
		}
		else if ($x=="ML project") {
			$return_val = 'ML_project';
		}
		else{
			$return_val = 'Choose';
		}
		return $return_val;
	}

	function is_unique($serial_no,$Page_name,$con){

		$select_vidConform_sql = "SELECT * FROM `videos` WHERE `Serial_no` = '$serial_no' AND `PageName` = '$Page_name'";
		$select_vidConform_query = mysqli_query($con,$select_vidConform_sql);
		$num_row23 = mysqli_num_rows($select_vidConform_query);
		return $num_row23;

	}

	if (isset($_POST['update_vid_info'])){
		$video_primary_key = explode("@",$_SESSION['selected_video_item']);

		$serial_no = $_POST['input_serial_no'];
		$video_name = $_POST['input_Video_Name'];
		$video_link = $_POST['input_Video_link'];
		$code_link = $_POST['input_Code_link'];
		$Page_name = $_POST['page_Name_002'];
		$Video_decsription_up = $_POST['vid_desc'];

		$update_vid_sql = "UPDATE `videos` SET `Serial_no`='$serial_no',`Video_Name`='$video_name',`Link`='$video_link',`Code_link`='$code_link',`PageName`='$Page_name', `Description` = '$Video_decsription_up' WHERE `Serial_no`='$video_primary_key[0]' AND `PageName`='$video_primary_key[1]'";
		$update_vid_query = mysqli_query($con, $update_vid_sql);
		if ($update_vid_query){
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

	if (isset($_POST['vid_insert'])){

		$serial_no = $_POST['input_serial_no'];
		$video_name = $_POST['input_Video_Name'];
		$video_link = $_POST['input_Video_link'];
		$code_link = $_POST['input_Code_link'];
		$Page_name = $_POST['page_Name_002'];
		$Video_decsription_up = $_POST['vid_desc'];
		$is_unique = is_unique($serial_no,$Page_name,$con);

		if ($is_unique==0) {
			$insert_vid_sql = "INSERT INTO `videos` VALUES ('$serial_no', '$video_name', '$video_link', '$code_link', '$Page_name','$Video_decsription_up')";
			$insert_vid_query = mysqli_query($con, $insert_vid_sql);
			if ($insert_vid_query){
				?>
				<script type="text/javascript">
					alert("Video inserted properly");
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

		else{
			?>
			<script type="text/javascript">
				alert("Wrong info!!! Change the serial no. or category");
			</script>
			<?php
		}

	}

	if (isset($_POST['Delete_selected_vid'])){

		$search_key = $_POST['Search_video_val_0023'];
		$search_key2 = $_POST['vid_page_name'];
		$search_key2 = get_pageName_fun($search_key2);

		if ($search_key!='' AND $search_key2!='Choose') {
			$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR  `Video_Name` = '$search_key') AND (`PageName`='$search_key2')";
			$selectforTable1_wl = $selectforTable1;
		}
		else if($search_key=='' AND $search_key2!='Choose') {
			$selectforTable1 = "SELECT * FROM `videos` WHERE (`PageName`='$search_key2')";
			$selectforTable1_wl = $selectforTable1;
		}
		else if($search_key!='' AND $search_key2=='Choose') {
			$selectforTable1 = "SELECT * FROM `videos` WHERE (`Serial_no`='$search_key' OR  `Video_Name` = '$search_key')";
			$selectforTable1_wl = $selectforTable1;
		}
		else{
			$selectforTable1 = "SELECT * FROM `videos` WHERE 1 LIMIT 12";
			$selectforTable1_wl = "SELECT * FROM `videos` WHERE 1 ";
		}
		$Tquery = mysqli_query($con,$selectforTable1);

		$Tquery_wl = mysqli_query($con,$selectforTable1_wl);
		$num_row = mysqli_num_rows($Tquery_wl);

			
		$num_of_row_select = 0;
		$selected_rows = array();

		while ($Tres = mysqli_fetch_array($Tquery)) {
			$key_vid_page_001 = $Tres[0];
			$key_vid_page_002 = $Tres[4];
			$check_key_hh1 = $key_vid_page_001."@".$key_vid_page_002;

			if (isset($_POST[$check_key_hh1])) {
				array_push($selected_rows, $check_key_hh1);
				$num_of_row_select = $num_of_row_select + 1;
			}
		}
			

		for ($i_del=0; $i_del < $num_of_row_select; $i_del++) { 
			$temp_del_primary_key = explode('@',$selected_rows[$i_del]);

			$del_vid_sql = "DELETE FROM `videos` WHERE `Serial_no`='$temp_del_primary_key[0]' AND `PageName`='$temp_del_primary_key[1]'";
			$del_vid_query = mysqli_query($con, $del_vid_sql);
		}

		?>
		<script type="text/javascript">
			alert("Delete successfully");
		</script>
		<?php

		echo '<META HTTP-EQUIV="Refresh" content="0">';

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