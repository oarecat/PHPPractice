$(document).ready(function(){
	$("#submit").click(function () {
		//通过id获取用户名，为空时弹出提示，中断
		var username = $("#username").val();
		if (username == "") {
			alert("用户名不能为空");
			return false;
		}
		var img = $("#img").attr("src");
		if (img == "") {
			alert("请上传头像");
		}else {
			if (a) {
				alert("error");
				return false;
		}
		//通过id获取密码，为空时弹出提示，中断
		var password = $("#password").val();
		if (password == "") {
			alert("请输入密码");
			return false;
		}
		//通过id获取重复密码，为空时弹出提示，中断
		var repass = $("#repass").val();
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
		var name = $("#name").val();
		if (name == "") {
			alert("请输入真实姓名");
			return false;
		}
		//通过id获取年龄，为空和非一到两位数字时时弹出提示，中断
		var age = $("#age").val();
		age = parseInt(age);
		if (age == "") {
			alert("请输入年龄");
			return false;
		}else if (age <= 0 || age >= 100) {
			alert("年龄输入不正确");
			return false;
		}
		//通过id获取城市id，为空时弹出提示，中断
		var city = $("#city_id").val();
		if (city == "0") {
			alert("请选择城市");
			return false;
		}
		//通过id获取手机号码，为空时弹出提示，中断
		var tel = $("#tel").val();
		if (tel == "") {
			alert("请输入手机号码");
			return false;
		}
		return true;
	});
});