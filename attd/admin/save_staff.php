<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 28 Mar 2017
 * Time: 13:57
 */
include '../config/db_connection.php';

$id = $_POST['id'];
$uid = $_POST['uid'];
$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$_POST['created_at'] = strtotime($_POST['created_at']);
$created_at = $_POST['created_at'];
$crud = $_POST['crud']; 

if ($crud == 'N'){
    $sql = "INSERT INTO staff (uid,username,name,password,created_at)
          VALUES('$uid','$username','$name','$password','$created_at')";
    mysqli_query($db, $sql);
    if(mysqli_error($db))
    {
        $result['error']=mysqli_error($db);
        $result['result']=0;
    }else
    {
        $result['error'] = '';
        $result['result'] = 1;
    }
}elseif ($crud == 'E')
{
    $sql = "UPDATE staff set uid = '$uid', username='$username',name = '$name', password = '$password', created_at ='$created_at' WHERE id = $id";
    mysqli_query($db, $sql);
    if(mysqli_error($db))
    {
        $result['error']=mysqli_error($db);
        $result['result']=0;
    }else
    {
        $result['error'] = '';
        $result['result'] = 1;
    }
} else
{
    $result['error'] = 'Invalid Order';
    $result['result'] = 0;
}
$result['crud'] = $crud;
echo json_encode($result);
mysqli_close($db);
