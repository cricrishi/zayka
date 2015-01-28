<?php 
while($comm=mysql_fetch_array($reviews))
{
$cid=$comm['rid'];
$cmsg=$comm['review'];
$cuid=$comm['uid'];
$ctime=$comm['time'];
$cfname=$comm['fname'];
$clname=$comm['lname'];
$cimg=$comm['src'];
?>
<div class="stcommentbody" id="stcommentbody<?php echo $cid ?>">
<div class="stcommentimg">
<img src="<?php echo $cimg ?>" class='small_img1'/>
</div> 
<div class="stcommenttext">
<a class="stcommentdelete" href="#" id='cdelete<?php echo $cid; ?>' title='Delete Review'>X</a>
<b ><?php echo $cfname." ".$clname; ?></b> <?php echo $cmsg; ?>
<div class="stcommenttime"><?php time_stamp($ctime); ?></div> 
</div>
</div>

<?php
}
?>