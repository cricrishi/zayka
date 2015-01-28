<html>
<head>
<script type="text/javascript" src="wall/js/wall.js"></script>
<style>
.stname
{
overflow:hidden;
font-size:15px;

}
.stname b
{
color:#555;
text-transform:capitalize;
}
.stname h6
{color:#999;
margin-top:0px;
font-size:11px;
}
.box{ height:45px; border-top:1px solid #ccc; overflow:hidden; background-color:#fff;}
.box:hover{ background-color:#ccc; cursor:pointer;}
#bresult{ background-color:#fff; color:#555; font-size:12px; font-weight:700;}
#bbody{ background-color:#fff;border-radius: 6px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.45);
}
</style>
</head>
<body>
<div id="bbody">
<?php 
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
include $path.'/prj/functions.php';
$msg=$_REQUEST['msg'];
$data=getdetails();
$uid=$data['uid'];
$result=search_user($msg,$uid);
while($row=mysql_fetch_array($result))
{
$fid=$row['uid'];
$status=check_friend_status($uid,$fid);
$count=mysql_num_rows($status);
if($count>0)
{ 
$r=mysql_fetch_array($status);
if($r['sid']==$uid)
{
	if($r['Status']==0)
	$stat='Not Accepted';
	else
	$stat='Friends';
	}
else	
{
 if($r['Status']==0)
	$stat='Accept Now';
	else
	$stat='Friends';
   
    }
}
else
{
	$stat='Send Friend Request';
	}
?>
<div id="bresult"></div>
<div class="box" id="box<?php echo $fid?>">

<div class="stcommentimg" style="float:left">
<img src="<?php echo $row['src'] ?>" class='small_img1'/>
</div> 
<div class="stname">
<b ><?php echo $row['fname']." ".$row['lname']; ?></b> 
<h6><?php echo "<b>Status </b>".$stat;?></h6>
</div>

</div>

<?php

}
?>
</div>
</body>
</html>