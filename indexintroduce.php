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
	<title>部门介绍</title>
	<link href="css/base.css"rel="stylesheet" type="text/css">
	<link href="css/indexIntroduce.css"rel="stylesheet" type="text/css">
</head>
<body background="./pics/backgroud.jpg" >
<?php
	include('./header.php');
?>
         <div id="container" > 
			<form name="form1" method="get" action="search_quote.php?<?php if(isset($_GET["key"])) echo $_GET['key'] ?>" ><!--top:20px-->
				<p class="title">
					<span class="left">部门介绍</span>
					<?php  	 
						//include('./searchComp.php');
					?>
			    </p>
				<div style="clear:both; height:0;"></div>
			</form> 
			<div id="slideShow">
				<?php  	 
					include('./slideComp.php');
				?>
			</div>
			<div id="department">
				<h6 class="titleLineHeight35">部门职能</h6>
				<article id="function">
					<section>大连理工大学抓住互联网行业高速发展带来的机遇，坚持为学生服务，以奋斗者为本，基于学生需求持续创新，稳健成长。如今，我们的电信网络设备、IT设备和解决方案以及智能终端已应用于学校各个地区。
					</section>
					<section>作为信息与通信解决方案负责部门，我们为电信运营商、企业和消费者等提供有竞争力的端到端ICT解决方案和服务，帮助客户在数字社会获得成功。
					</section>
					<section>网络中心积极致力于社会经济的可持续发展，运用信息与通信领域专业经验，弥合数字鸿沟，让人人享有高品质的宽带联接；我们努力保障网络的安全稳定运作，助力客户和各行各业提升效率、降低能耗，推动低碳经济增长；我们开展本地化运作，构建全球价值链，帮助本地发挥出全球价值，实现整个产业链的共赢。
					</section>
					<section>我们深信：未来将是一个全联接的世界。我们将与合作伙伴一起，开放合作，努力构建一个更加高效整合的数字物流系统，促进人与人、人与物、物与物的全面互联和交融，激发每个人在任何时间、任何地点的无限机遇与潜能，推动世界进步。
					</section>
				<article>
			</div>
            <div class="information" id="teacher">
			  <h6 class="titleLineHeight35">任职教师</h6>
              <table class="InformationTable"  >
			     <thead>
				    <tr >                                        
						<th width="10%" class="InformationTableTh" >姓名</th> 
						<th width="70%" class="InformationTableTh">责任范围</th> 
						<th width="20%" class="InformationTableTh">邮箱</th>
                    </tr>
			      </thead>
				  <tbody>
				    <tr >                                        
						<td width="10%" InformationTableTd >多啦A梦</th> 
						<td width="70%" InformationTableTd>拯救地球</th> 
						<td width="20%" InformationTableTd>哪里需要就在哪里</th>
                    </tr>
				  </tbody>
				</table>
			</div>
            <div class="information" id="student">
			  <h6 class="titleLineHeight35">历职学生</h6>
              <table class="InformationTable" >
			     <thead>
				    <tr >                                        
						<th width="10%" class="InformationTableTh" >姓名</th> 
						<th width="70%" class="InformationTableTh">责任范围</th> 
						<th width="20%" class="InformationTableTh">邮箱</th>
                    </tr>
			      </thead>	
				  <tbody>
				    <tr >                                        
						<td width="10%" InformationTableTd >多啦A梦</th> 
						<td width="70%" InformationTableTd>拯救地球</th> 
						<td width="20%" InformationTableTd>哪里需要就在哪里</th>
                    </tr>
				  </tbody>					
				</table>

			</div>
		</div><!--container-->
		<div style="clear:both"></div>
	<?php
		include('./footer.php');
	?> 
<script src="js/common.js" type="text/javascript"></script>
<script>navIndexIntroduction();</script>








