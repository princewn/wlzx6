<?php
//Include classes
require_once('./classes/class_login.php');
require_once('./classes/class_config.php');

//Check if logged in
isLoggedIn();	

//For various uses
$username = $_SESSION['username'];
$password = $_SESSION['password'];

//Create session has (same as hash created for reset password, REQUIRED FOR PASSWORD RESET)
$hashed_username = saltPassword($username);
$sessionHash = $hashed_username;
?>
<html>
	<head>
	<link href="css/style_home.css" rel="stylesheet" type="text/css" />
	<script language="javascript" type="text/javascript" src="/Public/jquery-1.11.0.js"></script>
	<script language="javascript" type="text/javascript" src="/Public/jquery-validation-1.13.1/dist/additional-methods.min.js"></script>
	<script language="javascript" type="text/javascript" src="./scripts/data_handling.js"></script>
    </head>
<body>

	<div id="nav">
		<div class="container">
			<div class="message" style="">
				<div class="messageText"></div>
				<div class="messageImage"></div>
			</div>
		<script language="javascript">
		$('.message').hide();
		</script>			
				<div class="bigMessageText" > 
<!--					<span style="color:#00bfff; line-height:17px;font-size:14px;">hi~"<?php echo $username ?>"!</span> -->
					<span><a href="logout.php" style="color:#00bfff; display:inline-block; float:left; z-index:10000;line-height:17px; font-size:14px;">退出</a></span>



				</div>
		</div>	
	</div>

</html>

			

				