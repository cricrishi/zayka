<?php 
session_start();
include 'functions.php';
include 'connect.php'; 
$hid=$_REQUEST['hid'];
 if(!isset($_SESSION['email']))
 
 {
	 $rating=getrating($hid);
	 $arr = array( "rating" => $rating);
	 
	 }
	else
	{ 

$data=getdetails();
$uid=$data['uid'];
$sql="select rating from rating where hid='$hid' and uid='$uid'";
$result = mysql_query($sql);
if(mysql_num_rows($result))
{
$row=mysql_fetch_array($result);
$rating=$row[0];
$arr = array( "rating" => $rating);
}
else
{
$arr = array( "rating" => 0);
}

	}
echo json_encode($arr);


?>