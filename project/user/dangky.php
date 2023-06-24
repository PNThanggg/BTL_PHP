<div class="setup">
        <div class="fdangky">
            <form action="" name="dangky" method="post">
                <table>
                    <h2>Đăng Ký</h2>

                    <label for="tendangnhap"><b>Tên đăng nhập</b></label>
                    <input class="nhap" type="text" name="tenDangNhap" required>

                    <label for="psw"><b>Mật khẩu</b></label>
                    <input class="nhap" type="password" name="psw" required>

                    <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                    <input class="nhap" type="password" name="psw-repeat" required>

                    <label>
                        <div class="tich">
                            <input type="checkbox" name="dongy"><label>Tôi đồng ý với <u>Điều khoản & Điều
                                    kiện</u></label>
                        </div>

                    </label>

                    <div class="xacNhan">
                        <button type="submit" name="submit" class="submit">Tiếp tục</button>
                    </div>
                </table>

            </form>

        </div>
    </div>

 <?php
	if(isset($_POST['submit'])) {
		$taikhoan= $_POST['tenDangNhap'];
        $matkhau = ($_POST['psw']);
        $rematkhau=  ($_POST['psw-repeat']);

		if (!$taikhoan || !$matkhau || !$rematkhau)
		{
			echo ' <script language="javascript">alert("Vui lòng nhập đầy đủ thông tin");</script>';	
		} elseif($matkhau != $rematkhau){
			echo ' <script language="javascript">alert("Mật khẩu không trùng khớp");</script>';	
		} else{
            include 'connect.php';
            $sql_check = "SELECT * FROM account WHERE account.useName = '$taikhoan'";

            // Thực thi câu truy vấn
            $result = mysqli_query($connect, $sql_check);

            // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username đã tồn tại trong CSDL
            if (mysqli_num_rows($result) > 0) {
                echo '<script language="javascript">alert("Tài khoản đã tồn tại !");</script>';
            } else {
                $sql_dangky_account ="INSERT INTO account(useName,pass,role) VALUE('".$taikhoan."','".$matkhau."',1)";
                $query_dangky=mysqli_query($connect,$sql_dangky_account);

                if($query_dangky) {
                    echo ' <script language="javascript">alert("Bạn đã đăng ký thành công. Hãy tiếp tục nhập thông tin cá nhân");</script>';
                }

                //lấy khoá ngoại
                $sql = "SELECT * FROM account WHERE account.useName='$taikhoan' AND account.pass='$matkhau'";
                $row = mysqli_query($connect,$sql);
            
                $count= mysqli_num_rows($row);
            
                if($count>0) {
                    $row_data = mysqli_fetch_array($row);
                            $id_account = $row_data['accountID'];
                            $_SESSION['id']=$id_account;
                            $_SESSION['name']=$taikhoan;
                            $_SESSION['role']=1;
                }	

                echo ' <script language="javascript">window.location="index.php?quanly=nhapthongtin"</script>';	
            }
        }
	}			
?> 