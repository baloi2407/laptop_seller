<?php
$idloaisp = $data['loaisp'];
$sql_sp_tieubieu = "SELECT * FROM tbl_sanpham  Where loaisp='$idloaisp' ORDER BY RAND() LIMIT 4";
$query = mysqli_query($con, $sql_sp_tieubieu);
?>
<div class="hot_deal">
    <div class="container">
        <div class="title_deal">
            <h3><b>Có thể bạn sẽ quan tâm</b></h3>
        </div>
        <div class="content-sp">
            <?php while ($data = mysqli_fetch_array($query)) { ?>
                <div class="card">
                    <div class="card-container">
                        <img src="upload/<?php echo $data['images'] ?> " alt="Avatar" class="images">
                        <div class="middle">
                            <div><a href="cart.php?id=<?php echo $data['id_sanpham'] ?>&action=add">Thêm vào giỏ</a></div>
                            <div><a href="index.php?id=chitiet-sp&sp=<?php echo $data['id_sanpham'] ?>">Chi tiết</a></div>
                        </div>
                        <h4><b><?php echo $data['ten_sanpham'] ?></b></h4>
                        <p><?php echo number_format($data['gia']) ?> đ</p>

                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="get-more">
            <div>
                <a href="index.php?search=">Xem thêm >></a>
            </div>
        </div>
    </div>
</div>