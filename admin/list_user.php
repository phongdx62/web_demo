<?php  
	require("templates/header.php");
	echo"<form action='../admin/list_user.php'>";
	require("../search/search_admin.php");
	// Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $timkiem = addslashes($_GET['timkiem']);
 
            // Nếu $timkiem rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($timkiem)) {
                echo "<p style= 'color:red;'>* Dữ liệu tìm kiếm không được để trống</p>";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "SELECT * FROM thanhvien WHERE ho LIKE '%$timkiem%' OR ten LIKE '%$timkiem%' OR taikhoan LIKE '%$timkiem%' OR email LIKE '%$timkiem%'";
 
                // Kết nối sql
                require("../config/connect.php");
                // Thực thi câu truy vấn
                $kq = mysqli_query($conn,$sql);
 
                // Đếm số dòng trả về trong sql.
                $num = mysqli_num_rows($kq);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $timkiem != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$timkiem</b></p>";
                    
                    // Vòng lặp while & mysqli_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">'; 
                    echo "<tr style='background: #97FFFF;'>";
                    	echo"<td></td>";
                		echo"<td>Người dùng</td>";					
						echo"<td>Email</td>";
						echo"<td>Cấp bậc</td>";
						echo"<td>Xóa</td>";
					echo"</tr>";

                    while ($data = mysqli_fetch_assoc($kq)) 
                    {
                        echo"<tr>";
							echo"<td></td>";
							echo"<td>$data[taikhoan]</td>";
							echo"<td>$data[email]</td>";						
							if($data['capbac'] == 1)
							{
								echo "<td>Admin</td>";
							}
							else
							{
								echo "<td>Thành viên</td>";
							}
							echo"<td><a href='del_list_user.php?matv=$data[matv]' onclick='return show_confirm()' style='color:red;'>Xóa</a></td>";						
						echo"</tr>";					
                    }                   
                } 
                else 
                {
                    echo"<p style='color:red;'>* Không tìm thấy kết quả!;</p>";
                }
                //Đóng kết nối với CSDL
				mysqli_close($conn);
            }
            	echo"</table>";
			echo"</div>";	
        }
        else
        {
        	echo"<tr style='background: #97FFFF;'>";
				echo"<td>Số thứ tự</td>";
				echo"<td>Người dùng</td>";
				echo"<td>Email</td>";
				echo"<td>Cấp bậc</td>";
				echo"<td>Xóa</td>";
			echo"</tr>";
			
			//Mở kết nối với CSDL
			require("../config/connect.php");
			//Thực hiện truy vấn
			$sql = "SELECT matv,taikhoan,email,capbac FROM thanhvien";
			$kq = mysqli_query($conn,$sql);
			$stt = 1;
			// $data = mysqli_fetch_assoc($kq); //Mảng không có thứ tự
			while ($data = mysqli_fetch_assoc($kq)) 
			{
				echo"<tr>";
					echo"<td>$stt</td>";
					echo"<td>$data[taikhoan]</td>";
					echo"<td>$data[email]</td>";						
					if($data['capbac'] == 1)
					{
						echo "<td>Admin</td>";
					}
					else
					{
						echo "<td>Thành viên</td>";
					}
					echo"<td><a href='del_list_user.php?matv=$data[matv]' onclick='return show_confirm()' style='color:red;'>Xóa</a></td>";
					//href='del_list_user.php?id=$data[matv]' matv sẽ được chuyển theo đường dẫn
				echo"</tr>";
				$stt++;
			}			
			//Đóng kết nối với CSDL
			mysqli_close($conn);
						
				echo"</table>";
			echo"</div>";	
        }
?>
	
			
<?php  
	require("templates/footer.php");
?>
