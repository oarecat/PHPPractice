<?php
//连接数据库
$con = mysql_connect("localhost", "root", "")or die('连接失败'.mysql_error());
$db = mysql_select_db("test",$con);
mysql_query('set names utf8');
date_default_timezone_set('prc');

//设置数字代表的性别
$sex = array(
	'1' => '男',
	'2' => '女',
);
//弹出提示
function notice($msg, $go = false){
	if ($go) {
		echo "<script>alert('{$msg}');history.go(-1);</script>";
	} else {
		echo "<script>alert('{$msg}');</script>";
	}	
}