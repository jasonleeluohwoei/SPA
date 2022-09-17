<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit']) && ($_POST['saletype']) == 'Rental') {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$vehicleplate = $_POST['vehicleplate'];
		$vehiclemileage = $_POST['vehiclemileage'];
		$fueltype = $_POST['fueltype'];
		$saletype = $_POST['saletype'];
		$priceofcost = '0.00';
		$priceofsale = '0.00';
		// $priceperday = $_POST['priceperday'];
		$priceperweek = $_POST['priceperweek'];
		$pricepermonth = $_POST['pricepermonth'];
		$vehiclestatus = $_POST['vehiclestatus'];
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$vimage5 = $_FILES["img5"]["name"];
		$vimage6 = $_FILES["img6"]["name"];
		$vimage7 = $_FILES["img7"]["name"];
		$vimage8 = $_FILES["img8"]["name"];
		$vimage9 = $_FILES["img9"]["name"];
		$airconditioner = $_POST['airconditioner'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$antilockbrakingsys = $_POST['antilockbrakingsys'];
		$brakeassist = $_POST['brakeassist'];
		$powersteering = $_POST['powersteering'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$powerwindow = $_POST['powerwindow'];
		$cdplayer = $_POST['cdplayer'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$leatherseats = $_POST['leatherseats'];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
		move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);
		move_uploaded_file($_FILES["img6"]["tmp_name"], "img/vehicleimages/" . $_FILES["img6"]["name"]);
		move_uploaded_file($_FILES["img7"]["tmp_name"], "img/vehicleimages/" . $_FILES["img7"]["name"]);
		move_uploaded_file($_FILES["img8"]["tmp_name"], "img/vehicleimages/" . $_FILES["img8"]["name"]);
		move_uploaded_file($_FILES["img9"]["tmp_name"], "img/vehicleimages/" . $_FILES["img9"]["name"]);

		$sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,VehiclesSaleType,PricePerWeek,PricePerMonth,PriceOfCost,
		PriceOfSale,FuelType,ModelYear,SeatingCapacity,VehiclesPlate,VehiclesMileage,VehiclesStatus,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,Vimage6,Vimage7,Vimage8,Vimage9,AirConditioner,PowerDoorLocks,
		AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,
		CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:saletype,:priceperweek,:pricepermonth,:priceofcost,:priceofsale,
		:fueltype,:modelyear,:seatingcapacity,:vehicleplate,:vehiclemileage,:vehiclestatus,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:vimage6,:vimage7,:vimage8,:vimage9,:airconditioner,:powerdoorlocks,
		:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";

		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':saletype', $saletype, PDO::PARAM_STR);
		$query->bindParam(':priceperweek', $priceperweek, PDO::PARAM_STR);
		$query->bindParam(':pricepermonth', $pricepermonth, PDO::PARAM_STR);
		$query->bindParam(':priceofcost', $priceofcost, PDO::PARAM_STR);
		$query->bindParam(':priceofsale', $priceofsale, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vehicleplate', $vehicleplate, PDO::PARAM_STR);
		$query->bindParam(':vehiclemileage', $vehiclemileage, PDO::PARAM_STR);
		$query->bindParam(':vehiclestatus', $vehiclestatus, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
		$query->bindParam(':vimage6', $vimage6, PDO::PARAM_STR);
		$query->bindParam(':vimage7', $vimage7, PDO::PARAM_STR);
		$query->bindParam(':vimage8', $vimage8, PDO::PARAM_STR);
		$query->bindParam(':vimage9', $vimage9, PDO::PARAM_STR);
		$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
		$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
		$query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
		$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
		$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
		$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Vehicle posted successfully for rental";
			// header('location:manage-vehicles.php');
			// exit();
		} else {
			$error = "Something went wrong. Please try again (rental)";
			// header('location:manage-vehicles.php');
			// exit();
		}
	} elseif (isset($_POST['submit']) && ($_POST['saletype']) == 'Sale') {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$vehicleplate = $_POST['vehicleplate'];
		$vehiclemileage = $_POST['vehiclemileage'];
		$fueltype = $_POST['fueltype'];
		$saletype = $_POST['saletype'];
		$priceofcost = $_POST['priceofcost'];
		$priceofsale = $_POST['priceofsale'];
		$priceperweek = '0.00';
		$pricepermonth = '0.00';
		$vehiclestatus = $_POST['vehiclestatus'];
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$vimage5 = $_FILES["img5"]["name"];
		$vimage6 = $_FILES["img6"]["name"];
		$vimage7 = $_FILES["img7"]["name"];
		$vimage8 = $_FILES["img8"]["name"];
		$vimage9 = $_FILES["img9"]["name"];
		$airconditioner = $_POST['airconditioner'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$antilockbrakingsys = $_POST['antilockbrakingsys'];
		$brakeassist = $_POST['brakeassist'];
		$powersteering = $_POST['powersteering'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$powerwindow = $_POST['powerwindow'];
		$cdplayer = $_POST['cdplayer'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$leatherseats = $_POST['leatherseats'];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
		move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);
		move_uploaded_file($_FILES["img6"]["tmp_name"], "img/vehicleimages/" . $_FILES["img6"]["name"]);
		move_uploaded_file($_FILES["img7"]["tmp_name"], "img/vehicleimages/" . $_FILES["img7"]["name"]);
		move_uploaded_file($_FILES["img8"]["tmp_name"], "img/vehicleimages/" . $_FILES["img8"]["name"]);
		move_uploaded_file($_FILES["img9"]["tmp_name"], "img/vehicleimages/" . $_FILES["img9"]["name"]);

		$sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,VehiclesSaleType,PricePerWeek,PricePerMonth,PriceOfCost,
		PriceOfSale,FuelType,ModelYear,SeatingCapacity,VehiclesPlate,VehiclesMileage,VehiclesStatus,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,Vimage6,Vimage7,Vimage8,Vimage9,AirConditioner,PowerDoorLocks,
		AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,
		CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:saletype,:priceperweek,:pricepermonth,:priceofcost,:priceofsale,
		:fueltype,:modelyear,:seatingcapacity,:vehicleplate,:vehiclemileage,:vehiclestatus,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:vimage6,:vimage7,:vimage8,:vimage9,:airconditioner,:powerdoorlocks,
		:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";

		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':saletype', $saletype, PDO::PARAM_STR);
		$query->bindParam(':priceperweek', $priceperweek, PDO::PARAM_STR);
		$query->bindParam(':pricepermonth', $pricepermonth, PDO::PARAM_STR);
		$query->bindParam(':priceofcost', $priceofcost, PDO::PARAM_STR);
		$query->bindParam(':priceofsale', $priceofsale, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vehicleplate', $vehicleplate, PDO::PARAM_STR);
		$query->bindParam(':vehiclemileage', $vehiclemileage, PDO::PARAM_STR);
		$query->bindParam(':vehiclestatus', $vehiclestatus, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
		$query->bindParam(':vimage6', $vimage6, PDO::PARAM_STR);
		$query->bindParam(':vimage7', $vimage7, PDO::PARAM_STR);
		$query->bindParam(':vimage8', $vimage8, PDO::PARAM_STR);
		$query->bindParam(':vimage9', $vimage9, PDO::PARAM_STR);
		$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
		$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
		$query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
		$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
		$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
		$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Vehicle posted successfully for sale";
			// header('location:manage-vehicles.php');
			// exit();
		} else {
			$error = "Something went wrong. Please try again (sale)";
			// header('location:manage-vehicles.php');
			// exit();
		}
	}


?>
	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

		<title>Smart Power Auto | Admin Post Vehicle</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>

	</head>

	<body>
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Post A Vehicle</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>
										<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="vehicletitle" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="brandname" required>
															<option value=""> Select </option>
															<?php $ret = "select id,BrandName from tblbrands";
															$query = $dbh->prepare($ret);
															//$query->bindParam(':id',$id, PDO::PARAM_STR);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															if ($query->rowCount() > 0) {
																foreach ($results as $result) {
															?>
																	<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
															<?php }
															} ?>

														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
													<div class="col-sm-10">
														<textarea class="form-control" name="vehicalorcview" rows="3" required></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="modelyear" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="seatingcapacity" class="form-control" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Vehicle Plate</label>
													<div class="col-sm-4">
														<input type="text" name="vehicleplate" class="form-control">
													</div>
													<label class="col-sm-2 control-label">Vehicle Mileage (Per KM)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="vehiclemileage" class="form-control" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="fueltype" required>
															<option value=""> Select </option>

															<option value="Petrol">Petrol</option>
															<option value="Diesel">Diesel</option>
															<option value="Hybrid">Hybrid</option>
														</select>
													</div>

													<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="vehiclestatus" required>
															<option value=""> Select </option>

															<option value="1">Active</option>
															<option value="0">Inactive</option>
														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>
												<h4><b>Price Info</b></h4>

												<div class="form-group">
													<label for="saletype" class="col-sm-2 control-label">Select Sale Type<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select id="saletype" class="selectpicker" name="saletype" onchange="Selecttype(this.value);" required>
															<option value="Select"> Select</option>
															<option value="Rental">Rental</option>
															<option value="Sale">Sale</option>
														</select>
													</div>
												</div>

												<div id="rentalbox" class="form-group">
													<!-- <label class="col-sm-2 control-label">Price Per Day (RM)<span style="color:red">*</span></label>
													<div class="col-sm-2">
														<input id="priceperday" type="text" name="priceperday" class="form-control">
													</div> -->
													<label class="col-sm-2 control-label">Price Per Week (RM)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input id="priceperweek" type="text" name="priceperweek" class="form-control">
													</div>
													<label class="col-sm-2 control-label">Price Per Month (RM)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input id="pricepermonth" type="text" name="pricepermonth" class="form-control">
													</div>
												</div>

												<div id="salebox" class="form-group">
													<label class="col-sm-2 control-label">Price of Sale (RM)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input id="priceofsale" type="text" name="priceofsale" class="form-control">
													</div>
													<label class="col-sm-2 control-label">Price of Cost (RM)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input id="priceofcost" type="text" name="priceofcost" class="form-control">
													</div>
												</div>
												<!-- <div id="salebox1" class="form-group">
													<label class="col-sm-2 control-label">Total Additional Cost (RM)</label>
													<div class="col-sm-4">
														<input id="totaladditionalcost" type="text" name="totaladditionalcost" class="form-control" readonly>
													</div>
													<label class="col-sm-2 control-label">Total Price of Cost (RM)</label>
													<div class="col-sm-4">
														<input id="totalpriceofcost" type="text" name="totalpriceofcost" class="form-control" readonly>
													</div>
												</div> -->

												<script>
													function Selecttype() {
														var d = document.getElementById("saletype").value;
														var rental = document.getElementById("rentalbox");
														var sale = document.getElementById("salebox");
														// var sale1 = document.getElementById("salebox1");
														if (d == "Rental") {
															rental.style.display = "block";
															sale.style.display = "none";
															// sale1.style.display = "none";
														} else if (d == "Sale") {
															rental.style.display = "none";
															sale.style.display = "block";
															// sale1.style.display = "block";
														} else if (d == "Select") {
															rental.style.display = "none";
															sale.style.display = "none";
															// sale1.style.display = "none";
														}
													}

													Selecttype();
												</script>
												<br><br>

												<!-- <table class="table" id="additionalTable">
													<thead>
														<tr>
															<th style="width:40%;">Description</th>
															<th style="width:20%;">Cost (RM)</th>
															<th style="width:20%;">Date</th>
															<th style="width:20%;"></th>
														</tr>
													</thead>
													<tbody>
														<td id="col0">
															<div class="form-group">
															<input type="text" name="description[]" value="" class="form-control" style="width:600px;" />
															</div>
														</td>
														<td id="col1">
															<div class="form-group">
															<input type="text" name="cost[]" value="" class="form-control" style="width:300px;"/>
															</div>
														</td>
														<td id="col2">
															<div class="form-group">
															<input type="date" name="date[]" value="" class="form-control" style="width:300px;"/>
															</div>
														</td>
													</tbody>
													
												</table> -->

												<script>
													
												</script>
												<br><br>

												<div class="hr-dashed"></div>


												<div class="form-group">
													<div class="col-sm-12">
														<h4><b>Upload Images</b></h4>
													</div>
												</div>


												<div class="form-group">
													<div class="col-sm-4">
														Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
													</div>
													<div class="col-sm-4">
														Image 2<span style="color:red">*</span><input type="file" name="img2" required>
													</div>
													<div class="col-sm-4">
														Image 3<span style="color:red">*</span><input type="file" name="img3" required>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-4">
														Image 4<span style="color:red">*</span><input type="file" name="img4" required>
													</div>
													<div class="col-sm-4">
														Image 5<input type="file" name="img5">
													</div>
													<div class="col-sm-4">
														Image 6<input type="file" name="img6">
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-4">
														Image 7<input type="file" name="img7" required>
													</div>
													<div class="col-sm-4">
														Image 8<input type="file" name="img8">
													</div>
													<div class="col-sm-4">
														Image 9<input type="file" name="img9">
													</div>
												</div>
												<div class="hr-dashed"></div>
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Accessories</div>
										<div class="panel-body">


											<div class="form-group">
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
														<label for="airconditioner"> Air Conditioner </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
														<label for="powerdoorlocks"> Power Door Locks </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
														<label for="antilockbrakingsys"> AntiLock Braking System </label>
													</div>
												</div>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
													<label for="brakeassist"> Brake Assist </label>
												</div>
											</div>



											<div class="form-group">
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="powersteering" name="powersteering" value="1">
														<input type="checkbox" id="powersteering" name="powersteering" value="1">
														<label for="inlineCheckbox5"> Power Steering </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="driverairbag" name="driverairbag" value="1">
														<label for="driverairbag">Driver Airbag</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
														<label for="passengerairbag"> Passenger Airbag </label>
													</div>
												</div>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="powerwindow" name="powerwindow" value="1">
													<label for="powerwindow"> Power Windows </label>
												</div>
											</div>


											<div class="form-group">
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="cdplayer" name="cdplayer" value="1">
														<label for="cdplayer"> CD Player </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox h checkbox-inline">
														<input type="checkbox" id="centrallocking" name="centrallocking" value="1">
														<label for="centrallocking">Central Locking</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="crashcensor" name="crashcensor" value="1">
														<label for="crashcensor"> Crash Sensor </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="leatherseats" name="leatherseats" value="1">
														<label for="leatherseats"> Leather Seats </label>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>




											</form>

										</div>
									</div>
								</div>
							</div>



						</div>
					</div>



				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>


	</body>

	</html>
<?php } ?>