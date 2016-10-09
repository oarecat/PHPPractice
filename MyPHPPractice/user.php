<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
//根据id获取当前用户数据
if ($id) { 
	$sql = "select * from user where id={$id}";
	$result = mysql_query($sql,$con);
	$user = mysql_fetch_array ($result);
	//输出city表中的id(对应user表中的city_id)
	$sql = "select * from city where id={$user['city_id']}";
	$result = mysql_query($sql,$con);
	$name = array();
	$city = mysql_fetch_array($result);
	$name[$city['id']] = $city;
}	

//关闭数据库
mysql_close($con);
?>
<div>
	用户名：<?php echo $user['username'];?>
	<br/><br/>
	真实姓名：<?php echo $user['name'];?>
	<br/><br/>
	年龄：<?php echo $user['age'];?>
	<br/><br/>
	性别：<?php echo $sex[$user['sex']];?>
	<br/><br/>
	城市：<?php echo $name[$user['city_id']]['name'];?>
	<br/><br/>
	手机号码：<?php echo $user['tel'];?>
	<br/><br/>
	注册时间：<?php echo $user['time'];?>
	<br/><br/>
	<input type="button" value="修改" onclick="window.location.href='index.php?do=change&id=<?php echo $id;?>'">
</div>