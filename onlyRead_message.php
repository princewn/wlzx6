<?php
	header("Content-Type:text/html; charset=utf-8"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>查看</title>
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
	include_once('./mysql_connect.php');
	include_once('./functions.php');
	include('./header.php');
	ifVisitForbidden();
?>
<div id="containerAuto">
<?php
if(1)//只有管理员可以看到编辑选项
{
	
	//print"是管理员";
    if(isset($_GET["key"]))  {	echo $_GET['id'];}
 
	if(isset($_GET['id'])&&is_numeric($_GET['id'])&&($_GET['id']>0))
	{
		//print"isset合法";
		$query="SELECT quote,source FROM message WHERE quote_id={$_GET['id']}";
		if($r=mysql_query($query,$dbc)){
			//print"查找到数据库";
		$row=mysql_fetch_array($r);
		//$row = iconv('GB2312', 'UTF-8', $row);
		echo '<div style="padding:20px 20px 0px 20px"><p style=" text-align:left;"><label>内容:' . $row['quote'].'</label></p></br><p style=" text-align:left;"><label>来源：' .$row['source'] . '</label></p></div>';		
		//print"是不是已经定义";
		print'<input type="hidden" name="id" value="'.$_GET['id'].'"/></form>';
	}
		else
		{
			print'<p  class="error">could not retrieve the quotation because<br/>'.mysql_error($dbc).'.</p><p>the query being run was:'.$query.'</p>';
			
			}
  }
  elseif( isset($_POST['id'])&&is_numeric($_POST['id'])&&($_POST['id']>0))
  {
	  print"postid成功";
	 $problem=FALSE;
	 
	 if(!empty($_POST['quote'])&&!empty($_POST['source']))
	 {
		  $quote=$_POST['quote'];//mysql_real_escape_string($_POST['quote'],$dbc);
            $source=$_POST['source'];//mysql_real_escape_string($_POST['source'],$dbc);
	 }
	 else
	 {
		 print'<p class="error">please submit both a quotation ang a source.</p>';
		 $problem=true;
	 }
	if(!$problem)
			 {
				 $query="UPDATE quotes SET quote='$quote',source='$source',favorite=$favorite WHERE quote_id={$_POST['id']}";
				 if($r=mysql_query($query,$dbc))
				 {
					 print'<p>the quotation has been update</p>';
					 }
					 else
					 {
						 print'<p class="error">could not update the quotation because<br/>'.mysql_error($dbc).'.</p><p>the query being run was :'.$query.'</p>';
						 }
				 }
	  
	  }
	  else
	  {
		  print'<p class="error title center">网页上有错误,未找到数据</p>';
		  }
		  mysql_close($dbc);
}		
?>
</div>
  <?php
include('./footer.php');
?>