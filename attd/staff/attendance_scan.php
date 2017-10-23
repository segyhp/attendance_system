<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 6 Apr 2017
 * Time: 20:55
 */
session_start(); //starts the session
if($_SESSION['staff_session'] && $_SESSION['session_type'] == 2){ // checks if the user is logged in
}
else{
    header("location: ../login.php"); // redirects if user is not logged in
}
$user = $_SESSION['staff_session'];
$date = $_SESSION['created_at'];
$date = date('d M Y', $date);//assigns user value
include('../include/header.php');
include('../include/main_header.php');
?>

<?php
include('../config/db_connection.php');
$sql = "SELECT * FROM staff";
$query = mysqli_query($db,$sql);
$total_staff = mysqli_num_rows($query);


?>

<!-- User Account Menu -->
<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        < <span class="hidden-xs"><?php echo $user; ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
                <?php echo $user; ?>
                <small>Member since <?php echo $date; ?></small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
<!-- Control Sidebar Toggle Button -->
<li>
    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
</li>
</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user;?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="attendance_scan.php"><i class="fa fa-credit-card"></i> Scan</a></li>
                    <li><a href="attendance_report.php"><i class="fa fa-file-o"></i> Report</a></li>

                </ul>
            </li>
            <li class="header">Users</li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Logs</span></a></li>
            <li><a href="../config/logout.php"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard
            <small>Admin Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Check In</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-horizontal">
                            <div class="form-group">
                                <label>Select Name</label>
                                <select class="choosename form-control" id="choosename"></select>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary" id="btncheckin">Check In</button>
                        </div>
                            </div>
                            </div>

                        </div>

                </div>
                <!-- /.box-body -->

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Check Out</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label>Select Name</label>
                                <select class="choosename form-control" name="choosename" id="choosename"></select>
                            </div>
                            <div class="form-group">
                                <td><button type="submit" class="btn btn-block btn-danger" id="btncheckout" name="btncheckout">Check Out</button></td>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                </div>
        <!-- /.box-body -->
    
            
            


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php
include('../include/control_sidebar_footer.php');
?>



