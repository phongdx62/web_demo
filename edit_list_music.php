<?php 
	require("templates/header.php");

	$mabh = $_GET["mabh"];

	if(isset($_POST["ok"]))
	{
		$tenbh = $_POST["tenbh"];
		$tencs = $_POST["tencs"];
		$tenns = $_POST["tenns"];
		$url = $_POST["url"];

		if(isset($tenbh) && isset($tencs) && isset($tenns) && isset($url))
		{
			require("../config/connect.php");
			$sql = "UPDATE baihat SET tenbh = '$tenbh', tencs = '$tencs', tenns = '$tenns', url = '$url' WHERE mabh = $mabh";
			mysqli_query($conn,$sql);
			mysqli_close($conn);

			ob_start(); 
			header('Location: list_music.php');
			ob_end_flush();
		}
	}

	//Kết nối CSDL
	require("../config/connect.php");
	$sql = "SELECT * FROM baihat WHERE mabh = $mabh";
	$kq = mysqli_query($conn,$sql);
	$data = mysqli_fetch_assoc($kq); //Mảng ko có thứ tự					   								  	
?>	

	<form action="edit_list_music.php?mabh=<?php echo $mabh; ?>" method="post">	
		<h2>Sửa thông tin bài hát</h2>
		<div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tenbh" placeholder="Tên bài hát" value="<?php echo $data['tenbh']; ?>" required>
				<div style="color: #FF33FF;">Tên bài hát</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tencs" placeholder="Tên ca sĩ" value="<?php echo $data['tencs']; ?>" required>
				<div style="color: #FF33FF;">Tên ca sĩ</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tenns" placeholder="Tên nhạc sĩ" value="<?php echo $data['tenns']; ?>" required>
				<div style="color: #FF33FF;">Tên nhạc sĩ</div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="url" placeholder="Đường dẫn file" value="<?php echo $data['url']; ?>" required>
				<div style="color: #FF33FF;">Đường dẫn file</div>
			</div>
				
		<button style="height: 30px;" type="submit" name="ok">Sửa</button>
	</form>
	
<?php  
	mysqli_close($conn);
	require("templates/footer.php");
?>