
<?php
$count=mysql_num_rows($plikes);
if($count>0)
{
?>
<img src="wall/images/like.gif" width="20" height="20" style="float:left;"/>
<span class="plike" id="plike<?php echo $row['p_id']?>"><?php echo $count." people"?></span> like this
<?php
}
?>
<div class="plikers" id="plikers<?php echo $row['p_id']?>">
<?php

while( $r=mysql_fetch_array($plikes))
{
	echo "<b>".$r['fname']." ".$r['lname']."</b><br />";
	}

 ?>

</div>