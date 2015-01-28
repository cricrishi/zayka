<?php
$count=mysql_num_rows($clikes);
if($count>0)
{
?>
<img src="wall/images/like.gif" width="13" height="13" style="float:left;"/>
<span class="clike" id="clike<?php echo $cid?>"><?php echo $count?></span> 
<?php
}
?>
<div class="clikers" id="clikers<?php echo $cid?>" >
<?php

while( $r=mysql_fetch_array($clikes))
{
	echo "<b>".$r['fname']." ".$r['lname']."</b><br />";
	}

 ?>

</div>