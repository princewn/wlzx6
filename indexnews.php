<?php
	error_reporting(E_ALL & ~E_NOTICE);
	header("Content-Type:text/html; charset=utf-8"); 
	include_once('./mysql_connect.php');
	include_once('./functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>新闻发布</title>
	<link href="css/base.css"rel="stylesheet" type="text/css">
	<link href="css/indexNews.css"rel="stylesheet" type="text/css">
</head>
<body background="./pics/backgroud.jpg" >
<?php
	include('./header.php');
?>
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
            <div id="information">
              <table id="InformationTable" >
				    <tr class="tableTitle">                                        
						<th width="10%" >序号</th> 
						<th width="60%" >信息</th> 
						<th width="20%">来源</th>
                    </tr>	
				<?php
					include('./newsComp.php');
					/*获取数据库中数据条数*/
					$gettocount=mysql_query("SELECT * FROM quotes"); 
					//$count=count($temp);或者$count=mysql_num_rows($result); 
					$count=mysql_num_rows($gettocount);
					$temp=mysql_fetch_array($gettocount); 
					//echo $count;
					$page = new Page($count,17);
					echo $page->showPage(); 
					//session_start();
				?>
		<?php
			if(isAdministrator())  
			{
				print"<a  href=\"add_quote.php?id={$row['quote_id']}\" >添加</a>&nbsp;&nbsp;<a href=\"view_quote.php?id={$row['quote_id']}\">操作列表</a>";
			}
			else{
				//print"<p>未找到</p>";
			}
				
				
		?>
			</div><!--newss-->  
		</div><!--news-->
	<?php
		include('./footer.php');
	?> 
<script src="js/common.js" type="text/javascript"></script>
<script>navIndexNews();</script>







