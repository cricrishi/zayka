<?php 
session_start();
include 'connect.php';
include 'functions.php';
$hid=$_REQUEST['id'];

if(!mysql_query("Update hotel set likes=(Select count(uid) from hlike where hid='$hid') where hid='$hid'"))
echo "".mysql_error();


if(isset($_SESSION['email']))
{
$data=getdetails();
$uid=$data['uid'];
$sql="Insert into hlike values('$uid','$hid')";
mysql_query($sql,$con);

$arr=array( "success" => "success");

if(mysql_error())
{
mysql_query("delete from hlike where hid='$hid' AND  uid='$uid'",$con);

$arr=array( "error" => "deleted");

}

if(!mysql_query("Update hotel set likes=(Select count(uid) from hlike where hid='$hid') where hid='$hid'"))
echo "".mysql_error();


echo json_encode($arr);
mysql_close($con);
}



?>