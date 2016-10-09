 <?php
//点击注册按钮后的触发事件
if (isset($_POST['submit'])) {
	//获取输入框内容
	$username = trim($_POST['username']);
	$img = trim($_POST['img']);
	$password = trim($_POST['password']);
	$repass = trim($_POST['repass']);
	$name = trim($_POST['name']);
	$age = (int)$_POST['age'];
	$sex = (int)$_POST['sex'];
	$city_id = (int)$_POST['city_id'];
	$tel = (int)$_POST['tel'];
	$time = date("Y-m-d H:i:s");
	//判断输入内容是否正确，不正确则报错
	if (empty($username)) {
		notice('填写用户名',ture);
	}
	if (empty($img)) {
		notice ('上传照片',ture);
	}
	if (empty($password)) {
		notice('填写密码',ture);
	}
	if (empty($repass)) {
		notice('填写重复密码',ture);
	}
	if ($password != $repass) {
		notice('两次密码不一致',ture);
	}
	if (empty($name)) {
		notice('填写真实姓名',ture);
	}
	if (!$age) {
		notice('填写年龄',ture);
	} else if (!is_int($age) || $age >= "100" || $age <= "0") {
		notice('范围不正确',ture);
	}
	if ($city_id == "0") {
		notice('选择城市',ture);
	}
	if (!$tel) {
		notice('填写手机号',ture);
	} else {
		//正确则查找用户名是否已经存在
		$sql = "select * from user where username = '{$username}'";
		$result = mysql_query($sql,$con);
		$row = mysql_fetch_array($result);
		//如果不存在则报错
		if ($row > 0) {
			notice('用户已存在',ture);
		//存在则插入数据
		} else {
			$sql = "insert into user(username,password,name,age,sex,city_id,tel,time) values('{$username}','{$password}','{$name}',{$age},{$sex},{$city_id},{$tel},'{$time}')";
			$result = mysql_query($sql,$con);
			$sql = "select * from user where username='{$username}'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_array($result);
			header("location:index.php?do=user&id={$row['id']}");
		}
	}
}

//关闭数据库
mysql_close($con);
?>

<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript" src="check2.js"></script>
<form method="POST">
	<div>
		<h1>注册</h1>
		用户名：<input type="text" name="username" id="username">
		<br/><br/>
		头像：<input type="file" name="img" id="img">
		<br/><br/>
		密码：<input type="password" name="password" id="password">
		<br/><br/>
		重复密码：<input type="password" name="repass" id="repass">
		<br/><br/>
		真实姓名：<input type="text" name="name" id="name">
		<br/><br/>
		年龄：<input type="text" name="age" id="age">
		<br/><br/>
		<input type="radio" name="sex" value="1" checked>男
		<input type="radio" name="sex" value="2">女
		<br/><br/>
		<select id="city_id" name="city_id">
			<option value="0" >请选择城市</option>
			<option value="1" >南京</option>
			<option value="2" >上海</option>
			<option value="3" >广州</option>
		</select>
		<br/><br/>
		手机号码：<input type="text" name="tel" id="tel">
		<br/><br/>
		<input type="submit" name="submit" id="submit" value="注册">
		<br/><br/>
		已有账号，<a href="index.php">登录</a>
	</div>
</form>