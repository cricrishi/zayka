<?php 
$result=getrecipe($recipe,$page);
$count=mysql_num_rows($result);
if($count==0)
{echo "no result found";
	}	
while($row=mysql_fetch_array($result))
{
$rid=$row['rid'];
$src=$row['src'];
$rname=$row['name'];
$ingredients=$row['ingredients'];
$directions=$row['directions'];
?>
<div id="recipe<?php echo $rid; ?>" class="recipe">
<img src="<?php echo $src?>" class="rsrc"/>
<div id="rname<?php echo $rid;?>" class="rname">
<h2><b><?php echo $rname;?></b></h2>
</div>
<div id="ingredient<?php echo $rid?>" class="ingredients">
<b>Ingredients</b><br />

<?php echo $ingredients?></div>
<b> Directions</b>
<div id="direct<?php echo $rid;?>" class="direct"><?php echo $directions?></div>
</div>

<?php 
}

?>
