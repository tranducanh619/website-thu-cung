<?php
session_start();
if(isset($_SESSION['login']))
{
    include("config.php");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="icon" type="image/x-icon" href="./image/logo.jpg">
    <title>Pet shop | LỊCH SỬ MUA HÀNG</title>

   <meta name="description"
        content="Chó, mèo, đẹp, đủ các loại pet, khỏe mạnh, có cam kết">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="css/thongtintaikhoan.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

    <link rel="canonical" href="http://dealbook.xyz/">
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="apple-touch-icon" sizes="180x180" href="anhdanhmuc/Logo.png.png">
    <link rel="icon" type="image/png" sizes="32x32" href="anhdanhmuc/Logo.png.png">
    <link rel="icon" type="image/png" sizes="16x16" href="anhdanhmuc/Logo.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <style>img[alt="www.000webhost.com"]{display: none;}</style>   
</head>

<body>
    <?php include("top.php");?>
    
    <div class="container">
    <div class="row">    
        <div class="col-sm-12"><h1 style="margin-top:50px;margin-bottom: 20px;text-align: center;">Lịch sử mua hàng</h1></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8" >           
            <table class="table table-striped" style="margin-bottom: 50px;">
                <tr>
                    <th>STT</th>
                    <th>Mã hoá đơn</th>
                    <th>Tổng tiền</th>
                    <th>Tổng số</th>
                    <th>Ngày mua hàng</th>
                    <th>Tình trạng</th>
                    <th>Xác nhận nhận hàng</th>
                    <th>Chi tiết đơn hàng</th>
                </tr>
        

                <?php 
                    $sql1 = "
                              SELECT * FROM tbl_hoadon Where tbl_hoadon.khachhang_id = '".$_SESSION['khachhang_id']."' ORDER BY tbl_hoadon.hoadon_id ASC 
                    ";
                    $ket_qua = mysqli_query($ket_noi, $sql1);
                    $i=0;
                    while ($row = mysqli_fetch_array($ket_qua)) {
                        $i++;
                ;?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row["hoadon_id"];?></td>
                    <?php
                        $sql1 = "
                          SELECT SUM(tbl_sanpham.gia*tbl_giohang.so_luong),SUM(tbl_giohang.so_luong) FROM tbl_sanpham INNER JOIN tbl_giohang ON tbl_sanpham.sanpham_id=tbl_giohang.sanpham_id WHERE tbl_giohang.hoadon_id='".$row["hoadon_id"]."'";
                        $kq = mysqli_query($ket_noi, $sql1);
                        $r = mysqli_fetch_array($kq)
                    ;?>
                    <td><?php echo number_format($r["SUM(tbl_sanpham.gia*tbl_giohang.so_luong)"], 0, '', '.') ;?> đ</td>
                    <td><?php echo $r["SUM(tbl_giohang.so_luong)"] ;?></td>
                    <td><?php echo $row["ngay_xuat"];?></td>
                    <td>
                    <?php
                        if($row['tinh_trang']==1){
                        ?>
                        <a class="btn btn-default" style="font-size: 14px;" href="#">Đã giao hàng</a>
                        <?php
                        }else if($row['tinh_trang']==0){
                        ?>
                        <a class="btn btn-default" style="font-size: 14px;" href="#">Chưa giao hàng</a>
                        <?php }else{ ?>
                        <a class="btn btn-default" style="font-size: 14px;" href="#">Đã nhận hàng</a>
                    <?php
                        };
                    ?></td> 
                    <td>
                        <?php
                        if($row['tinh_trang']==1){
                        ?>
                        <a class="btn btn-success" style="font-size: 14px;" href="admin/xacnhan.php?idhd=<?php echo $row['hoadon_id'];?>">Nhận hàng</a>
                        <?php
                        }
                        ?>
                    </td> 
                    <td><a class="btn btn-primary" href="lichsumuahangchitiet.php?id=<?php echo $row["hoadon_id"]; ?>"><i class="fas fa-search"></i></a></td>
                <?php }
                $so_luong = mysqli_num_rows($ket_qua);
                if($so_luong==0)
                {
                ;?>
                <tr>
                    <td colspan="6" style="color: red; font-size: 20px; text-align: center;">Không có lịch sử mua hàng</td>
                </tr>
                <?php
                };?>
                </table>
                <a class="btn btn-lg btn-block btn-signin text-uppercase text-white" href="index.php" style="text-align: center;">Mua thêm</a>
                </div>
<hr><br><br><br>
    </div>          
</div>
<br>
<br>
<br>
<br>
<br>
<br>
    
  <!-- footer  -->
    <?php include("footer.php");?>

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#F68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>


</body>
</html>
<?php }?>