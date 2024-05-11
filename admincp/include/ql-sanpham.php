<?php
$action = (isset($_GET['action'])) ? $_GET['action'] : 'show';
// $sql_loaisp ="SELECT * FROM tbl_phanloaisp WHERE "
if (isset($_GET['trangthai'])) {
    $trangthai = $_GET['trangthai'];
    if ($trangthai = 'themtk') {
        ?> <script>
            alert("Thao tác thành công");
            location.href = "index.php?id=quanlysanpham";
        </script> <?php
                }
            }
            $limit_pg = 5;
            if (isset($_GET['page'])) {
                $pg = $_GET['page'];
            } else {
                $pg = 1;
            }

            if(isset($_GET['search'])){
                $searchValue = $_GET['search'];
            }else{
                $searchValue = "";
            }


            $result_sp =  LoadSP($con, $searchValue, $pg, $limit_pg);
            $sql_select_sp = $result_sp['result'];
            $page = $result_sp['page'];

            $sql_lp = "SELECT * FROM tbl_phanloaisp";
            $query_lp = mysqli_query($con, $sql_lp);

            function LoadSP($conn, $searchValue, $pg, $limit_pg) {
                // Xác định các tham số tìm kiếm
                $searchValue = mysqli_real_escape_string($conn, $searchValue); // Bảo vệ dữ liệu đầu vào
            
                $sql = "SELECT * FROM tbl_sanpham";
            
                if (!empty($searchValue)) {
                    $sql .= " WHERE ten_sanpham LIKE '%$searchValue%'";
                }
            
                $query = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($query);
                $page = ceil($row / $limit_pg);
                $start = ($pg - 1) * $limit_pg;
            
                // Xây dựng câu truy vấn SQL
                $sql_final = "SELECT * FROM tbl_sanpham, tbl_phanloaisp WHERE tbl_sanpham.loaisp = tbl_phanloaisp.id_loaisp";
            
                if (!empty($searchValue)) {
                    $sql_final .= " AND ten_sanpham LIKE '%$searchValue%'";
                }
            
                $sql_final .= " LIMIT $start, $limit_pg";
            
                $result = mysqli_query($conn, $sql_final);
            
                // Đóng gói kết quả và số lượng trang vào một mảng kết hợp
                $data = array(
                    'result' => $result,
                    'page' => $page
                );
            
                // Trả về mảng chứa kết quả và số lượng trang
                return $data;
            }
                   
                   
                   
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 middle">Quản lý sản phẩm</h1>
    <?php if ($action == 'show') { ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 display-flex">
                <?php for ($i = 0; $i < count($quyenquanlysanpham); $i++) {
                    if ($quyenquanlysanpham[$i] == 'them') {
                ?>
                        <a href="index.php?id=quanlysanpham&action=themsp" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Thêm mới sản phẩm mới</span>
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
                                <th>ID sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Giá </th>
                                <th>Trạng thái</th>
                                <th>Số lượng</th>
                                <th>Ảnh</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($sql_select_sp)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_sanpham'] ?></td>
                                    <td><?php echo $data['ten_sanpham'] ?></td>
                                    <td><?php echo $data['ten_loaisp'] ?></td>
                                    <td><?php echo number_format($data['gia']) ?>đ</td>
                                    <td>
                                        <?php if ($data['trangthai'] == 1) {
                                            echo "Còn hàng";
                                        } else {
                                            echo "Hết hàng";
                                        } ?></td>
                                    <td><?php echo $data['soluong'] ?></td>
                                    <td><img src="../upload/<?php echo $data['images'] ?>" alt="111"></td>
                                    <td>
                                        <?php for ($i = 0; $i < count($quyenquanlysanpham); $i++) {
                                            if ($quyenquanlysanpham[$i] == 'xoa') {
                                        ?>
                                                <button type="button" id="xoasp" onclick="return Xoasp(<?php echo $data['id_sanpham'] ?>)" class="btn btn-danger" style="margin-right:5px"> Xóa</button> <?php }
                                                                                                                                                                            } ?>
                                        <?php for ($i = 0; $i < count($quyenquanlysanpham); $i++) {
                                            if ($quyenquanlysanpham[$i] == 'sua') {
                                        ?>
                                                <a href="index.php?id=quanlysanpham&action=sua&id_sanpham=<?php echo $data['id_sanpham'] ?>" class="btn btn-secondary" style="margin-right:5px">Sửa</a>
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
                                <?php for ($i = 1; $i <= $page; $i++){
                                    if ($i == $pg) {$active = "active";?>
                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlysanpham&page=<?php echo $i ?>&&search=<?php echo $searchValue?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else { ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlysanpham&page=<?php echo $i ?>&&search=<?php echo $searchValue?> " aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }} ?>
                        </div>
                    </div>
                </div>
            <?php } else if ($action == "themsp") { ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3>Thêm sản phẩm mới</h3>
                    </div>
                    <div class="card-body">
                    <form action="xuli-qlsp.php?action=themsp" method="POST" enctype="multipart/form-data">
                        <label for="tensp">Tên sản phẩm:</label><br>
                        <input type="text" name="tensp" id="tensp" class="form-control" style="width: 50%;"><br>
                        <label for="loaisp">Loại sản phẩm:</label><br>

                        <select name="loaisp" id="loaisp" class="form-control" style="width: 30%;">
                            <?php while ($data2 = mysqli_fetch_assoc($query_lp)) { ?>
                                <option value="<?php echo $data2['id_loaisp'] ?>"><?php echo $data2['ten_loaisp'] ?></option>
                            <?php } ?>
                        </select><br>
                        <label for="mota">Mô tả sản phẩm:</label><br>
                        <textarea name="mota" id="mota" cols="40" rows="10" class="form-control"></textarea><br>
                        <label for="gia">Giá tiền:</label><br>
                        <input type="text" name="gia" id="gia" class="form-control" style="width: 50%;"><br>
                        <label for="trangthai">Trạng thái:</label><br>
                        <select name="trangthai" id="trangthai" class="form-control" style="width: 30%;">
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>
                        </select><br>
                        <label for="soluong">Số lượng</label><br>
                        <input type="text" name="soluong" id="soluong" class="form-control" style="width: 50%;"><br>
                        <label for="images">Ảnh sản phẩm:</label><br>
                        <input type="file" name="images" id="images"><br><br>
                        <button type="submit" name="submit" class="btn btn-primary">Thực hiện</button>
                        <button type="button" onclick="window.history.back(-1)" class="btn btn-primary">Trở lại</button>
                    </form>
                    <br>
                    
                    </div>
                </div>
            <?php } else if ($action == 'sua') {
            $id_sanpham1 = $_GET['id_sanpham'];
            $sql_sua = "SELECT * FROM tbl_sanpham,tbl_phanloaisp WHERE tbl_sanpham.id_sanpham = $id_sanpham1";
            $query_sua = mysqli_query($con, $sql_sua);

            $data1 = mysqli_fetch_assoc($query_sua);

            ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3>Sửa thông tin sản phẩm</h3>
                    </div>
                    <div class="card-body">
                    <form action="xuli-qlsp.php?action=sua&id_sanpham=<?php echo $id_sanpham1 ?>" method="POST" enctype="multipart/form-data">
                        <label for="tensp">Tên sản phẩm:</label><br>
                        <input type="text" name="tensp" id="tensp" value="<?php echo $data1['ten_sanpham'] ?>" class="form-control" style="width: 50%;"><br>
                        <label for="loaisp">Loại sản phẩm:</label><br>
                        <select name="loaisp" id="loaisp"  class="form-control" style="width: 30%;">
                            <?php while ($data2 = mysqli_fetch_assoc($query_lp)) {
                                if ($data1['loaisp'] == $data2['id_loaisp']) {
                            ?>
                                    <option value="<?php echo $data2['id_loaisp'] ?>" selected><?php echo $data2['ten_loaisp'] ?></option>
                                <?php }
                                if ($data1['loaisp'] != $data2['id_loaisp']) { ?>
                                    <option value="<?php echo $data2['id_loaisp'] ?>"><?php echo $data2['ten_loaisp'] ?></option>
                            <?php ;
                                }
                            } ?>
                        </select><br>
                        <label for="mota">Mô tả sản phẩm:</label><br>
                        <textarea type="text" name="mota" id="mota" cols="40" rows="10" class="form-control"><?php echo $data1['mota'] ?> </textarea><br>
                        <label for="gia">Giá tiền:</label><br>
                        <input type="text" name="gia" id="gia" class="form-control" style="width: 50%;" value="<?php echo $data1['gia'] ?>"><br>
                        <label for="trangthai">Trạng thái:</label><br>
                        <select name="trangthai" id="trangthai"  class="form-control" style="width: 30%;">
                            <?php
                            if ($data1['trangthai'] == 1) { ?>
                                <option value="1" selected>Còn hàng</option>
                                <option value="0">Hết hàng</option>
                            <?php
                            } else if ($data1['trangthai'] == 0) { ?>
                                <option value="1">Còn hàng</option>
                                <option value="0" selected>Hết hàng</option>
                            <?php }; ?>
                        </select><br>
                        <label for="soluong">Số lượng</label><br>
                        <input type="text" name="soluong" id="soluong" class="form-control" style="width: 50%;" value="<?php echo $data1['soluong'] ?>"><br>
                        <label for="images">Ảnh sản phẩm:</label><br>
                        <input type="file" name="images" name="images" id="images"  class="form-control" style="width: 30%;"><br>
                        <?php echo $data1['images'] ?>
                        <img src="/project/upload/<?php echo $data1['images'] ?>" alt="">
                        <br>
                        <button><a href="" id="boanh" onclick="boanh(<?php echo $id_sanpham1 ?>)">Bỏ ảnh</a></button>
                        <br> <br>
                        <button type="submit" name="submit" class="btn btn-primary">Thực hiện</button>
                        <button type="button" onclick="window.history.back(-1)" class="btn btn-primary">Trở lại</button>
                    </form>
                    
                    </div>
                </div>
            <?php } else if ($action == 'repass') {
            $id_user = $_GET['id-user']; ?>
                <div>
                    <h3>Đặt lại mật khẩu</h3>
                    <form action="xuli-qltk.php?action=repass&id-user=<?php echo $id_user ?>" method="POST">
                        <label for="">Password mới</label>
                        <input type="text" name="password" id="password">
                        <button type="submit">Thực hiện</button>
                    </form>
                    <button type="submit" onclick="window.history.back(-1)">Trở lại</button>
                </div>
            </div>

        <?php } ?>



        <script>
    function Xoasp(id) {
        if (confirm("Bạn có muốn xóa sản phẩm không?")) {
            // location.href = "xuli-qlsp.php?action=xoa&id_sanpham=" + id + "";
            window.location.assign( "xuli-qlsp.php?action=xoa&id_sanpham=" + id + "");
            // alert("xuli-qlsp.php?action=xoa&id_sanpham=" + id + "");
        }else{
            return false;
        }
    }

    function boanh(id) {
        if (confirm("Bạn có muốn bỏ ảnh của sản phẩm này không?")) {
            location.href= "xuli-qlsp.php?action=boanh&id_sanpham=" + id;
        }
    }

    document.getElementById("searchbtn").addEventListener("click", function(event) {
        event.preventDefault();

        // var searchValue = this.elements["search"].value;
        
        var searchValue = document.getElementById("search").value;

        var customURL = "index.php?id=quanlysanpham&&search=" + encodeURIComponent(searchValue);

        console.log(customURL);
        window.location.href = customURL;
    });
</script>