<?php
session_start();
 include('./config.php');
$khachhang_id= $_SESSION['khachhang_id'];
$sql= "INSERT INTO `tbl_hoadon`(`khachhang_id`, `admin_id`, `ngay_xuat`, `tinh_trang`) VALUES ('$khachhang_id','1',current_timestamp(), '0')";
$kq = mysqli_query($ket_noi, $sql);
$sql="SELECT MAX(`hoadon_id`) as `hoadon_id` FROM `tbl_hoadon`";
$kq = mysqli_query($ket_noi, $sql);
$id= mysqli_fetch_array($kq);
$id=$id['hoadon_id'];
$_SESSION['hoadon_id']=$id;
$tongtien=0;
foreach ($_SESSION['giohang'] as $key => $row) {
    $so_luong= $row['so_luong'];
    $sql="SELECT so_luong FROM tbl_sanpham WHERE sanpham_id=$key";
    $kq = mysqli_query($ket_noi, $sql);
    $sl= mysqli_fetch_array($kq);
    $so_luong_kho= $sl['so_luong'];
    $sql1="INSERT INTO `tbl_giohang`(`sanpham_id`, `hoadon_id`, `so_luong`) VALUES ($key,$id,$so_luong)";
    $kq = mysqli_query($ket_noi, $sql1);
    $sql2="UPDATE tbl_sanpham SET so_luong= $so_luong_kho-$so_luong WHERE sanpham_id=$key";
    $kq = mysqli_query($ket_noi, $sql2);
    $thanhtien=$row['so_luong']*$row['gia'];
    $tongtien = $thanhtien+$tongtien;
}
$_SESSION['tongtien']=$tongtien;
?>
<script>
window.location.href="thongtindathangonline.php";
</script>