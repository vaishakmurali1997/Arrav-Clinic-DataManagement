
<!DOCTYPE html>
<html lang="en">

<head>

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
        <?php require 'nav.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form action="payment.php" method="POST">
              <div class="form-group">
                <label for="pay">Particulars:</label>
                <input type="text" class="form-control" name="pay" required autofocus>
              </div>
              <div>
                  <label for="amount">Amount:</label>
                  <input type="text" class="form-control" name="amount" required autofocus>
              </div>
              <br>
              <div>
                <button type="submit" name="submited" class="btn btn-success btn-sm">Accept Payment</button>
                <button type="reset" class="btn btn-warning btn-sm">Clear</button>
              </div>
          </form>


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

<?php
// Designed by Vaishak Murali.
  session_start();
  if(!isset($_SESSION['username'])){
  $conn = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
    header("location: login.php");
  }
  if(isset($_POST['submited'])){
    $conn = mysqli_connect("localhost","root","ramji","aarav") or die("Error");

  if($_SESSION['type']=="emp"){
    header("location: login.php");
  }

    $particulars = $_POST['pay'];
    $amount = $_POST['amount'];


    $sql = "INSERT INTO pay (particulars,dates,amount) VALUES ('".$particulars."',curdate(),'".$amount."')";

      if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'><center>
        <strong>Amount recorded!</strong></center></div>";
      }
      else{
        echo "<div class='alert alert-danger'><center>
        <strong>Error: Fatal!. </strong></center></div>";
      }

    }
?>
