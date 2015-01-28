<?php
$xml = simplexml_load_file("recipe.xml");

foreach($xml->children() as $recipes){

echo "<div class=\"recipe\">";
    foreach($recipes->children() as $recipe => $data){
{     if($data->getname()=='src')
	echo "<img src=\"$data\"class=\"rsrc\"/>";
	
	 if($data->getname()=='name')
	echo "<div class=\"rname\"><h2><b>$data</b></h2></div>";

if($data->getname()=='ingredients')
	{echo "<div class=\"ingredients\"><b>Ingredients</b><br />$data</div>";

	}
	 
	  if($data->getname()=='directions')
        {  
		
		echo "<b> Directions</b><div class=\"direct\">";
		 foreach($data->children() as $d => $da){
		 echo "$da";
	 echo "<br />";
   
                    }
     	
		echo "</div>";
		}
 
      
}
    }

echo "</div>";
}

?>







