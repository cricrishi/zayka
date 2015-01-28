<?php

function getdetails()
{
	if(isset($_SESSION['email']))
	{
	$email=$_SESSION['email'];
	include 'connect.php';
	
	$sql="select * from users where email='$email'";
	$result = mysql_query($sql,$con);
	   while($row=mysql_fetch_array($result))
	   return $row;
	}
}
	
function getimage()
{

if(isset($_SESSION['email']))
{
$email=$_SESSION['email'];
	include 'connect.php';
	$sql="select * from images where uid=(Select uid from users where email='$email')";
	$result = mysql_query($sql,$con);
	   while($row=mysql_fetch_array($result))
	   return $row;	
	}	
}
function getrating($hid)
{ include 'connect.php';
	$sql="select AVG(rating) from rating where hid='$hid'";
	$result = mysql_query($sql,$con);
$count=mysql_num_rows ($result );
if($count==1)
	   {$row=mysql_fetch_array($result);
	   
	   if($row[0]!=NULL)
	   {$str = number_format($row[0], 1);
		   return $str;
	   }
	   else
	   return 0;	
	   }
	   else  
	 return 0;
}	
		
function getpost($uid)
{
	include 'connect.php';
	$sql="SELECT * FROM `post` WHERE uid ='$uid' Or uid in(select sid from friends where rid='$uid' AND Status=1) Or uid in(Select rid from friends where sid='$uid' AND Status=1) Or uid in(select fid from foodie where sid='$uid') order by time desc";
	$result = mysql_query($sql,$con);
	   return  $result;	
	}		
		
function getdetails1($uid)
{
	include 'connect.php';
	$sql="select * from users where uid='$uid'";
	$result = mysql_query($sql,$con);
	   while($row=mysql_fetch_array($result))
	   return $row;
	}
	
function getimage1($uid)
{
	include 'connect.php';
	$sql="select * from images where uid='$uid'";
	$result = mysql_query($sql,$con);
	   while($row=mysql_fetch_array($result))
	   return $row;	
	}	
		
function time_stamp($session_time) 
{ 
$time_difference = time() - $session_time ; 

$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 
// Seconds
if($seconds <= 60)
{
echo "$seconds seconds ago"; 
}
//Minutes
else if($minutes <=60)
{

   if($minutes==1)
  {
   echo "one minute ago"; 
   }
   else
   {
    echo "$minutes minutes ago"; 
   }

}
//Hours
else if($hours <=24)
{

   if($hours==1)
  {
   echo "one hour ago";
  }
  else
  {
   echo "$hours hours ago";
  }

}
//Days
else if($days <= 7)
{

  if($days==1)
  {
   echo "one day ago";
  }
  else
  {
   echo "$days days ago";
   }

}
//Weeks
else if($weeks <= 4)
{

   if($weeks==1)
  {
   echo "one week ago";
   }
  else
  {
   echo "$weeks weeks ago";
  }

}
//Months
else if($months <=12)
{

   if($months==1)
  {
   echo "one month ago";
   }
  else
  {
   echo "$months months ago";
   }

}
//Years
else
{

   if($years==1)
   {
    echo "one year ago";
   }
   else
  {
    echo "$years years ago";
   }

}

}


function updatepost($uid,$msg,$time)
{
include 'connect.php';	
$sql="Insert into post(uid,msg,time) values('$uid','$msg','$time')";	
mysql_query($sql);

$sql1="select p_id from post where uid='$uid' AND $time='$time' AND msg='$msg'";
	$result = mysql_query($sql1);
	  $row=mysql_fetch_array($result);
return $row[0];
}



function getcomments($p_id)
{
	include 'connect.php';
	$sql="select C.uid, C.p_id, C.cid, C.msg,C.time,U.fname,U.lname,I.src from comments C, users U, images I where C.uid=U.uid AND C.uid=I.uid AND C.p_id='$p_id' order by C.cid asc";
	$query = mysql_query($sql);
       return $query;
     

}		


function updatecomment($uid,$p_id,$msg,$time)
{
include 'connect.php';	
$sql="Insert into comments(uid,p_id,msg,time) values('$uid','$p_id','$msg','$time')";	
mysql_query($sql);

$sql1="select max(cid) from comments where uid='$uid' AND time='$time' AND p_id='$p_id' AND msg='$msg'";
	$result = mysql_query($sql1);
	  $row=mysql_fetch_array($result);
return $row[0];
}

function deletepost($uid,$p_id)
{
include 'connect.php';	
$sql="Delete from post where uid='$uid' AND p_id='$p_id'";	
if(mysql_query($sql));
else
die("error".mysql_error());
}

function deletecomment($uid,$cid)
{
include 'connect.php';	
$sql="Delete from comments where uid='$uid' AND cid='$cid'";	
if(mysql_query($sql));
else
die("error".mysql_error());
}

function getplikes($p_id)
{
	include 'connect.php';
	$sql="select U.fname,U.lname,I.src from users U,images I,plikes P where P.uid=U.uid AND P.uid=I.uid AND P.p_id='$p_id'";
	$query = mysql_query($sql);
       return $query;
}
 
function chkplikes($uid,$p_id)
{
	include 'connect.php';
	$sql="select * from plikes where p_id='$p_id' AND uid='$uid'";
	$query = mysql_query($sql);
    $count=mysql_num_rows($query);  
	return $count;
	} 
 


function getclikes($cid)
{
	include 'connect.php';
	$sql="select U.fname,U.lname,I.src from users U,images I,clikes C where C.uid=U.uid AND C.uid=I.uid AND C.cid='$cid'";
	$query = mysql_query($sql);
       return $query;
}
 
function chkclikes($uid,$cid)
{
	include 'connect.php';
	$sql="select * from clikes where cid='$cid' AND uid='$uid'";
	$query = mysql_query($sql);
    $count=mysql_num_rows($query);  
	return $count;
	} 
 

function search_user($msg,$uid)
{
	include 'connect.php';
	$sql="select U.uid, U.fname,U.lname,I.src from users U,images I where U.uid=I.uid And (U.fname Like '$msg%' OR U.email like '$msg%') AND U.uid !='$uid'";
$result = mysql_query($sql,$con);	   
return $result;
	}
	
function check_friend_status($uid,$fid)
{
	include 'connect.php';
	$sql="Select * from friends where (rid='$uid' AND sid='$fid') OR (sid='$uid' AND rid='$fid')";
$result = mysql_query($sql);
return $result;
}

function delete_friend($uid,$fid)
{
include 'connect.php';
	$sql="Delete from friends where (rid='$uid' AND sid='$fid') OR (sid='$uid' AND rid='$fid')";
mysql_query($sql);	

}

function add_friend($uid,$fid)
{include 'connect.php';


	$sql="Update friends  SET Status=1 where (rid='$uid' AND sid='$fid') OR (sid='$uid' AND rid='$fid')";
mysql_query($sql);	
	}

function send_request($uid,$fid)
{
	include 'connect.php';
	$sql="Insert into friends(sid,rid) values('$uid','$fid')";
mysql_query($sql);	
	}
function getfriendrequest($uid)
{
	include 'connect.php';
$sql="select U.uid, U.fname,U.lname,I.src from users U,images I,friends F where U.uid=I.uid And U.uid=F.sid AND F.rid='$uid' AND F.Status=0";
$result = mysql_query($sql);
return $result;

}

function getfriends($uid)
{
include 'connect.php';
$sql="select U.uid, U.fname,U.lname,I.src from users U,images I,friends F where U.uid=I.uid And ((U.uid=F.sid AND F.rid='$uid' AND F.Status=1) OR (U.uid=F.rid AND F.sid='$uid' AND F.Status=1))";
$result = mysql_query($sql);
return $result;
	}

function updatefriend($uid,$cuid)
{
include 'connect.php';
if(mysql_query("Update users set tfriends='$cuid' where uid='$uid'",$con));
else
echo mysql_error(); 
}


function getmenu($hid)
{
	
include 'connect.php';	
$sql="select * from menu where hid='$hid'";
$result=mysql_query($sql);
return $result;
}

function getrecipes($recipe)
{
include 'connect.php';	
$sql="select * from recipes where 1 and category like '%$recipe' order by name";
$result=mysql_query($sql);
return $result;
	
}
function getrecipe($recipe,$page)
{
include 'connect.php';	
$p="limit ".(0+10*($page-1)).",10";
$sql="select * from recipes where 1 and category like '%$recipe' order by name ".$p;
$result=mysql_query($sql);
return $result;
	
}

function checksub($fid,$sid)
{
if(isset($_SESSION['email']))	
{
	$result=mysql_query("select * from foodie where fid='$fid' AND sid='$sid'");
	$count=mysql_num_rows($result);
	return $count;
	}
return 0;	
}

function checkhlike($hid,$uid)
{
if(isset($_SESSION['email']))	
{
	$result=mysql_query("select * from hlike where hid='$hid' AND uid='$uid'");
	$count=mysql_num_rows($result);
	return $count;
	}
return 0;	
}

function getreviews($hid)
{
	include 'connect.php';
	$sql="select C.uid, C.rid, C.review,C.time,U.fname,U.lname,I.src from reviews C, users U, images I where C.uid=U.uid AND C.uid=I.uid AND C.hid='$hid' order by C.rid asc";
	$query = mysql_query($sql);
       return $query;
}

function updatereview($uid,$p_id,$msg,$time)
{
include 'connect.php';	
$sql="Insert into reviews(uid,hid,review,time) values('$uid','$p_id','$msg','$time')";	
mysql_query($sql);

$sql1="select max(rid) from reviews ";
	$result = mysql_query($sql1);
	  $row=mysql_fetch_array($result);
return $row[0];
}


function deletereview($uid,$cid)
{
include 'connect.php';	
$sql="Delete from reviews where uid='$uid' AND rid='$cid'";	
if(mysql_query($sql));
else
die("error".mysql_error());
}


?>		
 
 
 