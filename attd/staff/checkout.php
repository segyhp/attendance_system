<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 9 Apr 2017
 * Time: 21:33
 */

include "../config/db_connection.php";

$sql = "INSERT INTO `attendance` (`id`, `date`, `staff_id`, `checkin`, `checkout`, `working_hours`) VALUES (NULL, '1491739814', '4', CURRENT_TIME(), 00:00:00, 0);";
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
    $i++;
}
$datax = array('data' => $data);
echo json_encode($datax);

mysqli_close($db);