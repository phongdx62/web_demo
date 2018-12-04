<?php  
	require("templates/header.php");
	echo"<form action='../admin/list_music.php'>";
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
                $sql = "SELECT * FROM baihat WHERE tenbh LIKE '%$timkiem%' OR tencs LIKE '%$timkiem%' OR tenns LIKE '%$timkiem%'";
 
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
                		echo"<td>Mã bài hát</td>";					
						echo"<td>Tên bài hát</td>";
						echo"<td>Ca sĩ</td>";
						echo"<td>Nhạc sĩ</td>";
						echo"<td>Sửa</td>";
						echo"<td>Xóa</td>";
					echo"</tr>";                 
                    while ($data = mysqli_fetch_assoc($kq)) 
                    {
                        echo"<tr>";
                        	echo"<td>$data[mabh]</td>";						
							echo"<td>$data[tenbh]</td>";
							echo"<td>$data[tencs]</td>";
							echo"<td>$data[tenns]</td>";						
							echo"<td><a href='edit_list_music.php?mabh=$data[mabh]' style='color:blue;'>Sửa</a></td>";	
							echo"<td><a href='del_list_music.php?mabh=$data[mabh]' onclick='return show_confirm()' style='color:red;'>Xóa</a></td>";						
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

			echo"<tr style='height: 40px;'>";
				echo"<td><a style='color: #FF33FF;' href='add_list_music.php'>Thêm bài hát</a></td>";
			echo"</tr>";
			echo"<tr style='background: #97FFFF;''>";
				echo"<td>Mã bài hát</td>";
				echo"<td>Tên bài hát</td>";
				echo"<td>Ca sĩ</td>";
				echo"<td>Nhạc sĩ</td>";
				echo"<td>Sửa</td>";
				echo"<td>Xóa</td>";
			echo"</tr>";

			//Mở kết nối với CSDL
			require("../config/connect.php");
			//Thực hiện truy vấn
			$sql = "SELECT mabh,tenbh,tencs,tenns FROM baihat";
			$kq = mysqli_query($conn,$sql);
			// $data = mysqli_fetch_assoc($kq); //Mảng không có thứ tự
			while ($data = mysqli_fetch_assoc($kq)) 
			{
				echo"<tr>";
					echo"<td>$data[mabh]</td>";
					echo"<td>$data[tenbh]</td>";
					echo"<td>$data[tencs]</td>";
					echo"<td>$data[tenns]</td>";						
					echo"<td><a href='edit_list_music.php?mabh=$data[mabh]' style='color:blue;'>Sửa</a></td>";	
					echo"<td><a href='del_list_music.php?mabh=$data[mabh]' onclick='return show_confirm()' style='color:red;'>Xóa</a></td>";						
				echo"</tr>";
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