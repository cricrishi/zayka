<?php 
include 'connect.php';
include 'functions.php';
session_start();
 if(!isset($_SESSION['email']))
 {	 
$arr = array( "error" => "Login First");
 
  }
 else
{
$data=getdetails();	
$hid=$_REQUEST['hid'];
$rating=$_REQUEST['rating'];

$result=mysql_query("Select * from rating where uid='$data[uid]' AND hid='$hid'");
 if(mysql_num_rows($result))
 {
 mysql_query("Update rating set rating='$rating' where uid='$data[uid]' AND hid='$hid'");
 $arr = array( "Success" => "success");
 }
 else
 {
mysql_query("insert into rating values ('$hid','$rating','$data[uid]')");
 $arr = array( "Success" => "success");

	 
  }

}
echo json_encode($arr);


?>