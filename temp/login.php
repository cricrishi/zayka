<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="zayka" >
    <title>Zayka</title>
<script type="text/javascript" src="js/jquery.js">
</script>
<style type="text/css">
.classname1{
	-moz-box-shadow:inset 0px 1px 0px 0px #fab3ad;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fab3ad;
	box-shadow:inset 0px 1px 0px 0px #fab3ad;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #fa665a), color-stop(1, #d34639) );
	background:-moz-linear-gradient( center top, #fa665a 5%, #d34639 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fa665a', endColorstr='#d34639');
	background-color:#fa665a;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #d83526;
	display:inline-block;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 40px;
	text-decoration:none;
	text-shadow:1px 1px 0px #98231a;
}.classname1:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #d34639), color-stop(1, #fa665a) );
	background:-moz-linear-gradient( center top, #d34639 5%, #fa665a 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d34639', endColorstr='#fa665a');
	background-color:#d34639;
}.classname1:active {
	position:relative;
	top:1px;
}
/* This imageless css button was generated by CSSButtonGenerator.com */
</style>


<style>
input.ini{
	outline: none;
}
input.ini{
	-webkit-appearance: textfield;
	-moz-appearance: textfield;
	
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	font-family: inherit;
	font-size: 100%;
	border: solid 1px #ccc;
	border-radius:5px;
	padding-top:5px;
	margin-top:-5px;
	
}
input.ini:focus{border-color: #6dcff6;
	
	-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 2px 8px rgba(0, 0, 0, 1);
}

#popup{ background:rgb(238,238,238) url(images/or.PNG) no-repeat 50%;

border:solid 1px rgb(204,204,204);
width:800px;
	height:350px;
	position:absolute;
	padding:30px 10px 10px 10px;
	
}
.text b{font-size:24px;
	font-weight:600;
	}
.text p{font-size:14px;}
#login,#register{ 
width:380px;
position:relative;
}	
#register{ left:400px; top:-310px;}
#loginform { padding:20px 20px ;}
#loginform input{height:30px; float:right;}	
.sinput{ margin-left:30px; position:relative;  color:#999; font-size:18px;}
.input{ margin-bottom:30px;}
.bold{font-size:24px;
	font-weight:600;
	margin-left:30px;
	margin-top:20px;}
.p{font-size:14px; margin-left:30px;}
</style>
<script type="text/javascript">

</script>
</head>
<body>

<div id="popup">
<div id="login">
<div class="text">
<b class="bold">Login To Zayka.Com</b>
<p class="p">Enter Your Email Address And Zayka Password</p>
</div>
<form method="post" action="" id="loginform">
<div class="input"><span class="sinput">Your Email</span><input type="text" name="email" size="30" class="ini" /></div>
<div class="input"><span class="sinput">Password</span><input type="password" name="pass"  size="30" class="ini"/></div>
<div class="input" style="margin-right:110px; margin-top:-10px;"><span style="float:right; margin-top:7px; color:#999;">Remember me</span><input type="checkbox" name="remember"  value="true" size="30" /> </div>
<div><a href="" style=" text-decoration:none; margin-left:120px; color:#09C;">Forgot your Password</a></div>
<div><a href="#" class="classname1" style="  margin-left:120px; margin-top:20px;">Login</a></div>

</form>
</div> 

<div id="register">
<div class="text">
<b class="bold">Create An Account</b>
<form method="post" action="" id="loginform">
<div class="input"><span class="sinput">First Name</span><input type="text" name="fname" size="30" class="ini" /></div>
<div class="input"><span class="sinput">Last Name</span><input type="text" name="lname" size="30" class="ini" /></div>
<div class="input"><span class="sinput">Your Email</span><input type="text" name="email" size="30" class="ini" /></div>
<div class="input"><span class="sinput">Password</span><input type="password" name="pass"  size="30" class="ini"/></div>
<div><a href="#" class="classname1" style="  margin-left:120px; margin-top:20px;">Register</a></div>

</form>
</div> 




</div>


</body>
</html>