<?php
	session_start();
	require("config/header.php");
?>
    
    <link rel="stylesheet" href="./css/style-login.css">

	<title>Trang đăng nhập</title>

</head>
<body class="text-center">

	<?php
		$loi = array();
		//$taikhoan = $matkhau = NULL;
		$loi["dangnhap"] = NULL;
		if(isset($_POST["ok"]))  
		{			
			$taikhoan = $_POST["taikhoan"];	
			$matkhau = $_POST["matkhau"];
			
			//Xử lý đăng nhập
			if(isset($taikhoan) && isset($matkhau))
			{
				//Mở kết nối với CSDL
				require("config/connect.php");
				//Thực hiện câu truy vấn
				$sql = "SELECT * FROM thanhvien WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";			
				$kq = mysqli_query($conn,$sql);			
				if(mysqli_num_rows($kq) == 1)
				{
					//Tạo session sẽ lưu giá trị mà người dùng nhập vào trường tài khoản
					//$_SESSION["taikhoan"] = $taikhoan;
					
					//Lấy dữ liệu trong biến kết quả
					$data = mysqli_fetch_assoc($kq); //Lúc này biến data sẽ có dạng mảng ko có thứ tự với tên cột là từ khóa và phần giá trị của cột là giá trị của từ khóa				
					$_SESSION["capbac"] = $data["capbac"];

					if($_SESSION["capbac"] == 1)
					{
						// echo "Đúng rồi còn gì nữa";
					 	// header("location : admin/admin.php");
					 	// exit();
					 	ob_start(); 
						header('Location: admin/admin.php');
						ob_end_flush(); 
					}
					else					
					{
						// echo "Vẫn đúng mà";
						$_SESSION["taikhoan"] = $taikhoan;
						// header("location : index.php");
						// exit();
						ob_start(); 
						header('Location: index.php');
						ob_end_flush();					
					}				
				}
				else
				{
					$loi["dangnhap"] = "* Bạn nhập sai tài khoản hoặc mật khẩu";
				}
				//Đóng kết nối
				mysqli_close($conn);
			}
		}		
	?>
	
	<form action="login.php" method="post" class="form-signin">
		<img class="mb-3" src="./image/login.png" alt="" width="158" height="65">
		<h1 class="h3 mb-3 font-weight-normal">Đăng nhập</h1>
		<label for="inputEmail" class="sr-only">Tài khoản</label>
		<input type="text" class="form-control is-valid" id="username" name="taikhoan" placeholder="Tài khoản" required>
		<label for="inputPassword" class="sr-only">Mật khẩu</label>
		<input type="password" id="inputPassword" name="matkhau" class="form-control is-valid" placeholder="Mật khẩu" required >
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me">
				Ghi nhớ
			</label>
		</div>
		<button class="btn btn-lg btn-success btn-block mb-2" type="submit" name="ok">Đăng nhập</button>
		<a class="register" href="./register.php">Đăng ký ngay</a>
		<p class="mt-4 mb-3 text-muted" style="font-size: 15px; opacity: .8;">Copyright 2018-2019</p>

	</form>

	<div style="color:red;">
		<?php			
			echo $loi["dangnhap"];
		?>
	</div>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php  
    	require("config/footer.php");   	 
    ?>
    
</body>
</html>