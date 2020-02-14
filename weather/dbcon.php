<?php
$servername = "localhost";
$username = "id8997449_weather";
$password = "weather";
$dbname = "id8997449_weather";

$data = $_GET["data"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `weather` SET `temp`=temp,`value`=".$data;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();

date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
echo "\n".date('d-m-Y h:i:s');
$chkm=(date('i'));
$chks=date('s');

if($chkm%5==0 & $chks==0 ) {
$time=date('d-m-Y , h:i:s');
$myfile = fopen("templog.csv", "a");
$txt = $data." , ".$time."\n";
fwrite($myfile, $txt);
fclose($myfile);

$myfile_1 = fopen("check.csv","a") ;
$time_1=date('h:i:a');
$txt_1 = $time_1." , ".$data."\n";
fwrite($myfile_1, $txt_1);
fclose($myfile_1);
}

$time_2 = date('H');
if($time_2==00 & $chkm%5==0){
 $myfile_1 = fopen("check.csv","w");
 fwrite($myfile_1, "");
 fclose($myfile_1);
}

?>