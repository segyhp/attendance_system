<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 6 Apr 2017
 * Time: 20:55
 */
session_start(); //starts the session
if($_SESSION['admin_session'] && $_SESSION['session_type'] == 1){ // checks if the user is logged in
}
else{
    header("location: ../login.php"); // redirects if user is not logged in
}
$user = $_SESSION['admin_session']; //assigns user value
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
        <span class="hidden-xs"><?php echo $user; ?></span>
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
            <li class="header">Menu</li>
            <li class=""><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class=""><a href="staff.php"><i class="fa fa-users"></i> <span>Staff</span></a></li>
            <li class="active"><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
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
        <h1>
            Dashboard
            <small>Admin Control Panel</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <!-- Small boxes (Stat box) -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Staff</h3>
            </div>
            <div class="box-body">
                <br>
                <br>
                <table id="table_attendance" class="table table-bordered table-striped tabel-hover data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Date created</th>
                        <th>Staff name</th>
                        <th>Checking in</th>
                        <th>Checking out</th>
                        <th>Working hour(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Date created</th>
                        <th>Staff name</th>
                        <th>Checking in</th>
                        <th>Checking out</th>
                        <th>Working hour(s)</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div><!-- /.box-body -->
        <!-- /.box -->
        <div id="modalstaff" class="modal"><
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Form Master Staff</h4>
                    </div>
                    <!--modal header-->
                    <div class="modal-body">
                        <div class="pad" id="infopanel"></div>
                        <div class="form-horizontal">


                            <div class="form-group">
                                <label class="col-sm-3  control-label">UID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="txtuid" placeholder="UID">
                                    <input type="hidden" id="crudmethod" value="N">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3  control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="txtusername" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3  control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="txtname" placeholder="Name">
                                    <input type="hidden" id="crudmethod" value="N">
                                    <input type="hidden" id="txtid" value="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3  control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" placeholder="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon" class="col-sm-9">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="txtcreated_at" placeholder="Created At"><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>



                            <div class="input-group date">

                            </div>


                            <div class="form-group">
                                <label class="col-sm-3  control-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary " id="btnsave"><i class="fa fa-save"></i> Save</button></div>
                            </div>
                        </div>
                        <!--modal footer-->
                    </div>
                    <!--modal-content-->
                </div>
                <!--modal-dialog modal-lg-->
            </div>
            <!--form-kantor-modal-->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php
include('../include/control_sidebar_footer.php');
?>



