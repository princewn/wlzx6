<?php
header("Content-Type:text/html; charset=utf-8"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设备管理
</title>
	<link href="css/base.css"rel="stylesheet" type="text/css">
	<link href="css/indexEquipment.css"rel="stylesheet" type="text/css">
<script src="js/网站设计.js" type="text/javascript"></script>
<!--背景透明-->
</head>
<?php
	include('./header.php');
include_once('./mysql_connect.php');
?>
<div id="content">
         <div id="news"> 
         <form name="form1" method="get" action="search_quote.php?<?php if(isset($_GET["key"])) echo $_GET['key'] ?>" ><!--top:20px-->
				<p class="title">
					<span class="left">设备概况</span>
					<?php  	 
						//include('./searchComp.php');
					?>
			    </p>
				<div style="clear:both; height:0;"></div>
			</form> 
<?php			
/*	if(isset($_SESSION['username'] )&&( $_SESSION['username']==true) )  
	{
              <p style="position:relative; top:2px">
              <a href=\"./edit_quote.php?id={$row['quote_id']}\">
				</a>
			  </p>

	}
	if(isset( $_SESSION['username'] )&&( $_SESSION['username']==true) )  
	{
		print"<p> <a  href=\"add_quote.php?id={$row['quote_id']}\" >添加</a><-><a href=\"view_quote.php?id={$row['quote_id']}\">操作列表</a></p>\n";
	}	*/
?>
		<div  id="newss">
			<script>
/*使用JQuery读文件的解法，但不能写
				var data ={ 
					firstName: [], 
					lastName: []
				} 
				function initData(){ 
					var dataroot="./comp/equipment/employee.json"; 
					$.getJSON(dataroot, function(data){ 
						data.firstName=data.firstName; 
						data.lastName=data.lastName; 
					}); 
				
				}
				initData();
				for(i in data){
					console.log(data[i]);
				}*/
			</script>
			<?php
   $json2_string=file_get_contents("./equipment.json");
     $obj=json_decode($json2_string,true);
     if (!is_array($obj)) die('no successful');
	 echo '<div style="margin-left:30px; width:900px">';
	 foreach($obj as $item){
     echo '<br><div style="margin-left:30px; width:900px; height:auto;margin:5px auto;"><h4 class="left" style="color:#444">'.$item['name']."</h4></br>
				<p class='left InformationTableTd' style='text-align:left'>总计:".$item['number']."</p><div style='clear:both'></div><p class='left InformationTableTd'>介绍:".$item['introduction']."</p></br><img src='".$item['picture']."' style='width:100%; height:400px;background: #fff;
margin: 15px 0 0;word-wrap: break-word;border-radius:13px; border-top-radius:13px !important;overflow:hidden;'></div>";		
	}			
				
			?>
		</div><!--newss-->
     </div> <!--news-->
</div> <!--content-->
<?php
include('./footer.php');
?> 
<script src="js/common.js" type="text/javascript"></script>
<script>navIndexEquipment();</script>








