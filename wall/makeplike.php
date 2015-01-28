<?php 
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
include $path.'/prj/functions.php';
$p_id=$_REQUEST['id'];
$data=getdetails();
$uid=$data['uid'];
$count=chkplikes($uid,$p_id);
if($count)
{
if(mysql_query("delete from plikes where p_id='$p_id' AND uid='$uid'"));
else
die(mysql_error());
}
else
{
if(mysql_query("Insert into plikes values('$uid','$p_id')"));
else
die(mysql_error());
}

?>