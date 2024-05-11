<?php
// include "./admincp/config/config.php";
//     session_start();
if (!empty($_SESSION['user']) && isset($_SESSION['user'])) {
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $i = 1;
    $endbill = 0;
    $user = $_SESSION['user']['user_name'];

    $sql = "SELECT sdt FROM tbl_user WHERE user_name = '$user'";
    $query = mysqli_query($con, $sql);
    $sdt = mysqli_fetch_assoc($query);
?>

    <div class="container">
        <?php if (isset($_GET['action']) == 'tk') { ?>
            <script type="text/javascript">
                if (alert("Bạn đã đặt hàng thành công!")) {
                    header('location:index.php?id=quanlytaikhoan');
                }
            </script>
        <?php } ?>
        <div>
            <H1>Giỏ hàng</H1>
            <table class="table table-striped align-middle">
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th class="col-1">Số lượng</th>
                    <th style="width: 10%;">Giá</th>
                    <th style="width: 10%;">Thanh Tiền</th>
                    <th class="col-1">Thao tác</th>
                </tr>
                <?php $i = 1;
                foreach ($cart as $key => $value) : ?>
                    <tr>
                        <th> <?php echo $i++; ?></th>
                        <th><img src="./upload/<?php echo $value['images'] ?>" alt="" style="max-width: 200px;"></th>
                        <th><?php echo $value['name'] ?></th>
                        <form action="cart.php" method="GET">
                            <th><input style="width: 50%;" type="number" id="soluong" value="<?php echo $value['soluong'] ?>" onchange="return checksoluonggiohang(value,<?php echo $value['soluong-max'] ?>,<?php echo $value['soluong'] ?>)" name="soluong">
                                <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                <input type="hidden" value="update" name="action">
                            </th>
                            <th><?php echo number_format($value['price']) ?> đ</th>
                            <th><?php echo number_format($bill = $value['price'] * $value['soluong']);
                                $endbill = $endbill + $bill ?> đ</th>
                            <th>
                                <button class="btn btn-warning" style="width: 100%; margin-bottom: 3px;" type="submit">  <a href="cart.php?action=update" style="color:white">Cập nhật</a></button>
                        </form>
                        <div><button class="btn btn-danger" style="width: 100%; margin-bottom: 3px;"  type="button"><a href="" style="color:white" id="xoa" onclick="return Xoagiohang(<?php echo $value['id'] ?>)">Xóa</a></button></div>
                        </th>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th><button class="btn btn-primary" type="submit"><a href="index.php" style="color:white">Trở lại trang chủ </a></button></th>
                    <th></th>
                    <th>Tổng tiền</th>
                    <th><?php echo number_format($endbill) ?> đ</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
            <div>
                <div style="width: 35%;">
                    <h1>Thanh toán</h1>
                    <form action="cart.php?action=thanhtoan" method="POST">

                        <div class="form-group">
                            <strong>Tổng hóa đơn: <?php echo number_format($endbill) ?> đ</strong>
                            <input type="hidden" name="tongtien" value="<?php echo $endbill ?>">
                        </div>
                        <div class="form-group">
                            <label for="diachi" class="form-label"> Địa chỉ:</label>
                            <input type="text" name="diachi" placeholder="Nhập địa chỉ." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sdt" class="form-label">Số điện thoại:</label> 

                            <input type="text" name="sdt" value="<?php echo $sdt['sdt'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pttt" class="form-label"> Phương thức thanh toán:</label> 
                            <select name="pttt" aria-placeholder="Chọn phương thức thanh toán" class="form-select">
                                <option value="Ví điện tử">Ví điện tử</option>
                                <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                                <option value="Chuyển khoản qua ngân hàng">Chuyển khoản qua ngân hàng</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>

        <?php }
    } else { ?>
        <script>
            location.href = 'index.php?id=signin';
        </script>
    <?php } ?>