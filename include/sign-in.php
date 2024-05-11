<div class="dk-content">
    <?php
    if (isset($_GET['trangthai'])) {
        $result = $_GET['trangthai'];

        if ($result == 'dktk') {
            echo   '<script> alert("Bạn đã đăng ký thành công.")</script>';
        }
        if ($result == 'sai-tk-mk') {
            $err['false'] = "Tài khoản hoặc mât khẩu sai.";
        }
    }
    ?>
    <div class="flex-container justify-content-center">
        <div class="sign-in conteiner">
        <div class="title-dk">
            <h1>Đăng nhập</h1>
        </div>

        <div class="mb-3">
            <form action="signin.php" method="POST" onsubmit="return ktdangnhap()">
                <div class="form-group">
                    <label for="username" class="form-label">Tên đăng nhập:</label> <br>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Mật khẩu:</label><br>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                    <div class="err-mess"> <span> <?php echo (isset($err['false'])) ? $err['false'] : '' ?></span> </div>
                </div>

                <div class="form-submit">
                    <button class="btn btn-primary" type="submit" id="submit" name="submit">Đăng nhập </button>
                </div>
        </div>
        </form>
        <div class="form-group">
            <a href="#">Quên mật khẩu?</a>
        </div>
        <div class="form-group">
            Bạn chưa có tài khoản?<a href="index.php?id=signup"> Đăng ký thành viên</a>
        </div>
        </div>
    </div>