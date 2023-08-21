<?php 
session_start();
include('./config.php');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="icon" type="image/x-icon" href="./image/logo.jpg">
    <title>Pet shop | GIỎ HÀNG</title>
    <meta name="description"
        content="Chó, mèo, đẹp, đủ các loại pet, khỏe mạnh, có cam kết">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/gio-hang.css">
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

 <!--    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
     -->
    <script type="text/javascript">
      function validateForm()
      {
        var name = document.forms["form_thanh_toan"]["ten_thanh_toan"].value;
        var phone = document.forms["form_thanh_toan"]["dien_thoai"].value;
        var address = document.forms["form_thanh_toan"]["dia_chi"].value;      
        
        if(name.trim()=="")
        {
            alert("Nhập tên thanh toán");
            document.forms["form_thanh_toan"]["ten_thanh_toan"].focus();
            return false;
        }


        if(address.trim()=="")
        {
            alert("Nhập địa chỉ của bạn");
            document.forms["form_thanh_toan"]["dia_chi"].focus();
            return false;
        }
         if(address=="")
        {
            alert("Nhập địa chỉ của bạn");
            document.forms["form_thanh_toan"]["dia_chi"].focus();
            return false;
        }
        
      }
    </script>
</head>

<body>
<?php include("top.php");?>
    <div class="container">
    <div class="row">    
        <div class="col-sm-12"><h1 style="margin-top:50px;margin-bottom: 20px;text-align: center;">Giỏ hàng</h1></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">            
            <table class="table table-striped" style="margin-bottom: 50px;">
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
                <tbody id="giohang">
                <?php 
                    $stt=0;
                    $tongtien=0;
                    if(isset($_SESSION['giohang'])){
                        
                    foreach ($_SESSION['giohang'] as $key => $row) {
                       $stt =$stt+1;
                       $thanhtien=$row['so_luong']*$row['gia'];
                       $tongtien = $thanhtien+$tongtien;

                ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><a href="sanpham.php?id="><?php echo $row['ten_sanpham']?></a></td>
                    <td><?php echo number_format($row['gia'])?> đ</td>
                     <td><input style="width: 65px" onkeyup="suagiohang(<?php echo $key;?>)" id="soluong<?php echo $key;?>" value="<?php echo $row['so_luong']?>"></td>
                    <td><?php echo number_format($thanhtien) ?> đ</td>
                    <td><a class="btn btn-danger" href="giohangxoa.php?id=<?php echo $key?>">Xóa</a></td>                                
                </tr>
                <?php }
           }?>
                <tr>
                    <td colspan="6" class="text-center">
                        Tổng tiền: <strong class="text-primary"><?php echo number_format($tongtien) ?> đ</strong>
                    </td>
                </tr>
            
                </tbody></table>
<hr><br><br><br>
        <!--Nếu số hàng trong giỏ >0 thì mới hiện form dưới-->
        <?php 
            if(isset($_SESSION['khachhang_id'])){
                $sql="SELECT * from tbl_khachhang WHERE khachhang_id = ".$_SESSION['khachhang_id'];
                $kq = mysqli_query($ket_noi, $sql);
                $tbl_khachhang= mysqli_fetch_array($kq);
            
        ?>
        <div class="container-fluid">
              <h1 align="center" style="margin-bottom: 20px">Thông tin thanh toán</h1>
              <form class="form form-horizontal" method="post" action="thanhtoan.php" id="form_thanh_toan" onsubmit="return(validateForm());">
                
                <div class="form-group">
                <label class="control-label col-sm-3">Tên khách hàng</label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="ten_thanh_toan" id= "ten_thanh_toan" placeholder="Tên khách hàng" value ="<?php echo $tbl_khachhang['ten_khachhang']?>">
                </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-3">Email </label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="email" id= "email" placeholder="Địa chỉ email" value ="<?php echo $tbl_khachhang['email']?>">
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-3">Địa chỉ </label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="dia_chi" id= "dia_chi" placeholder="Địa chỉ nhận hàng" value ="<?php echo $tbl_khachhang['dia_chi']?>">
                </div>
                </div>
                
                <input type="hidden" name="txttongtien" value="<?php echo number_format($tongtien)?>">

                <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-12">
                <input class="button-capnhat text-uppercase offset-md-4 btn btn-warning mb-4" type="submit" name="btnSubmit"  value="Thanh toán ">
                </div>
                </div>         
            </form>
            </div>
            <?php 
                }else{ ?>
                  <center><h2>Vui lòng đăng nhập để mua hàng!</h2></center>
            <?php }?>
        </div>

        <div class="col-sm-2"></div>
    </div>          
</div>

  <?php include("footer.php");?>
    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#F68634;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script type="text/javascript">
 function suagiohang(id){
         var so_luong=$("#soluong"+id).val();
         if(so_luong==null || so_luong.length <= 0 ){
          
         }
        else { 
            if(so_luong==0){
               so_luong=1;
             }else{
                so_luong=so_luong;
            }
        $.ajax({
            url : "suagiohang.php", // gửi ajax đến file result.php
            type : "get", // chọn phương thức gửi là get
            dateType:"text", // dữ liệu trả về dạng text
            data : { // Danh sách các thuộc tính sẽ gửi đi
                 id : id,
                 so_luong: so_luong
            },
            success : function (result){
                // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                // đó vào thẻ div có id = result
                //alert(result);
                $("#giohang").html(result);
               
            }
        });}
   }

</script>
</body>


</html>
