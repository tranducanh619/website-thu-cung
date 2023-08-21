<html>
<head>
    <meta charset="utf-8" />
</head>
<?php 
session_start();
if(isset($_GET['id'])&&isset($_SESSION['giohang']))
{
    $id = $_GET['id'];
    unset($_SESSION['giohang'][$id]);
    echo"<script>
    alert('Xoá thành công');
    window.location = 'giohang.php';
    </script>"; 
}
else
{
    echo"<script>
    window.location = 'giohang.php';
        </script>";    
}
?>
</html>