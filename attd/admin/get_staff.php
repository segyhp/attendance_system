<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 27 Mar 2017
 * Time: 20:57
 */

include "../config/db_connection.php";

$id_staff = $_POST['id'];
$sql = "SELECT * FROM staff WHERE id = $id_staff";
$query = mysqli_query($db, $sql);
$array = array();
while($data = mysqli_fetch_array($query)){
    $array['id']= $data['id'];
    $array['username']= $data['username'];
    $array['uid']= $data['uid'];
    $array['name']= $data['name'];
    $array['password']= $data['password'];
    $array['created_at']= $data['created_at'];
    $array['created_at']= date('d M Y', $array['created_at']);

}
echo json_encode($array);
mysqli_close($db);




