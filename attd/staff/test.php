<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 10 Apr 2017
 * Time: 14:23
 */

include ('../config/db_connection.php');

$number = rand(1,3);
$date = date('d M Y');
$date = strtotime($date);
$sql = "SELECT * from attendance where staff_id ='$number'";
$result = mysqli_query($db,$sql);

while($row = mysqli_fetch_assoc($result)) {
    $staff_id = $row['staff_id'];
}

if(!isset($staff_id)){
    $sql2 = "INSERT INTO attendance(date, staff_id, checkin, checkout, working_hours) VALUES ('$date', '$number', CURRENT_TIME(), NULL, '')";
    mysqli_query($db,$sql2);
    echo "done create new attd(first time exist) ";
}
else{
    $sql3 = "SELECT * FROM attendance WHERE staff_id='$staff_id'";
    $query1 = mysqli_query($db,$sql3);
    while($row = mysqli_fetch_assoc($query1))
    {
        $id = $row['id'];
        $date = $row['date'];
        $staff_id = $row['staff_id'];
        $checkin = $row['checkin'];
        $checkout = $row['checkout'];
        $working_hours = $row['working_hours'];
    }
    if(isset($checkin) && $working_hours == 0){
        $sql4 = "UPDATE attendance SET checkout = CURRENT_TIME ()WHERE staff_id = '$staff_id' and id='$id'";
        $query2 = mysqli_query($db,$sql4);
        while($row = mysqli_fetch_assoc($query1))
        {
            $checkin = $row['checkin'];
            $checkout = $row['checkout'];
            $id = $row['id'];
        }
        if($working_hours == 0) {
            $sql5 = "UPDATE attendance SET working_hours =  TIME_TO_SEC(TIMEDIFF(checkout, checkin)) WHERE staff_id = '$staff_id' and id='$id'";
            $query4 = mysqli_query($db, $sql5);
            echo "done create checkout";
        }
    }
    else{
        $sql5 = "INSERT INTO attendance(date, staff_id, checkin, checkout, working_hours) VALUES ('$date', '$staff_id', CURRENT_TIME(), NULL, '')";
        $query3 = mysqli_query($db,$sql5);
        echo "done create new attd ";
    }


}



/*
if(!isset($staff_id)){
    $id = 1;
    $date = date('d M Y');
    $date = strtotime($date);

    $sql2 = "INSERT INTO attendance(date, staff_id, checkin, checkout, working_hours) VALUES ('$date', '$id', CURRENT_TIME(), NULL, '')";
    mysqli_query($db, $sql2);
    echo "bisa tuh";
}
else{
    echo "eh udah ada";
}
*/





/*
echo $id . "<br>";
echo $date . "<br>";
echo $staff_id . "<br>";
echo $checkin . "<br>";
echo $checkout . "<br>";
echo $working_hours . "<br>";
*/
/* if (isset($checkin) && $working_hours == 0){
     echo "tinggal update";
}
else{
    echo "buat abaru";
}

*/

