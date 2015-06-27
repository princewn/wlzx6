<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>删除</title>
	<link href="css/base.css"rel="stylesheet" type="text/css">
	<link href="css/index.css"rel="stylesheet" type="text/css">
	<style>
		#form{
			width:80%;
		}
		.form{
			float:left;
			display:block;
			margin:20px auto 20px 0;
		}
	</style>
</head>
<?php
	header("Content-Type:text/html; charset=utf-8"); 
	include_once('./mysql_connect.php');
	include_once('./functions.php');
	include('./header.php');
?>
<div id="containerAuto">
<?php
	if(isset($_GET['id'])&&is_numeric($_GET['id'])&&($_GET['id'])>0)
	{
		$query="SELECT quote,detail,source FROM quotes WHERE quote_id={$_GET['id']}";
		if($r=mysql_query($query,$dbc))
		{
			$row=mysql_fetch_array($r);
			print'<form action="delete_quote.php" method="post">
			<p>确认删除?</p>
			<div class="overflowellipsis padding20"><span padding20>内容'.$row['quote'].'</span></br><span padding20>详情'.$row['detail'].'</span></br><span class=" ">-来源'.$row['source'].'</span>';
			print'</div></br>
			<input type="hidden" name="id" value="'.$_GET['id'].'"/>
			<a ><input type="submit" name="submit" value="删除"/></a>
			</form>';
				
		}
		else
		{
			print'<p class="error">错误信息：<br/>'.mysql_error($dbc).'.</p><p>所执行的语句为'.$query.'</p>';
		}
	}
	else if(isset($_POST['id'])&&is_numeric($_POST['id'])&&($_POST['id']>0))
	{
		$query="DELETE FROM quotes WHERE quote_id={$_POST['id']} ";
		$r=mysql_query($query,$dbc);
		if(mysql_affected_rows($dbc)==1)
		{
			print'<script>alert("删除成功");
			document.location.href="./view_quote.php";</script>';
		}
		else
		{
			print'<p class="error">错误信息：<br/>'.mysql_error($dbc).'.</p><p>所执行的语句为'.$query.'</p>';
		}
	}
	else
	{
		print'<p class="error title center verticle">未找到删除数据</p>';
	}
	mysql_close($dbc);

				
	
?>
</div>
 <?php
include('./footer.php');
?>
<script src="js/common.js" type="text/javascript"></script>
<script>navIndexNews();</script>