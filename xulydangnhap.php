<meta charset="UTF-8">
<?php

if (isset($_POST['dangnhap'])) 
{

    
    
    // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
    include('./config.php');


            // reCAPTCHA checkbox validation
            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
            // Google reCAPTCHA API secret key 
            $secret_key = '6LePsZQiAAAAALtkvM2Yr7toN-H3h6CKDEOmBEUO'; 
             
            // reCAPTCHA response verification
            $verify_captcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode reCAPTCHA response 
            $verify_response = json_decode($verify_captcha); 
             
            // Check if reCAPTCHA response returns success 
            if($verify_response->success){ 
                
                // 2. Viết câu lệnh truy vấn để kiểm tra xem Khách hàng có tồn tại trong BẢNG khách hàng?
                $email = $_POST["email"];
                $mat_khau = $_POST["matkhau"];

                $sql = "
                          SELECT * 
                          FROM tbl_khachhang
                          WHERE email = '".$email."'
                       ";

                // 3. Thực thi câu lệnh truy vấn (mục đích trả về dữ liệu cần)
                $xac_thuc_khach_hang = mysqli_query($ket_noi, $sql);
                // 4. Xử lý dữ liệu mà các bạn thu được
                  
                $row3 = mysqli_fetch_array($xac_thuc_khach_hang);
                $password_verify = password_verify($mat_khau,$row3["mat_khau"]);
                # TH1: Nếu số lượng bản ghi = 0 --> email, password không chính xác --> đẩu người dùng về trang đăng nhập
                # TH2: Nếu số lượng bản ghi = 1 --> email, password chính xác --> đẩu người dùng về trang quản trị hệ thống
                if ($password_verify==1) {
                    $so_luong_ban_ghi = mysqli_num_rows($xac_thuc_khach_hang);
                }
                else $so_luong_ban_ghi = 0;
                

                if ($so_luong_ban_ghi==0) {
                    echo "
                        <script type='text/javascript'>
                            window.alert('Bạn chưa có tài khoản');
                        </script>
                    ";
                    echo "
                        <script type='text/javascript'>
                            window.location.href='index.php';
                        </script>
                    ";

                } else {

                $kq = mysqli_query($ket_noi, $sql);
                $tbl_khachhang= mysqli_fetch_array($kq);
                    session_start();
                    $_SESSION['login']=$tbl_khachhang['ten_khachhang'];
                    $_SESSION['khachhang_id']=$tbl_khachhang["khachhang_id"];
                    $_SESSION['dia_chi']=$tbl_khachhang['dia_chi'];
                    $_SESSION['email']=$tbl_khachhang['email'];

                    echo "
                        <script type='text/javascript'>
                            window.alert('Bạn đã đăng nhập thành công');
                        </script>
                    ";
                    echo "
                        <script type='text/javascript'>
                            window.location.href='index.php';
                        </script>
                    ";

                }
                 
                 
                $returnMsg = 'Your registration has been submitted successfully.'; 
            }else{ $returnMsg = 'reCaptch verification failed, please verify again.'; } 
        }else{                     echo "
                        <script type='text/javascript'>
                            window.alert('Bạn chưa nhập capcha');
                            window.location.href='index.php';
                        </script>
                    ";  } 
    

}
echo $returnMsg;
?>