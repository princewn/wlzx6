<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!--Stylesheets-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../Public/jquery-1.11.0.js"></script>
<script language="javascript" type="text/javascript" src="../Public/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript" src="scripts/data_handling.js"></script>
<script>

$(document).ready(function() {
	$(".message").hide();
	
	$("#registerWrapper").hide();
	
	$("#forgotWrapper").hide();

	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
	$(".emailAddress").focus(function() {
		$(".email-icon").css("left","-48px");
	});
	$(".emailAddress").blur(function() {
		$(".email-icon").css("left","0px");
	});
	//$(window).resize(function(){
		$(".login-form").css({ "position":"fixed",
							"top":($(window).height()/2-$(".login-form").height()/2)+"px",
							"left":($(window).width()/2-$(".login-form").width()/2)+"px"
		});
	//});
});
</script>

</head>
<body>

    	<div class="message">
<div class="messageText"></div>
<div class="messageImage"></div>
</div>
<?php

$ticket = $_GET['ticket'];
$emailAddress = $_GET['email'];

?>
<div id="wrapper" class="forgotWrapper">
	<!--Sliding icons
	<div class="pass-icon"></div>-->
    <!--END Sliding icons-->

<!--login form inputs-->
<div class="login-form">
	<form id="loginForm" onsubmit='reset_password();return false;'>

	<!--Header-->
    <div class="header">
    	<h1>重置密码</h1>
    	<span>输入您的新密码</span>
    </div>
    <!--END header-->
	
	<!--Input fields-->
    <div class="content">
    	<input type="hidden" id="ticket" value="<?php echo $ticket; ?>">
		<input name="newPassword" type="password" id="newPassword" class="input emailAddress required" placeholder="新密码" />
		<input type="hidden" id="email" value="<?php echo $emailAddress; ?>">
    </div>
    <!--END Input fields-->
    
    <!--Buttons-->
    <div class="footer">
    	<input id="submit" type="submit" name="Login" value="重置" class="button" id="login"/></form>
    	<a href="index.html" id="submit" class="register"><--登录</a>
    </div>
    <!--END Buttons-->
<!--end login form-->
</div>
</body>
</html>