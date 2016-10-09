<?php
//连接数据库
$con = mysql_connect("localhost", "root", "")or die('连接失败'.mysql_error());
$db = mysql_select_db("test",$con);
mysql_query('set names utf8');

if (isset($_POST['submit'])) {
	if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 20000)){
		if ($_FILES["file"]["error"] > 0){
			echo "error: " . $_FILES["file"]["error"] . "<br />";
		} else {
			if(is_uploaded_file($_FILES['file']['tmp_name'])){
				// echo basename($_FILES['file']['name']);
				$stored_path = 'E:\www\demo\img/'.basename($_FILES['file']['name']);
				if(move_uploaded_file($_FILES['file']['tmp_name'], $stored_path)){
					echo "<script>alert('上传成功');</script>";
					$path = "http://demo\\\img/".basename($_FILES['file']['name']);
					$sql = "update user set img = '{$path}' where id = 200";
					$result = mysql_query($sql,$con);
					$sql = "select img from user where id = 200";
					$result = mysql_query($sql,$con);
					$row = mysql_fetch_array($result);
				} else {
					echo "<script>alert('上传失败');</script>";
				}
			}
		}
	} else {
		echo "头像上传失败";
	}
}
?>

<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript" src="check.js"></script>
<form method="POST" enctype="multipart/form-data">
上传头像：
<input type="file" name="file" id="file">
<br/>
<input type="submit" name="submit" value="上传" onclick="show()">
<br/>
<img src="<?php echo $row;?>" id="image" style="display:none"/> 
</form>