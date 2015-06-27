<?php
	header("Content-Type:text/html; charset=utf-8"); 
	mysql_query('set names utf8');
	mysql_query('set names utf8');
?>
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
	include_once('./mysql_connect.php');
	include_once('./functions.php');
	include('./header.php');
	ifVisitForbidden();
?>
<div id="containerAuto">

<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//echo $_POST['quote'];
		if(!empty($_POST['quote'])&&!empty($_POST['source']))
		{
			//$dbc = mysql_connect('localhost', 'root', '110024');
			//mysql_select_db('wlzx', $dbc);
            $quote=$_POST['quote'];
			$detail=$_POST['detail'];
			//mysql_real_escape_string($_POST['quote'],$dbc);
            $source=$_POST['source'];//mysql_real_escape_string($_POST['source'],$dbc);
			//$quote=iconv("","UTF-8",$quote);
			//$source= iconv("","UTF-8",$source);
			$query="insert into quotes(quote,detail,source)values('$quote','$detail','$source')";//�˴���insertinto����values����ΪСд�������޷��ɹ����
			$r=mysql_query($query,$dbc);
			if(mysql_affected_rows($dbc)==1)
			{
				print'<script>alert("添加成功，请继续操作");window.history.go(-1);
					  document.getElementsByTagName("textarea").value="";
					 // document.getElementsByTagName("input").value="";//alert("已经清空");
					  //document.getElementsByTagName("textarea").autocomplete="off";
					  document.getElementsByTagName("input").autocomplete="off";

				</script>';
			}
				else
				{
					print'<p class="error">��Ϣδ����<br/>'.
					mysql_error($dbc).'.</p><p>the query being run was:'.$query.'
					</p>';
					}
					mysql_close($dbc);
			}
			else
			{
				print '<p class="error">��������Ϣ�Լ���Դ</p>';
				}
		}
 ?>
	<div id="form">
		<form class="left" action="add_quote.php" method="post" AUTOCOMPLETE="OFF"><!--使用float in float清除表单间的浮动-->
			<label class="functionClick form">添加内容<textarea id="quotes" name="quote" ></textarea></label>
			<label class="functionClick form">添加详情<textarea id="detail" name="detail" ></textarea></label>
			<label class="functionClick form">添加来源<input id="source" class="afterClear" type="text" name="source"></label>
            <div style="clear:both; height:0"></div>
<!--				可以怎么用after清除呢-->
			<input id="submitInput"class="title " type="submit" name="submit" value="添加"/></label>
		</form>
	</div>
</div>
 <?php
include('./footer.php');
?>
<script src="js/common.js" type="text/javascript"></script>
<script>navIndexNews();</script>