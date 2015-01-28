<?php 
while($comm=mysql_fetch_array($comments))
{
$cid=$comm['cid'];
$cmsg=$comm['msg'];
$cuid=$comm['uid'];
$ctime=$comm['time'];
$cfname=$comm['fname'];
$clname=$comm['lname'];
$cimg=$comm['src'];
$clikes=getclikes($cid);
$chkclike=chkclikes($uid,$cid);
?>
<div class="stcommentbody" id="stcommentbody<?php echo $cid ?>">
<div class="stcommentimg">
<img src="<?php echo $cimg ?>" class='small_img1'/>
</div> 
<div class="stcommenttext">
<a class="stcommentdelete" href="#" id='cdelete<?php echo $cid; ?>' title='Delete Comment'>X</a>
<b ><?php echo $cfname." ".$clname; ?></b> <?php echo $cmsg; ?>
<div class="stcommenttime"><?php include 'commentlikes.php'?><a  style="font-size:11px;" class="clikes" id="clikes<?php echo $cid?>"><?php if($chkclike)echo "Unlike" ;else echo "Like";?></a><?php time_stamp($ctime); ?></div> 
</div>
</div>

<?php
}
?>