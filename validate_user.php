<?php
session_start();
include 'connect.php';
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$p=md5($pass);
$flag=0;
$sql="Select * from users where email='$email'";
$result=mysql_query($sql,$con);
while($row = mysql_fetch_array($result))
  {
	  if($row['pass']==$p)
	  {$arr=array( "success" => "success");
	  $flag=1;
	  $_SESSION['email']=$email;
	  }
	  else
	  {$arr=array( "error" => "wrong password");
	  $flag=-1;
	  }
	  }  
	 if($flag==0)
	 {
	$arr=array( "error" => "wrong email address");
		 }
echo json_encode($arr);
mysql_close($con);


?>