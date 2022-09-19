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
        $id = $_GET['id'];
        $sql = "update tbladditionalcost set VehicleID=:vehicle, 
        Description=:description, AdditionalCost=:additionalcost, Date=:date where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vehicle', $vehicle, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':additionalcost', $additionalcost, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        $msg = "Additional Cost Detail Update successfully";
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

        <title>Smart Power Auto | Admin Update Additional Cost</title>

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

                            <h2 class="page-title">Update Additional Cost</h2>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Update Additional Cost</div>
                                        <div class="panel-body">
                                            <form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">


                                                <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                                                <?php
                                                $id = $_GET['id'];
                                                $ret = "SELECT tblvehicles.VehiclesTitle,tbladditionalcost.VehicleID,tbladditionalcost.id,
                                                tbladditionalcost.Description,tbladditionalcost.AdditionalCost,tbladditionalcost.Date
                                                from tblvehicles join tbladditionalcost on tbladditionalcost.VehicleID=tblvehicles.id
                                                 where tbladditionalcost.id=:id";
                                                $query = $dbh->prepare($ret);
                                                $query->bindParam(':id', $id, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                ?>

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Vehicle Title</label>
                                                            <div class="col-sm-8">
                                                                <select class="selectpicker" name="vehicle" id="vehicle" required>
                                                                    <option value="<?php echo htmlentities($result->VehicleID); ?>"><?php echo htmlentities($vtname = $result->VehiclesTitle); ?> </option>
                                                                    <?php $ret = "select id,VehiclesTitle from tblvehicles";
                                                                    $query = $dbh->prepare($ret);
                                                                    //$query->bindParam(':id',$id, PDO::PARAM_STR);
                                                                    $query->execute();
                                                                    $resultss = $query->fetchAll(PDO::FETCH_OBJ);
                                                                    if ($query->rowCount() > 0) {
                                                                        foreach ($resultss as $results) {
                                                                            if ($results->VehiclesTitle == $vtname) {
                                                                                continue;
                                                                            } else {
                                                                    ?>
                                                                                <option value="<?php echo htmlentities($results->id); ?>"><?php echo htmlentities($results->VehiclesTitle); ?></option>
                                                                    <?php }
                                                                        }
                                                                    } ?>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Description</label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control" name="description" id="description" required><?php echo htmlentities($result->Description); ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Additional Cost</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo htmlentities($result->AdditionalCost); ?>" name="additionalcost" id="additionalcost" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Date</label>
                                                            <div class="col-sm-8">
                                                                <input type="date" class="form-control" value="<?php echo htmlentities($result->Date); ?>" name="date" id="date" required>
                                                            </div>
                                                        </div>
                                                        <div class="hr-dashed"></div>

                                                <?php }
                                                } ?>


                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-4">

                                                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
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