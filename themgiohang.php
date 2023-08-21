<?php 
session_start();
$id=$_GET['id'];
$so_luong=$_GET['so_luong'];
include('./config.php');
$sql = "SELECT * FROM tbl_sanpham WHERE sanpham_id = ".$id;
$query=mysqli_query($ket_noi, $sql);
$row=mysqli_fetch_assoc($query);
$_SESSION['giohang'][$id]=array(
	"ten_sanpham"=>$row['ten_sanpham'],
	"gia"=>$row['gia'],
	"anh"=>$row['anh'],
	"so_luong"=>$so_luong
);
echo "Bạn đã thêm sản phẩm ".$row['ten_sanpham']." vào giỏ hàng với số lượng là: ".$so_luong;
?>