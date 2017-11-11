<?php
// Designed by Vaishak Murali .
  session_start();
  if(!isset($_SESSION['username'])){
  $conn = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
    header("location: login.php");
  }
  if($_SESSION['type']=="admin"){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="90">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arrav Clinic</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require 'nav2.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                      $soc = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
                                      $sqls ="SELECT count(sid) AS total from log WHERE month(curdate())=Month(dates) AND year(curdate())=year(dates)";
                                      $result =mysqli_query($soc,$sqls);
                                      $values =mysqli_fetch_assoc($result);
                                      $a= $values['total'];
                                      echo "$a";
                                  ?>
                                    </div>
                                    <div>Total patient treated this month</div>
                                </div>
                            </div>
                        </div>

                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                        $soc = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
                                        $sqls ="SELECT count(sid) AS total from schedule WHERE curdate()=(dates)";
                                        $result =mysqli_query($soc,$sqls);
                                        $values =mysqli_fetch_assoc($result);
                                        $a= $values['total'];
                                        echo "$a";
                                    ?>
                                    </div>
                                    <div>Total number of appointments for today</div>
                                </div>
                            </div>
                        </div>

                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                      $soc = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
                                      $sqls ="SELECT count(sid) AS total from log WHERE month(curdate())=Month(dates) AND year(curdate())=year(dates) AND place='Home'";
                                      $result =mysqli_query($soc,$sqls);
                                      $values =mysqli_fetch_assoc($result);
                                      $a= $values['total'];
                                      echo "$a";
                                      ?>
                                    </div>
                                    <div>Total patient treated not in clinic this month</div>
                                </div>
                            </div>
                        </div>

                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"></i></span>
                                <div class="clearfix"></div>
                            </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                      $soc = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
                                      $sqls ="SELECT count(sid) AS total from log WHERE month(curdate())=Month(dates) AND year(curdate())=year(dates) AND place='Clinic'";
                                      $result =mysqli_query($soc,$sqls);
                                      $values =mysqli_fetch_assoc($result);
                                      $a= $values['total'];
                                      echo "$a";
                                      ?>
                                    </div>
                                    <div>Total patient treated in clinic this month</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.row -->

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
