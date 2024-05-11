<div class="flex-container justify-content-center">
    <div class="sign-in conteiner">
    <div class="title-dk">
        <h1>Đăng ký</h1>
    </div>
    <div class="sign-form">
        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="hoten" class="form-label">Nhập họ và tên:</label>
                <div class="popup" onmouseover="popup()">*
                    <span class="popuptext" id="myPopup">Họ tên không chứa các ký tự đặc biệt, có thể có dấu.</span>
                </div>
                <input class="form-control" type="hoten" name="hoten" id="hoten" placeholder="Nhập Họ và tên:">
                <div class="err-mess"> <span> <?php echo (isset($_SESSION['error']['hoten'])) ? $_SESSION['error']['hoten'] : '' ?></span> </div>

            </div>
            <div class="form-group">
                <label for="username" class="form-label">Tên đăng nhập:</label>
                <div class="popup" onmouseover="popup1()">*
                    <span class="popuptext" id="myPopup1">Tên đăng nhập dài 3-16 ký tự, chỉ có thể chứa 1 dấu "_"</span>
                </div>
                <input class="form-control" type="text" name="username" id="username" placeholder="Nhập tên đăng nhập" onchange="checkdangnhap()">
                <div class="err-mess"> <span> <?php echo (isset($_SESSION['error']['username'])) ? $_SESSION['error']['username'] : '' ?></span> </div>
                <div class="err-mess" id="tendn"></div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu:</label>
                <div class="popup" onmouseover="popup2()">*
                    <span class="popuptext" id="myPopup2">Mật khẩu dài 3-18 ký tự, không chứa ký tự đặc biệt</span>
                </div>
                <input class="form-control" type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                <div class="err-mess"> <span> <?php echo (isset($_SESSION['error']['password'])) ? $_SESSION['error']['password'] : '' ?></span> </div>
            </div>
            <div class="form-group">
                <label for="rpassword" class="form-label">Nhập lại mật khẩu:</label>
                <input class="form-control" type="password" name="rpassword" id="rpassword" placeholder="Nhập lại mật khẩu">
                <div class="err-mess"> <span> <?php echo (isset($_SESSION['error']['rpassword'])) ? $_SESSION['error']['rpassword'] : '' ?></span> </div>
            </div>

            <div class="form-group">
                <label for="sdt" class="form-label">Nhập số điện thoại:</label>
                <input class="form-control" type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại">
                <div class="err-mess"> <span> <?php echo (isset($_SESSION['error']['sdt'])) ? $_SESSION['error']['sdt'] : '' ?></span> </div>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Nhập Email:</label>
                <div class="popup" onmouseover="popup3()">*
                    <span class="popuptext" id="myPopup3">Chỉ nhận Gmail</span>
                </div>
                <input class="form-control" type="email" name="email" id="email" placeholder="Nhập Email">
                <div class="err-mess"> <span> <?php echo (isset($_SESSION['error']['email'])) ? $_SESSION['error']['email'] : '' ?></span> </div>
            </div>
            <div class="form-submit">
                <button class="btn btn-primary" type="submit" id="submit" name="submit"> Đăng ký </button>
            </div>
        </form>
    </div>

    <div class="form-group">
        Đã có tài khoản?<a href="index.php?id=signin"> Đăng nhập.</a>
    </div>
    </div>
</div>
<?php unset($_SESSION['error']); ?>