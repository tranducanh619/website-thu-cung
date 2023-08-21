<?php 
session_start();
?>

<?php 
    include("config.php");
    if(!isset($_POST['mk_cu']))
    {
        $ten_khachhang = $_POST['txtTenKH'];
        $dia_chi = $_POST['txtDiachi'];
        $email = $_POST['txtEmail'];
        
        $sql ="UPDATE `tbl_khachhang` SET `ten_khachhang`='".$ten_khachhang."',`dia_chi`='".$dia_chi."',`email`='".$email."' WHERE `tbl_khachhang`.`khachhang_id` = '".$_SESSION['khachhang_id']."'
        ";
        $kq = mysqli_query($ket_noi, $sql);
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhập thông tin tài khoản thành công');
                window.location.href='thongtintaikhoan.php';
            </script>
        ";
    }
  
    else
    {
        $mat_khau_cu=$_POST['mk_cu'];
        if($mat_khau_cu==$_SESSION['mat_khau'])
        {
        $mat_khau_moi=$_POST['mk_moi'];
        $sql ="UPDATE `tbl_khachhang` SET `mat_khau`='".$mat_khau_moi."' WHERE `tbl_khachhang`.`khachhang_id` = '".$_SESSION['khachhang_id']."'
        ";
        $kq = mysqli_query($ket_noi, $sql);
        session_destroy();
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã đổi mật khẩu thành công');
                window.location.href='dangnhap.php';
            </script>
        ";
        }else
        echo "
                <script type='text/javascript'>
                    window.alert('Bạn nhập sai mật khẩu!!');
                </script>
            ";

        
    
    }
?> 
