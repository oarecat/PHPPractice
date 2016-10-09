//登录、注册页面使用的验证方法
function check(){
	//通过id获取用户名，为空时弹出提示，中断
	var username = document.getElementById('username').value;
	if (username == "") {
		alert("请输入用户名");
		return false;
	}
	//通过id获取密码，为空时弹出提示，中断
	var password = document.getElementById('password').value;
	if (password == ""){
		alert("请输入密码");
		return false;
	}
	//通过id获取重复密码，为空时弹出提示，中断
	var repass = document.getElementById('repass').value;
	if (repass == "") {
		alert("请输入确认密码");
		return false;
	}
	//判断密码和重复密码是否一致，不一致弹出提示，中断
	if(password != repass){
		alert("两次密码输入不一致");
		return false;
	}
	//通过id获取真实姓名，为空时弹出提示，中断
	var name = document.getElementById('name').value;
	if (name == "") {
		alert("请输入真实姓名");
		return false;
	}
	//通过id获取年龄，为空和非一到两位数字时时弹出提示，中断
	var age = document.getElementById('age').value;
	if (age == "") {
		alert("请输入年龄");
		return false;
	}else if (isNaN(age) || age <= "0" || age >= "100") {
		alert("年龄输入不正确");
		return false;
	}
	//通过id获取城市id，为空时弹出提示，中断
	var city = document.getElementById('city_id').value;
	if (city == "0") {
		alert("请选择城市");
		return false;
	}
	//通过id获取手机号码，为空时弹出提示，中断
	var tel = document.getElementById('tel').value;
	if (tel == "") {
		alert("请输入手机号码");
		return false;
	}
	return true;
}

//修改页面使用的验证方法
function check2(){
	//通过id获取真实姓名，为空时弹出提示，中断
	var name = document.getElementById('name').value;
	if (name == "") {
		alert("请输入真实姓名");
		return false;
	}
	//通过id获取年龄，为空和非一到两位数字时时弹出提示，中断
	var age = document.getElementById('age').value;
	if (age == "") {
		alert("请输入年龄");
		return false;
	}else if (isNaN(age) || age <= "0" || age.length >= "100") {
		alert("年龄输入不正确");
		return false;
	}
	//通过id获取城市id，为空时弹出提示，中断
	var city = document.getElementById('city_id').value;
	if (city == "0") {
		alert("请选择城市");
		return false;
	}
	//通过id获取手机号码，为空时弹出提示，中断
	var tel = document.getElementById('tel').value;
	if (tel == "") {
		alert("请输入手机号码");
		return false;
	}
	return true;
}

//上传图片后显示图片
function show(){
	document.getElementById('image').style.display = "block";
}