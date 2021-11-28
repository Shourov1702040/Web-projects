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

	$row1 = array("","","","");
	$row2 = array("","","","");
	$row3 = array("","","","");
	$row4 = array("","","","");
	$row5 = array("","","","");
	$row6 = array("","","","");
	$row7 = array("","","","");
	$Em_total_cost = 0;
?>

	<div id="em_frist_m_div" class="row">

		<div class="em-leftSide-div col-2">
			<div class="em_logo_div">
				<img src="../images/logoc.png">
				<p>Ideal Super Shop</p>
			</div>

			<div class="em_sidebar_div">
				<ul id="em_menu">
					<li><a href="em_home.php">Home</a></li>
					<li id="bd-left"><a href="">Record Book</a></li>
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

			<?php

				if (isset($_POST['em_calculate'])) {
					$p_id1 = $_POST['p_id1'];
					$p_id2 = $_POST['p_id2'];
					$p_id3 = $_POST['p_id3'];
					$p_id4 = $_POST['p_id4'];
					$p_id5 = $_POST['p_id5'];
					$p_id6 = $_POST['p_id6'];
					$p_id7 = $_POST['p_id7'];

					$p_num1 = $_POST['p_num1'];
					$p_num2 = $_POST['p_num2'];
					$p_num3 = $_POST['p_num3'];
					$p_num4 = $_POST['p_num4'];
					$p_num5 = $_POST['p_num5'];
					$p_num6 = $_POST['p_num6'];
					$p_num7 = $_POST['p_num7'];

					if ($p_id1!="") {
						$get_row = cal_cost($p_id1, $p_num1);
						for ($i=0; $i < 4; $i++) { 
							$row1[$i] = $get_row[$i];
						}
						$Em_total_cost = $Em_total_cost + $row1[3];
						
					}

					if ($p_id2!="") {
						$get_row = cal_cost($p_id2, $p_num2);
						for ($i=0; $i < 4; $i++) { 
							$row2[$i] = $get_row[$i];
						}
						$Em_total_cost = $Em_total_cost + $row2[3];
					}

					if ($p_id3!="") {
						$get_row = cal_cost($p_id3, $p_num3);
						for ($i=0; $i < 4; $i++) { 
							$row3[$i] = $get_row[$i];
						}
						$Em_total_cost = $Em_total_cost + $row3[3];
					}
					if ($p_id4!="") {
						$get_row = cal_cost($p_id4, $p_num4);
						for ($i=0; $i < 4; $i++) { 
							$row4[$i] = $get_row[$i];
						}
						$Em_total_cost = $Em_total_cost + $row4[3];
					}
					if ($p_id5!="") {
						$get_row = cal_cost($p_id5, $p_num5);
						for ($i=0; $i < 4; $i++) { 
							$row5[$i] = $get_row[$i];
						}
						$Em_total_cost = $Em_total_cost + $row5[3];
					}
					if ($p_id6!="") {
						$get_row = cal_cost($p_id6, $p_num6);
						for ($i=0; $i < 4; $i++) { 
							$row6[$i] = $get_row[$i];
						}
						$Em_total_cost = $Em_total_cost + $row6[3];
					}
					if ($p_id7!="") {
						$get_row = cal_cost($p_id7, $p_num7);
						for ($i=0; $i < 4; $i++) { 
							$row7[$i] = $get_row[$i];
						}
						$Em_total_cost = $Em_total_cost + $row7[3];
					}
				}

				// For The Purches 

				$cur_date = date('yy-m-d');

				if (isset($_POST['Em_purchase'])) {
					$p_id1 = $_POST['p_id1'];
					$p_id2 = $_POST['p_id2'];
					$p_id3 = $_POST['p_id3'];
					$p_id4 = $_POST['p_id4'];
					$p_id5 = $_POST['p_id5'];
					$p_id6 = $_POST['p_id6'];
					$p_id7 = $_POST['p_id7'];

					$p_num1 = $_POST['p_num1'];
					$p_num2 = $_POST['p_num2'];
					$p_num3 = $_POST['p_num3'];
					$p_num4 = $_POST['p_num4'];
					$p_num5 = $_POST['p_num5'];
					$p_num6 = $_POST['p_num6'];
					$p_num7 = $_POST['p_num7'];

					if ($p_id1!="") {
						$get_row = cal_cost($p_id1, $p_num1);
						for ($i=0; $i < 4; $i++) { 
							$row1[$i] = $get_row[$i];
						}

						Purches_func($row1,$res[0],$cur_date);
					}

					if ($p_id2!="") {
						$get_row = cal_cost($p_id2, $p_num2);
						for ($i=0; $i < 4; $i++) { 
							$row2[$i] = $get_row[$i];
						}
						Purches_func($row2,$res[0],$cur_date);
					}

					if ($p_id3!="") {
						$get_row = cal_cost($p_id3, $p_num3);
						for ($i=0; $i < 4; $i++) { 
							$row3[$i] = $get_row[$i];
						}
						Purches_func($row3,$res[0],$cur_date);
					}
					if ($p_id4!="") {
						$get_row = cal_cost($p_id4, $p_num4);
						for ($i=0; $i < 4; $i++) { 
							$row4[$i] = $get_row[$i];
						}
						Purches_func($row4,$res[0],$cur_date);
					}
					if ($p_id5!="") {
						$get_row = cal_cost($p_id5, $p_num5);
						for ($i=0; $i < 4; $i++) { 
							$row5[$i] = $get_row[$i];
						}
						Purches_func($row5,$res[0],$cur_date);
					}
					if ($p_id6!="") {
						$get_row = cal_cost($p_id6, $p_num6);
						for ($i=0; $i < 4; $i++) { 
							$row6[$i] = $get_row[$i];
						}
						Purches_func($row6,$res[0],$cur_date);
					}
					if ($p_id7!="") {
						$get_row = cal_cost($p_id7, $p_num7);
						for ($i=0; $i < 4; $i++) { 
							$row7[$i] = $get_row[$i];
						}
						Purches_func($row7,$res[0],$cur_date);
					}
				}

			?>

			<div class="em_mainBody_div">
				<h2 class = "em_RecordBook_head_1"><u>Record Enter Book</u></h2>
				
				<div class="em_record_form container">
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					  <!-- row 1 -->
					  <div class="form-row">
					    <div class="em_form_label form-group col-1">
					      <label for="inputCity">Items</label><br>
					      <label for="inputCity">01</label>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <label for="inputCity">Product Id</label>
					      <input type="text" class="eminput_border form-control" name="p_id1" id="p_id1" value="<?php echo $row1[0]; ?>">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <label for="inputState">Quantity</label>
					      <select id="inputState" class="eminput_border form-control" name="p_num1" id="p_num1" required>
					        <option selected>0</option>
					        <option <?php if ($row1[1]=="1"): ?> selected="selected" <?php endif; ?>>1</option>
					        <option <?php if ($row1[1]=="2"): ?> selected="selected" <?php endif; ?>>2</option>
					        <option <?php if ($row1[1]=="3"): ?> selected="selected" <?php endif; ?>>3</option>
					        <option <?php if ($row1[1]=="4"): ?> selected="selected" <?php endif; ?>>4</option>
					        <option <?php if ($row1[1]=="5"): ?> selected="selected" <?php endif; ?>>5</option>
					        <option <?php if ($row1[1]=="6"): ?> selected="selected" <?php endif; ?>>6</option>
					        <option <?php if ($row1[1]=="7"): ?> selected="selected" <?php endif; ?>>7</option>
					        <option <?php if ($row1[1]=="8"): ?> selected="selected" <?php endif; ?>>8</option>
					        <option <?php if ($row1[1]=="9"): ?> selected="selected" <?php endif; ?>>9</option>
					        <option <?php if ($row1[1]=="10"): ?> selected="selected" <?php endif; ?>>10</option>
					      </select>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <label for="inputZip">Price (in $)</label>
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row1[2]; ?>">
					    </div>
					    <div class="em_form_label form-group col-3">
					      <label for="inputZip">Total Price (in $)</label>
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row1[3]; ?>">
					    </div>
					  </div>

					  <!-- row 2 -->

					  <div class="form-row">
					    <div class="em_form_label form-group col-1">
					      <label for="inputCity">02</label>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" name="p_id2" id="p_id2" value="<?php echo $row2[0]; ?>">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <select id="inputState" class="eminput_border form-control" name="p_num2" id="p_num2" value="<?php echo $row2[1]; ?>">
					        <option selected>0</option>
					        <option <?php if ($row2[1]=="1"): ?> selected="selected" <?php endif; ?>>1</option>
					        <option <?php if ($row2[1]=="2"): ?> selected="selected" <?php endif; ?>>2</option>
					        <option <?php if ($row2[1]=="3"): ?> selected="selected" <?php endif; ?>>3</option>
					        <option <?php if ($row2[1]=="4"): ?> selected="selected" <?php endif; ?>>4</option>
					        <option <?php if ($row2[1]=="5"): ?> selected="selected" <?php endif; ?>>5</option>
					        <option <?php if ($row2[1]=="6"): ?> selected="selected" <?php endif; ?>>6</option>
					        <option <?php if ($row2[1]=="7"): ?> selected="selected" <?php endif; ?>>7</option>
					        <option <?php if ($row2[1]=="8"): ?> selected="selected" <?php endif; ?>>8</option>
					        <option <?php if ($row2[1]=="9"): ?> selected="selected" <?php endif; ?>>9</option>
					        <option <?php if ($row2[1]=="10"): ?> selected="selected" <?php endif; ?>>10</option>
					      </select>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row2[2]; ?>">
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row2[3]; ?>">
					    </div>
					  </div>

					  <!-- row 3 -->
					  <div class="form-row">
					    <div class="em_form_label form-group col-1">
					      <label for="inputCity">03</label>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" name="p_id3" id="p_id3" value="<?php echo $row3[0]; ?>">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <select id="inputState" class="eminput_border form-control" name="p_num3" id="p_num3" value="<?php echo $row3[1]; ?>">
					        <option selected>0</option>
					        <option <?php if ($row3[1]=="1"): ?> selected="selected" <?php endif; ?>>1</option>
					        <option <?php if ($row3[1]=="2"): ?> selected="selected" <?php endif; ?>>2</option>
					        <option <?php if ($row3[1]=="3"): ?> selected="selected" <?php endif; ?>>3</option>
					        <option <?php if ($row3[1]=="4"): ?> selected="selected" <?php endif; ?>>4</option>
					        <option <?php if ($row3[1]=="5"): ?> selected="selected" <?php endif; ?>>5</option>
					        <option <?php if ($row3[1]=="6"): ?> selected="selected" <?php endif; ?>>6</option>
					        <option <?php if ($row3[1]=="7"): ?> selected="selected" <?php endif; ?>>7</option>
					        <option <?php if ($row3[1]=="8"): ?> selected="selected" <?php endif; ?>>8</option>
					        <option <?php if ($row3[1]=="9"): ?> selected="selected" <?php endif; ?>>9</option>
					        <option <?php if ($row3[1]=="10"): ?> selected="selected" <?php endif; ?>>10</option>
					      </select>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row3[2]; ?>">
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row3[3]; ?>">
					    </div>
					  </div>


					  <!-- row 4 -->
					  <div class="form-row">
					    <div class="em_form_label form-group col-1">
					      <label for="inputCity">04</label>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" name="p_id4" id="p_id4" value="<?php echo $row4[0]; ?>">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <select id="inputState" class="eminput_border form-control" name="p_num4" id="p_num4" value="<?php echo $row4[1]; ?>">
					        <option selected>0</option>
					        <option <?php if ($row4[1]=="1"): ?> selected="selected" <?php endif; ?>>1</option>
					        <option <?php if ($row4[1]=="2"): ?> selected="selected" <?php endif; ?>>2</option>
					        <option <?php if ($row4[1]=="3"): ?> selected="selected" <?php endif; ?>>3</option>
					        <option <?php if ($row4[1]=="4"): ?> selected="selected" <?php endif; ?>>4</option>
					        <option <?php if ($row4[1]=="5"): ?> selected="selected" <?php endif; ?>>5</option>
					        <option <?php if ($row4[1]=="6"): ?> selected="selected" <?php endif; ?>>6</option>
					        <option <?php if ($row4[1]=="7"): ?> selected="selected" <?php endif; ?>>7</option>
					        <option <?php if ($row4[1]=="8"): ?> selected="selected" <?php endif; ?>>8</option>
					        <option <?php if ($row4[1]=="9"): ?> selected="selected" <?php endif; ?>>9</option>
					        <option <?php if ($row4[1]=="10"): ?> selected="selected" <?php endif; ?>>10</option>
					      </select>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row4[2]; ?>">
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row4[3]; ?>">
					    </div>
					  </div>


					  <!-- row 5 -->
					  <div class="form-row">
					    <div class="em_form_label form-group col-1">
					      <label for="inputCity">05</label>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" name="p_id5" id="p_id5" value="<?php echo $row5[0]; ?>">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <select id="inputState" class="eminput_border form-control" name="p_num5" id="p_num5" value="<?php echo $row5[1]; ?>">
					        <option selected>0</option>
					        <option <?php if ($row5[1]=="1"): ?> selected="selected" <?php endif; ?>>1</option>
					        <option <?php if ($row5[1]=="2"): ?> selected="selected" <?php endif; ?>>2</option>
					        <option <?php if ($row5[1]=="3"): ?> selected="selected" <?php endif; ?>>3</option>
					        <option <?php if ($row5[1]=="4"): ?> selected="selected" <?php endif; ?>>4</option>
					        <option <?php if ($row5[1]=="5"): ?> selected="selected" <?php endif; ?>>5</option>
					        <option <?php if ($row5[1]=="6"): ?> selected="selected" <?php endif; ?>>6</option>
					        <option <?php if ($row5[1]=="7"): ?> selected="selected" <?php endif; ?>>7</option>
					        <option <?php if ($row5[1]=="8"): ?> selected="selected" <?php endif; ?>>8</option>
					        <option <?php if ($row5[1]=="9"): ?> selected="selected" <?php endif; ?>>9</option>
					        <option <?php if ($row5[1]=="10"): ?> selected="selected" <?php endif; ?>>10</option>
					      </select>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row5[2]; ?>">
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row5[3]; ?>">
					    </div>
					  </div>



					  <!-- row 6 -->

					  <div class="form-row">
					    <div class="em_form_label form-group col-1">
					      <label for="inputCity">06</label>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" name="p_id6" id="p_id6" value="<?php echo $row6[0]; ?>">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <select id="inputState" class="eminput_border form-control" name="p_num6" id="p_num6" value="<?php echo $row6[1]; ?>">
					        <option selected>0</option>
					        <option <?php if ($row6[1]=="1"): ?> selected="selected" <?php endif; ?>>1</option>
					        <option <?php if ($row6[1]=="2"): ?> selected="selected" <?php endif; ?>>2</option>
					        <option <?php if ($row6[1]=="3"): ?> selected="selected" <?php endif; ?>>3</option>
					        <option <?php if ($row6[1]=="4"): ?> selected="selected" <?php endif; ?>>4</option>
					        <option <?php if ($row6[1]=="5"): ?> selected="selected" <?php endif; ?>>5</option>
					        <option <?php if ($row6[1]=="6"): ?> selected="selected" <?php endif; ?>>6</option>
					        <option <?php if ($row6[1]=="7"): ?> selected="selected" <?php endif; ?>>7</option>
					        <option <?php if ($row6[1]=="8"): ?> selected="selected" <?php endif; ?>>8</option>
					        <option <?php if ($row6[1]=="9"): ?> selected="selected" <?php endif; ?>>9</option>
					        <option <?php if ($row6[1]=="10"): ?> selected="selected" <?php endif; ?>>10</option>
					      </select>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row6[2]; ?>">
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row6[3]; ?>">
					    </div>
					  </div>



					  <!-- row 7 -->

					  <div class="form-row">
					    <div class="em_form_label form-group col-1">
					      <label for="inputCity">07</label>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" name="p_id7" id="p_id7" value="<?php echo $row7[0]; ?>">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <select id="inputState" class="eminput_border form-control" name="p_num7" id="p_num7" value="<?php echo $row7[1]; ?>">
					        <option selected>0</option>
					        <option <?php if ($row7[1]=="1"): ?> selected="selected" <?php endif; ?>>1</option>
					        <option <?php if ($row7[1]=="2"): ?> selected="selected" <?php endif; ?>>2</option>
					        <option <?php if ($row7[1]=="3"): ?> selected="selected" <?php endif; ?>>3</option>
					        <option <?php if ($row7[1]=="4"): ?> selected="selected" <?php endif; ?>>4</option>
					        <option <?php if ($row7[1]=="5"): ?> selected="selected" <?php endif; ?>>5</option>
					        <option <?php if ($row7[1]=="6"): ?> selected="selected" <?php endif; ?>>6</option>
					        <option <?php if ($row7[1]=="7"): ?> selected="selected" <?php endif; ?>>7</option>
					        <option <?php if ($row7[1]=="8"): ?> selected="selected" <?php endif; ?>>8</option>
					        <option <?php if ($row7[1]=="9"): ?> selected="selected" <?php endif; ?>>9</option>
					        <option <?php if ($row7[1]=="10"): ?> selected="selected" <?php endif; ?>>10</option>
					      </select>
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row7[2]; ?>">
					    </div>
					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $row7[3]; ?>">
					    </div>
					  </div>

					  <div class="form-row">
					    <div class="em_form_label form-group col-3">
					    	<input class="em_rec_clear_btn btn btn-primary" type="submit" name="em_clear" value="Clear">
					    </div>
					    <div class="em_form_label form-group col-4">
					      <input class="em_rec_calcu_btn btn btn-primary" type="submit" name="em_calculate" value="Calculate">
					    </div>

					    <div class="em_form_label form-group col-2">
					      <label>Total cost (in $)</label>
					    </div>

					    <div class="em_form_label form-group col-3">
					      <input type="text" class="eminput_border form-control" id="inputZip" value="<?php echo $Em_total_cost ?>">
					    </div>
					  </div>

					  <div>
					  	<input class="em_rec_purchas_btn btn btn-primary" type="submit" name="Em_purchase" value="Purchase">
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
	</script>
</body>
</html>


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@Finctions definition @@@@@@@@@@@@@@@@@@@@@@@@@@@@@  -->

<?php 

	
	function cal_cost($a, $b){
		include "../connections.php";
		$SelectQuery1 = "SELECT Price FROM products WHERE P_id = '$a'";
		$query1 = mysqli_query($con,$SelectQuery1);
		$res1 = mysqli_fetch_array($query1);

		$t_p = intval($res1[0]) * intval($b);
		$re_arr = array($a,$b,$res1[0],$t_p);
		return $re_arr;

	}



	function Purches_func($row,$C_id,$cur_date){

		include '../connections.php';

		$SelectQuery2 = "SELECT * FROM sells_record ORDER BY id DESC LIMIT 1";
		$query2 = mysqli_query($con,$SelectQuery2);
		$res2 = mysqli_fetch_array($query2);
		$sl_no = 1;
		if ($res2[0]!=NULL) {
			if ($res2[0]==$cur_date) {
			$sl_no = intval($res2[1])+1;
			}
		}

		$insertQuery = "INSERT INTO `sells_record` (`Date`, `Serial_no`, `C_id`, `P_id`, `Quantity`, `Total_Cost`, `id`) VALUES ('$cur_date', '$sl_no', '$C_id', '$row[0]', '$row[1]', '$row[3]', NULL)";
		$query3 = mysqli_query($con, $insertQuery);

		$product_quantity = "SELECT Stock FROM products WHERE P_id = '$row[0]'";
		$query4 = mysqli_query($con,$product_quantity);
		$res4 = mysqli_fetch_array($query4);
		$new_stock = intval($res4[0]) - intval($row[1]);

		$update_product = "UPDATE products SET Stock='$new_stock' WHERE P_id='$row[0]'";
		$query5 = mysqli_query($con,$update_product);
	}
?>

 