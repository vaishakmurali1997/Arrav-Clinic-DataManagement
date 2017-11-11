<!DOCTYPE html>
<html lang="en">

<head>
    <!--Instructions to browser  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Vaishak" content="">

    <title>Aarav Clinic </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!-- Content goes here -->
<body background="abc.jpg">

    <div class="container">
      <br>
      <br>
      <br>
      <center> <img class="img-responsive" src="man.png" height="20%" width="20%"> </center>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="glyphicon glyphicon-alert"></i>  Please login </h3>
                    </div>
                    <div class="panel-body">
                        <form name="login"  method="POST" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="user" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" required>
                                </div>
                                <input type="submit" name="submit" class="btn btn-success btn-sm" value="LogIn">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>


<?php
// Designed by Vaishak Murali.
  session_start();
  unset($_SESSION["username"]);
  if(isset($_POST['submit'])){
    $conn = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Making website secure from xss attacks
    $username = stripcslashes($username);
    $passsword = stripcslashes($password);
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    $encypass = md5(md5($username).$password);
    //Checking for valid login
    $result = mysqli_query($conn,"SELECT * FROM login WHERE useername = '$username' AND password ='$encypass'");
    $rows = mysqli_num_rows($result);

    if ($rows==1){
      // using sessions
      $security = mysqli_query($conn,"SELECT usertype FROM login WHERE useername = '$username' AND password ='$encypass'");
      $values = array(mysqli_fetch_array($security));
      if($values[0]['usertype']=="admin"){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['type']='admin';
        header("location: dashboard.php");
      }
      if($values[0]['usertype']=="emp"){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['type']='emp';
        header("location: dashboard2.php");
      }
    }

    else {
      echo "<div class='alert alert-danger'><center><strong>Failed to login!</strong></center></div>";
    }

  }
?>
