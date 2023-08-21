
<link rel="stylesheet" href="css/dang-nhap.css">
<!--PHP-->

<?php
require('config.php');
?>
<div class="modal-body">
    <form method="POST" action="xulydangnhap.php" id="form-login">
        <div class="close" >
        <span aria-hidden="true">&times;</span>
    </div>
    <script>
       $(".close").click(function(){
          window.location = "index.php"
       })
    </script>
    <div class="title">ĐĂNG NHẬP</div>
        <div class="form-group form-group-login">
            <label for="exampleInputEmail">Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail" name="email" required>
        </div>
        <div class="form-group form-group-login">
            <label for="exampleInputPassword">Mật khẩu:</label>
            <input type="password" class="form-control" id="exampleInputPassword" name="matkhau" required>
        </div>
        <div style="margin-left: 25%;">
        <div class="g-recaptcha" data-sitekey="6LePsZQiAAAAAApJM3P-zkmVDdUQO0EIUW3tqZK1"></div>
        </div>
        <div class="button">
            <button type="submit" class="btn" name="dangnhap">Đăng nhập</button>
        </div>
        
        

    </form>
</div>





<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>