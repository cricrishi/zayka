<?php
include 'functions.php';

session_start();

if(isset($_SESSION['email']))
{
	
	$data=getdetails();
 $img=getimage();
	$arr =array("flag"=>1,"data"=>$data,"img"=>$img);
	}
else
{
	$arr=array("flag"=>0);
	}	
	
	
	
echo json_encode($arr);	
?>