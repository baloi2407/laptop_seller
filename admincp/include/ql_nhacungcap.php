<?php

// include "../config/config.php";

$sql = "SELECT * FROM tbl_nhacungcap";
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
$new_sql = "SELECT * FROM tbl_nhacungcap LIMIT $start,$limit_pg";
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

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 middle">Quản lý nhà cung cấp</h1>
    <?php if ($action == 'show') { ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 display-flex">
                <?php for ($i = 0; $i < count($quyenquanlyuser); $i++) {
                    if ($quyenquanlyuser[$i] == 'them') {
                ?>
                        <a href="index.php?id=quanlynhacungcap&action=themtk" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Thêm nhà cung cấp mới</span>
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
                                <th>STT</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $a = 1;
                            while ($data = mysqli_fetch_assoc($newquery)) {
                            ?>
                                <tr>
                                    <td><?php echo $a++ ?></td>
                                    <td><?php echo $data['tenncc'] ?></td>
                                    <td>
                                        <?php for ($i = 0; $i < count($quyenquanlyuser); $i++) {
                                            if ($quyenquanlyuser[$i] == 'repass') {
                                        ?>                                        
                                        <a href="xuli-qlncc.php?action=xoa&&id-user=<?php echo $data['id_nhacungcap'] ?>" class="btn btn-danger" style="margin-right:5px"> Xóa</a>       
                                                 <?php }
                                                                                                                                                                                                    } ?>
                                        <?php for ($i = 0; $i < count($quyenquanlyuser); $i++) {
                                            if ($quyenquanlyuser[$i] == 'sua') {
                                        ?>
                                                <a href="index.php?id=quanlynhacungcap&action=sua&id-user=<?php echo $data['id_nhacungcap'] ?>" class="btn btn-secondary" style="margin-right:5px">Sửa</a>
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
            <h3>Thêm nhà cung cấp mới</h3>
            <form action="xuli-qlncc.php?action=themtk" id="themtk" onsubmit="return checkthemtk()" method="POST">
                <label for="Hoten">Tên nhà cung cấp:</label><br>
                <input type="text" name="ten_loaisp" id="ten_loaisp" class="form-control col-4"> <br>
                <button type="submit" class="btn btn-primary">Thực hiện</button>
                <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">Trở lại</button>
            </form>
        </div>
    <?php } else if ($action == 'sua') {
        $id_user_2 = $_GET['id-user'];
        $sql_sua = "SELECT * FROM tbl_phanloaisp WHERE id_loaisp = $id_user_2";
        $query_sua = mysqli_query($con, $sql_sua);
        $data1 = mysqli_fetch_assoc($query_sua);
    ?>
        <div>
            <h3>Sửa</h3>
            <form action="xuli-danhmuc.php?action=sua&id-user=<?php echo $id_user_2 ?>" method="POST">
                <label for="hoten">Tên danh mục:</label><br>
                <input type="text" name="ten_loaisp" id="ten_loaisp" value="<?php echo $data1['ten_loaisp'] ?>" class="form-control col-4"> <br>
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
                <button type="submit" class="btn btn-primary">Thực hiện</button>
                <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">Trở lại</button>
            </form>
        </div>
</div>
<?php } ?>

<?php
if(isset($_GET['status'])){
    $act = $_GET['status'];
    if($act = 'errDelete'){
        ?>
            <script>
                alert("Không thể thực hiện thao tác vì còn sản phẩm thuộc danh mục này");
                location.href = "index.php?id=quanlydanhmuc";
            </script> 
        <?php 
    }
}

                    ?>

<!-- function connectToDatabase() {
    // Thay đổi thông tin kết nối tới cơ sở dữ liệu của bạn
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $database = "database_name";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $database);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    return $conn;
}

function insertData($data) {
    // Kết nối tới cơ sở dữ liệu
    $conn = connectToDatabase();

    // Chuẩn bị truy vấn INSERT
    $sql = "INSERT INTO table_name (column1, column2, column3) VALUES (?, ?, ?)";

    // Tạo câu lệnh chuẩn bị truy vấn
    $stmt = $conn->prepare($sql);

    // Kiểm tra lỗi trong câu lệnh chuẩn bị truy vấn
    if (!$stmt) {
        die("Lỗi trong câu lệnh chuẩn bị truy vấn: " . $conn->error);
    }

    // Gán giá trị cho các tham số trong truy vấn
    $stmt->bind_param("sss", $data['value1'], $data['value2'], $data['value3']);

    // Thực thi truy vấn
    $result = $stmt->execute();

    // Kiểm tra kết quả thực thi truy vấn
    if ($result === FALSE) {
        die("Lỗi trong quá trình thêm dữ liệu: " . $stmt->error);
    }

    // Đóng câu lệnh chuẩn bị truy vấn và kết nối
    $stmt->close();
    $conn->close();

    echo "Thêm dữ liệu thành công!";
}

// Sử dụng hàm insertData để thêm dữ liệu vào cơ sở dữ liệu
$data = array(
    'value1' => 'Giá trị 1',
    'value2' => 'Giá trị 2',
    'value3' => 'Giá trị 3'
);

insertData($data);
?> -->