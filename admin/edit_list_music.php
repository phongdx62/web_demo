<?php 
	require("templates/header.php");

	$mabh = $_GET["mabh"];

	//Kết nối CSDL
	require("../config/connect.php");
	$sql = "SELECT * FROM baihat WHERE mabh = $mabh";
	$kq = mysqli_query($conn,$sql);
	$data = mysqli_fetch_assoc($kq); //Mảng ko có thứ tự					   								  	
?>	

	<form action="add_list_music.php" method="post">	
		<h2>Sửa thông tin bài hát</h2>
		<div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tenbh" placeholder="Tên bài hát" value="<?php echo $data['tenbh']; ?>">
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tencs" placeholder="Tên ca sĩ" value="<?php echo $data['tencs']; ?>">
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="tenns" placeholder="Tên nhạc sĩ" value="<?php echo $data['tenns']; ?>">
				<div></div>
			</div>
			<div>
				<input style="height: 24px; width: 300px;" type="text" name="url" placeholder="Đường dẫn file" value="<?php echo $data['url']; ?>">
				<div></div>
			</div>
				
		<button style="height: 30px;" type="submit" name="ok">Sửa</button>
	</form>
	
<?php  
	mysqli_close($conn);
	require("templates/footer.php");
?>