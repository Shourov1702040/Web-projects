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
	$te_h_array = '';
	$search_key = '';
	$one_info_to_update = array("","","","","","","","");
	
	include '../connections.php';
	$selectforTable = "SELECT `P_id`, p.Cata_id, `Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id ORDER BY p.Cata_id";
	$Tquery = mysqli_query($con,$selectforTable);
	$num_row = mysqli_num_rows($Tquery);


	$supplier_name_borrow_sql = "SELECT Name FROM suppliers";
	$sup_get_query = mysqli_query($con,$supplier_name_borrow_sql);

	// getting all category list
	$all_category = array();
	$catagory_sql = "SELECT Category FROM catalog";
	$catalog_get_query = mysqli_query($con,$catagory_sql);
	while ($h___all_category = mysqli_fetch_array($catalog_get_query)) {
		array_push($all_category, $h___all_category[0]);
	}
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
					<li id="bd-left"><a href="ad_products.php">Products</a></li>
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
					$selectforTable1 = "SELECT `P_id`,p.Cata_id, `Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id and (c.Category='$search_key' or p.P_id='$search_key' or p.Supplier_name='$search_key') ORDER BY p.Cata_id";
					$Tquery = mysqli_query($con,$selectforTable1);
					$num_row = mysqli_num_rows($Tquery);
				}


				// Display button click
				if (isset($_POST['ad_update_check'])) {
					$search_key = $_POST['Em_search_key'];
					if ($search_key!='') {
						$selectforTable2 = "
						SELECT `P_id`,p.Cata_id, `Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id and (c.Category='$search_key' or p.P_id='$search_key' or p.Supplier_name='$search_key') ORDER BY p.Cata_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					
					$num_of_row_select = 0;
					$selected_rows = array();

					while ($Tres = mysqli_fetch_array($Tquery)) {
						if (isset($_POST[$Tres[0]])) {
							array_push($selected_rows, $_POST[$Tres[0]]);
							$num_of_row_select = $num_of_row_select + 1;
						}
					}

					if ($num_of_row_select==1) {
						// echo $selected_rows[0];
						$te_h_array = $selected_rows[0];

						$select_single_row = "
						SELECT p.`P_id`,c.`Category`, p.`Stock`, p.Price, p.`Supplier_name`, p.`Acc_rate`, sp.`Borrow` FROM products p, catalog c, suppliers sp WHERE p.Cata_id = c.Cata_id and p.P_id = '$te_h_array' and sp.Name = p.Supplier_name ORDER BY p.Cata_id" ;
						$Single_query = mysqli_query($con,$select_single_row);
						

						while ($up_row_info = mysqli_fetch_array($Single_query)) {
							$one_info_to_update[0] = $up_row_info[0];
							$one_info_to_update[1] = $up_row_info[1];
							$one_info_to_update[2] = $up_row_info[2];
							$one_info_to_update[3] = $up_row_info[3];
							$one_info_to_update[4] = $up_row_info[4];
							$one_info_to_update[5] = $up_row_info[5];
							$one_info_to_update[6] = $up_row_info[6];
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
						SELECT `P_id`,p.Cata_id, `Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id and (c.Category='$search_key' or p.P_id='$search_key' or p.Supplier_name='$search_key') ORDER BY p.Cata_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					else{
						$selectforTable2 = "SELECT `P_id`,p.Cata_id, `Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id ORDER BY p.Cata_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}


					
				}


				// Delete button clicked 
				if (isset($_POST['ad_delete_check'])) {
					$search_key = $_POST['Em_search_key'];
					if ($search_key!='') {
						$selectforTable2 = "
						SELECT `P_id`,p.Cata_id, `Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id and (c.Category='$search_key' or p.P_id='$search_key' or p.Supplier_name='$search_key') ORDER BY p.Cata_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					
					$num_of_row_select = 0;
					$selected_rows = array();

					while ($Tres = mysqli_fetch_array($Tquery)) {
						if (isset($_POST[$Tres])) {
							array_push($selected_rows, $_POST[$Tres[0]]);
							$num_of_row_select = $num_of_row_select+1;
						}
					}

					if ($num_of_row_select!=0) {
						$te_h_array = $selected_rows[0];

						for ($i=0; $i < $num_of_row_select; $i++) { 
							$te_h_array = $selected_rows[$i];

							$DelSql = "
							DELETE FROM `products` WHERE P_id = '$te_h_array'";
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
						SELECT `P_id`,p.Cata_id,`Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id and (c.Category='$search_key' or p.P_id='$search_key' or p.Supplier_name='$search_key') ORDER BY p.Cata_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					else{
						$selectforTable2 = "SELECT `P_id`,p.Cata_id,`Category`, `Stock`, Price, `Supplier_name` FROM products p, catalog c WHERE p.Cata_id = c.Cata_id ORDER BY p.Cata_id";
						$Tquery = mysqli_query($con,$selectforTable2);
						$num_row = mysqli_num_rows($Tquery);
					}

					
				}


			 ?>


			
			<div class="em_mainBody_div">
				<h2 class = "em_RecordBook_head_1"><u>Products</u></h2>
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
									<th>Product id</th>
									<th>Catalog id</th>
									<th>Category</th>
									<th>Stock</th>
									<th>Price</th>
									<th>Supplier</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								// print($num_row);
								$i = 0;
								while ($Tres = mysqli_fetch_array($Tquery)) { 
									
									?>
									<tr>
										<td><input type="checkbox" name="<?php echo $Tres[0]; ?>" class="checkhour" value="<?php echo $Tres[0]; ?>" <?php if ($Tres[0]==$te_h_array) {
											echo "checked"; } ?> ></td>

										<td><?php echo $Tres[0]; ?></td>
										<td><?php echo $Tres[1]; ?></td>
										<td><?php echo $Tres[2]; ?></td>
										<td><?php echo $Tres[3]; ?></td>
										<td><?php echo $Tres[4]."$" ; ?></td>
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
					<h3 class="color_white">Product info </h3>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="row">
						<div class="form-group col-4">
					      <label for="inputCity" class="color_white">Product id</label>
					      <input type="text" class="form-control" name="p_id" id="p_id" value="<?php  echo $one_info_to_update[0]?>">
					    </div>
					    <div class="form-group col-4">
					      <label for="inputCity" class="color_white">Product Category</label>
					      <select class="form-control" name="p_catagory" id="p_catagory" required>
					        <option selected><?php  echo $one_info_to_update[1]?></option>
					        <?php  
						        foreach ($all_category as $catagoer_i) {
						        	?>
						        		<option><?php echo $catagoer_i ?></option>
						        	<?php
						        }
					        ?>
					      </select>
					    </div>
					    <div class="form-group col-4">
					      <label for="inputCity" class="color_white">Supplier</label>
					      <select class="form-control" name="p_supplier" id="p_supplier" required>
					        <option selected><?php  echo $one_info_to_update[4]?></option>
					        <?php while ($sup_name_borrow = mysqli_fetch_array($sup_get_query)) { ?>

					        	<option><?php echo $sup_name_borrow[0] ?></option>

					        <?php 	} ?> 
					        
					      </select>
					    </div>

					    
					</div>

					<div class="row">
						<div class="form-group col-4">
					      <label for="inputCity" class="color_white">Products in stock</label>
					      <input type="text" class="form-control" name="p_quan" id="p_quan" value="<?php  echo $one_info_to_update[2]?>">

					    </div>
					    <div class="form-group col-4">
					      <label for="inputCity" class="color_white">Price</label>
					      <input type="text" class="form-control" name="p_price" id="p_price" value="<?php  echo $one_info_to_update[3]?>">
					    </div>

					    <div class="form-group col-4">
					      <label for="inputCity" class="color_white">Holesell price</label>
					      <input type="text" class="form-control" name="p_hole_price" id="p_hole_price" value="<?php  echo $one_info_to_update[5] ?>">

					    </div>

					</div>

					<div class="row">
						<div class="form-group col-4">
					      <label for="inputCity" class="color_white">Borrow</label>
					      <input type="text" class="form-control" name="p_borrow" id="p_borrow" value="<?php  echo $one_info_to_update[6]?>">
					    </div>
					    <div class="form-group col-4">
					      <label for="p_supplier" class="color_white">Suppliers Contact</label>
					      <select class="form-control" name="s_contact" id="p_supplier_phone" >
					      	<?php  
					      		$sup_phone_sql = "SELECT Contact_no FROM contact AS c, suppliers AS sp WHERE sp.Suppliers_id = c.Suppliers_id AND sp.Name = '$one_info_to_update[4]'";
					      		$sup_phone_query = mysqli_query($con,$sup_phone_sql);
					      	?>

					        <?php while ($sup_contacts = mysqli_fetch_array($sup_phone_query)) { ?>

					        	<option><?php echo $sup_contacts[0] ?></option>

					        <?php 	} ?> 
					        
					      </select>
					    </div>
						
					</div>

					<!-- Form -2 buttons -->
					<div class="row">
						<div class="em_form_label form-group col-5">
					      	<button class="ad_category_btn btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg-2">Add Category</button>
					      	<button class="ad_supplier_btn btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg-1">Add supplier</button>
					    </div>
					    <div class="em_form_label form-group col-7">
					      <button class="ad_sal_clear_btn btn btn-primary" type="button" name="ad_clear"  onclick="clear_F()">Clear</button>
					      <input class="ad_sal_prod_up_btn btn btn-primary" type="submit" name="update" value="Update">
					      <input class="ad_enter_btn btn btn-primary" type="submit" name="enter" value="Enter">
					    </div>
					</div>
					</form>

				</div>
				


				<!-- pop up form 1 -->

				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="modal fade bd-example-modal-lg-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
						<div class="modal_my_class modal-content">
						  <div class="modal-header">
							<h5 class="color_white modal-title" id="exampleModalLabel">Add New Supplier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<!--pop up form body here --> 
								<div class="row"> 
									<div class="sign_pad form-group col-md-6">
										<label class = "color_white" for="u_name">Suppliers name</label>
										<input type="text" class="form-control" id="u_name" name="pop1_s_name" value = "" placeholder="Enter Suppliers name ">
									</div>
									<div class="form-group col-md-6">
										<label class = "color_white" for="u_f_name">Suppliers id</label>
										<input type="text" class="form-control" id="u_f_name" name="pop1_s_id" value = "" placeholder="Enter Suppliers id">
									</div>
								</div>

								<div class="row"> 
									<div class="sign_pad form-group col-md-6">
										<label for="inputCity" class="color_white">Product Category</label>
									      <select class="form-control" name="pop1_s_category" id="pop_s_category" required>
									        <?php  
									        foreach ($all_category as $catagoer_i) {
									        	?>
									        		<option><?php echo $catagoer_i ?></option>
									        	<?php
									        }
									        ?> 
									      </select>
									</div>
									<div class="form-group col-md-6">
										<label class = "color_white" for="pop_s_borrow">Borrow</label>
										<input type="text" class="form-control" id="pop1_s_borrow" name="pop_s_borrow" value = "" placeholder="Enter borrow amount">
									</div>
								</div>
								
								

						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" name="pop1_add" value="Enter"></input>
						  </div>
						</div>
					  </div>
					</div>
				</form>
				<!--Pop up form  1 finished-->



				<!-- pop up form 2  start-->

				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="modal fade bd-example-modal-lg-2" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
						<div class="modal_my_class modal-content">
						  <div class="modal-header">
							<h5 class="color_white modal-title" id="exampleModalLabel">Add New Category</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<!--pop up form body here --> 
								<div class="row"> 
								<div class="sign_pad form-group col-md-6">
									<label class = "color_white" for="u_name">Catalog id</label>
									<input type="text" class="form-control" id="u_name" name="pop_s_name" value = "" placeholder="Enter Catalog id">
								</div>
								<div class="form-group col-md-6">
									<label class = "color_white" for="u_f_name">Category</label>
									<input type="text" class="form-control" id="u_f_name" name="pop_s_id" value = "" placeholder="Enter product Category">
								</div>
								</div>

								<div class="row"> 
								<div class="sign_pad form-group col-md-6">
									<label class = "color_white" for="u_name">Supply date</label>
									<input type="text" class="form-control" id="u_name" name="pop_s_name" value = "" placeholder="Enter supply date">
								</div>
								</div>
								

						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" name="popup_update" value="Enter"></input>
						  </div>
						</div>
					  </div>
					</div>
					</form>
					 <!--Pop up form  2 finished-->

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
	// update button click 
	if (isset($_POST['update'])) {
		
		$up_P_id = $_POST['p_id'];
		$up_category = $_POST['p_catagory'];
		$up_P_in_stock = $_POST['p_quan'];
		$up_P_supplier = $_POST['p_supplier'];
		$up_P_hole_price = $_POST['p_hole_price'];
		$up_P_price = $_POST['p_price'];

		$select_cata_id = "SELECT `Cata_id` FROM `catalog` WHERE Category = '$up_category'";
		$select_cata_query001 = mysqli_query($con, $select_cata_id);

		$cata_id_001 = mysqli_fetch_array($select_cata_query001);


		// echo $up_P_id."-->".$cata_id_001[0]."-->".$up_P_in_stock."-->".$up_P_supplier."-->".$up_P_hole_price."-->".$up_P_price;

		$update_sql = "UPDATE `products` SET `P_id` = '$up_P_id', Cata_id='$cata_id_001[0]', `Stock` = '$up_P_in_stock', Price='$up_P_price', Supplier_name='$up_P_supplier', Acc_rate = '$up_P_hole_price' WHERE `products`.`P_id` = '$up_P_id'";

		$update_query = mysqli_query($con,$update_sql);

		if ($update_query) {
			?>
				<script type="text/javascript">
					alert("Updated successfully");
				</script>
			<?php
			echo '<META HTTP-EQUIV="Refresh" content="0">';
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


#----------------------------------------------------------------------
	if (isset($_POST['enter'])) {
		
		$up_P_id = $_POST['p_id'];
		$up_category = $_POST['p_catagory'];
		$up_P_in_stock = $_POST['p_quan'];
		$up_P_supplier = $_POST['p_supplier'];
		$up_P_hole_price = $_POST['p_hole_price'];
		$up_P_price = $_POST['p_price'];

		$select_cata_id = "SELECT `Cata_id` FROM `catalog` WHERE Category = '$up_category'";
		$select_cata_query001 = mysqli_query($con, $select_cata_id);
		$cata_id_001 = mysqli_fetch_array($select_cata_query001);

		$check_row001_sql = "SELECT P_id,Supplier_name,Stock FROM products WHERE P_id = '$up_P_id'";
		$check_row001_query = mysqli_query($con, $check_row001_sql);
		$row_001_pid = mysqli_num_rows($check_row001_query);
		$row_001_pid_supplier = mysqli_fetch_array($check_row001_query);

		// echo "SOmethis khjdsh dddddddddddddddddddddddddddddddddddddddddd ----->".$row_001_pid;
		if ($row_001_pid==0 or $row_001_pid_supplier[1]!=$up_P_supplier) {
			$insert_product_sql = "INSERT INTO `products` (`P_id`, `Cata_id`, `Stock`, `Price`, `Supplier_name`, `Acc_rate`) VALUES ('$up_P_id', '$cata_id_001[0]', '$up_P_in_stock', '$up_P_price', '$up_P_supplier', '$up_P_hole_price')";
			$insert_product_query = mysqli_query($con,$insert_product_sql);

			if ($insert_product_query) {
				?>
					<script type="text/javascript">
						alert("Inserted successfully");
					</script>
				<?php
				echo '<META HTTP-EQUIV="Refresh" content="0">';
			}
			else{
				?>
					<script type="text/javascript">
						alert("Insert failed");
					</script>
				<?php
			}

		}
		else if($row_001_pid_supplier[1]==$up_P_supplier){

			$new_stock = intval($row_001_pid_supplier[2]) + intval($up_P_in_stock);
			$entry_sql002 = "UPDATE products SET `Stock`='$new_stock', `Price`='$up_P_price', `Acc_rate`='$up_P_hole_price' WHERE P_id='$up_P_id'";
			$entry_query002 = mysqli_query($con,$entry_sql002);

			if ($entry_query002) {
				?>
					<script type="text/javascript">
						alert("Entered successfully");
					</script>
				<?php
				echo '<META HTTP-EQUIV="Refresh" content="0">';
			}
			else{
				?>
					<script type="text/javascript">
						alert("Insert failed");
					</script>
				<?php
			}

		}


	}


?>


<script type="text/javascript">
	function clear_F(){

	document.getElementById("p_catagory").value='';
	document.getElementById("p_supplier").value='';
	document.getElementById("p_price").value='';
	document.getElementById("p_quan").value='';
	document.getElementById("p_id").value='';
	document.getElementById("p_borrow").value='';
	document.getElementById("p_hole_price").value='';
	document.getElementById("p_supplier_phone").value='';

	p_supplier_phone
}
</script>



  