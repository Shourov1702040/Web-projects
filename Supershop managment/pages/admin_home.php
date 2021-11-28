<?php 
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Ideal Super Shop</title>
	<?php include 'tlinks.php' ?>
</head>
<body>
<?php 

	include '../connections.php';

	$cur_date = date('yy-m-d');
	$em_home_query = "SELECT `Quantity`, `Total_Cost` FROM `sells_record` WHERE `Date`='$cur_date'";
	$query = mysqli_query($con,$em_home_query);

	$profit = 0;
	
?>

	<div id="em_frist_m_div" class="row">

		<div class="em-leftSide-div col-2">
			<div class="em_logo_div">
				<img src="../images/logoc.png">
				<p>Ideal Super Shop</p>
			</div>

			<div class="em_sidebar_div">
				<ul id="em_menu" class="sticky-top">
					<li id="bd-left"><a href="">Home</a></li>
					<li ><a href="Admin_sales_record.php">Record Book</a></li>
					<li><a href="ad_products.php">Products</a></li>
					<li><a href="admin_supplier.php">Suppliers</a></li>
					<li><a href="admin_employee.php">Employees</a></li>
					<li><a href="admin_find.php">Finding</a></li>
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
						<p>Manager</p>
						<p>Admin</p>
					</div>
					<div class="watch_wrapper col-4">
						<div id="digital_watch">
							00:00:00 PM
						</div>
					</div>

			</div>

			<div class="em_mainBody_div">
				<h2 class = "em_heading_1">Total Sales phase till now</h2>
				<div class="em_show_div1 row">
					<div class="em_showbox1 row">
						<div class="col-md-7">
							<h3> Sells item </h3>
							<p>
								<?php 
								$pur_item = 0;
								$pur_money = 0;
								while ($res = mysqli_fetch_array($query)) {
									$pur_item = $pur_item + intval($res[0]);
									$pur_money = $pur_money + intval($res[1]);
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
						<h3>Todays business</h3>
						<p><?php 
						$randomNumber = rand(30,90);
						echo $randomNumber."%";
						?></p>
					</div>
				</div>


				<?php 

					// Showing profit part
					if (isset($_POST['Show_profit_s'])) {
						$option = $_POST['radio_but'];

						if ($option=='01') {
							$get_profit_sql = "SELECT Quantity, Price, Acc_rate FROM sells_record AS s JOIN products AS p ON s.P_id = p.P_id AND s.`Date`='$cur_date'";
							$get_profit_query = mysqli_query($con,$get_profit_sql);

							$profit = 0;
							
							while ($get_profit = mysqli_fetch_array($get_profit_query)) {
								$row_profit = intval($get_profit[0]) * (intval($get_profit[1]) - intval($get_profit[2]));
								$profit = $profit + $row_profit;
								
							}
							
						  ?>
							<script type="text/javascript">
								  alert("<?php echo "Profit = ".$profit." $"; ?>")
							</script>

						  <?php
						}


						if ($option=='02') {
							$single_date = $_POST['single_date'];

							$get_profit_sql = "SELECT Quantity, Price, Acc_rate FROM sells_record AS s JOIN products AS p ON s.P_id = p.P_id AND s.`Date`='$single_date'";
							$get_profit_query = mysqli_query($con,$get_profit_sql);

							$profit = 0;
							while ($get_profit = mysqli_fetch_array($get_profit_query)) {
								$row_profit = intval($get_profit[0]) * (intval($get_profit[1]) - intval($get_profit[2]));
								$profit = $profit + $row_profit;
								
							}
							
						  ?>
							<script type="text/javascript">
								  alert("<?php echo "Profit = ".$profit." $"; ?>")
							</script>

						  <?php
						}


						if ($option=='03') {
							$date1 = $_POST['date1'];
							$date2 = $_POST['date2'];

							$get_profit_sql = "SELECT Quantity, Price, Acc_rate FROM sells_record AS s JOIN products AS p ON s.P_id = p.P_id AND s.`Date` BETWEEN '$date1' AND '$date2'";
							$get_profit_query = mysqli_query($con,$get_profit_sql);

							$profit = 0;
							while ($get_profit = mysqli_fetch_array($get_profit_query)) {
								$row_profit = intval($get_profit[0]) * (intval($get_profit[1]) - intval($get_profit[2]));
								$profit = $profit + $row_profit;
								
							}
							
						  ?>
							<script type="text/javascript">
								  alert("<?php echo "Profit = ".$profit." $"; ?>")
							</script>

						  <?php
						}


					}

				?>


				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
				<div class="show_profit row">
					<div class="col-md-3 row">
						
						<div class="sign_radio form-check col-md-7">
						  <input class="form-check-input" type="radio" name="radio_but" id="gridRadios1" value="01" checked>
						  <label class="form-check-label" for="gridRadios1">
							Today
						  </label>

						</div>

						<div class="sign_radio form-check col-md-7">
						  <input class="form-check-input" type="radio" name="radio_but" id="gridRadios2" value="02">
						  <label class="form-check-label" for="gridRadios2">
							Choose date
						  </label>
						  
						</div>

						<div class="sign_radio form-check col-md-7">
						  <input class="form-check-input" type="radio" name="radio_but" id="gridRadios3" value="03" >
						  <label class="form-check-label" for="gridRadios3">
							Duration
						  </label>
						  
						</div>
					  	
					</div>
					<div class="col-md-5">
						<div class="row">
							<input type="text" class="eminput_border date_in1 form-control" name="single_date" id="datepick1" value="">
						</div>
						<div class="row">
							<input type="text" class="eminput_border date_in2 form-control" name="date1"  id="datepick2" value=""> 
							<p class="date_p10001">To</p>
						 	<input type="text" class="eminput_border date_in3 form-control" name="date2" id="datepick3" value="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<input type="submit"  name = "" class="profit-calculation btn btn-primary" value="Refresh"></input>
						</div>
						<div class="row">
							<input type="submit"  name = "Show_profit_s" class="show_profit_btn btn btn-primary" value="Show Profit"></input>
						</div>
					</div>
				</div>
				</form>

			</div>
			
		</div>

	</div>

	<script>
		$(function () {
		$("#datepick1").datepicker({
               dateFormat:"yy-mm-dd"
            });
		});

		$(function () {
		$("#datepick2").datepicker({
               dateFormat:"yy-mm-dd"
            });
		});
		$(function () {
		$("#datepick3").datepicker({
               dateFormat:"yy-mm-dd"
            });
		});
	</script>


	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#digital_watch').load("time.php")
			},1000);
		});
	</script>
</body>
</html>