<?php 

session_start();
if(isset($_SESSION['email']))
{
$path=$_SERVER['DOCUMENT_ROOT'];
include $path.'/prj/functions.php';
$data=getdetails();
$uid=$data['uid'];
$flag=0;
$result=getfriends($uid);
$count=mysql_num_rows($result);
echo $count;
}
?>