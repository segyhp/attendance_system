<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 9 Apr 2017
 * Time: 22:01
 */

include ('../config/db_connection.php');

$search = '%' . $_GET['q'] . '%';


$sql = "SELECT id,name FROM staff WHERE name LIKE '%".$search."%' LIMIT 40";
$result = mysqli_query($db,$sql);
$data = [];
while($row = $result->fetch_assoc()){
    $data[] = ['id'=>$row['id'], 'text'=>$row['name']];
}


echo json_encode($data);

mysqli_close($db);

?>
