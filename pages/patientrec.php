
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
                    <h1 class="page-header">Patient Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form action="patientrec.php" method="POST">
              <div class="form-group">
                <label for="usr">Patient name:</label>
                <input type="text" class="form-control" name="usr" required autofocus>
              </div>
              <div>
                <button type="submit" name="submited" class="btn btn-info btn-sm">Get patient info</button>
                <a href="patientrec.php"<button type="reset" class="btn btn-warning btn-sm">Clear</button></a>
              </div>
              <div>
                <br>
                <br>

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

                    $name = $_POST['usr'];
                   $result1= mysqli_query($conn,"SELECT name FROM log WHERE name='".$name."'");
                   $values= array(mysqli_fetch_array($result1));
                   echo "<h3> Patient Information  </h3>";
                   echo "<hr>";
                   echo "<br>
                   <label for='usr'>Patient name:</label>
                   ".$values[0][0];


                   $result1= mysqli_query($conn,"SELECT count(dates) FROM log WHERE dates=curdate() AND name='".$name."'");
                    $values= array(mysqli_fetch_array($result1));
                    echo "<br>
                    <label for='usr'>Number of visits today:</label>
                    ".$values[0][0];


                    $result1= mysqli_query($conn,"SELECT count(dates) FROM log WHERE month(dates)=month(curdate()) AND year(dates)=year(curdate()) AND name='".$name."'");
                     $values= array(mysqli_fetch_array($result1));
                     echo "<br>
                     <label for='usr'>Number of visits this month:</label>
                     ".$values[0][0];

                     $result1= mysqli_query($conn,"SELECT count(dates) FROM log WHERE month(dates)=month(curdate()) AND year(dates)=year(curdate()) AND place='Clinic' AND name='".$name."'");
                      $values= array(mysqli_fetch_array($result1));
                      echo "<br>
                      <label for='usr'>Visits in clinic this month:</label>
                      ".$values[0][0];

                      $result1= mysqli_query($conn,"SELECT count(dates) FROM log WHERE month(dates)=month(curdate()) AND year(dates)=year(curdate()) AND place='Home' AND name='".$name."'");
                       $values= array(mysqli_fetch_array($result1));
                       echo "<br>
                       <label for='usr'>Visits in home this month:</label>
                       ".$values[0][0];

                       $result1= mysqli_query($conn,"SELECT count(dates) FROM log WHERE  descr='DrAjayMalik' AND name='".$name."'");
                        $values= array(mysqli_fetch_array($result1));
                        echo "<br>
                        <hr>
                        <label for='usr'>Consulted Dr Ajay Malik:</label>
                        ".$values[0][0];

                        $result1= mysqli_query($conn,"SELECT count(dates) FROM log WHERE descr='DrRichaGuptaMalik' AND name='".$name."'");
                         $values= array(mysqli_fetch_array($result1));
                         echo "<br>
                         <label for='usr'>Consulted Dr Richa Gupta Malik:</label>
                         ".$values[0][0];






                }
                  ?>
              <div>
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
