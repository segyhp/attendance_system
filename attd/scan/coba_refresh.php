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
               
                    
                    <div id="baca">
					
                    </div>
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

</div>
<!--
<script type="text/javascript">
$(document).ready(function(){
    $("#baca").load("index_test.php");
});

	</script>
	-->
	<script type="text/javascript">
	var timer;
var seconds = 3; // how often should we refresh the DIV?

function startActivityRefresh() {
    timer = setInterval(function() {
        $("#baca").load("index_test.php");
    }, seconds*1000)
}
$(function() {
    startActivityRefresh();
});

</script>
<!-- /.content-wrapper -->





