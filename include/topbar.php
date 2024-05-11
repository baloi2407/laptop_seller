
<div class="top-bar">
    <div class="container">
    <div class="login-field">
        <?php if (!isset($_SESSION['user'])) {
        ?>
                <div class="login-item">
                    <a href="index.php?id=signin"><button type="button" class="btn">Đăng nhập</button></a>
                </div>
                <div class="login-item">
                    <a href="index.php?id=signup"><button type="button" class="btn">Đăng ký</button></a>
                </div>
                
           
        <?php
        } else if (isset($_SESSION['user'])) {
            $data = $_SESSION['user']; ?>
            <div class="dropdown">
                <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="images/icon-user.png" alt="anhdaidien" class="user-icon">
                    <?php echo $data['hoten'] ?>
                </div>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="index.php?id=quanlytaikhoan">Quản lý tài khoản</a>
                    <a class="dropdown-item" href="index.php?id=out">Đăng xuất</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>