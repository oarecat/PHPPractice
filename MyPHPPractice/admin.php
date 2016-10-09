<?php
//判断搜索框key是否传入值
$key = isset($_POST['key']) ? $_POST['key'] : '';
//选择所有数据
$sql = "select * from user where del=1";
//点击搜索按钮后，如果key有值则把值赋给username字段进行模糊搜索，否则提示输入
if (isset($_POST['submit'])) {
	if (!empty($key)) {	
		$sql .=" where username like '%".$key."%' ";
	} else {
		notice('请输入关键词');
	}
}
$result = mysql_query($sql,$con);
$user = array();
//循环输出所有数据
while ($row = mysql_fetch_array($result)) {   
	$user[] = $row;
}
//如果key没有值则报错
if (empty($user)) {
	notice('没有数据');
}
//循环输出city表中的id
$sql = 'select * from city';
$result = mysql_query($sql,$con);
$city = array();
while ($row = mysql_fetch_array($result)) {
	$city[$row['id']] = $row;
}

//关闭数据库连接
mysql_close($con);
?>

<form method="POST">
	<input type="text" name="key" value="<?php echo $key; ?>">
	<input type="submit"  name="submit" id="submit" value="搜索">
</form>
<table border="1">
	<tr>
		<th>ID</th>
		<th>用户名</th>
		<th>真实姓名</th>
		<th>性别</th>
		<th>年龄</th>
		<th>城市</th>
		<th>注册时间</th>
		<th>操作</th>
	</tr>
	<?php foreach ($user as $key => $val) {?>
	<tr>
		<td><?php echo $val['id'];?></td>
		<td><?php echo $val['username']?></td>
		<td><?php echo $val['name']?></td>
		<td><?php echo $sex[$val['sex']]?></td>
		<td><?php echo $val['age']?></td>
		<td><?php echo $city[$val['city_id']]['name']?></td>
		<td><?php echo $val['time']?></td>
		<td>
			<input type="button" value="查看" onclick="location.href='index.php?do=view&id=<?php echo $val['id']?>'">
		</td>
	</tr>
	<?php }?>
</table>