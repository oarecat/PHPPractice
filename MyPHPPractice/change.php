<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
	$sql = "select * from user where id = {$id}";
	$result = mysql_query($sql,$con);
	$user = mysql_fetch_array($result);
//根据id获取需要修改的数据
if(isset($_POST['submit'])){
	//获取输入框内容
	$name = trim($_POST['name']);
	$age = (int)$_POST['age'];
	$sex = (int)$_POST['sex'];
	$city_id = (int)$_POST['city_id'];
	$tel = trim($_POST['tel']);
	//判断输入框内容，输入错误则报错
	if (empty($name)) {
		notice('请填写姓名', true);
	}
	if (!$age) {
		notice('请填写年龄', true);
	} elseif (!is_numeric($age) || $age >= "100" || $age <= "0") {
		notice('年龄范围不正确', true);
	}
	if ($city_id == "0") {
		notice('请选择城市', true);
	}
	if (empty($tel)) {
		notice('请填写手机号', true);
	} else {
		//输入都正确则更新数据
		$sql = "update user set name='{$name}',age={$age},sex={$sex},city_id={$city_id},tel='{$tel}' where id={$id}";
		$result = mysql_query($sql,$con);
		header("location:index.php?do=user&id=$id");
	}
}

//关闭数据库
mysql_close($con);
?>

<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript" src="check2.js"></script>
<form method="POST">
	<!-- 如果获取到id，显示id对应的数据进入编辑模式；没有id则进入添加模式 -->
	<input type="hidden" name="id" value="<?php if ($id) {echo $user['id'];}?>" >
	<br/>
	用户名：<?php echo $user['username'];?>
	<br/><br/>
	真实姓名：<input type="text" name="name" id="name" value="<?php echo $user['name']?>">
	<br/><br/>
	年龄：<input type="text" name="age" id="age" value="<?php echo $user['age'];?>">
	<br/> <br/>
	<!-- 根据id判断显示性别，获取不到id默认选中男 --> 
	<input type="radio" name="sex" value="1" <?php if($user['sex'] == "1"){echo "checked";}else echo "checked"?>>男
	<input type="radio" name="sex" value="2"<?php if($user['sex'] == "2")echo "checked";?>>女
	<br/><br/>
	城市：
	<!-- 根据id判断显示城市，获取不到id默认显示“请选择城市” --> 
	<select id="city_id" name="city_id">
		<option value="0" >请选择城市</option>
		<option value="1" <?php if($user['city_id'] == "1")echo "selected=\"selected\"";?>>南京</option>
		<option value="2" <?php if($user['city_id'] == "2")echo "selected=\"selected\"";?>>上海</option>
		<option value="3" <?php if($user['city_id'] == "3")echo "selected=\"selected\"";?>>广州</option>
	</select>
	<br/><br/>
	手机号码：<input type="text" name="tel" id="tel" value="<?php echo $user['tel']?>">
	<br/><br/>
	注册时间：<?php echo $user['time']?>
	<br/><br/>
	<input type="submit" value="提交"  name="submit" id="submit" onclick="window.location.href='index.php?do=user&id=<?php echo $id;?>'">
	<input type="button" value="返回" name="back" onclick="window.location.href='index.php?do=user&id=<?php echo $id;?>'">
</form>