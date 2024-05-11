<?php
$sql_sp_tieubieu = " SELECT * FROM tbl_sanpham ORDER BY RAND() LIMIT 10";
$query = mysqli_query($con, $sql_sp_tieubieu);
?>
<div class="hot_deal">
    <div class="container">
        <div class="title_deal flex-container flex-center">
            <h3><b>Sản phẩm tiêu biểu</b></h3>
        </div>
        <div class="flex-container flex-wrap space-around">
            <?php while ($data = mysqli_fetch_array($query)) { 
               $card1 = Card($data['ten_sanpham'],$data['images'], $data['gia'],$data['id_sanpham']);
                echo $card1;          
                } ?>

        </div>
        <div class="get-more flex-center flex-container">
            <div>
                <a href="index.php?search=">Xem thêm >></a>
            </div>
        </div>
    </div>
</div>