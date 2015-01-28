<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="wall/js/wall.js"></script>
</head>
<body>
<?php
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
include $path.'/prj/functions.php';
$cmsg=$_REQUEST['msg'];
$data=getdetails();
$cfname=$data['fname'];
$clname=$data['lname'];
$cimg=getimage();
$ctime=time();
$uid=$data['uid'];
$p_id=$_REQUEST['p_id'];
$cid=updatecomment($uid,$p_id,$cmsg,$ctime);
$clikes=getclikes($cid);
$chkclike=chkclikes($uid,$cid);
?>
<div class="stcommentbody" id="stcommentbody<?php echo $cid ?>">
<div class="stcommentimg">
<img src="<?php echo $cimg['src'] ?>" class='small_img1'/>
</div> 
<div class="stcommenttext">
<a class="stcommentdelete" href="#" id='cdelete<?php echo $cid; ?>' title='Delete Comment'>X</a>
<b ><?php echo $cfname." ".$clname; ?></b> <?php echo $cmsg; ?>
<div class="stcommenttime"><?php include 'commentlikes.php'?><a  style="font-size:11px;" class="clikes" id="clikes<?php echo $cid?>"><?php if($chkclike)echo "Unlike" ;else echo "Like";?></a><?php time_stamp($ctime); ?></div> 
</div>
</div>
</body>
</html>