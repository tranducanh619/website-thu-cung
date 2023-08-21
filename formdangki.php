<link rel="stylesheet" href="css/dangki.css">
<!--PHP-->

<?php
require('config.php')
?>
<div class="modal-body" id="formdangky">
    
    <form method="POST" action="xulydangki.php" id="form-signup">
    <div class="close" >
        <span aria-hidden="true">&times;</span>
    </div>
    <script>
       $(".close").click(function(){
          window.location = "index.php"
       })
    </script>
    <div class="title">ĐĂNG KÍ</div>
        <div class="form-group">
            <label for="exampleInputHoten">Họ và tên:</label>
            <input type="text" class="form-control" id="exampleInputHoten" name="hoten" autofocus required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail" name="email" required>
        </div>
        <div class="form-group">
            <label for="exampleInputDiachi">Địa chỉ:</label>
            <input type="text" class="form-control" id="exampleInputDiachi" name="diachi" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Mật khẩu:</label>
            <input type="password" class="form-control" id="exampleInputPassword" name="matkhau" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nhập lại mât khẩu:</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="xacnhanmatkhau" required>
        </div>
        <div class="form-group">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Đồng ý với điều khoản và dịch vụ</label>
        </div>
        <div style="margin-left: 25%;">
        <div class="g-recaptcha" data-sitekey="6LePsZQiAAAAAApJM3P-zkmVDdUQO0EIUW3tqZK1"></div>
        </div>
        <div class="button">
            <button type="submit" class="btn" name="dangki">Submit</button>
        </div>

    </form>
</div>






<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>