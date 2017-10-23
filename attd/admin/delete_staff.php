<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 28 Mar 2017
 * Time: 14:18
 */
include '../config/db_connection.php';

$id  = $_POST['id'];
$sql =  "DELETE FROM staff WHERE id =$id";
mysqli_query($db,$sql);
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
