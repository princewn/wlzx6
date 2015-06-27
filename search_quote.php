<?php 
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>查找结果</title>
	<link href="css/base.css"rel="stylesheet" type="text/css">
	<link href="css/index.css"rel="stylesheet" type="text/css">
</head>
<html> 
<?php
include('./header.php');
include_once('./mysql_connect.php'); 
include('./searchQuotesComp.php');
?> 
<body> 
<style>
#choice{
	display:none;
}
#container{
	background-color:#FFFFFF;
	height:450px;/*设个长度要不end等下面的div到处乱跑*/
	overflow:hidden;/*这里有个margin，会比设定的高度高5*/
}
#searchContainer{
	width:100%;
	height:40px;
	background-color:#FFFFFF;
}
</style>
	<div id="container">
		<form name="form1" method="get" action="search_quote.php?<?php if(isset($_GET["key"])) echo $_GET['key'] ?>" ><!--top:20px-->
			<div id="searchContainer" class="smallTitle" style="margin-bottom:0; padding-bottom:0;">
				<?php  	 
					include('./searchComp.php');
				?>
				<span class=" title left">检索结果</span>
				<div style="clear:both; height:0;"></div>
			</div>
		</form> 	
	
	
		<p align="center" > 
			<?php 
			for($i=0;$i<count($result);$i++) { //循环显示关键词 
			echo $result[$i]." "; 
			} 
			?>
		</p> 
		<?php 
			if($totalRows_rs>0)
			{
				do { //显示当前搜索结果 ?> 
					<p style="clear:both">
						<a href="./onlyRead_quote.php?id=<?php echo $row_rs['quote_id']?>" style="float:left;padding-left:20px;">
						<?php echo $row_rs['quote']; ?></a>
						<p style=" display:inline-block;float:right;padding-right:20px;">
	--<?php echo $row_rs['source']; ?>
						</p>
					</p> 
					<?php 
				} while ($row_rs = mysql_fetch_assoc($rs));
			}
			else{
				echo "<h3>没有匹配信息</h3>";
			}
				 ?> 
	</div>
<?php 
mysql_free_result($rs); 
?>
<?php
include('./footer.php');
?>