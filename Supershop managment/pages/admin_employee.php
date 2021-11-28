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
	$checked_ck = '';
	$search_key = '';
	$one_info_to_update = array("","","","");

	$cur_date = date('yy-m-d');
	include '../connections.php';
	$selectforTable = "SELECT c.C_id, c.Employee_Name, c.Password, c.Salary, SUM(s.Quantity), SUM(s.Total_Cost) FROM counter AS c, sells_record AS s WHERE s.`Date` = '$cur_date' AND s.C_id = c.C_id GROUP BY s.C_id";

	$Tquery = mysqli_query($con,$selectforTable);
	$num_row = mysqli_num_rows($Tquery);
?>

	<div id="em_frist_m_div" class="row">

		<div class="em-leftSide-div col-2">
			<div class="em_logo_div">
				<img src="../images/logoc.png">
				<p>Ideal Super Shop</p>
			</div>

			<div class="em_sidebar_div">
				<ul id="em_menu">
					<li ><a href="admin_home.php">Home</a></li>
					<li ><a href="Admin_sales_record.php">Record Book</a></li>
					<li><a href="ad_products.php">Products</a></li>
					<li ><a href="admin_supplier.php">Suppliers</a></li>
					<li id="bd-left"><a href="admin_employee.php">Employees</a></li>
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

			<?php 

				if (isset($_POST['Em_search'])) {
					$search_key = $_POST['Em_search_key'];
					$selectforTable1 = "SELECT c.C_id, c.Employee_Name, c.Password, c.Salary, SUM(s.Quantity), SUM(s.Total_Cost) FROM counter AS c, sells_record AS s WHERE s.`Date` = '$search_key' AND s.C_id = c.C_id GROUP BY s.C_id";
					$Tquery = mysqli_query($con,$selectforTable1);
					$num_row = mysqli_num_rows($Tquery);
				}

				if (isset($_POST['ad_update_check'])) {
					
					$num_of_row_select = 0;
					$selected_rows = array();

					while ($Tres = mysqli_fetch_array($Tquery)) {
						if (isset($_POST[$Tres[0]])) {
							array_push($selected_rows, $_POST[$Tres[0]]);
							$num_of_row_select = $num_of_row_select + 1;
						}
					}

					if ($num_of_row_select==1) {
						$checked_ck = $selected_rows[0];
						// $_SESSION['supplier_contact_to_update'] = $checked_ck;
;

						$select_single_row = "
						SELECT c.C_id, c.Employee_Name, c.Password, c.Salary, SUM(s.Total_Cost) FROM counter AS c, sells_record AS s WHERE c.C_id='$checked_ck'";
						$Single_query = mysqli_query($con,$select_single_row);
						

						while ($up_row_info = mysqli_fetch_array($Single_query)) {

							// $_SESSION['supllier_in_products_name'] = $up_row_info[1];
							// $_SESSION['supllier_in_suppliers_id'] = $up_row_info[0];

							$one_info_to_update[0] = $up_row_info[0];
							$one_info_to_update[1] = $up_row_info[1];
							$one_info_to_update[2] = $up_row_info[2];
							$one_info_to_update[3] = $up_row_info[3];

						}

						
					}



					else{
						?>
							<script type="text/javascript">
								alert("Select only one row to update");
							</script>
						<?php
					}


					$search_key = $_POST['Em_search_key'];
					if ($search_key!='') {
						$selectforTable2 = "
						SELECT c.C_id, c.Employee_Name, c.Password, c.Salary, SUM(s.Quantity), SUM(s.Total_Cost) FROM counter AS c, sells_record AS s WHERE s.`Date` = '$search_key' AND s.C_id = c.C_id GROUP BY s.C_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					else{
						$selectforTable2 = "SELECT c.C_id, c.Employee_Name, c.Password, c.Salary, SUM(s.Quantity), SUM(s.Total_Cost) FROM counter AS c, sells_record AS s WHERE s.`Date` = '$cur_date' AND s.C_id = c.C_id GROUP BY s.C_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}


					
				}


				if (isset($_POST['update'])) {

					
					$up_P_id = $_POST['p_id1'];
					$up_quantity = $_POST['p_quan'];
					$up_cost = $_POST['p_t_cost'];

					$seria_date = array();
					foreach ($_SESSION['ad_up100001'] as $sdfff) {
						array_push($seria_date, $sdfff);
					}
					

					// echo $seria_date[0]."_______> ".$seria_date[1];
					// $one_info_to_update[]
					
					$ad_up_sql = "UPDATE `sells_record` SET `P_id` = '$up_P_id', `Quantity` = '$up_quantity', `Total_Cost` = '$up_cost' WHERE `sells_record`.`Date` = '$seria_date[0]' AND `sells_record`.`Serial_no` = '$seria_date[1]'";

					$ad_up_query = mysqli_query($con,$ad_up_sql);

					if ($ad_up_query) {
						?>
							<script type="text/javascript">
								alert("Updated successfully");
							</script>
						<?php
					}
					else{
						?>
							<script type="text/javascript">
								alert("Update failed");
							</script>
						<?php
					}
					
					echo '<META HTTP-EQUIV="Refresh" content="0">';

				}

			 ?>


			
			<div class="em_mainBody_div">
				<h2 class = "em_RecordBook_head_1"><u>Counter information</u></h2>
				 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-inline">
				<div class="sell_table_title">
						
						<input type="submit" class="ad_em_display_btn btn btn-primary" name="ad_update_check" value="Display">
						<input type="submit" class="adrefresh_btn btn btn-primary mb-2" name="" value="Refresh"></input>
					  
					    <input type="text" id="datepick1" class="search_box form-control" name="Em_search_key" placeholder="yyyy-mm-dd" value="<?php echo $search_key; ?>">
					  <input type="submit" class="btn btn-primary mb-2" name="Em_search" value="Search"></input>
					
				</div>

				<div class = "center-div">
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>Select</th>
									<th>Counter Id</th>
									<th>Name</th>
									<th>Passrword</th>
									<th>Salary</th>
									<th>Quantity</th>
									<th>Purchase</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								// print($num_row);
								$i = 0;
								while ($Tres = mysqli_fetch_array($Tquery)) { 
									?>
									<tr>
										<td><input type="checkbox" name="<?php echo $Tres[0]; ?>" class="checkhour" value="<?php echo $Tres[0]; ?>" <?php if ($Tres[0]==$checked_ck) {
											echo "checked"; } ?> ></td>

										<td><?php echo $Tres[0]; ?></td>
										<td><?php echo $Tres[1]; ?></td>
										<td><?php echo $Tres[2]; ?></td>
										<td><?php echo $Tres[3]." $"; ?></td>
										<td><?php echo $Tres[4]; ?></td>
										<td><?php echo $Tres[5]." $"; ?></td>


									</tr>

								<?php 
									$i = $i + 1; }
								?>
							</tbody>
						</table>
					</div>
				</div>
			</form>
				<!-- Table khatam -->

				<div class="admin_sal_rec_update_div">
					<h3 class="color_white">Employee information</h3>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="row">
						<div class="form-group col-4">
					      <label for="inputCity" class="color_white">Counter id</label>
					      <input type="text" class="form-control" name="S_id" id="" value="<?php  echo $one_info_to_update[0]?>">
					    </div>
					    <div class="form-group col-4">
					      <label for="inputCity" class="color_white">Employee Name</label>
					      <input type="text" class="form-control" name="S_name" id="" value="<?php  echo $one_info_to_update[1]?>">
					    </div>
					    <div class="form-group col-4">
					      <label for="inputCity" class="color_white">Password</label>
					      <input type="text" class="form-control" name="Cata_id" id="" value="<?php  echo $one_info_to_update[2]?>">
					    </div>
					</div>

					<div class="row">
						<div class="form-group col-4">
					      <label for="inputCity" class="color_white">Salary</label>
					      <input type="text" class="form-control" name="S_performance" id="" value="<?php  echo $one_info_to_update[3]?>">
					    </div>
					    
					</div>

					<div class="row">
						<div class="em_form_label form-group col-9">
					      
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input class="ad_sal_rec_up_btn btn btn-primary" type="submit" name="supllier_update" value="Update">
					    </div>
					</div>
					</form>

				</div>
				

			</div>
		</div>

	</div>

	<script type="text/javascript">

		$(function () {
		$("#datepick1").datepicker({
               dateFormat:"yy-mm-dd"
            });
		});


		$(document).ready(function(){
			setInterval(function(){
				$('#digital_watch').load("time.php")
			},1000);
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

	if (isset($_POST['supllier_update'])) {
		
		$S_id = $_POST['S_id'];
		$S_name = $_POST['S_name'];
		$Cata_id = $_POST['Cata_id'];
		$S_performance = $_POST['S_performance'];
		$S_borrow = $_POST['S_borrow'];
		$S_contact = $_POST['S_contact'];

		$praimary_contact = $_SESSION['supplier_contact_to_update'];

		// update in suppliers table
		$s_id_873267546 = $_SESSION['supllier_in_suppliers_id'];
		$sup_update_sql = "UPDATE `suppliers` SET `Suppliers_id`= '$S_id', `Name` = '$S_name',`Cata_id`='$Cata_id', `Performance` = '$S_performance', `Borrow` = '$S_borrow' WHERE `suppliers`.`Suppliers_id` = '$s_id_873267546'";
		$sup_update_query = mysqli_query($con,$sup_update_sql);

		// update supplier name in products
		$supplier_63786723_name = $_SESSION['supllier_in_products_name'];
		$sup_update_sql1 = "UPDATE `products` SET `Supplier_name`= '$S_name' WHERE `products`.`Supplier_name` = '$supplier_63786723_name'";
		$sup_update_query1 = mysqli_query($con,$sup_update_sql1);

		// update in contacts table
		$contact_update_sql = "UPDATE `contact` SET Suppliers_id='$S_id', `Contact_no` = '$S_contact' WHERE `contact`.`Contact_no` = '$praimary_contact'";
		$contact_update_query = mysqli_query($con,$contact_update_sql);

		if ($sup_update_query and $contact_update_query and $sup_update_query1 ) {
			?>
				<script type="text/javascript">
					alert("Updated successfully");
				</script>
			<?php
		}
		else{
			?>
				<script type="text/javascript">
					alert("Update failed");
				</script>
			<?php
		}
		
		echo '<META HTTP-EQUIV="Refresh" content="0">';
	}

?>