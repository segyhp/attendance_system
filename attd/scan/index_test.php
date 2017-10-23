<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 27 Apr 2017
 * Time: 15:02
 */
session_start();
include('../config/db_connection.php');
?>
<html>
<head>
	<title>Read the Card</title>
</head>
<body>
<?php
# tabel list kehadiran
$uid = shell_exec("sudo python /var/www/html/MFRC522-python/reader-once.py 2>&1");
$data  = "Scan your card";
$output = shell_exec('sudo python LCD.py ' . escapeshellarg(json_encode($data)));
//echo $output;

if (!$uid) {
	header("refresh: 2");
	echo "<h2>Please Scan Your Card \n</h2>";
	
} else {
	
	list($d1,$d2,$d3,$d4,$d5) = sscanf($uid, "[%d, %d, %d, %d, %d]");
	$uid = sprintf("%02x%02x%02x%02x%02x",$d1,$d2,$d3,$d4,$d5 );
	$sql = "SELECT * FROM staff WHERE uid = '$uid'";
	$result = mysqli_query($db, $sql);
	if((mysqli_num_rows($result) <= 0)){
		
		shell_exec("sudo python /var/www/html/attd/scan/buzzer.py &");
		echo " <h2>User not found !</h2>" ;
    
    $data  = "User not found !";
	$output = shell_exec('sudo python LCD.py ' . escapeshellarg(json_encode($data)));
}
	
	else{
    shell_exec("sudo python /var/www/html/attd/scan/buzzer_led.py &");
	while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
}	
$date = date('d M Y');
$date = strtotime($date);
$sql = "SELECT staff_id from attendance WHERE staff_id ='$id'";
$result = mysqli_query($db,$sql);

while($row = mysqli_fetch_assoc($result)) {
    $staff_id = $row['staff_id'];
}

if(!isset($staff_id)){
	$date = date('d M Y');
$date = strtotime($date);
    $sql2 = "INSERT INTO attendance (date, staff_id, checkin, checkout, working_hours) VALUES ('$date', '$id', CURRENT_TIME(), NULL, '')";
    mysqli_query($db,$sql2);
    echo " <h2>Welcome " . $name. " </h2>" ;
    
    $data  = "Welcome " . $name;
	$output = shell_exec('sudo python LCD.py ' . escapeshellarg(json_encode($data)));
	//header("refresh: 6");
	
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
            echo "<h2>Goodbye " . $name . "</h2>" ;
            
                $data  = "Goodbye " . $name;
	$output = shell_exec('sudo python LCD.py ' . escapeshellarg(json_encode($data)));
	//header("refresh: 6");
	
        }
    }
    else{
		$date = date('d M Y');
$date = strtotime($date);
        $sql5 = "INSERT INTO attendance(date, staff_id, checkin, checkout, working_hours) VALUES ('$date', '$staff_id', CURRENT_TIME(), NULL, '')";
        $query3 = mysqli_query($db,$sql5);
        echo "<h2>Welcome " . $name . " </h2>";
        
            $data  = "Welcome " . $name;
	$output = shell_exec('sudo python LCD.py ' . escapeshellarg(json_encode($data)));
	//header("refresh: 6");
	

    }

}
}
	sleep(1);
	header("refresh: 3");
	//header("location: baca.php");
}
?>
</body>
</html>
