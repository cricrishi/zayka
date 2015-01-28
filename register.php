<?php 
session_start();
include 'connect.php';
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$p=md5($pass);

$sql="INSERT INTO users (fname,lname,email,pass)
VALUES ('$fname', '$lname','$email','$p')";
if (!mysql_query($sql,$con))
  {
	  $arr = array( "error" => "email address already exists");
  }
  else
{
	  $arr=array( "success" => "success");
$_SESSION['email']=$email;
$sql="select uid from users where email='$email'";
$result=mysql_query($sql,$con);	  
 while($row=mysql_fetch_array($result))
{
$sql1="INSERT INTO images(src,uid) VALUES ('images/noimage.jpg','$row[uid]')";
mysql_query($sql1,$con);
}



}
echo json_encode($arr);

mysql_close($con);

?>