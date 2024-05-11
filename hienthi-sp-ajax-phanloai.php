
<?php
include "include/card.php";
// Connect database 
include "admincp/config/config.php";
$con = connectToDatabase();
$limit = 15;

if (isset($_GET['page_no'])) {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
$loaisp1 = $_GET['loaisp'];
$offset = ($page_no - 1) * $limit;
$query_loaisp = mysqli_query($con, "SELECT * FROM tbl_phanloaisp WHERE id_loaisp = $loaisp1");
$data = mysqli_fetch_assoc($query_loaisp);
$query = "SELECT * FROM tbl_sanpham WHERE loaisp = $loaisp1 ORDER BY id_sanpham DESC LIMIT $offset, $limit";

$result = mysqli_query($con, $query);

$output = "";
$output .= "<div class='hot_deal'>";
$output .= "<div class='container'>";
$output .= "
    <nav aria-label='breadcrumb'>
        <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href='index.php'>Trang chủ</a></li>
            <li class='breadcrumb-item'>Từ khóa tìm kiếm :  " . $data['ten_loaisp'] . "</li>
        </ol>
    </nav>";
if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="content-sp flex-container flex-wrap space-around">';
    while ($data = mysqli_fetch_assoc($result)) {
        


        $card = Card($data['ten_sanpham'],$data['images'], $data['gia'],$data['id_sanpham']);
        $output .= $card;  
    }
    $output .= '</div>';
    $sql = "SELECT * FROM tbl_sanpham WHERE loaisp = $loaisp1";

    $records = mysqli_query($con, $sql);

    $totalRecords = mysqli_num_rows($records);

    $totalPage = ceil($totalRecords / $limit);

    $output .= "<div class='pagi'><ul class='pagination justify-content-center' style='margin:20px 0'>";

    for ($i = 1; $i <= $totalPage; $i++) {
        if ($i == $page_no) {
            $active = "active";
        } else {
            $active = "";
        }
        $output .= "<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
    }

    $output .= "</ul></div></div>";

    echo $output;
}

?>