<?php 
session_start();
include 'connect.php';
include 'functions.php';
$fid=$_REQUEST['id'];


if(isset($_SESSION['email']))
{
$data=getdetails();
$sid=$data['uid'];
$sql="Insert into foodie values('$fid','$sid')";
mysql_query($sql,$con);

$arr=array( "success" => "success");

if(mysql_error())
{
mysql_query("delete from foodie where fid='$fid' AND  sid='$sid'",$con);

$arr=array( "error" => "deleted");

}
if(!mysql_query("Update users set tsubs=(Select count(sid) from foodie where fid='$fid') where uid='$fid'"))
echo "".mysql_error();

echo json_encode($arr);
mysql_close($con);
}
?>