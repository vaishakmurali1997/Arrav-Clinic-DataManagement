<?php
// Designed by Vaishak Murali.
  session_start();
  if(!isset($_SESSION['username'])){
  $conn = mysqli_connect("localhost","root","ramji","aarav") or die("Error");
    header("location: login.php");
  }
  if ($_SESSION['type']=="admin") {
    # code...
    header("location: login.php");
  }
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="dashboard2.php"> Aarav Clinic Data-Management  </a>
    </div>
    <!-- /.navbar-header -->


    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="dashboard2.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-blackboard"></i> My Workspace<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="addschedule.php">Add Appointment</a>
                        </li>
                        <li>
                            <a href="viewappointment.php">View Appointment</a>
                        </li>
                        <li>
                            <a href="editschedule.php">Edit Appointment</a>
                        </li>
                        <li>
                            <a href="removeschedule.php">Remove Appointment</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> User accounts settings <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="changepass.php">Change password</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="logout.php"><i class="fa fa-user fa-fw"></i> Logout </a>

                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
