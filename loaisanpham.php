<?php
session_start();
;?>
<!DOCTYPE html>
<html lang="vi">

<head>
   <link rel="icon" type="image/x-icon" href="./image/logo.jpg">
    <title>Pet shop | LOẠI SẢN PHẨM</title>
  <meta name="description"
        content="Chó, mèo, đẹp, đủ các loại pet, khỏe mạnh, có cam kết">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/sach-moi-tuyen-chon.css">
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
    include("dbhelp.php");
    $loaisanpham_id=$_GET['id'];
    $sql1 = "SELECT * FROM tbl_loaisanpham WHERE loaisanpham_id='".$loaisanpham_id."' ";
    $danh_muc = executeresult($sql1); 
    foreach ($danh_muc as $d) {
?>

     <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                 <li class="breadcrumb-item active"><a href=""><?=$d["ten_loaisanpham"]?></a>
                 </li>
            </ol>
        </div>
    </section>

    <!-- ảnh banner -->
    <section class="banner">
        <div class="container">
            <a href="index.php"><img src="anhdanhmuc1/1.jpg" style="height: 400px;" width="100%" alt="banner"
                    class="img-fluid"></a>
                  
    </section>
    <?php } ;?>

    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="items">
                    <div class="row">
                        
                            <?php
                                $sql2="SELECT * FROM tbl_sanpham where loaisanpham_id=".$loaisanpham_id." limit 8 offset 0";
                                if(isset($_GET['page'])){
                                $offset = ($_GET['page']-1)*8;
                                    $sql2="SELECT * FROM tbl_sanpham where loaisanpham_id=".$loaisanpham_id." limit 8 offset ".$offset;
                                }
                               $danh_muc1 = executeresult($sql2); 
                                foreach ($danh_muc1 as $dm) {
                            ;?>
                            <!-- 1 sản phẩm  -->
                            <div class="col-lg-3 col-md-4 col-xs-6" style="margin-top:5%;">
                            <div class="card">
                        <a href="sanpham.php?id=<?=$dm["sanpham_id"];?>" class="motsanpham"
                            style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom"
                            title="<?=$dm["ten_sanpham"];?>">

                            <img class="card-img-top anh" src="thucpham/<?=$dm["anh"];?>" 
                                alt="<?=$dm["anh"];?>">
                          
                            
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten"><?=$dm["ten_sanpham"];?></h6>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi" style="color: #f68634"><?php echo number_format($dm["gia"], 0, '', '.') ;?> đ</div>
                                </div>
                                
                            </div>
                        </a>
                    </div></div>
                    <?php } ;?>

                    
                    <div class="col-md-12 pagination">
                        <div class="list-page">
                        <a href="loaisanpham.php?id=<?=$_GET['id']?>&page=<?php
                        if($_GET['page']-1>=1){
                            echo $_GET['page']-1;
                        }
                        else{
                            echo $_GET['page'];
                        }
                        ?>">&laquo;</a>

                        <a href="loaisanpham.php?id=<?=$_GET['id']?>&page=1">1</a>
                        <a href="loaisanpham.php?id=<?=$_GET['id']?>&page=2">2</a>
                        <a href="loaisanpham.php?id=<?=$_GET['id']?>&page=<?=$_GET['page']+1?>">&raquo;</a>
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
<br>
<br>    
    </div>
    <!-- footer  -->
    <?php include("footer.php");?>

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#f68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>


</body>

</html>