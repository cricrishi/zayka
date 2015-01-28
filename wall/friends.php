<?php 
session_start();

$path=$_SERVER['DOCUMENT_ROOT'];
include $path.'/prj/functions.php';

$data=getdetails();
$uid=$data['uid'];
$fid=$_REQUEST['fid'];
$status=check_friend_status($uid,$fid);
$count=mysql_num_rows($status);
if($count>0)
{ 
$r=mysql_fetch_array($status);
if($r['sid']==$uid)
{
	if($r['Status']==0)
	{
	delete_friend($uid,$fid);
	$stat='Request Deleted';
	}
	else
	{
	delete_friend($uid,$fid);
	$stat='Friend Deleted';
	}
	}
else	
{
 if($r['Status']==0)
    {
	add_friend($uid,$fid);
	$stat='Request Accepted';
	}
	else
	{
	delete_friend($uid,$fid);	
	$stat='Friend Deleted';
	}
    }
}
else
{   send_request($uid,$fid);
	$stat='Friend Request Sent';
	}

$cuid=mysql_num_rows(getfriends($uid));
updatefriend($uid,$cuid);
$cfid=mysql_num_rows(getfriends($fid));
updatefriend($fid,$cfid);
echo $stat;
?>