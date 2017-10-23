<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 9 Apr 2017
 * Time: 21:33
 */

include "../config/db_connection.php";
$id = $_POST['choosename'];
$date = date('d M Y');

$date = strtotime($date);
$sql = "INSERT INTO attendance(date, staff_id, checkin, checkout, working_hours) VALUES ('$date', '$id', CURRENT_TIME(), NULL, '')";
mysqli_query($db, $sql);

if (mysqli_error($db))
{
    $result['error']=mysqli_error($db);
    $result['result'] = 0;
}
else{
    $result['error'] = "";
    $result['result'] = 1;
}

echo json_encode($result);
mysqli_close($db);
