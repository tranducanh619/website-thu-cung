<?php
$id=$_GET['id'];
$so_luong=$_GET['so_luong'];
session_start();
$row=$_SESSION['giohang'][$id];
$_SESSION['giohang'][$id]['so_luong']=$so_luong;
$stt=0;
$tongtien=0;
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
<?php }?>
<tr>
    <td colspan="6" class="text-center">
        Thành tiền: <strong class="text-primary"><?php echo number_format($tongtien) ?> đ</strong>
    </td>
</tr>