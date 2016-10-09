<?php
//点击按登录钮后的触发事件
if (isset($_POST['submit'])) {
	//获取输入内容
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	//判断输入内容
	if (empty($username)) {
		notice('填写用户名');
	}
	if (empty($password)) {
		notice('填写密码');
	} else {
		//判断用户是否存在
		$sql = "select * from user where username = '{$username}'";
		$result = mysql_query($sql,$con);
		$row = mysql_fetch_array($result);
		//不存在则报错
		if ($row == "") {
			notice('用户名不存在');
		} else {
			//判断密码是否正确
			$sql .= "and password = '{$password}'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			//密码不正确则报错
			if ($row == "") {
				notice('密码不正确');
			} else {
				//正确则根据role值判断用户级别，为0时跳转到管理员界面
				if ($row['role'] == '0'){
					header("location:index.php?do=admin&id={$row['id']}");
				} else {
				//role为其他值时跳转普通用户界面
					header("location:index.php?do=user&id={$row['id']}");
				}
			}
		}
	}
}

//关闭数据库

?>

<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript" src="check.js"></script>
<form method="POST">
	<div>
		<h1>登录</h1>
		用户名：<input type="text" name="username" id="username">
		<br/><br/>
		密&nbsp;码：<input type="password" name="password" id="password">
		<br/><br/>
		<input type="submit" id="submit" name="submit" value="登录" onclick="location.href='index.php?do=login'">
		<input type="button" name="register" id="register" value="注册" onclick="location.href='index.php?do=register'">
	</div>
</form>