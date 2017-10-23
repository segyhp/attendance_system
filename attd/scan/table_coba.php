<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 7 Apr 2017
 * Time: 17:25
 */
include "../config/db_connection.php";
/* $sql  = "SELECT @rownum := @rownum + 1 AS urutan,t.*
	     FROM staff t,
	    (SELECT @rownum := 0) r"; */
$date = date('d M Y');
$date = strtotime($date);
$sql = "SELECT attendance.date,  staff.name, attendance.checkin, attendance.checkout, attendance.working_hours  FROM attendance INNER JOIN staff ON attendance.staff_id = staff.id WHERE attendance.date = '1499792400' ORDER BY attendance.id desc ";
$query = mysqli_query($db, $sql);

while($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
print_r($data);
