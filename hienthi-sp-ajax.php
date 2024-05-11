
<?php

// Connect database 
include "admincp/config/config.php";
$con = connectToDatabase();
$limit = 12;

if (isset($_POST['page_no'])) {
	$page_no = $_POST['page_no'];
} else {
	$page_no = 1;
}

$offset = ($page_no - 1) * $limit;

$query = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $offset, $limit";

$result = mysqli_query($con, $query);

$output = "";

if (mysqli_num_rows($result) > 0) {
	$output .= '<div class="content-sp">';
	while ($row = mysqli_fetch_assoc($result)) {

		$output .= '<div class="card">
        <div class="card-container">
        <img src="images/' . $row['images'] . ' " alt="Avatar" class="images">
            <div class="middle">
                <div><a href="cart.php?id=' . $row['id_sanpham'] . '">Thêm vào giỏ</a></div>
                <div><a href="index.php?id=chitiet-sp&sp=' . $row['id_sanpham'] . '">Chi tiết</a></div>
            </div>
        <h4><b>' . $row['ten_sanpham'] . '</b></h4>
        <p> ' . number_format($row['gia']) . ' đ</p>
    
        </div>
    </div>';
	}
	$output .= '</div>';
	$sql = "SELECT * FROM tbl_sanpham";

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

	$output .= "</ul></div>";

	echo $output;
}

?>