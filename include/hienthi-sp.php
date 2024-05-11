<div class="hot_deal flex-container">
    <div class="container">
<?php
if (isset($_GET['search'])) {
    $key = $_GET['search'];
    if ($key == "") {
        $key = 'tatca';
    }
    $key = strip_tags($key);
    $key = addslashes($key);
}

$limit_pg = 15;

if ($key == 'tatca') {
    $sql = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";
    $key = 'Tất cả sản phẩm';
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    $page = ceil($row / $limit_pg);
    if (isset($_GET['page'])) {
        $pg = $_GET['page'];
    } else {
        $pg = 1;
    }
    $start = ($pg - 1) * $limit_pg;
    $new_sql = "SELECT * FROM tbl_sanpham LIMIT $start,$limit_pg";
    $new_query = mysqli_query($con, $new_sql);
?>
    <div class="title">
        <nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href="index.php">Trang chủ</a></li>
            <li class='breadcrumb-item'>Từ khóa tìm kiếm : <?php echo $key ?></li>
            </ol>
        </nav>
    </div>
    <?php
} else {
    if (isset($_GET['loaisp'])) {
        $loaisp1 = $_GET['loaisp'];
        $sql = "SELECT * FROM tbl_sanpham WHERE ten_sanpham LIKE '%$key%' OR mota LIKE '%$key%' OR loaisp LIKE '%$loaisp1%'";
        $query = mysqli_query($con, $sql);
        $row = mysqli_num_rows($query);
        $page = ceil($row / $limit_pg);
        if (isset($_GET['page'])) {
            $pg = $_GET['page'];
        } else {
            $pg = 1;
        }
        $start = ($pg - 1) * $limit_pg;
        $new_sql = "SELECT * FROM tbl_sanpham WHERE ten_sanpham LIKE '%$key%' OR mota LIKE '%$key%' OR loaisp LIKE '%$loaisp1%' LIMIT $start,$limit_pg";
        $new_query = mysqli_query($con, $new_sql);
    } else if ($key) {
        $sql = "SELECT * FROM tbl_sanpham WHERE ten_sanpham LIKE '%$key%' OR mota LIKE '%$key%' ";
        $query = mysqli_query($con, $sql);
        $row = mysqli_num_rows($query);
        $page = ceil($row / $limit_pg);
        if (isset($_GET['page'])) {
            $pg = $_GET['page'];
        } else {
            $pg = 1;
        }
        $start = ($pg - 1) * $limit_pg;
        $new_sql = "SELECT * FROM tbl_sanpham WHERE ten_sanpham LIKE '%$key%' OR mota LIKE '%$key%' LIMIT $start,$limit_pg";
        $new_query = mysqli_query($con, $new_sql);
    }

    if (empty(mysqli_num_rows($query))) {
    ?>
        <div class="title">
        <nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href="index.php">Trang chủ</a></li>
            <li class='breadcrumb-item'>Từ khóa tìm kiếm : <?php echo $key ?></li>
            </ol>
        </nav>
    </div>
        <div class="errnoitem flex-container justify-content-center" style="min-height: 500px;">
            <div style="display:block;">
            <img src="images/204.jpg" alt="204" style="width:500px">
            <h3 style="text-align:center;">Không tồn tại kết quả tìm kiếm!</h3>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="title">
        <nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href="index.php">Trang chủ</a></li>
            <li class='breadcrumb-item'>Từ khóa tìm kiếm : <?php echo $key ?></li>
            </ol>
        </nav>
    </div>
<?php
    }
}

// var_dump($start);
// echo "<pre>";
// var_dump($query);
// print_r($query);
?>


        <div class="content-sp flex-container flex-wrap space-around">
            <?php while ($data = mysqli_fetch_assoc($new_query)) { 
                $card1 = Card($data['ten_sanpham'],$data['images'], $data['gia'],$data['id_sanpham']);
                echo $card1;   
        } ?>


        </div>
        <div class="pagi">
            <ul class="pagination justify-content-center">
                <!-- <li class="page-item"><a class="page-link" href="#">Trang trước</a></li> -->

                <?php
                if ($key == 'Tất cả sản phẩm') {
                    for ($i = 1; $i <= $page; $i++) {
                        if ($pg == $i) {
                ?>
                            <li class="page-item active"><a href="index.php?search=&page=<?php echo $i ?>" class="page-link"> <?php echo $i ?></a></li>
                        <?php } else {
                        ?>
                            <li class="page-item"><a href="index.php?search=&page=<?php echo $i ?>" class="page-link"> <?php echo $i ?></a></li>
                        <?php
                        }
                    }
                } else
                    for ($i = 1; $i <= $page; $i++) {
                        if ($pg == $i) {
                        ?>
                        <li class="page-item active"><a href="index.php?search=<?php echo $key ?>&page=<?php echo $i ?>" class="page-link"> <?php echo $i ?></a></li>
                    <?php } else {
                    ?>
                        <li class="page-item"><a href="index.php?search=<?php echo $key ?>&page=<?php echo $i ?>" class="page-link"> <?php echo $i ?></a></li>
                <?php
                        }
                    }
                ?>

                <!-- <li class="page-item"><a class="page-link" href="#">Trang kế</a></li> -->
            </ul>
        </div>
  

</div>
</div>