<?php
session_start();
global $pagetype;
$pagetype =$_SERVER['PHP_SELF'];
$_SESSION['pagetype']=$pagetype; 
include_once('./functions.php');

?>
<body background="./pics/backgroud.jpg" >
<div id="body">
		<div id="logo" >
		</br>
<?php 			if(isAdministrator()){
					print "<span  style='position:fixed;top:0;left:0;'><a href='./view_message.php'style='color:#00bfff; display:inline-block; float:left'>查看留言</a></span>";
				}


				if(isset( $_SESSION['username'] )&&( $_SESSION['username']==true) )  
				{
?>					
					<iframe  style="width:50px; height:30px; position:absolute; right:0px;top:0; background-color:#36f;border-bottom-left-radius:30px;" src="../wlzx6/Ajax-Login-master./home.php">
					
					</iframe>
<?php				
                }
				else if(!isset( $_SESSION['username'] )||( $_SESSION['username']!=true))
				{
?>
					<a id="login" href="./Ajax-Login-master/index.html"  class="stateA" style="position:fixed;top:0; right:0" > 登录或注册</a>
<?php
				}
				else
				{
					echo "neither login nor unlogin";
				}
?>
        <!--函数是否登录-->
	        <img id="logoPic" src="/wlzx6/pics/logo.png" >
        </div>
        <div id="project">
			<div id="nav">
			<nav>
				<ul >
					<li><a href="./index.php">首页</a></li><li class="vline"></li>
					<li><a href="./indexnews.php">消息发布</a></li><li class="vline"></li>
					<li><a href="./indexequipment.php">设备管理</a></li>
					<li class="vline"></li>
					<li><a href="./indexintroduce.php">部门介绍 </a>
						 <ul id="navv">
						 <li><a href="./indexintroduce.php#function">部门职能</a></li>    
						 <li><a href="./indexintroduce.php#teacher">任职教师 </a></li>
						 <li><a href="./indexintroduce.php#student">历职学生</a></li>
						 </ul>
					</li>
					<li class="vline"></li>

					<li><a href="http://ssdut.dlut.edu.cn/">软件学院 </a></li><li class="vline"></li>
					<li><a href="http://www.dlut.edu.cn/">大连理工大学</a></li><li class="vline"></li>     
				</ul>
			</nav>
			</div>
        </div><!--project-->
        <div class="emptyDiv2"></div>
<!--		<div id="user" style="width:400px;height:300px;position:absolute;left:50%;margin-left:-200px;top:50%;margin-top:-150px">
			<form  method="post" name="myform" id="myForm" >
						<iframe id="stateIframe" src="form.php"></iframe>
			</form>
        </div>-->
<script type="text/javascript" src="/wlzx6/Public/jquery-1.11.0.js"></script>
<script type="text/javascript" src="/wlzx6/js/cover.js"></script>