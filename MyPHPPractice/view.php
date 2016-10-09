<?php
//判断ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id) { 
	//查询当前id数据信息
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
//关闭数据库连接
mysql_close($con);
?>

<script src="check2.js"></script>
<form method="get">
	<input type="hidden" name="id" value="<?php if ($id) {echo $user['id'];}?>" >
	<br/>
	<table border="1">
		<tr>
			<th>头像</th>
			<th>用户名</th>
			<th>真实姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>城市</th>
			<th>注册时间</th>
		</tr>
		<tr>
			<th><img src="<?php if ($id) {echo $user['img'];}?>"/></th>
			<th><?php if ($id) {echo $user['username'];}?></th>
			<th><?php if ($id) {echo $user['name'];}?></th>
			<th><?php if ($id) {echo $user['age'];}?></th>
			<th><?php if ($id) {echo $sex[$user['sex']];}?></th>
			<th><?php if ($id) {echo $name[$user['city_id']]['name'];}?></th>
			<th><?php if ($id) {echo $user['time'];}?></th>
		</tr>
	</table>
	<input type="button" value="返回" onclick="location.href='index.php?do=<?php echo "admin";?>'">
</form>
