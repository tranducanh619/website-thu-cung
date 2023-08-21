<!DOCTYPE html>
<html lang="vi">
<?php session_start();
?>
<head>
    <link rel="icon" type="image/x-icon" href="./image/logo.jpg">
    <title>Pet shop</title>
    <meta name="description"
        content="Chó, mèo, đẹp, đủ các loại pet, khỏe mạnh, có cam kết">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/sach-moi-tuyen-chon.css">
    <link rel="stylesheet" href="css/dang-nhap.css">

    <script type="text/javascript" src="js/main.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

    <link rel="canonical" href="http://dealbook.xyz/">
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="apple-touch-icon" sizes="180x180" href="anhdanhmuc1/Logo.png.png">
    <link rel="icon" type="image/png" sizes="32x32" href="anhdanhmuc1/Logo.png.png">
    <link rel="icon" type="image/png" sizes="16x16" href="anhdanhmuc1/Logo.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <style>img[alt="www.000webhost.com"]{display: none;}</style>
</head>

<body>
     <?php include("top.php");?>

     <!-- noi dung danh muc sach(categories) + banner slider -->
    <section class="header bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="margin-right: -15px;">
                    <!-- CATEGORIES -->
                    <div class="categorycontent" >
                            <ul>
                            <?php
                            include("config.php");
                            require_once("dbhelp.php");
                            $sql = "SELECT * FROM tbl_loaisanpham";
                            $danh_muc = executeresult($sql);
                            foreach ($danh_muc as $d) {
                            ?> 
                                
                                <li> <a href="loaisanpham.php?id=<?=$d['loaisanpham_id']?>"><?=$d['ten_loaisanpham']?></a><i
                                        class="fa fa-chevron-right float-right"></i>
                                </li>
                                
                            <?php } ;?>
                            </ul>
                        </div>
                </div>
          

                <!-- banner slider  -->
                <div class="col-md-9 px-0">
                    <div id="carouselId" class="carousel slide" data-ride="carousel">
                        <ol class="nutcarousel carousel-indicators rounded-circle">
                            <li data-target="#carouselId" data-slide-to="1" class="active"></li>
                            <li data-target="#carouselId" data-slide-to="2"></li>
                            <li data-target="#carouselId" data-slide-to="3"></li>
                            <li data-target="#carouselId" data-slide-to="4"></li>
                        </ol>
                       <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="anhdanhmuc1/1.jpg" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="First slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="anhdanhmuc1/2.jpg" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="Second slide"></a>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="anhdanhmuc1/3.jpg" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="Third slide"></a>
                            </div>
                              <div class="carousel-item">
                                <a href="#"><img src="anhdanhmuc1/4.jpg" class="img-fluid"
                                        style="height: 386px;" width="900px" alt="Third slide"></a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselId" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <!-- khoi sach moi  -->
     <?php

        


        include("config.php");
        $sql1 = "SELECT *  FROM tbl_loaisanpham WHERE loaisanpham_id = 1 or loaisanpham_id = 2 or loaisanpham_id = 4";
        $kq1 = mysqli_query($ket_noi,$sql1);
        while ($row1=mysqli_fetch_array($kq1)) {
    ;?> 
    <section class="_1khoi sachmoi bg-white">
        <div class="container">
            <div class="noidung" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h1 class="header text-uppercase" style="font-weight: 400;"><?php echo $row1["ten_loaisanpham"];?></h1>
                        <a href="loaisanpham.php?id=<?php echo $row1["loaisanpham_id"];?>" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                <?php
                $loaisanpham_id=$row1["loaisanpham_id"];
                $sql2="SELECT * FROM tbl_sanpham where loaisanpham_id='".$loaisanpham_id."'";
                $kq2=mysqli_query($ket_noi, $sql2);
                while ($row2 = mysqli_fetch_array($kq2)) {
                ;?>
                
                   
                    <div class="card" >
                        <a href="sanpham.php?id=<?php echo $row2["sanpham_id"];?>" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $row2["ten_sanpham"];?>">
                            <img class="card-img-top anh" style="width: 100%" src="thucpham/<?php echo $row2["anh"];?>" style="width: 230px;height: 300px"
                                alt="<?php echo $row2["anh"];?>" >
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten"><?php echo $row2["ten_sanpham"];?></h3>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi"><?php echo number_format($row2["gia"], 0, '', '.') ;?> đ</div>
                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ;?>
                </div>
                
            </div>
        </div>
    </section>
<?php } ;?>
<br>
<br>
<br>
<br>
<br>
<br>
 <?php include("footer.php");?>
    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#F68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>

   
   

</body>

</html>