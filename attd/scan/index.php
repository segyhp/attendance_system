<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 2 Mei 2017
 * Time: 13:28
 */
session_start();
include('../include/header.php');
include('../include/main_header_top_nav.php');
include('../config/db_connection.php');

?>
<!-- Content Wrapper. Contains page content -->
<!-- Full Width Column -->
<div class="content-wrapper">
    <br>
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <!-- Default box -->
            <div id="scan">
            <div class="box">
                <div class="box-header box-solid bg-teal-gradient with-border">
                    <i class="fa fa-credit-card"></i>
                    <h3 class="box-title">Title</h3>

                </div>
               
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                                <i class="fa fa-spin fa-refresh"></i>&nbsp; Scan Your Card &nbsp;<i class="fa fa-spin fa-refresh"></i>
                            </button>
                            <hr>
                        </div>
                    </div>
                    <div id="baca">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
           </div>
            </div>
<!-- solid sales graph -->
            <div class="box ">
                <div class="box-header box-solid bg-green-gradient">
                    <i class="fa fa-clock-o"></i>
                    <h3 class="box-title">Date</h3>
                </div>
                <div class="box-body border-radius-none">

					
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-border">
                    <div class="row">

                        <!-- ./col -->
							<div id="wtime">
    <h3>&nbsp; &nbsp; &nbsp <span id="time"></span></h3> <h3>&nbsp; &nbsp; &nbsp <span id="time2"></span></h3>           
</div>
                        <!-- ./col -->

                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->

           






        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            <div class="box">
                <div class="box-header box-solid bg-red-gradient with-border">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Staff</h3>
                </div>
                <div class="box-body">
                    <table id="table_attendance_index" class="table table-bordered table-striped tabel-hover data-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Staff name</th>
                            <th>Checking in</th>
                            <th>Checking out</th>
                            <th>Working hour(s)</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->


            



        </section>
        <!-- right col -->
    </div>
    <!-- /.container -->
</div>



<script type="text/javascript">
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() { Pace.restart(); });
       $(document).ready(function(){
		$('.ajax').click(function(){
        $.get("index_test.php", function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});
    </script>



<!--
    <script type="text/javascript">
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() { Pace.restart(); });
        $('.ajax').click(function(){
            $.ajax({url: '#', success: function(result){
                $('.ajax-content').html(' <div id ="result"><hr><h1>Welcome <?php echo "User!"?></h1></div>');
            }});
        });
    </script>
    
    !-->
<script type="text/javascript">
var timerScan;
var seconds = 4; // how often should we refresh the DIV?

function startScan() {
    timerScan = setInterval(function() {
        $("#baca").load("index_test.php");
    }, seconds*1000)
}
$(function() {
    startScan();
});
</script>

<script type="text/javascript">
var serverTime = new Date();
var d = new Date();

function updateTime() {
    serverTime = new Date(serverTime.getTime() + 1000);
    var n =  new Date(d.getTime() + 1000);
    $('#time').html(serverTime.toLocaleDateString());
    //$('#time2').html(n.toLocaleTimeString());
    //document.write(Date());
    /*
    var dateFormat = require('dateformat');
    var now = new Date();
    dateFormat(now, "dddd, mmmm dS, yyyy, h:MM:ss TT");
    */
}

$(function() {
    updateTime();
    setInterval(updateTime, 1000);
});
</script>
<!-- 
    <script type="text/javascript">
		//setInterval(function(){$('#scan').load("index.php #scan"),5000);
		 var auto_refresh = setInterval(function () {
    $('#result').fadeOut('slow', function() {
        $(this).load("index.php #result", function() {
            $(this).fadeIn('slow');
        });
    });
}, 3000); // refresh every 15000 milliseconds
   
   
   //setInterval(function(){$('#scan').load('#');,5000);
    </script>
    -->

    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php
include('../include/control_sidebar_footer.php');
?>



