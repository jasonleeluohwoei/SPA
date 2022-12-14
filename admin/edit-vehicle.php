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
		$vehicleplate = $_POST['vehicleplate'];
		$vehiclemileage = $_POST['vehiclemileage'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$fueltype = $_POST['fueltype'];
		$saletype = $_POST['saletype'];
		$priceofcost = '0.00';
		$priceofsale = '0.00';
		$priceperweek = $_POST['priceperweek'];
		$pricepermonth = $_POST['pricepermonth'];
		$vehiclestatus = $_POST['vehiclestatus'];
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
		$id = intval($_GET['id']);

		$sql = "update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,
		VehiclesPlate=:vehicleplate,VehiclesMileage=:vehiclemileage,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,
		FuelType=:fueltype,VehiclesSaleType=:saletype,PriceOfCost=:priceofcost,PriceOfSale=:priceofsale,
		PricePerWeek=:priceperweek,PricePerMonth=:pricepermonth,VehiclesStatus=:vehiclestatus,AirConditioner=:airconditioner,
		PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,
		PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where id=:id ";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':vehicleplate', $vehicleplate, PDO::PARAM_STR);
		$query->bindParam(':vehiclemileage', $vehiclemileage, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':saletype', $saletype, PDO::PARAM_STR);
		$query->bindParam(':priceperweek', $priceperweek, PDO::PARAM_STR);
		$query->bindParam(':pricepermonth', $pricepermonth, PDO::PARAM_STR);
		$query->bindParam(':priceofcost', $priceofcost, PDO::PARAM_STR);
		$query->bindParam(':priceofsale', $priceofsale, PDO::PARAM_STR);
		$query->bindParam(':vehiclestatus', $vehiclestatus, PDO::PARAM_STR);
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
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$msg = "Data updated successfully";
	} elseif (isset($_POST['submit']) && ($_POST['saletype']) == 'Sale') {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$vehicleplate = $_POST['vehicleplate'];
		$vehiclemileage = $_POST['vehiclemileage'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$fueltype = $_POST['fueltype'];
		$saletype = $_POST['saletype'];
		$priceofcost = $_POST['priceofcost'];
		$priceofsale = $_POST['priceofsale'];
		$priceperweek = '0.00';
		$pricepermonth = '0.00';
		$vehiclestatus = $_POST['vehiclestatus'];
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
		$id = intval($_GET['id']);

		$sql = "update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,
		VehiclesPlate=:vehicleplate,VehiclesMileage=:vehiclemileage,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,
		FuelType=:fueltype,VehiclesSaleType=:saletype,PriceOfCost=:priceofcost,PriceOfSale=:priceofsale,
		PricePerWeek=:priceperweek,PricePerMonth=:pricepermonth,VehiclesStatus=:vehiclestatus,AirConditioner=:airconditioner,
		PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,
		PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where id=:id ";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':vehicleplate', $vehicleplate, PDO::PARAM_STR);
		$query->bindParam(':vehiclemileage', $vehiclemileage, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':saletype', $saletype, PDO::PARAM_STR);
		$query->bindParam(':priceperweek', $priceperweek, PDO::PARAM_STR);
		$query->bindParam(':pricepermonth', $pricepermonth, PDO::PARAM_STR);
		$query->bindParam(':priceofcost', $priceofcost, PDO::PARAM_STR);
		$query->bindParam(':priceofsale', $priceofsale, PDO::PARAM_STR);
		$query->bindParam(':vehiclestatus', $vehiclestatus, PDO::PARAM_STR);
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
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$msg = "Data updated successfully";
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

		<title>Smart Power Auto | Admin Edit Vehicle Info</title>

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

							<h2 class="page-title">Edit Vehicle</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>
										<div class="panel-body">
											<?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
											<?php
											$id = intval($_GET['id']);
											$sql = "select tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid, IFNULL(c.TotalAdditionalCost , 0.00) as TotalAdditionalCost FROM tblvehicles LEFT JOIN tblbrands on tblbrands.id=tblvehicles.VehiclesBrand LEFT JOIN ( select VehicleID as VID, SUM(AdditionalCost) as TotalAdditionalCost from tbladditionalcost GROUP BY VehicleID) c ON (tblvehicles.id = c.VID) where tblvehicles.id=:id order by tblvehicles.id;";
											$query = $dbh->prepare($sql);
											$query->bindParam(':id', $id, PDO::PARAM_STR);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {	?>

													<form method="post" class="form-horizontal" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-sm-2 control-label">Vehicle Model<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result->VehiclesTitle) ?>" required>
															</div>
															<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<select class="selectpicker" name="brandname" required>
																	<option value="<?php echo htmlentities($result->bid); ?>"><?php echo htmlentities($bdname = $result->BrandName); ?> </option>
																	<?php $ret = "select id,BrandName from tblbrands";
																	$query = $dbh->prepare($ret);
																	//$query->bindParam(':id',$id, PDO::PARAM_STR);
																	$query->execute();
																	$resultss = $query->fetchAll(PDO::FETCH_OBJ);
																	if ($query->rowCount() > 0) {
																		foreach ($resultss as $results) {
																			if ($results->BrandName == $bdname) {
																				continue;
																			} else {
																	?>
																				<option value="<?php echo htmlentities($results->id); ?>"><?php echo htmlentities($results->BrandName); ?></option>
																	<?php }
																		}
																	} ?>

																</select>
															</div>
														</div>

														<div class="hr-dashed"></div>
														<div class="form-group">
															<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
															<div class="col-sm-10">
																<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->VehiclesOverview); ?></textarea>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label">Vehicle Plate<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="vehicleplate" class="form-control" value="<?php echo htmlentities($result->VehiclesPlate); ?>" required>
															</div>
															<label class="col-sm-2 control-label">Vehicle Mileage (Per KM)<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="vehiclemileage" class="form-control" value="<?php echo htmlentities($result->VehiclesMileage); ?>" required>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->ModelYear); ?>" required>
															</div>
															<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity); ?>" required>
															</div>
														</div>

														<div class="form-group">

															<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<select class="selectpicker" name="fueltype" required>
																	<option value="<?php echo htmlentities($result->FuelType); ?>"> <?php echo htmlentities($result->FuelType); ?> </option>

																	<option value="Petrol">Petrol</option>
																	<option value="Diesel">Diesel</option>
																	<option value="Hybrid">Hybrid</option>
																</select>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
																<div class="col-sm-4">
																	<select class="selectpicker" name="vehiclestatus" required>
																		<?php if ($result->VehiclesStatus == 1) {
																		?>
																			<option value="<?php echo htmlentities($result->VehiclesStatus); ?>"> Active </option>
																		<?php } else { ?>
																			<option value="<?php echo htmlentities($result->VehiclesStatus); ?>"> Inactive </option>
																		<?php } ?>
																		<option value="1">Active</option>
																		<option value="0">Inactive</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="hr-dashed"></div>
														<h4><b>Price Info</b></h4>
														<div class="form-group">
															<label for="saletype" class="col-sm-2 control-label">Select Sale Type<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<select id="saletype" class="selectpicker" name="saletype" onchange="Selecttype(this.value);" required>
																	<option value="<?php echo htmlentities($result->VehiclesSaleType); ?>"> <?php echo htmlentities($result->VehiclesSaleType); ?> </option>
																	<option value="Rental">Rental</option>
																	<option value="Sale">Sale</option>
																</select>
															</div>
														</div>

														<div id="rentalbox" class="form-group">
															<!-- <label class="col-sm-2 control-label">Price Per Day (RM)<span style="color:red">*</span></label>
																<div class="col-sm-2">
																	<input id="priceperday" type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay); ?>" required>
																</div> -->
															<label class="col-sm-2 control-label">Price Per Week (RM)<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input id="priceperweek" type="text" name="priceperweek" class="form-control" value="<?php echo htmlentities($result->PricePerWeek); ?>" required>
															</div>
															<label class="col-sm-2 control-label">Price Per Month (RM)<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input id="pricepermonth" type="text" name="pricepermonth" class="form-control" value="<?php echo htmlentities($result->PricePerMonth); ?>" required>
															</div>
														</div>

														<div id="salebox" class="form-group">
															<label class="col-sm-2 control-label">Price of Cost (RM)<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input id="priceofcost" type="text" name="priceofcost" class="form-control" value="<?php echo htmlentities($result->PriceOfCost); ?>" required>
															</div>
															<label class="col-sm-2 control-label">Price of Sale (RM)<span style="color:red">*</span></label>
															<div class="col-sm-4">
																<input id="priceofsale" type="text" name="priceofsale" class="form-control" value="<?php echo htmlentities($result->PriceOfSale); ?>" required>
															</div>
														</div>
														<div id="salebox1" class="form-group">
															<label class="col-sm-2 control-label">Total Additional Cost (RM)</label>
															<div class="col-sm-4">
																<input id="totaladditionalcost" type="text" name="totaladditionalcost" class="form-control" value="<?php echo htmlentities($result->TotalAdditionalCost); ?>" readonly>
															</div>
															<div id="tpoc">
																<label class="col-sm-2 control-label">Total Price of Cost (RM)</label>
																<div class="col-sm-4">
																	<input id="totalpriceofcost" type="text" name="totalpriceofcost" class="form-control" value="<?php echo htmlentities(number_format((float)$result->PriceOfCost + $result->TotalAdditionalCost, 2, '.', '')); ?>" readonly>
																</div>
															</div>
														</div>

														<script>
															function Selecttype() {
																var d = document.getElementById("saletype").value;
																var rental = document.getElementById("rentalbox");
																var sale = document.getElementById("salebox");
																var tpoc = document.getElementById("tpoc");
																if (d == "Rental") {
																	rental.style.display = "block";
																	sale.style.display = "none";
																	tpoc.style.display = "none";
																} else if (d == "Sale") {
																	rental.style.display = "none";
																	sale.style.display = "block";
																	tpoc.style.display = "block";
																} else if (d == "Select") {
																	rental.style.display = "none";
																	sale.style.display = "none";
																	tpoc.style.display = "none";
																}
															}

															Selecttype();
														</script>
														<br><br>


														<div class="hr-dashed"></div>
														<div class="form-group">
															<div class="col-sm-12">
																<h4><b>Vehicle Images</b></h4>
															</div>
														</div>


														<div class="form-group">
															<div class="col-sm-4">
																Image 1 <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 1</a>
															</div>
															<div class="col-sm-4">
																Image 2<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 2</a>
															</div>
															<div class="col-sm-4">
																Image 3<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 3</a>
															</div>
														</div>


														<div class="form-group">
															<div class="col-sm-4">
																Image 4<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" width="300" height="200" style="border:solid 1px #000">
																<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 4</a>
															</div>
															<div class="col-sm-4">
																Image 5
																<?php if ($result->Vimage5 == "") {
																	echo htmlentities("File not available");
																} else { ?>
																	<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" width="300" height="200" style="border:solid 1px #000">
																	<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 5</a>
																<?php } ?>
															</div>
															<div class="col-sm-4">
																Image 6
																<?php if ($result->Vimage6 == "") {
																	echo htmlentities("File not available");
																} else { ?>
																	<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage6); ?>" width="300" height="200" style="border:solid 1px #000">
																	<a href="changeimage6.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 6</a>
																<?php } ?>
															</div>

														</div>
														<div class="form-group">
															<div class="col-sm-4">
																Image 7
																<?php if ($result->Vimage7 == "") {
																	echo htmlentities("File not available");
																} else { ?>
																	<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage7); ?>" width="300" height="200" style="border:solid 1px #000">
																	<a href="changeimage7.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 7</a>
																<?php } ?>
															</div>
															<div class="col-sm-4">
																Image 8
																<?php if ($result->Vimage8 == "") {
																	echo htmlentities("File not available");
																} else { ?>
																	<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage8); ?>" width="300" height="200" style="border:solid 1px #000">
																	<a href="changeimage8.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 8</a>
																<?php } ?>
															</div>
															<div class="col-sm-4">
																Image 9
																<?php if ($result->Vimage9 == "") {
																	echo htmlentities("File not available");
																} else { ?>
																	<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage9); ?>" width="300" height="200" style="border:solid 1px #000">
																	<a href="changeimage9.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 9</a>
																<?php } ?>
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
													<?php if ($result->AirConditioner == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="airconditioner" checked value="1">
															<label for="inlineCheckbox1"> Air Conditioner </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="airconditioner" value="1">
															<label for="inlineCheckbox1"> Air Conditioner </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->PowerDoorLocks == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" checked value="1">
															<label for="inlineCheckbox2"> Power Door Locks </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-success checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="powerdoorlocks" value="1">
															<label for="inlineCheckbox2"> Power Door Locks </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->AntiLockBrakingSystem == 1) { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" checked value="1">
															<label for="inlineCheckbox3"> AntiLock Braking System </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="antilockbrakingsys" value="1">
															<label for="inlineCheckbox3"> AntiLock Braking System </label>
														</div>
													<?php } ?>
												</div>
												<div class="col-sm-3">
													<?php if ($result->BrakeAssist == 1) {
													?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="brakeassist" checked value="1">
															<label for="inlineCheckbox3"> Brake Assist </label>
														</div>
													<?php } else { ?>
														<div class="checkbox checkbox-inline">
															<input type="checkbox" id="inlineCheckbox1" name="brakeassist" value="1">
															<label for="inlineCheckbox3"> Brake Assist </label>
														</div>
													<?php } ?>
												</div>

												<div class="form-group">
													<?php if ($result->PowerSteering == 1) {
													?>
														<div class="col-sm-3">
															<div class="checkbox checkbox-inline">
																<input type="checkbox" id="inlineCheckbox1" name="powersteering" checked value="1">
																<label for="inlineCheckbox1"> Power Steering </label>
															</div>
														<?php } else { ?>
															<div class="col-sm-3">
																<div class="checkbox checkbox-inline">
																	<input type="checkbox" id="inlineCheckbox1" name="powersteering" value="1">
																	<label for="inlineCheckbox1"> Power Steering </label>
																</div>
															<?php } ?>
															</div>
															<div class="col-sm-3">
																<?php if ($result->DriverAirbag == 1) {
																?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1">
																		<label for="inlineCheckbox2">Driver Airbag</label>
																	</div>
																<?php } else { ?>
																	<div class="checkbox checkbox-inline">
																		<input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1">
																		<label for="inlineCheckbox2">Driver Airbag</label>
																	<?php } ?>
																	</div>
																	<div class="col-sm-3">
																		<?php if ($result->DriverAirbag == 1) {
																		?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" checked value="1">
																				<label for="inlineCheckbox3"> Passenger Airbag </label>
																			</div>
																		<?php } else { ?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="passengerairbag" value="1">
																				<label for="inlineCheckbox3"> Passenger Airbag </label>
																			</div>
																		<?php } ?>
																	</div>
																	<div class="col-sm-3">
																		<?php if ($result->PowerWindows == 1) {
																		?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1">
																				<label for="inlineCheckbox3"> Power Windows </label>
																			</div>
																		<?php } else { ?>
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1">
																				<label for="inlineCheckbox3"> Power Windows </label>
																			</div>
																		<?php } ?>
																	</div>


																	<div class="form-group">
																		<div class="col-sm-3">
																			<?php if ($result->CDPlayer == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="cdplayer" checked value="1">
																					<label for="inlineCheckbox1"> CD Player </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="cdplayer" value="1">
																					<label for="inlineCheckbox1"> CD Player </label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CentralLocking == 1) {
																			?>
																				<div class="checkbox  checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="centrallocking" checked value="1">
																					<label for="inlineCheckbox2">Central Locking</label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-success checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="centrallocking" value="1">
																					<label for="inlineCheckbox2">Central Locking</label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CrashSensor == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="crashcensor" checked value="1">
																					<label for="inlineCheckbox3"> Crash Sensor </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="crashcensor" value="1">
																					<label for="inlineCheckbox3"> Crash Sensor </label>
																				</div>
																			<?php } ?>
																		</div>
																		<div class="col-sm-3">
																			<?php if ($result->CrashSensor == 1) {
																			?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="leatherseats" checked value="1">
																					<label for="inlineCheckbox3"> Leather Seats </label>
																				</div>
																			<?php } else { ?>
																				<div class="checkbox checkbox-inline">
																					<input type="checkbox" id="inlineCheckbox1" name="leatherseats" value="1">
																					<label for="inlineCheckbox3"> Leather Seats </label>
																				</div>
																			<?php } ?>
																		</div>
																	</div>

															<?php }
													} ?>


															<div class="form-group">
																<div class="col-sm-8 col-sm-offset-2">
																	<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
																	<button class="btn btn-primary" name="edit" type="button" onclick="document.location.href='manage-vehicles.php';" style=" margin-top:4%">Back to previous page</button>
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