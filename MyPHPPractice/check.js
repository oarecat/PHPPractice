$(document).ready(function(){
	$("#submit").click(function () {
		//通过id获取用户名，为空时弹出提示，中断
		var username = $("#username").val();
		if (username == "") {
			alert("用户名不能为空");
			return false;
		}
		//通过id获取密码，为空时弹出提示，中断
		var password = $("#password").val();
		if (password == "") {
			alert("请输入密码");
			return false;
		}
		return true;
	});
});