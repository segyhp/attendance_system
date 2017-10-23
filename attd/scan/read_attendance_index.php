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
$sql = "SELECT  attendance.date,  staff.name, attendance.checkin, attendance.checkout, attendance.working_hours  FROM attendance INNER JOIN staff ON attendance.staff_id = staff.id WHERE attendance.date = '$date' ORDER BY attendance.id  DESC LIMIT 5";
$query = mysqli_query($db, $sql);
$data = array();
while($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
$i=0;
foreach ($data as $key) {
    // add new button
    //$data[$i]['button'] = '<button type="submit" id="'.$data[$i]['id'].'" class="btn btn-primary btnedit" ><i class="fa fa-edit"></i></button>
							   //<button type="submit" id="'.$data[$i]['id'].'" name="'.$data[$i]['name'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
    //$data[$i]['created_at'] = date('d/m/Y',strtotime($key['created_at']));
    $data[$i]['date'] = date('d M Y',$key['date']);
    $data[$i]['working_hours'] = floatval($data[$i]['working_hours']/3600);
    if($data[$i]['working_hours'] < 1){
        $data[$i]['working_hours'] = "Less than one hour.";
    }
    $i++;
}
$datax = array('data' => $data);
echo json_encode($datax);

mysqli_close($db);
