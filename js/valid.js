
				
$(document).ready(function(e) {
    $("#blogin").click(function(event){
		event.preventDefault();
	var val=0;

var a=$("#email1").val();
var b=$("#password1").val();
if(a=='')
{
$("#err5").html("*enter email id");
val=0;
}
else
{

var atpos=a.indexOf("@");
var dotpos=a.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=a.length)
  {
  $("#err5").html("inavlid email address");
  val=0;
  }
  else
  {
  $("#err5").html('');
  val++;
  }

}

if(b=='')
{$("#err6").html("*enter your password");
	val=0;
	}
else
{
$("#err6").html('');	
val++;
}
	
		if(val==2)
		{
			
var ds='email='+a+'&pass='+b;
		$.getJSON("validate_user.php",ds,function(data){
      
  if(data.error)
           {            
           if(data.error=='wrong password')
		   $("#err6").html(data.error);
		   else
		   	$("#err5").html(data.error);

           }
      if(data.success)
      {
      disablePopup();
      }
  
  
  });
			
			
			}
		
		});
		



$("#registerb").click(function(event){
	 event.preventDefault();
	 		event.stopImmediatePropagation();
		   var val=0;
		   var t=document.getElementById("email").value;
                var P=document.getElementById("password").value;
               var q=document.getElementById("fname").value;
			   var r=document.getElementById("lname").value;
			   
			    if(q=="")
                {
                    document.getElementById("err1").innerHTML="*enter your firstname ";
					val=0;

    
                }
				else
				{
				document.getElementById("err1").innerHTML="";
				val++;
				}
				 if(r=="")
                {
                    document.getElementById("err2").innerHTML="*enter your lastname";

                 val=0;
                }
				else
				{
				document.getElementById("err2").innerHTML="";
				val++;
				
				}
                if(t=="")
                {
					val=0;
                    document.getElementById("err3").innerHTML="*enter your email id";

                   
                }
				else
				{
			var atpos=t.indexOf("@");
var dotpos=t.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=t.length)
  {
  $("#err3").html("inavlid email address");
  val=0;
  }
  else
  {
  $("#err3").html('');
  val++;
  }
			
				}
                 if(P=="")
                {

                    document.getElementById("err4").innerHTML="*enter your password";
                   val=0;
                       }
				else
				{
				document.getElementById("err4").innerHTML="";
				val++;
				}
		
		if(val==4)
	{

var ds='fname='+q+'&lname='+r+'&email='+t+'&pass='+P;
		$.getJSON("register.php",ds,function(data){
      
  if(data.error)
           {            
           $("#err3").html(data.error);
           }
      if(data.success)
      {
      upload();
      }
  
  
  });

		
		
		
		
		}
	
	})		
});				