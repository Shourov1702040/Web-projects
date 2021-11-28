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
					<li ><a href="admin_employee.php">Employees</a></li>
					<li id="bd-left"><a href="admin_find.php">Finding</a></li>
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
				<h2 class = "em_RecordBook_head_1"><u>Find some information</u></h2>
				

				<div class="ad_find_upperbody row">
					<div class="ad_find_upper_left col-md-9">
						<div class="radio_group_div">
							<div class="form-group">
					    	<h3>Choose text Fields</h3>
					        <div class="custom-control custom-radio custom-control-inline">
							  <input type="checkbox" id="customRadioInline1" name="text_field_1" class=" custom-control-input">
							  <label class="custom-control-label" for="customRadioInline1" >Textfield-X</label>
							</div>
							<div class="text_field_radios  custom-control custom-radio custom-control-inline">
							  <input type="checkbox" id="customRadioInline2" name="text_field_1" class=" custom-control-input">
							  <label class="custom-control-label" for="customRadioInline2">Textfield-Y</label>
							</div>
							<div class="text_field_radios  custom-control custom-radio custom-control-inline">
							  <input type="checkbox" id="customRadioInline3" name="text_field_3" class=" custom-control-input">
							  <label class="custom-control-label" for="customRadioInline3">Textfield date-1</label>
							</div>

							<div class="text_field_radios custom-control custom-radio custom-control-inline">
							  <input type="checkbox" id="customRadioInline4" name="text_field_4" class=" custom-control-input">
							  <label class="custom-control-label" for="customRadioInline4">Textfield date-2</label>
							</div>
							</div>
						</div>
						<div class="text_field_div">
							<input type="text" class="ad_find_text_field form-control" name="text_field_1" id="" value="">

							<input type="text" class="ad_find_text_field form-control" name="text_field_2" id="" value="">

							<input type="text" class="ad_find_text_field form-control" id="datepick1" name="text_field_3" value="">
 
							<input type="text" class="ad_find_text_field form-control" id="datepick2" name="text_field_4" value="">
						</div>

						<div>
							<select class="admin_query_select form-select form-select-lg mb-3" aria-label=".form-select-lg example">
								<option selected>Select one query to find information</option>
							  <option value="">Counter who has sold more than 'X' tk this month</option>
							  <option value="">All sells record between 'date-1' & 'date-2'</option>
							  <option value="">Suppliers of product 'X' or 'Y'</option>
							  
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<input type="submit" class="ad_find_submit_btn btn btn-primary" name="submit_query_find" value="FIND">
						<button type="button" class="ad_find_clear_btn btn btn-primary" id="clear_admin_find">Clear</button>
					</div>

				</div>
				
				

				<div class = "admin_query_table_div"> <!-- Table start -->
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
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
								$cur_date = date("yy-m-d");
								$selectforTable = "SELECT `Date`, `C_id`, `Serial_no`, s.P_id, `Quantity`, `Total_Cost`, `Category` FROM sells_record s, catalog c, products p WHERE p.P_id=s.P_id and c.Cata_id = p.Cata_id and `Date`='$cur_date' ORDER BY Serial_no DESC";
								$Tquery = mysqli_query($con,$selectforTable);

								while ($Tres = mysqli_fetch_array($Tquery)) { ?>
									<tr>
										<td><?php echo $Tres[0]; ?></td>
										<td><?php echo $Tres[2]; ?></td>
										<td><?php echo $Tres[1]; ?></td>
										<td><?php echo $Tres[3]; ?></td>
										<td><?php echo $Tres[6]; ?></td>
										<td><?php echo $Tres[4]; ?></td>
										<td><?php echo $Tres[5]; ?></td>
									</tr>

								<?php  } ?>
							</tbody>
						</table>
					</div>
				</div><!-- Table khatam -->

			</div><!-- end of main body -->
		</div>

	</div>

	<script type="text/javascript">

		$(function () {
		$("#datepick1").datepicker({
               dateFormat:"yy-mm-dd"
            });
		$("#datepick2").datepicker({
               dateFormat:"yy-mm-dd"
            });
		});


		$(document).ready(function(){
			setInterval(function(){
				$('#digital_watch').load("time.php")
			},1000);
		});

	</script>
</body>
</html>
