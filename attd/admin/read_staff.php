<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 27 Mar 2017
 * Time: 16:12
 */
include "../config/db_connection.php";
/* $sql  = "SELECT @rownum := @rownum + 1 AS urutan,t.*
	     FROM staff t, 
	    (SELECT @rownum := 0) r"; */
$sql = "SELECT * FROM staff";
$query = mysqli_query($db, $sql);
$data = array();
while($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
$i=0;
foreach ($data as $key) {
    // add new button
    $data[$i]['button'] = '<button type="submit" id="'.$data[$i]['id'].'" class="btn btn-primary btnedit" ><i class="fa fa-edit"></i></button> 
							   <button type="submit" id="'.$data[$i]['id'].'" name="'.$data[$i]['name'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
    //$data[$i]['created_at'] = date('d/m/Y',strtotime($key['created_at']));
    $data[$i]['created_at'] = date('d M Y',$key['created_at']);
    $i++;
}
$datax = array('data' => $data);
echo json_encode($datax);

mysqli_close($db);