<?php 
	session_start();
	error_reporting(0); 
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

if(isset($_POST['user_login'])){

	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_pass'];
	
	if ($user_email=='' or $user_pass=='') {
			
		?>
		<script type="text/javascript">
			alert("Please enter email and password");
		</script>
		<?php 
	}
	else{
		$SelectQuery = "SELECT * FROM user_account WHERE Email='$user_email'";
		$query = mysqli_query($con,$SelectQuery);
		$res = mysqli_fetch_array($query);

		if ($res['Password']==$user_pass and $res['Email']==$user_email) {
			$_SESSION['user_phone'] = $res['Phone'];
			header("Location: home.php");
			exit();
		}
		else{
			?>
				<script type="text/javascript">
					alert("Invalid user id or password!!!\nPlease register");
				</script>
			<?php
		}
	}
}


?>

	<div id="Login_div" class="grad1">	
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" 
		id="#top">
		<img src="../images/1200px-Python-logo-notext.svg.png" class="logo_class" alt="" />
		  <abbr title="HSTU Python Learners"><a class="navbar-brand font1 title_pad" href="#top">Code Learners</a></abbr>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="pad130 navbar-collapse" id="navbarSupportedContent">
			<ul class=" navbar-nav mr-auto ">
			  
			  <li class="nav-item active">
				<a class="nav-link font2" href="#" tabindex="-1">Login</a>
			  </li>
			  <li class="nav-item">
				<a class="mar30 nav-link font2" href="signup.php" tabindex="-1">Register</a>
			  </li>
			</ul>
		  </div>
		</nav>
		
		<div class="container-fluid row">
			<div class="login_col col-6">
			<h2 class="login_heading">Please Login to visit our site</h2>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="marleft form-group col-md-6">
					  <label class = "color_white" for="inputEmail4">Email</label>
					  <input type="email" class="form-control" id="inputEmail4" name="user_email" placeholder="xyz@gmail.com">
					</div>
					<div class="marleft form-group col-md-6">
						<label class="color_white" for="inputPassword4">Password</label>
						<input type="password" class="form-control" id="inputPassword4" name="user_pass" placeholder="********">
					</div>
				  <div class="marleft form-group">
					<div class="form-check">
					  <input type="checkbox" class="form-check-input" id="Checkme_out" onclick="login_show()">
					  <label class="color_white form-check-label" for="Checkme_out">
						Show password
					  </label>
					</div>
				  </div>
				  <input type="submit" class="login_btn btn btn-primary" name="user_login" value="Login"></input> 
				  
				  <button type="button" class="login_btn btn btn-primary" onclick="clear_login()">Clear</button>
				</form>
				
				<div class="row"> 
					<div class="visit_link col-md-4">
						<a href="../index.php">View as visitor</a>
					</div>
				
				<div class="forgot_btn col-md-4">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Forgot password?</button>
				</div>
				
				</div>

				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Fill up requirements to recover password</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						
						  <div class="form-group">
							<label for="recipient-name" class="col-form-label">Your Email</label>
							<input type="text" class="form-control" id="recipient-email" name="forgot_email">
						  </div>
						  <div class="form-group">
							<label for="message-text" class="col-form-label">Contact no.</label>
							<input type="text" class="form-control" id="recipient-phone" name="forgot_phone">
						  </div>
						
					  </div>
					  <div class="modal-footer">
						<input type="submit" class="btn btn-primary" name = "forgot_submit" value="Submit"></input>
					  </div>
					</div>
				  </div>
				</div>
				</form>
				
				<p>Haven't registered yet??<br/>
				Register for free <a href="signup.php">Sign Up</a></p>
			</div>
			<div class="our_col col-6">
				<img src="../images/Untdditled-1.png" class="login_box1" alt="" />
				
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


	if (isset($_POST['forgot_submit'])) {
		$forgot_email = $_POST['forgot_email'];
		$forgot_phone = $_POST['forgot_phone'];

		$forgot_sql = "SELECT FristName,LastName,Password FROM user_account WHERE `user_account`.`Email` = '$forgot_email' AND `user_account`.`Phone` = '$forgot_phone'";

		$forgot_query = mysqli_query($con, $forgot_sql);
		if ($forgot_query) {

			$resforgot = mysqli_fetch_array($forgot_query);
			
			$to_email = $forgot_email;
			$subject = "Simple Email Test via PHP";
			$body = "Your password in HPyLearne@rs.org : '".$resforgot[2]."'";
			$headers = "From: Password recovery";

			if (mail($to_email, $subject, $body, $headers)) {
				?>
				<script type="text/javascript">
					alert("Password has been sent to your Gmail");
				</script>
				<?php
				echo '<META HTTP-EQUIV="Refresh" content="0">';
			} else {
			?>
			<script type="text/javascript">
				alert("Failed to send mail");
			</script>
			<?php
			}


		}
		else{
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
?>


<!-- online IDE 
repl: https://repl.it/languages/python3
trinket: https://trinket.io/
codechef: https://www.codechef.com/ide
geeksforgeeks: https://ide.geeksforgeeks.org/
ideone: https://ideone.com/
onlinegdb: https://www.onlinegdb.com/online_c_co...
tp: https://www.tutorialspoint.com/coding...
paiza: https://paiza.io/en/


	<iframe height="400px" width="100%" src="https://repl.it/@shourov40/StingyVariableLanserver?lite=true" scrolling="no" frameborder="no" allowtransparency="true" allowfullscreen="true" sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-modals"></iframe>


	<iframe src="https://trinket.io/embed/python/4cf72b0da3" width="100%" height="600" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe> 

	-->
