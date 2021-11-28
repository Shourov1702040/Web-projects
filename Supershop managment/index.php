<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ideal Super Shop</title>
	<?php include 'tlinks.php'; ?>
</head>
<body>

<?php 

include 'connections.php';

if(isset($_POST['login'])){

	$role = $_POST['radio_but'];
	$user_id = $_POST['user_id'];
	$pass = $_POST['password1'];
	// echo "Manee is = {$user_id}  pass = {$pass} <br> <br>";
	
	if ($user_id=='' or $pass=='') {
			
			?>
			<script type="text/javascript">
				alert("Invalid user id or password!!!");
			</script>
		<?php 
	}
	else{
		if ($role=="employee") {
			$SelectQuery = "SELECT * FROM counter WHERE C_id='$user_id'";
			$query = mysqli_query($con,$SelectQuery);
			$res = mysqli_fetch_array($query);
			// echo $res['Password']."<br>";
			// echo $res['C_id']."<br>";
			if ($res['Password']==$pass) {

				$_SESSION['user_id'] = $user_id;
				header("Location: pages/em_home.php");
				exit();

			}
			else{
				?>
					<script type="text/javascript">
						alert("Invalid user id or password!!!");
					</script>
				<?php
			}
		}
		else{
			if ($user_id=="admin" and $pass=="admin") {
				header("Location: pages/admin_home.php");
				exit();

			}
			else{
				?>
					<script type="text/javascript">
						alert("Invalid user id or password!!!");
					</script>
				<?php
			}
		}
	}
}


?>

	<div id="login-back">
		<h1>Ideal Super Shop</h1>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="login-wrapper row">
			<h3>Login Form</h3>
			<div class="log_check_div col-md-5">

				<fieldset class="sign_pad form-group">
					<div class="row">
					  <legend class="color_white">Your Role</legend>
					  
					  <div class="sign_radio io row">
						<div class="sign_radio form-check col-6">
						  <input class="form-check-input" type="radio" name="radio_but" id="gridRadios1" value="admin">
						  <label class="color_white form-check-label" for="gridRadios1">
							Admin
						  </label>
						</div>
						<div class="sign_radio form-check col-6">
						  <input class="form-check-input" type="radio" name="radio_but" id="gridRadios2" value="employee" checked>
						  <label class="color_white form-check-label" for="gridRadios2">
							Employee
						  </label>
						</div>
					  </div>
					</div>
				  </fieldset>
			</div>

			<div class="log_form_div col-md-7">
				
					<div class="form-group col-md-9">
					  <label class = "color_white" for="user_id">User id</label>
					  <input type="text" class="form-control" id="user_id" name="user_id" placeholder="your id">
					</div>
					<div class="form-group col-md-9">
						<label class="color_white" for="password1">Password</label>
						<input type="password" class="form-control" id="password1" name="password1" placeholder="********">
					</div>
				  <div class="form-group col-md-8">
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" id="Checkme_out" onclick="show_pass()">
					  <label class="color_white form-check-label" for="Checkme_out">
						Show password
					  </label>
					</div>
				  </div>
				  <input type="submit" name="login" value="Login" class="login_btn btn btn-primary col-3"><a href="<?php echo $user_id; ?>"></a></input> 
				  
				  <input type="button" value="Clear" class="mar-left login_btn btn btn-primary col-3" onclick="clear_login()"></input>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

