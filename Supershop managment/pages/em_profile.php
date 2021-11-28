<?php 
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Ideal Super Shop</title>
	<?php include 'tlinks.php' ?>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$('#time').load('time.php')
			}, 1000);
		});
	</script>

	
</head>
<body>
<?php 

	include '../connections.php';
	$u_d = $_SESSION['user_id'];
	$SelectQuery = "SELECT * FROM counter WHERE C_id='$u_d'";
	$query = mysqli_query($con,$SelectQuery);
	$res = mysqli_fetch_array($query);

?>

	<div id="em_frist_m_div" class="row">

		<div class="em-leftSide-div col-2">
			<div class="em_logo_div">
				<img src="../images/logoc.png">
				<p>Ideal Super Shop</p>
			</div>

			<div class="em_sidebar_div">
				<ul id="em_menu">
					<li ><a href="em_home.php">Home</a></li>
					<li ><a href="em_Record.php">Record Book</a></li>
					<li><a href="em_saleBook.php">Sell Book</a></li>
					<li><a href="em_stockBook.php">Stocks</a></li>
					<li id="bd-left"><a href="">Profile</a></li>
				</ul>
			</div>
		</div>

		<div class="em-rightSide-div col-10">

			<div class="em_title_div">
				<h3>Ideal Super Shop | Kalighat</h3>
				<a href="../index.php"><img src="../images/logout.png"></a>
			</div>

			<div class="em_intro_div row">
					<div class="intro_p txt_right col-2">
						<p>Welcome: </p>
						<p>Role: </p>
					</div>
					<div class="intro_p txt_left  col-6">
						<p><?php echo $res['Employee_Name'] ?></p>
						<p>Employee</p>
					</div>
					<div class="watch_wrapper col-4">
						<div id="digital_watch">
							00:00:00 PM
						</div>
					</div>
			</div>

			<div class="em_mainBody_div">
				<h2 class = "em_RecordBook_head_1">My Profile</h2>
				
				<div class="em_pro_frist_div row">
				<div class="Em_profile_div col-md-8 row container-fluid">
					<div class = "em_pro_Attribute txt_right col-md-6">
						<p>Employee name:</p>
						<p>Counter id:</p>
						<p>Password:</p>
						<p>Salary:</p>

					</div>
					<div class = "em_pro_value txt_left col-md-6">
						<p><?php echo $res[1]; ?></p>
						<p><?php echo $res[0]; ?></p>
						<p><?php echo $res[2]; ?></p>
						<p><?php echo $res[3]." $"; ?></p>
					</div>
				</div>

				<div class="col-md-1">
					<input type="submit" name="Em_info_edit" class="em_edit_btn btn btn-primary" value="Edit" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
				</div> 


				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">You can change your info</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							
							  <div class="form-group">
								<label for="recipient-name" class="col-form-label">Your Name</label>
								<input type="text" class="form-control" name="em_name_change" id="recipient-email" value="<?php echo $res[1]; ?>">
							  </div>
							  <div class="form-group">
								<label for="message-text" class="col-form-label">Password</label>
								<input type="text" class="form-control" name="em_pass_change" id="recipient-phone" value="<?php echo $res[2]; ?>">
							  </div>
							
						  </div>
						  <div class="modal-footer">
							<input type="submit" class="btn btn-primary" name="em_update" value="Submit"></input>
						  </div>
						</div>
					  </div>
					</div>
					</form>

<!-- ###################### tpggle form finished ? -->
				</div>
			</div>
			
		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#digital_watch').load("time.php")
			},1000);
		});
	</script>
</body>
</html>

<?php 
	include "../connections.php";
	if (isset($_POST['em_update'])) {
		$name = $_POST['em_name_change'];
		$pass = $_POST['em_pass_change'];
		// echo "Na = ".$name." pass= ".$pass." id=".$res[0];
		$update_em = "UPDATE counter SET Employee_Name = '$name', Password = '$pass' WHERE C_id = '$res[0]'";
		$query2 = mysqli_query($con,$update_em);

		if ($query2) {
			?>
			<script type="text/javascript">
				alert("Data uptaded succesfully");
			</script>
			<?php
			echo '<META HTTP-EQUIV="Refresh" content="0">';
		}
		else{
			?>
			<script type="text/javascript">
				alert("Opssss!!! Data did not uptaded succesfully");
			</script>
			<?php
		}
	}
?>