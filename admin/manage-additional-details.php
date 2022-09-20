<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_REQUEST['del'])) {
        $delid = intval($_GET['del']);
        $sql = "delete from tbladditionalcost  WHERE  id=:delid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':delid', $delid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Additional Cost record deleted successfully";
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

        <title>Smart Power Auto |Admin Manage Additional Details </title>

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

                            <h2 class="page-title">Manage Vehicle Additional Cost</h2>

                            <!-- Zero Configuration Table -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Additional Vehicle Cost Details</div>
                                <div class="panel-body">
                                    <!-- <button onclick="window.location='add-additional-cost.php';" type="button" class="btn btn-success" style="float:right;">Add New Cost</button><br><br><br> -->
                                    <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Vehicle Plate </th>
                                                <th>Vehicle Title</th>
                                                <th>Brand </th>
                                                <!-- <th>Sale Price(RM)</th>
												<th>Cost Price(RM)</th> -->
                                                <th>Additional Cost(RM)</th>
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $id = $_GET['id'];
                                            $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName, tblvehicles.VehiclesPlate,tblvehicles.PriceOfCost,tblvehicles.PriceOfSale, tblvehicles.VehiclesStatus, tbladditionalcost.AdditionalCost, tbladditionalcost.id from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand join tbladditionalcost on tbladditionalcost.VehicleID=tblvehicles.id where tblvehicles.id=:id";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':id', $id, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {                ?>
                                                    <tr>
                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                        <td><?php
                                                            if ($result->VehiclesPlate != "") {
                                                                echo htmlentities($result->VehiclesPlate);
                                                            } else {
                                                                echo "-";
                                                            } ?>
                                                        </td>
                                                        <td><?php echo htmlentities($result->VehiclesTitle); ?></td>
                                                        <td><?php echo htmlentities($result->BrandName); ?></td>
                                                        <!-- <td><php echo htmlentities($result->PriceOfSale); ?></td>
                                                        <td><php echo htmlentities($result->PriceOfCost); ?></td> -->
                                                        <td><?php echo htmlentities($result->AdditionalCost); ?></td>
                                                        <!-- <td>
															<php	
															if($result->VehiclesStatus=="1"){
																echo'<span class="label label-success">Active</span>';
															}else{
																echo'<span class="label label-danger">Inactive</span>';
															}
															?>															
														</td> -->
                                                        <td>
                                                            <a href="edit-additional-cost.php?id=<?php echo $result->id; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                            <a href="manage-additional-cost.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-4">
                                            <button class="btn btn-primary" name="edit" type="button" onclick="back()">Back to previous page</button>
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
        <script>
            var back = function() {
                history.back();
            };
        </script>
    </body>

    </html>
<?php } ?>