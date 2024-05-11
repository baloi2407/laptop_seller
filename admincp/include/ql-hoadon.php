<?php

$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';

$limit_pg = 12;


if ($action == 'showhdtheongay') {
    $dates = $_POST['sdate'];
    $datee = $_POST['edate'];
    $sdate = date("y-m-d", strtotime($dates));
    $edate = date("y-m-d", strtotime($datee));
    $sql_hdtheongay = "SELECT * FROM tbl_hoadon WHERE date BETWEEN '$sdate' AND '$edate'";
    $query_hdtheongay = mysqli_query($con, $sql_hdtheongay);
    $row1 = mysqli_num_rows($query_hdtheongay);
    $page1 = ceil($row1 / $limit_pg);
    if (isset($_GET['page1'])) {
        $pg1 = $_GET['page1'];
    } else {
        $pg1 = 1;
    }
    $start1 = ($pg1 - 1) * $limit_pg;
    $new_sql_hdtheongay = "SELECT * FROM tbl_hoadon,tbl_user WHERE tbl_hoadon.id_user = tbl_user.id_user AND date BETWEEN '$sdate' AND '$edate' LIMIT $start1,$limit_pg";
    $new_query_hdtheongay = mysqli_query($con, $new_sql_hdtheongay);
}
if ($action == 'show') {
    $sql = "SELECT * FROM tbl_hoadon";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    $page = ceil($row / $limit_pg);
    if (isset($_GET['page'])) {
        $pg = $_GET['page'];
    } else {
        $pg = 1;
    }
    $start = ($pg - 1) * $limit_pg;
    $new_sql = "SELECT * FROM tbl_hoadon,tbl_user WHERE tbl_hoadon.id_user = tbl_user.id_user LIMIT $start,$limit_pg";
    $newquery = mysqli_query($con, $new_sql);
}


if (isset($_GET['trangthai'])) {
    $trangthai = $_GET['trangthai'];
    if ($trangthai = 'themtk') {
?> <script>
            alert("Thao tác thành công");
            location.href = "index.php?id=quanlyhoadon";
        </script> <?php
                }
            }

                    ?>

<script>
    function thaydoi(trangthai) {
        document.getElementById("tdtrangthai").style.display = "block";
        document.getElementById("nthaydoi").style.display = "none";
        if (trangthai == '1') {
            document.getElementById("cxl").selected = true;
        }
        if (trangthai == '2') {
            document.getElementById("tndh").selected = true;
        }
        if (trangthai == '3') {
            document.getElementById("dgh").selected = true;
        }
        if (trangthai == '4') {
            document.getElementById("dht").selected = true;
        }
    }
</script>

<div class="container-fluid">

                   <!-- Page Heading --> 
                   <h1 class="h3 mb-2 text-gray-800 middle">Quản lý tài khoản hóa đơn</h1>
                   <?php if($action == 'show'){?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Xem hóa đơn trong khoảng:
                <form action="index.php?id=quanlyhoadon&action=showhdtheongay" method="POST" class="form-group"> 
                    Ngày bắt đầu
                    <input type="date" name="sdate" id="sdate" class="form-control" style="width: 15%; display: inline-block; ">
                    Ngày kết thúc
                    <input type="date" name="edate" id="edate" class="form-control" style="width: 15%; display: inline-block;">
                    <br><button type="submit" class="btn btn-primary">Thực hiện</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Hóa đơn</th>
                                <th>ID người dùng</th>
                                <th>Tên người dùng</th>
                                <th>Địa chỉ người nhận</th>
                                <th>SDT người nhận</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt hàng</th>
                                <th>Phương thức thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($newquery)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_hoadon'] ?></td>
                                    <td><?php echo $data['id_user'] ?></td>
                                    <td><?php echo $data['hoten'] ?></td>
                                    <td><?php echo $data['diachi'] ?></td>
                                    <td><?php echo $data['sdt'] ?></td>
                                    <td><?php echo number_format($data['tong_tien']) ?>đ</td>
                                    <td><?php echo $datef = date("d-m-y", strtotime($data['date'])) ?></td>
                                    <td><?php echo $data['pptt'] ?></td>
                                    <td><?php echo $data['trangthai'] ?></td>
                                    <td><a href="index.php?id=quanlyhoadon&action=chitiet&id-hoadon=<?php echo $data['id_hoadon'] ?>" style="margin-right:5px" class="btn btn-info">Chi tiết</a>
                                        <?php for ($i = 0; $i < count($quyenquanlyhoadon); $i++) {
                                            if ($quyenquanlyhoadon[$i] == 'xuli') {
                                        ?>
                                                <a href="index.php?id=quanlyhoadon&action=xuli&&id-hoadon=<?php echo $data['id_hoadon'] ?>" class="btn btn-danger" style="margin-right:5px"> Xử lí</a> <?php }
                                                                                                                                                                                                } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $page; $i++) {

                                    if ($i == $pg) {
                                        $active = "active";
                                ?>

                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlyhoadon&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else {
                                    ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlyhoadon&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    <?php }
    if ($action == 'showhdtheongay') {
    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Xem hóa đơn trong khoảng:
                <form action="index.php?id=quanlyhoadon&action=showhdtheongay" method="POST">
                    Ngày bắt đầu
                    <input type="date" name="sdate" id="sdate">
                    Ngày kết thúc
                    <input type="date" name="edate" id="edate">
                    <button type="submit">Thực hiện</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Hóa đơn</th>
                                <th>ID người dùng</th>
                                <th>Tên người dùng</th>
                                <th>Địa chỉ người nhận</th>
                                <th>SDT người nhận</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt hàng</th>
                                <th>Phương thức thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($new_query_hdtheongay)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_hoadon'] ?></td>
                                    <td><?php echo $data['id_user'] ?></td>
                                    <td><?php echo $data['hoten'] ?></td>
                                    <td><?php echo $data['diachi'] ?></td>
                                    <td><?php echo $data['sdt'] ?></td>
                                    <td><?php echo number_format($data['tong_tien']) ?>đ</td>
                                    <td><?php echo $data['date'] ?></td>
                                    <td><?php echo $data['pptt'] ?></td>
                                    <td><?php echo $data['trangthai'] ?></td>
                                    <td><a href="index.php?id=quanlyhoadon&action=chitiet&id-hoadon=<?php echo $data['id_hoadon'] ?>" style="margin-right:5px" class="btn btn-info">Chi tiết</a>
                                        <?php for ($i = 0; $i < count($quyenquanlyhoadon); $i++) {
                                            if ($quyenquanlyhoadon[$i] == 'xuli') {
                                        ?>
                                                <a href="index.php?id=quanlyhoadon&action=xuli&&id-hoadon=<?php echo $data['id_hoadon'] ?>" class="btn btn-danger" style="margin-right:5px"> Xử lí</a> <?php }
                                                                                                                                                                                                } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $page1; $i++) {

                                    if ($i == $pg1) {
                                        $active = "active";
                                ?>

                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlyhoadon&action=showhdtheongay&page1=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else {
                                    ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlyhoadon&action=showhdtheongay&page1=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    <?php

    }

    ?>
    <?php
    if ($action == "chitiet") {
        $id_hd = $_GET['id-hoadon'];
        $sql_chitiet = "SELECT * FROM tbl_chitiethoadon,tbl_sanpham WHERE tbl_chitiethoadon.id_sanpham = tbl_sanpham.id_sanpham AND id_hoadon = $id_hd";
        $query_chitiet = mysqli_query($con, $sql_chitiet);



    ?>
        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3>Chi tiết hóa đơn</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thanh tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                while ($data = mysqli_fetch_assoc($query_chitiet)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $data['id_sanpham'] ?></td>
                                        <td><img src="../upload/<?php echo $data['images'] ?>" alt=""></td>
                                        <td><?php echo $data['ten_sanpham'] ?></td>
                                        <td><?php echo $data['soluongsp'] ?></td>
                                        <td><?php echo number_format($data['gia']) ?>đ</td>
                                        <td><?php echo number_format($bill = $data['gia'] * $data['soluongsp']) ?>đ</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">Trở lại</button>
            </div>
        <?php } else if ($action == 'xuli') {
        $id_hd = $_GET['id-hoadon'];
        $sql_sua = "SELECT * FROM tbl_hoadon WHERE id_hoadon = $id_hd";
        $query_sua = mysqli_query($con, $sql_sua);
        $hd = mysqli_fetch_assoc($query_sua);
        ?>
            <div>
                <h3>Xử lí hóa đơn</h3>
                <h4>Thông tin hóa đơn ngày <?php echo $hd['date'] ?></h4>
                <ul>
                    <li>Địa chỉ: <?php echo $hd['diachi'] ?></li>
                    <li>Số điện thoại: <?php echo $hd['sdt'] ?></li>
                    <li>Phương thức thanh toán: <?php echo $hd['pptt'] ?></li>
                    <li>Trạng thái hóa đơn: <?php echo $hd['trangthai'] ?>
                    </li>
                    <li>Tổng hóa đơn: <?php echo number_format($hd['tong_tien']) ?>đ</li>
                </ul>
                <form action="xuli-hoadon.php" method="POST" id="tdtrangthai" style="display: none;">
                    <select name="tinhtrang" id="tinhtrang" class="form-control col-4">
                        <option value="Chưa xử lí" id="cxl">Chưa xử lí</option>
                        <option value="Tiếp nhận đơn hàng" id="tndh">Tiếp nhận đơn hàng</option>
                        <option value="Đang giao hàng" id="dgh">Đang giao hàng</option>
                        <option value="Đơn hàng đã hoàn tất" id="dht">Đơn hàng đã hoàn tất</option>
                    </select><br>
                    <input type="hidden" value="<?php echo $id_hd ?>" name="id-hoadon" id="id-hoadon">
                    <button type="submit" class="btn btn-success">Xác nhận thay đổi</button>
                </form><br>
                <?php if ($hd['trangthai'] == "Chưa xử lí") {
                    $trangthai1 = 1;
                }
                if ($hd['trangthai'] == "Tiếp nhận đơn hàng") {
                    $trangthai1 = 2;
                }
                if ($hd['trangthai'] == "Đang giao hàng") {
                    $trangthai1 = 3;
                }
                if ($hd['trangthai'] == "Đơn hàng đã hoàn tất") {
                    $trangthai1 = 4;
                } ?>
                <button type="submit" class="btn btn-success" id="nthaydoi" onclick="thaydoi(<?php echo $trangthai1 ?>)" id=>Thay đổi trạng thái hóa đơn</button>

                <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">Trở lại</button>
            </div>
        <?php } ?>