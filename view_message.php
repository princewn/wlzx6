<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>添加</title>
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
	include_once('./mysql_connect_message.php');
	include_once('./functions.php');
	include('./header.php');
	ifVisitForbidden();

?>
<div id="containerAuto">
<?php
	$query='SELECT quote_id,quote,source FROM message ORDER BY date_entered DESC';
	if($r=mysql_query($query,$dbc))
	{
		$tempCount=0;
		echo "</br>";
		while($row=mysql_fetch_array($r))
		{
		
			print"
			<form action='./edit_message.php' method='post'>
				<p>
				<span class='zxx_con overflowellipsis' style='float:left;padding-left:20px; display:inline-block; width:80%; text-align:left;'>
				
				
					<a href=\"./onlyRead_message.php?id={$row['quote_id']}\">{$row['quote']}</a>					
				
				
				</span>
				<span><a href=\"./delete_message.php?id={$row['quote_id']}\">删除</a></span>
				<span style='float:right;padding-right:20px; display:inline-block; width:10%'>--{$row['source']}</span>
				</p>
			</form>			
			";
			//<a href='./onlyRead_message.php?id={$row[\"quote_id\"]}'>	
		}
	}
	else
	{
		print'<p class="error">could not retrieve the date because:<br/>'.mysql_error($dbc).'.</p><p>the query being run was:'.$query.'</p>';
	}
			mysql_close($dbc);

?>
</div>
<?php
include('./footer.php');
?>