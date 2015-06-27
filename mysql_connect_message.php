
<?php
mysql_query("SET NAMES utf8");
$dbc=mysql_connect('localhost','root','');
mysql_select_db('wlzx',$dbc);
//$str = "可以练到。";
//echo $str;若有输出则出现乱码，加上<?phpheader("Content-Type:text/html; charset=utf-8");也乱码，目前为解决


?>