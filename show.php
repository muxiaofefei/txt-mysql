<?php 
//禁用错误报告
error_reporting(0);

header("Content-type: text/html; charset=utf-8"); //设置浏览器输出编码为Utf-8

require_once('conn.php');

$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password); //连接数据库
mysql_query("set names 'utf8'"); //数据库输出编码
mysql_select_db($mysql_database); //打开数据库

$sql1 ="select * from qingcheng"; //SQL语句 查询指定id内容
$result = mysql_query($sql1,$conn); //查询

//循环输出数据库内容
while($row = mysql_fetch_array($result)){
	echo $row['Id']; //id
	echo "   ";
	echo $row['username']; //用户昵称
	echo "------";
	echo $row['userid']; //用户Id
	echo "<br>";
	echo "<br>";
	echo "======";
	echo $row['content']; //用户评论
	echo "<br>";
	echo "<hr>";
	echo "<br>";
}








echo "*********************************************";