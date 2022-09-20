<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Code for change password	
    if (isset($_POST['submit'])) {
        $vehicle = $_POST['vehicle'];
        $description = $_POST['description'];
        $additionalcost = $_POST['additionalcost'];
        $date = $_POST['date'];
        $sql = "INSERT INTO tbladditionalcost(VehicleID,Description,AdditionalCost,Date) VALUES(:vehicle,:description,:additionalcost,:date)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vehicle', $vehicle, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':additionalcost', $additionalcost, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "Additional Cost Detail Added successfully";
        } else {
            $error = "Something went wrong. Please try again";
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

        <title>Smart Power Auto | Admin Add Additional Cost</title>

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

                            <h2 class="page-title">Add Additional Cost</h2>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Add Additional Cost</div>
                                        <div class="panel-body">
                                            <form method="post" name="addcost" class="form-horizontal" onSubmit="return valid();">


                                                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Vehicle Plate</label>
                                                    <div class="col-sm-8">
                                                        <select class="selectpicker" name="vehicle" required>
                                                            <option value=""> Select </option>
                                                            <?php $ret = "select id,VehiclesPlate from tblvehicles";
                                                            $query = $dbh->prepare($ret);
                                                            //$query->bindParam(':id',$id, PDO::PARAM_STR);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) {
                                                            ?>
                                                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->VehiclesPlate); ?></option>
                                                            <?php }
                                                            } ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Description</label>
                                                    <div class="col-sm-8">
                                                        <textarea type="text" class="form-control" name="description" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Additional Cost</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="additionalcost" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">Date</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" name="date" id="date" required>
                                                    </div>
                                                </div>
                                                <div class="hr-dashed"></div>




                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-4">

                                                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                                        <button class="btn btn-primary" name="edit" type="button" onclick="back()">Back to previous page</button>
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
        <script>
			var back = function() {
				history.back();
			};
		</script>

    </body>

    </html>
<?php } ?>