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
					<li id="bd-left"><a href="#">Stocks</a></li>
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
				<h2 class = "em_RecordBook_head_1"><u>Items in Stock</u></h2>
				<div class="prod_table_title">
					<h4>All products record</h4>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-inline">
						<input type="submit" class="refresh_btn btn btn-primary mb-2" name="" value="Refresh"></input>
					  <div class="form-group mx-sm-3 mb-2">
					    <input type="text" class="eminput_border form-control" name="Em_search_key" placeholder="search">
					  </div>
					  <input type="submit" class="btn btn-primary mb-2" name="Em_search" value="Search"></input>
					</form>
				</div>

				<div class = "center-div">
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>Product id</th>
									<th>Catalog id</th>
									<th>Category</th>
									<th>In Stock</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								include '../connections.php';
								$selectforTable='';

								if (isset($_POST['Em_search'])) {
									$search_key = $_POST['Em_search_key'];
									$selectforTable = "
									SELECT products.P_id, products.Cata_id, products.Stock, products.Price,catalog.Category
									FROM products, catalog
									WHERE (products.Cata_id = catalog.Cata_id) AND catalog.Category='$search_key'";
								}

								else{
									$selectforTable = "
									SELECT products.P_id, products.Cata_id, products.Stock, products.Price,catalog.Category
									FROM products, catalog
									WHERE products.Cata_id = catalog.Cata_id";
								}

								$Tquery = mysqli_query($con,$selectforTable);
								$num_row = mysqli_num_rows($Tquery);
								// print($num_row);

								while ($Tres = mysqli_fetch_array($Tquery)) { ?>
									<tr>
										<td><?php echo $Tres[0]; ?></td>
										<td><?php echo $Tres[1]; ?></td>
										<td><?php echo $Tres[4]; ?></td>
										<td><?php echo $Tres[2]; ?></td>
										<td><?php echo $Tres[3]."$"; ?></td>
									</tr>
								<?php } 
								?>
							</tbody>
						</table>
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

<?php 



?>