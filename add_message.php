<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>添加</title>
	<link href="./css/base.css"rel="stylesheet" type="text/css">
	<link href="./css/index.css"rel="stylesheet" type="text/css">
	<style>
		#form{
			width:80%;
		}
		.form{
			float:left;
			display:block;
			margin:20px auto 20px 0;

		}
		h1,h2,h3,h4,h5,h6{
			font-family: "Helvetica Neue","HelveticaNeue",Helvetica,Arial,sans-serif;
			font-weight: 400;
			line-height: 1.4;
			font-style: normal;
			color: #444;
		}
	</style>
</head>
<?php
	header("Content-Type:text/html; charset=utf-8"); 
	include_once('./functions.php');
	include_once('./mysql_connect_message.php');
	include('./header.php');
?>

<div id="containerAuto">
<?php
/*    session_start();
*/	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//echo $_POST['leaveNote'];
		//echo $_SESSION['username'];
		if(!empty($_POST['leaveNote'])&&!empty($_SESSION['username']))
		{
			//$dbc = mysql_connect('localhost', 'root', '110024');
			//mysql_select_db('wlzx', $dbc);
            $quote=$_POST['leaveNote'];//mysql_real_escape_string($_POST['quote'],$dbc);
            $source=$_SESSION['username'];//mysql_real_escape_string($_POST['source'],$dbc);
			$query="insert into message(quote,source)values('$quote','$source')";//�˴���insertinto����values����ΪСд�������޷��ɹ����
			$r=mysql_query($query,$dbc);
			if(mysql_affected_rows($dbc)==1)
			{
				print'<script>alert("添加成功，请继续操作");window.history.go(-1);</script>';
			}
			else
			{
				print'<p class="error">数据库连接失败<br/>'.
				mysql_error($dbc).'.</p><p>the query being run was:'.$query.'
				</p>';
			}
			mysql_close($dbc);
		}
		else
		{
			print '<p class="error">quote is empty</p>';
		}
	}
	else{
		print "	该字段传送失败";
	}
 ?>
	<div id="form">
	</div>
</div>
 <?php
include('./footer.php');
?>