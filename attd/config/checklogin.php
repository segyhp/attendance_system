<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 30 Mar 2017
 * Time: 16:39
 */
session_start();
include "db_connection.php";

$username = $_POST['txtusername'];
$password = $_POST['password'];
/*
$sql =  "SELECT * FROM staff WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($db,$sql);
$data = mysqli_num_rows($query);
    if($data == 1){
        echo "Successfully Logged in.";
    }
    else{
        echo "Email or Password is wrong.";
    }

mysqli_close ($db); // Connection Closed.
*/
/* $username = $_POST['username'];
$password = $_POST['password'];
$sql =  "SELECT * FROM staff WHERE username = '$username'";
$query = mysqli_query($db,$sql);
$array = array();
while($data = mysqli_fetch_array($query)){
    $array['username']= $data['username'];
    $array['password']= $data['password'];
}

if (mysqli_error($db))
{
    $result['error']=mysqli_error($db);
    $result['result'] = 0;
}
else{
    $result['error'] = "";
    $result['result'] = 1;
}

echo json_encode($array);

mysqli_close($db);

*/

$sql = "SELECT * FROM staff WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$table_id ="";
$table_users = "";
$table_password= "";
$table_type ="";
$table_name ="";
$table_created_at = "";

$row_count = mysqli_num_rows($query);
if($row_count > 0)
{
    while ($row = mysqli_fetch_assoc($query)) {
        $table_id = $row['id'];
        $table_users = $row['username'];
        $table_password = $row['password'];
        $table_type =  $row['type_login'];
        $table_name = $row['name'];
        $table_created_at = $row['created_at'];
    }
    if (($username == $table_users) && ($password == $table_password)) {
        if ($password == $table_password) {
            if ($table_type == 1) {
                $_SESSION['session_type'] = $table_type;
                $_SESSION['admin_session'] = $table_name;
                $_SESSION['created_at'] = $table_created_at;
                Print '<script>window.location.assign("../admin/dashboard.php");</script>';
            }
            else{
                $_SESSION['session_type'] = $table_type;
                $_SESSION['id_session'] = $table_id;
                $_SESSION['staff_session'] = $table_name;
                $_SESSION['created_at'] = $table_created_at;
                Print '<script>window.location.assign("../staff/dashboard.php");</script>';
            }

        }

    } else {
        Print '<script>alert("Incorrect Password!")</script>';
        Print '<script>window.location.assign("../login.php");</script>';
    }
} else
{
    Print '<script>alert("Incorrect Username!")</script>';
    Print '<script>window.location.assign("../login.php");</script>';
}




