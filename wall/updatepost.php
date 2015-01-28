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
$msg=$_REQUEST['msg'];
$data=getdetails();
$img=getimage();
$time=time();
$uid=$data['uid'];
$p_id=updatepost($uid,$msg,$time);
$plikes=getplikes($p_id);
$chkplike=chkplikes($uid,$p_id)

?>
<div id="p_id<?php echo $p_id ?>" class="post">
<img id="pid<?php echo $img['pid']?>" src="<?php echo $img['src']?>" class="small_img"/>
<div class="ptext">
<a class="postdelete" href="#" id='pdelete<?php echo $p ?>' title='Delete Post'>X</a>
<div class="pname">
<?php echo $data['fname']." ".$data['lname'];?>
</div>
<div class="pmsg">
<?php echo $msg;?>
</div>
<div class="links"> <a class="likes" id="likes<?php echo $p_id?>"><?php if($chkplike)echo "Unlike" ;else echo "Like";?></a> <a class="mcomments" id="mcomments<?php echo $p_id?>">Comment</a> <span class="timestamp"><?php echo time_stamp($time);?></span></div>
<div class="commentbox" id="commentbox<?php echo $p_id?>">
<div id="comments<?php echo $p_id?>">

</div>
<div class="stcommentbody">
<div class="stcommentimg">
<img src="<?php echo $img['src'] ?>" class='small_img1'/>
</div>
<input type="text" class="cinput" id="cinput<?php echo $p_id?>" size="53" style="margin-top:8px;"/>
</div>
</div>

</div>

</div>

</body>
</html>