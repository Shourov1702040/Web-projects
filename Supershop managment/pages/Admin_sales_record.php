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
	$checked_ck = array("","");
	$search_key = '';
	$one_info_to_update = array("","","","","","");
	include '../connections.php';
	$selectforTable = "SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE p.P_id=s.P_id and c.Cata_id = p.Cata_id ORDER BY `Date` DESC";

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
					<li id="bd-left"><a href="Admin_sales_record.php">Record Book</a></li>
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

			<?php 

				if (isset($_POST['Em_search'])) {
					$search_key = $_POST['Em_search_key'];
					$selectforTable1 = "SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE (p.P_id=s.P_id and c.Cata_id = p.Cata_id) and (c.Category='$search_key' or p.P_id='$search_key' or s.C_id='$search_key' or s.`Date` LIKE '%$search_key%') ORDER BY `Date` DESC";
					$Tquery = mysqli_query($con,$selectforTable1);
					$num_row = mysqli_num_rows($Tquery);
				}


				// Display button click
				if (isset($_POST['ad_update_check'])) {
					$search_key = $_POST['Em_search_key'];
					if ($search_key!='') {
						$selectforTable2 = "
						SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE (p.P_id=s.P_id and c.Cata_id = p.Cata_id) and (c.Category='$search_key' or p.P_id='$search_key' or s.C_id='$search_key' or s.`Date` LIKE '%$search_key%') ORDER BY `Date` DESC";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					
					$j = 0;
					$num_of_row_select = 0;
					$selected_rows = array();

					while ($j < $num_row) {
						$checkVal = 'ck'.$j;
						if (isset($_POST[$checkVal])) {
							array_push($selected_rows, $_POST[$checkVal]);
							$num_of_row_select = $num_of_row_select + 1;
						}
						$j = $j+1;
					}

					if ($num_of_row_select==1) {
						// echo $selected_rows[0];
						$te_h_array = explode("_", $selected_rows[0]);
						$checked_ck[0] = $te_h_array[0];
						$checked_ck[1] = $te_h_array[1];

						// echo $checked_ck[0]." <--------> ".$checked_ck[1];

						$select_single_row = "
						SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE (p.P_id=s.P_id and c.Cata_id = p.Cata_id) and (s.`Date`= '$checked_ck[0]' and s.Serial_no='$checked_ck[1]')";
						$Single_query = mysqli_query($con,$select_single_row);
						

						while ($up_row_info = mysqli_fetch_array($Single_query)) {
							$one_info_to_update[0] = $up_row_info[3];
							$one_info_to_update[1] = $up_row_info[4];
							$one_info_to_update[2] = $up_row_info[6];
							$one_info_to_update[3] = $up_row_info[5];
							$one_info_to_update[4] = $up_row_info[2];
							$one_info_to_update[5] = $up_row_info[0];
						}

						$_SESSION['ad_up100001'] = array($one_info_to_update[5],$one_info_to_update[4]);
					}



					else{
						?>
							<script type="text/javascript">
								alert("Select only one row to update");
							</script>
						<?php
					}


					
				}


				// Delete button click 
				if (isset($_POST['ad_delete_check'])) {
					$search_key = $_POST['Em_search_key'];
					if ($search_key!='') {
						$selectforTable2 = "
						SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE (p.P_id=s.P_id and c.Cata_id = p.Cata_id) and (c.Category='$search_key' or p.P_id='$search_key' or s.C_id='$search_key' or s.`Date` LIKE '%$search_key%') ORDER BY `Date` DESC";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					
					$j = 0;
					$num_of_row_select = 0;
					$selected_rows = array();

					while ($j < $num_row) {
						$checkVal = 'ck'.$j;
						if (isset($_POST[$checkVal])) {
							array_push($selected_rows, $_POST[$checkVal]);
							$num_of_row_select = $num_of_row_select + 1;
						}
						$j = $j+1;
					}

					if ($num_of_row_select!=0) {


						for ($i=0; $i < $num_of_row_select; $i++) { 
							$te_h_array = explode("_", $selected_rows[$i]);
							$delCheck[0] = $te_h_array[0];
							$delCheck[1] = $te_h_array[1];

							$DelSql = "
							DELETE FROM `sells_record` WHERE `sells_record`.`Date` = '$delCheck[0]' AND `sells_record`.`Serial_no` = '$delCheck[1]'";
							$del_query = mysqli_query($con,$DelSql);
						}
						?>
							<script type="text/javascript">
								alert("Successfully deleted");
							</script>
						<?php

					}

					else{
						?>
							<script type="text/javascript">
								alert("Select minimum one row to delete");
							</script>
						<?php
					}



					$search_key = $_POST['Em_search_key'];
					if ($search_key!='') {
						$selectforTable2 = "
						SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE (p.P_id=s.P_id and c.Cata_id = p.Cata_id) and (c.Category='$search_key' or p.P_id='$search_key' or s.C_id='$search_key' or s.`Date` LIKE '%$search_key%') ORDER BY `Date` DESC";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					else{
						$selectforTable2 = "SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE p.P_id=s.P_id and c.Cata_id = p.Cata_id ORDER BY `Date` DESC";
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
				<h2 class = "em_RecordBook_head_1"><u>All sales record</u></h2>
				 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-inline">
				<div class="sell_table_title">
						<button type="button" class="select_all_btn btn btn-primary" id="checkall">Select all</button>
						<input type="submit" class="ad_select_up_btn btn btn-primary" name="ad_update_check" value="Display">
						<input type="submit"class="ad_select_del_btn btn btn-primary" name="ad_delete_check" value="Delete">
						<input type="submit" class="adrefresh_btn btn btn-primary mb-2" name="" value="Refresh"></input>
					  
					    <input type="text" class="search_box form-control" name="Em_search_key" placeholder="search" value="<?php echo $search_key; ?>">
					  <input type="submit" class="btn btn-primary mb-2" name="Em_search" value="Search"></input>
					
				</div>

				<div class = "center-div">
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>Select</th>
									<th>Date</th>
									<th>Serial no</th>
									<th>Counter id</th>
									<th>Product id</th>
									<th>Category</th>
									<th>Quantity</th>
									<th>Cost</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								// print($num_row);
								$i = 0;
								while ($Tres = mysqli_fetch_array($Tquery)) { 
									$ck_val_arr = array($Tres[0],$Tres[2]);
									$ck_box_name = implode("_", $ck_val_arr);
									?>
									<tr>
										<td><input type="checkbox" name="<?php echo 'ck'.$i; ?>" class="checkhour" value="<?php echo $ck_box_name; ?>" <?php if ($Tres[0]==$checked_ck[0] and $Tres[2]== $checked_ck[1]) {
											echo "checked"; } ?> ></td>

										<td><?php echo $Tres[0]; ?></td>
										<td><?php echo $Tres[2]; ?></td>
										<td><?php echo $Tres[1]; ?></td>
										<td><?php echo $Tres[3]; ?></td>
										<td><?php echo $Tres[6]; ?></td>
										<td><?php echo $Tres[4]; ?></td>
										<td><?php echo $Tres[5]; ?></td>
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
					<h3 class="color_white">Make changes in Sales Recoed book</h3>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="row">
						<div class="form-group col-7">
					      <label for="inputCity" class="color_white">Product id</label>
					      <input type="text" class="form-control" name="p_id1" id="" value="<?php  echo $one_info_to_update[0]?>">
					    </div>
					    <div class="form-group col-5">
					      <label for="inputCity" class="color_white">Quantity</label>
					      <input type="text" class="form-control" name="p_quan" id="" value="<?php  echo $one_info_to_update[1]?>">
					    </div>
					</div>

					<div class="row">
						<div class="form-group col-6">
					      <label for="inputCity" class="color_white">Product Category </label>
					      <input type="text" class="form-control" name="p_category" id="" value="<?php  echo $one_info_to_update[2]?>">

					    </div>
					    <div class="form-group col-6">
					      <label for="inputCity" class="color_white">Total cost</label>
					      <input type="text" class="form-control" name="p_t_cost" id="p_cost" value="<?php  echo $one_info_to_update[3]?>">
					    </div>

					</div>

					<div class="row">
						<div class="em_form_label form-group col-9">
					      
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input class="ad_sal_rec_up_btn btn btn-primary" type="submit" name="update" value="Update">
					    </div>
					</div>
					</form>

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


		var clicked = false;
		$("#checkall").on("click", function() {
		  $(".checkhour").prop("checked", !clicked);
		  clicked = !clicked;
		});
	</script>
</body>
</html>

<?php 

	

?>