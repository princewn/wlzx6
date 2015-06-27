<?php
if(isset($_GET["key"]))  {
$colname_rs = $_GET['key']; //获得用户输入 
$result = explode(' ',' ',0+$_GET['key']);//分解用户输入的多个关键词，存入$result数组 ,0+可以避免错误
}
mysql_select_db("wlzx", $dbc); //连接数据库 
//根据多个关键词构建SQL语句 
$query_rs = "SELECT * FROM quotes"; 
$i=0;
for($i=0;$i<count($result);$i++) //根据每个搜索关键词构建SQL语句 
{ 
if($i==0) //对第一个关键词，不使用UNION 
{
//$query_rs .=”SELECT * FROM quotes WHERE quote LIKE '%$result[0]%' 
$query_rs .=" WHERE quote LIKE '%" . $colname_rs . "%' OR source LIKE '%" . $colname_rs . "%'";
//echo $query_rs;
//echo $result[0];
}
else //对其他关键词，使用UNION连接
{ 
$query_rs .= " UNION SELECT * FROM quotes WHERE quote LIKE 
'%$result[$i]%' OR source LIKE '%$result[$i]%'"; 
}
} 
$query_rs .=" ORDER BY date_entered DESC"; //对搜索结果排序
//执行SQL语句 
$rs = mysql_query($query_rs, $dbc) or die(mysql_error()); 
$row_rs = mysql_fetch_assoc($rs); 
$totalRows_rs = mysql_num_rows($rs); 
?>