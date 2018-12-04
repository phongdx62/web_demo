<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý nhạc</title>
	<link rel="stylesheet" type="text/css" href="../css/style-admin.css">

	<script language="javascript">
		function show_confirm() {
			if(confirm("Bạn có thực sự muốn xóa không?"))
			{
				return true;
			}
			else
			{
				return false;
			}			
		}
	</script>
</head>
<body>
	<div id="top">
		<h3 stle="color:#FFF;">Xin chào Admin, <a href="../logout.php" style="color: #FFF;">Đăng xuất</a></h3>
	</div>
	<div id="menu">
				<ul>
					<li><a href="list_user.php">Quản lý thành viên</a></li>
					<li><a href="list_music.php">Quản lý nhạc</a></li>
				</ul>
	</div>
	<div style="clear: left;"></div>
		<div id="duoi" style="margin-top: 30px;">
			<table>	
