<?php 
	session_start();
	$interest = array();
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
	<div id="signup_div" class="grad2">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" 
		id="#top">
		<img src="../images/1200px-Python-logo-notext.svg.png" class="logo_class" alt="" />
		  <abbr title="HSTU Python Learners"><a class="navbar-brand font1 title_pad" href="#top">Code Learners</a></abbr>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="pad130 navbar-collapse" id="navbarSupportedContent">
			<ul class=" navbar-nav mr-auto">
			  
			  <li class="nav-item">
				<a class="nav-link font2" href="frist.php" tabindex="-1">Login</a>
			  </li>
			  <li class="nav-item active">
				<a class="mar30 nav-link font2" href="#" tabindex="-1">Register</a>
			  </li>
			</ul>
		  </div>
		</nav>
		
		<div class="container-fluid row">
			<div class="signup_col col-6">
			<!--  write your code for signup form here bellow:  -->
			<h2 class="Sign_up_heading">Create account for free</h2>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype='multipart/form-data'>
			<div class="row"> 
				<div class="sign_pad form-group col-md-6">
					<label class = "color_white" for="u_name">Frist name</label>
					<input type="text" class="form-control" id="u_name" name="fname" placeholder="Enter frist name ">
				</div>
				<div class="form-group col-md-6">
					<label class = "color_white" for="u_f_name">Last name</label>
					<input type="text" class="form-control" id="u_f_name" name="lname" placeholder="Enter last name ">
				</div>
			</div>
			
			<div class="row"> 
				<div class="sign_pad form-group col-md-6">
					  <label class = "color_white" for="u_email">Email</label>
					  <input type="email" class="form-control" id="u_email" name="email" placeholder="xyz@gmail.com">
				</div>
				
				<div class="form-group col-md-6">
				  <label class = "color_white" for="inputState">Profession</label>
				  <select id="inputState" class="form-control" name="profession">
					<option selected>Choose</option>
					<option>Student</option>
					<option>Teacher</option>
					<option>Trainer</option>
					<option>Employee</option>
					<option>Others</option>
				  </select>
				</div>
			</div>
			
			<div class="row">
				<div class="sign_pad form-group col-md-6">
					<label class="color_white" for="u_contact">Contact no.</label>
					<input type="text" class="form-control" id="u_contact" name="phone" placeholder="01719........">
				</div>
				
				<div class="form-group col-md-6">
				  <label class = "color_white" for="inputState">District</label>
				  <select id="inputState" class="form-control" name="district">
					<option selected>Choose</option>
					<option>Dhaka</option>
					<option>Rajshahi</option>
					<option>Khulna</option>
					<option>Dinajpur</option>
					<option>Chittagong</option>
					<option>Barishal</option>
					<option>Rangpur</option>
					<option>Joypurhat</option>
					<option>Mymensing</option>
				  </select>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-6">
				  <fieldset class="sign_pad form-group row ">
					<div class="row">
					  <legend class="color_white sign_radio">Your Gender</legend>
					  
					  <div class="sign_radio io row">
						<div class="sign_radio form-check">
						  <input class="form-check-input" type="radio" name="gender_radio" id="gridRadios1" value="male" checked>
						  <label class="color_white form-check-label" for="gridRadios1">
							Male
						  </label>
						</div>
						<div class="sign_radio form-check">
						  <input class="form-check-input" type="radio" name="gender_radio" id="gridRadios2" value="female">
						  <label class="color_white form-check-label" for="gridRadios2">
							Female
						  </label>
						</div>
					  </div>
					</div>
				  </fieldset>
				</div>
				
				<div class="form-group col-md-6">
				  <fieldset class="sign_pad form-group row ">
					<div class="row">
					  <legend class="color_white sign_radio">Interested in</legend>
					  
					  <div class="sign_radio row">
						<div class="col-sm-12">
						  <div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck1" name="in_1" value="Web Development" >
							<label class="color_white form-check-label" for="gridCheck1">
							  Web Development
							</label>
						  </div>
						</div>
						<div class="col-sm-12">
						  <div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck2" name="in_2" value="Game Development">
							<label class="color_white form-check-label" for="gridCheck2">
								Game Development
							</label>
						  </div>
						</div>
						
						<div class="col-sm-12">
						  <div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck3" name="in_3" value="Mechine Learning">
							<label class="color_white form-check-label" for="gridCheck3">
							  Machine Learning
							</label>
						  </div>
						</div>
						
						<div class="col-sm-12">
						  <div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck4" name="in_4" value="Aritficial Inteligence">
							<label class="color_white form-check-label" for="gridCheck4">
							  Aritficial Inteligence
							</label>
						  </div>
						</div>
					  </div>
					</div>
				  </fieldset>
				</div>
			</div>
			
			<div class="row">
				<div class="sign_pad check_show_pass form-group">
				<label for="exampleFormControlFile1">Choose your image</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
				</div>
			</div>
			<div class="row">
				<div class="sign_pad form-group col-md-6">
					<label class="color_white" for="u_password2" >Password</label>
					<input type="password" class="form-control" id="u_password1" name="password1" placeholder="********">
				</div>
				
				<div class="form-group col-md-6">
					<label class="color_white" for="u_password1" >Conform Password</label>
					<input type="password" class="form-control" id="u_password2" name="password2" placeholder="********">
				</div>
			</div>
			
				<div class="col-sm-12">
				  	<div class="form-check">
						<input class="sign_pad form-check-input" type="checkbox" id="gridCheck5" onclick="show_pass()">
						<label class="check_show_pass form-check-label" for="gridCheck5">
						  show password
						</label>
					</div>
				</div>
			
				<div class="form-group row">
				    <input type="submit" class="sign_btn_pad btn btn-primary" name="register" value="Register"></input>
				</div>
			</form>
			</div>
			<div class="our_col col-6">
				<img src="../images/Untdditled-1.png" class="signin_box1" alt="" />
				
			</div>
		</div>
	</div>
	
	<!-- Footer div -->
	<footer>
	
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
	include 'connections.php';
	if (isset($_POST['register'])) {

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$profession = $_POST['profession'];
		$phone = $_POST['phone'];
		$district = $_POST['district'];
		$gender = $_POST['gender_radio'];

		$interest = array();
		if (isset($_POST['in_1'])) {
			array_push($interest, "Web Development");
		}

		if (isset($_POST['in_2'])) {
			array_push($interest, "Game Development");
		}

		if (isset($_POST['in_3'])) {
			array_push($interest, "Mechine Learning");
		}

		if (isset($_POST['in_4'])) {
			array_push($interest, "Artificial Inteligence");
		}
		
		$interest_s = implode(", ", $interest);
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$u_image = $_FILES['file']['name'];
	    $target_dir = "upload/";
	    $target_file = $target_dir.basename($_FILES["file"]["name"]);
	    // Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		  // Valid file extensions
		$extensions_arr = array("jpg","jpeg","png","gif");

		$check_unique_mail_sql  = "SELECT Email FROM user_account WHERE Email='$email'";
		$check_unique_mail_query = mysqli_query($con,$check_unique_mail_sql);
		$check_unique_mail_row = mysqli_num_rows($check_unique_mail_query);

		if ($check_unique_mail_row>0) {
			?>
			<script type="text/javascript">
				alert("This Email is already registered. Use another email");
			</script>
			<?php
		}

		else{
			if ($password1==$password2){
				if( in_array($imageFileType,$extensions_arr) ){
			    $regQuery = "INSERT INTO `user_account` (`FirstName`, `LastName`, `Email`, `Phone`, `Profession`, `Address`, `Gender`, `Interest`, `Image`, `Password`,Notification,Role) VALUES ('$fname', '$lname', '$email', '$phone', '$profession', '$district', '$gender', '$interest_s', '".$u_image."', '$password1','Yes','User')";

			    $res = mysqli_query($con,$regQuery);
			  
			    // Upload file
			    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$u_image);

			    if($res){
				?>
				<script type="text/javascript">
					alert("Successfully registered");
				</script>
				<?php
				}

			    else{
				?>
				<script type="text/javascript">
					alert("Fill up all requirements");
				</script>
				<?php
				}

			  }
			}
			else{
				?>
				<script type="text/javascript">
					alert("Enter Same password");
				</script>
				<?php
			}
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



