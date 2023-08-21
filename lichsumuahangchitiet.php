<?php
session_start();
if(isset($_SESSION['login']))
{
     include("config.php");
;?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="icon" type="image/x-icon" href="./image/logo.jpg">
    <title>Pet shop| CHI TIẾT LỊCH SỬ MUA HÀNG</title>
    <meta name="description"
        content="Chó, mèo, đẹp, đủ các loại pet, khỏe mạnh, có cam kết">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/home.css">
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
                    <th>Mã chi tiết</th>
                    <th>Sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php 
                    $hoadon_id=$_GET['id'];
                    $sql = "
                              SELECT tbl_giohang.giohang_id,tbl_sanpham.ten_sanpham, tbl_sanpham.gia,tbl_giohang.so_luong, tbl_sanpham.gia*tbl_giohang.so_luong FROM tbl_sanpham INNER JOIN tbl_giohang ON tbl_sanpham.sanpham_id=tbl_giohang.sanpham_id WHERE tbl_giohang.hoadon_id='".$hoadon_id."'
                    ";
                
                    $ket_qua = mysqli_query($ket_noi, $sql);
                    $i=0;
                    while ($row = mysqli_fetch_array($ket_qua)) {
                        $i++;
                ;?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row["giohang_id"];?></td>
                    <?php
                    $s="
                              SELECT * FROM tbl_sanpham WHERE tbl_sanpham.ten_sanpham='".$row["ten_sanpham"]."'
                    ";
                    $kq = mysqli_query($ket_noi, $s);
                    $r = mysqli_fetch_array($kq);
                    ;?>
                    <td><a href="sanpham.php?id=<?php echo $r["sanpham_id"];?>"><?php echo $row["ten_sanpham"];?></a></td>
                    <td><?php echo number_format($row["gia"], 0, '', '.') ;?> đ</td>
                    <td><?php echo $row["so_luong"];?></td>
                    <td><?php echo $row["tbl_sanpham.gia*tbl_giohang.so_luong"];?></td>
                   </tr>
                   <?php };?>
                </table>
                </div>
<hr><br><br><br>
    </div>          
</div><br>
  <!-- footer  -->
    <?php include("footer.php");?>

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#F68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>


</body>

</html>
<?php
};?>