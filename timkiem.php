<?php
session_start();
;?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>SẢN PHẨM| TÌM KIẾM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/timkiem.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
       <link rel="apple-touch-icon" sizes="180x180" href="anhdanhmuc/Logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="anhdanhmuc/Logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="anhdanhmuc/Logo.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">   
    <style type="text/css">
    .list-page{
        margin: auto;
    }
     .pagination a {
        margin-top: 20px;
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        }
    </style>
</head>

<body>
<?php include("top.php");?>
<?php 
    $tim_kiem=$_GET['tukhoa'];
;?>
    <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="">Tìm kiếm theo từ khoá : <?php echo $tim_kiem;?></a></li>
            </ol>
        </div>
    </section>



    <!-- các sản phẩm  -->
    <section class="content my-4" style="padding-bottom: 200px;">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="items">
                    <div class="row">
                            <?php
                                include("dbhelp.php");
                                $tim_kiem=$_GET['tukhoa'];
                                $sql ="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.ten_sanpham LIKE '%".$tim_kiem."%' limit 4 offset 0"; 
                                if(isset($_GET['page'])){
                                $offset = ($_GET['page']-1)*4;
                                   $sql ="SELECT * FROM tbl_sanpham WHERE tbl_sanpham.ten_sanpham LIKE '%".$tim_kiem."%' limit 4 offset ".$offset; 
                                }
                                $sanpham = executeresult($sql);
                                foreach ($sanpham as $s) {
                            ;?>
                            <!-- 1 sản phẩm  -->
                            <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="card">
                        <a href="sanpham.php?id=<?=$s["sanpham_id"];?>" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="<?=$s["ten_sanpham"];?>">
                            <img class="card-img-top anh" src="thucpham/<?=$s["anh"];?>">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten"><?=$s["ten_sanpham"];?></h6>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi" style="color: #f68634"><?php echo number_format($s["gia"], 0, '', '.') ;?> đ</div>
                                </div>
                                
                            </div>
                        </a>
                    </div></div>

                    <?php }?>
                    <?php ?>
                    <div class="col-md-12 pagination">
                        <div class="list-page">
                        <a href="timkiem.php?tukhoa=<?=$tim_kiem?>&page=<?php
                        if($_GET['page']-1>=1){
                            echo $_GET['page']-1;
                        }
                        else{
                            echo $_GET['page'];
                        }
                        ?>">&laquo;</a>
                        <a href="timkiem.php?tukhoa=<?=$tim_kiem?>&page=1">1</a>
                        <a href="timkiem.php?tukhoa=<?=$tim_kiem?>&page=2">2</a>
                        <a href="timkiem.php?tukhoa=<?=$tim_kiem?>&page=3">3</a>
                        <a href="timkiem.php?tukhoa=<?=$tim_kiem?>&page=4">4</a>
                        <a href="timkiem.php?tukhoa=<?=$tim_kiem?>&page=<?=$_GET['page']+1?>">&raquo;</a>
                        <?php ?>
                        </div>
                    </div>
                    </div>
                </div>

                <!--het khoi san pham-->
            </div>
            
            <!--het div noidung-->
        </div>
        <!--het container-->
         
    </section>

<br>
<br>
<br>
<br>
<br>

    <!-- footer  -->

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#f68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>


</body>

</html>