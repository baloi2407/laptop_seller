<?php
$sql = "SELECT * FROM tbl_user";
$query = mysqli_query($con, $sql);

$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';

$limit_pg = 12;

$row = mysqli_num_rows($query);
$page = ceil($row / $limit_pg);
if (isset($_GET['page'])) {
    $pg = $_GET['page'];
} else {
    $pg = 1;
}
$start = ($pg - 1) * $limit_pg;
$new_sql = "SELECT * FROM tbl_user LIMIT $start,$limit_pg";
$newquery = mysqli_query($con, $new_sql);
if (isset($_GET['trangthai'])) {
    $trangthai = $_GET['trangthai'];
    if ($trangthai = 'themtk') {
?> <script>
            alert("Thao tác thành công");
            location.href = "index.php?id=quanlyuser";
        </script> <?php
                }
            }

                    ?>

<script>
    function checkthemtk() {
        var hoten = document.getElementById("hoten").value;
        var email = document.getElementById("email").value;
        var username = document.getElementById("tendn").value;
        var password = document.getElementById("password").value;
        var sdt = document.getElementById("sdt").value;
        if (hoten == '' || email == '' || password == '' || username == '' || sdt == '') {
            alert("Yêu cầu nhập đủ thông tin vào text box");
        } else {
            var duongdan = "xuli-qltk.php?action=themtk";
            document.getElementById("themtk").action = duongdan;
        }
    }

    function checkrepass(id) {
        var repass = document.getElementById("password").value;
        if (repass == '') {
            alert("Yêu cầu nhập đủ thông tin vào text box");
        } else {
            var duongdan = "xuli-qltk.php?action=repass&id-user=" + id;
            document.getElementById("repass").action = duongdan;
        }
    }
</script>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 middle">Quản lý tài khoản khách hàng</h1>
    <?php if ($action == 'show') { ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 display-flex">
                <?php for ($i = 0; $i < count($quyenquanlyuser); $i++) {
                    if ($quyenquanlyuser[$i] == 'them') {
                ?>
                        <a href="index.php?id=quanlyuser&action=themtk" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Thêm mới tài khoản</span>
                        </a>
                <?php }
                } ?>
                <div class="form-search col-5 ">
                    
                    <form id="searchForm">
                    <input type="text" name="search" id="search" class="form-control col-7 inline" placeholder="Nhập tên sản phẩm cần tìm">
                    <button type="button" id="searchbtn" class="btn btn-primary">Tìm kiếm</button>
                    </form>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID user</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Tên tài khoản</th>
                                <th>SDT </th>
                                <th>Thao tác thêm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($newquery)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_user'] ?></td>
                                    <td><?php echo $data['hoten'] ?></td>
                                    <td><?php echo $data['email'] ?></td>
                                    <td><?php echo $data['user_name'] ?></td>
                                    <td><?php echo $data['sdt'] ?></td>
                                    <td>
                                        <?php for ($i = 0; $i < count($quyenquanlyuser); $i++) {
                                            if ($quyenquanlyuser[$i] == 'repass') {
                                        ?>
                                                <a href="index.php?id=quanlyuser&action=repass&id-user=<?php echo $data['id_user'] ?>" style="margin-right:5px" class="btn btn-info"> Đặt lại mật khẩu</a> <?php }
                                                                                                                                                                                                    } ?>
                                        <!-- <a href="xuli-qltk.php?action=xoa&&id-user=<?php echo $data['id_user'] ?>" class="btn btn-danger" style="margin-right:5px"> Xóa</a>        -->
                                        <?php for ($i = 0; $i < count($quyenquanlyuser); $i++) {
                                            if ($quyenquanlyuser[$i] == 'sua') {
                                        ?>
                                                <a href="index.php?id=quanlyuser&action=sua&id-user=<?php echo $data['id_user'] ?>" class="btn btn-secondary" style="margin-right:5px">Sửa</a>
                                    </td> <?php }
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

                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlyuser&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else {
                                    ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlyuser&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    <?php } else if ($action == "themtk") { ?>
        <div>
            <h3>Thêm tài khoản mới</h3>
            <form action="" id="themtk" onsubmit="return checkthemtk()" method="POST">
                <label for="Hoten">Họ và tên:</label><br>
                <input class="form-control col-4" type="text" name="hoten" id="hoten"> <br>
                <label for="email">Email:</label><br>
                <input class="form-control col-4" type="text" name="email" id="email"><br>
                <label for="tendn">Tên đăng nhập:</label><br>
                <input class="form-control col-4" type="text" name="tendn" id="tendn"><br>
                <label for="password">Password</label><br>
                <input class="form-control col-4" type="text" name="password" id="password"><br>
                <label for="sdt">SDT:</label><br>
                <input class="form-control col-4" type="text" name="sdt" id="sdt"><br>
                <button type="submit" class="btn btn-primary">Thực hiện</button>
                <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">Trở lại</button>
            </form>
        </div>
    <?php } else if ($action == 'sua') {
        $id_user_2 = $_GET['id-user'];
        $sql_sua = "SELECT * FROM tbl_user WHERE id_user = $id_user_2";
        $query_sua = mysqli_query($con, $sql_sua);
        $data1 = mysqli_fetch_assoc($query_sua);
    ?>
        <div>
            <h3>Sửa</h3>
            <form action="xuli-qltk.php?action=sua&id-user=<?php echo $id_user_2 ?>" method="POST">
                <label for="hoten">Họ và tên:</label><br>
                <input class="form-control col-4" type="text" name="hoten" id="hoten" value="<?php echo $data1['hoten'] ?>"> <br>
                <label for="email">Email:</label><br>
                <input class="form-control col-4" type="text" name="email" id="email" value="<?php echo $data1['email'] ?>"><br>
                <label for="tendn">Tên đăng nhập:</label><br>
                <input class="form-control col-4" type="text" name="tendn" id="tendn" value="<?php echo $data1['user_name'] ?>"><br>
                <label for="sdt"> SDT:</label><br>
                <input class="form-control col-4" type="text" name="sdt" id="sdt" value="<?php echo $data1['sdt'] ?>"><br>
                <button type="submit" class="btn btn-primary">Thực hiện</button>
                <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">Trở lại</button>
            </form>
            
        </div>
    <?php } else if ($action == 'repass') {
        $id_user = $_GET['id-user']; ?>
        <div>
            <h3>Đặt lại mật khẩu</h3>
            <form action="" id="repass" onsubmit="return checkrepass(<?php echo $id_user ?>)" method="POST">
                <label for="">Password mới</label>
                <input type="text" name="password" id="password" class="form-control col-4">
                <br>
                <button type="submit" class="btn btn-primary">Thực hiện</button>
                <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">Trở lại</button>
            </form>
        </div>
</div>
<?php } ?>