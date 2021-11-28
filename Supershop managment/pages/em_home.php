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
	$c_id = $res['C_id'];

	$cur_date = date('yy-m-d');
	$em_home_query = "SELECT `Quantity`, `Total_Cost` FROM `sells_record` WHERE `Date`='$cur_date' and C_id='$c_id'";
	$query1 = mysqli_query($con,$em_home_query);
	

?>

	<div id="em_frist_m_div" class="row">

		<div class="em-leftSide-div col-2">
			<div class="em_logo_div">
				<img src="../images/logoc.png">
				<p>Ideal Super Shop</p>
			</div>

			<div class="em_sidebar_div">
				<ul id="em_menu">
					<li id="bd-left"><a href="">Home</a></li>
					<li ><a href="em_Record.php">Record Book</a></li>
					<li><a href="em_saleBook.php">Sell Book</a></li>
					<li><a href="em_stockBook.php">Stocks</a></li>
					<li><a href="em_profile.php">Profile</a></li>
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
				<h2 class = "em_heading_1"> Your today's sales and purchase record</h2>
				<div class="em_show_div1 row">
					<div class="em_showbox1 row">
						<div class="col-md-7">
							<h3> Sells item </h3>
							<p>
								<?php 
								$pur_item = 0;
								$pur_money = 0;
								while ($res1 = mysqli_fetch_array($query1)) {
									$pur_item = $pur_item + intval($res1[0]);
									$pur_money = $pur_money + intval($res1[1]);
								}
								echo $pur_item."Pieces";
							 	?>
							</p>
						</div>
						<div class="col-md-5">
							<img src="../images/sale_item.png">
						</div>
					</div>
					<div class="em_showbox2 row">
						<div class="col-md-7">
							<h3>Purchasses</h3>
							<p><?php echo $pur_money."$"; ?></p>
						</div>

						<div class="col-md-5">
							<img src="../images/pur_money.png">
						</div>
					</div>
					<div class="em_showbox3">
						<h3> Your Performance </h3>
						<p><?php 
						$randomNumber = rand(30,90);
						echo $randomNumber."%";
						?></p>
					</div>
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