<?php
namespace parent_space;

?>
<?php

if(isset($_SESSION['email'])){
$data=getdetails();
 $img=getimage();
 $uid=$data['uid']; 
  $result=getpost($uid);
 while($row=mysql_fetch_array($result))
{
$data1=getdetails1($row['uid']);
 $img1=getimage1($row['uid']);
$comments=getcomments($row['p_id']);
$plikes=getplikes($row['p_id']);
$chkplike=chkplikes($uid,$row['p_id'])
?>
<div id="p_id<?php echo $row['p_id']?>" class="post">
<img id="pid<?php echo $img1['pid']?>" src="<?php echo $img1['src']?>" class="small_img"/>
<div class="ptext">
<a class="postdelete" href="#" id='pdelete<?php echo $row['p_id']; ?>' title='Delete Post'>X</a>
<div class="pname">
<?php echo $data1['fname']." ".$data1['lname'];?>
</div>
<div class="pmsg">
<?php echo $row['msg'];?>
</div>
<div class="links"> <a class="likes" id="likes<?php echo $row['p_id']?>"><?php if($chkplike)echo "Unlike" ;else echo "Like";?></a> <a class="mcomments" id="mcomments<?php echo $row['p_id']?>">Comment</a> <span class="timestamp"><?php echo time_stamp($row['time']);?></span></div>

<div class="commentbox" id="commentbox<?php echo $row['p_id']?>">
<div class="stcommentbody" ><?php include 'postlikes.php' ;?></div>
<div id="comments<?php echo $row['p_id']?>">
<?php include 'loadcomment.php'?>
</div>
<div class="stcommentbody">
<div class="stcommentimg">
<img src="<?php echo $img['src'] ?>" class='small_img1'/>
</div>
<input type="text" class="cinput" id="cinput<?php echo $row['p_id']?>" size="53" style="margin-top:8px;"/>
</div>
</div>

</div>

</div>

<?php

}
}
?>
