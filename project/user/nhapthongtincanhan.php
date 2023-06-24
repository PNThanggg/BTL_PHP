

<div class="setup">
        <div class="nhapThongTinCaNhan">
            <form action="" name="fthongtin" method="post">
                <table>
                    <h2>Nhập thông tin cá nhân</h2>

                    <label for=""><b>Họ và tên</b></label>
                    <input class="nhap" type="text" name="tenHocVien" required>

                    <label for=""><b>Ngày tháng năm sinh</b></label>
                    <input class="nhap" type="date" id="birthday" name="birthday" required>

                    <label for=""><b>Số điện thoại</b></label>
                    <input class="nhap" type="text" name="phone" required>

                    <label for=""><b>Địa chỉ</b></label>
                    <input class="nhap" type="text" name="adress" required>

                    <label for=""><b>Email</b></label>
                    <input class="nhap" type="email" name="email" required>

                    <div class="xacNhan">
                        <button type="submit" name="sumit_nhaptt"class="submit">Xác nhận</button>
                    </div>
                </table>

            </form>

        </div>
    </div>

    <?php
	if(isset($_POST['sumit_nhaptt'])) {
		$tenhocvien = $_POST['tenHocVien'];
		$email = $_POST['email'];
        $ngaysinh=$_POST['birthday'];
		$dienthoai = $_POST['phone'];
		$diachi = $_POST['adress'];
		if (!$tenhocvien ||!$email || !$dienthoai || !$diachi)
		{
			echo ' <script language="javascript">alert("Vui lòng nhập đầy đủ thông tin");</script>';			
        }else{
	
			    include 'connect.php';
                $sql_dangky_student ="INSERT INTO student(studentName,studentPhone,studentAdress,studentEmail,studentDate_Birth,accountID) VALUE('".$tenhocvien."','".$dienthoai."','".$diachi."','".$email."','".$ngaysinh."','".$_SESSION['id']."')";
                $query_dangky=mysqli_query($connect,$sql_dangky_student);
                echo ' <script language="javascript">alert("Hoàn thành đăng ký"); window.location="index.php";</script>';		
            }
            			
			}	
?>