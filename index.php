<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>大工网络中心</title>
	<link href="css/base.css"rel="stylesheet" type="text/css">
	<link href="css/index.css"rel="stylesheet" type="text/css">
</head>
<?php
	header("Content-Type:text/html; charset=utf-8"); 
	include_once('./mysql_connect.php');
	include_once('./functions.php');
?>
<?php
	include('./header.php');
	//phpinfo();
?>

	<div id="container"><!--包含了form，aside-->
	  <div id="news"> 
			<form name="form1" method="get" action="search_quote.php?<?php if(isset($_GET["key"])) echo $_GET['key'] ?>" ><!--top:20px-->
				<p class="title">
					<span class="left">信息发布</span>
					<?php  	 
						include('./searchComp.php');
					?>
			    </p>
				<div style="clear:both; height:0;"></div>
			</form> 
			<div  id="information">
				<?php  	 
					include('./informationComp.php');
				?>
		   	</div>
		  <a href="./indexNews.php" class="functionClick">更多</a>	    
		</div> 
		<!--news-->
		<div id="aside">
			<aside>
				<div id="flow" >
					<p class="title left">滚动消息</p>
				<!--此处如果为absolute则文字不能自动换行-->
					<marquee id="myMarquee" class="ap" onmouseover=myMarquee.stop() onmouseout=myMarquee.start() direction="up"  scrollAmount=4 scrollDelay=0>
					此处为一个滚动窗   到底有没有效果啊
					</marquee>
				</div>
				<div id="note">
					<?php  	 
						include('./leaveNoteComp.php');
					?>
				</div>
			</aside>
		</div>
<!--		<div style="width:100px; height:100px; position:fixed; left:0; top:0; background-color:#FFFFFF;">
			<a href="./comp/message/view_message.php">查看留言</a>
		</div>-->

	</div><!--container-->	

<?php
include('./footer.php');
?>
<script src="js/index.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script>navIndex();</script>

<!--
1index底部的空白条
2ie导航栏无法点击
3IE页数输出高低


0619
logout不能和首部logo重合
查看quote乱码,原因写入数据库乱码格式
注册认证发送邮件地址
login DB loginMesage下的login表 http://localhost/phpmyadmin/index.php?db=loginmessage&token=fc33ba35f6564ec99dd54ff1cb20616d
-->
