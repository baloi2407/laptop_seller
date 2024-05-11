<?php
include "config/config.php";
$con = connectToDatabase();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'themsp') {
        $tensanpham = $_POST['tensp'];

        $hinhanh = $_FILES['images']['name'];

        $trangthai = $_POST['loaisp'];
        
        $path = '../upload/';

        $sql_checksp = "Select * from tbl_banner where ten_banner =  '$tensanpham' ";
        $result_checkb = mysqli_query($con,$sql_checksp);
        var_dump(mysqli_num_rows($result_checkb));
        var_dump(isset($_POST['submit']));
        $target_file = $path . basename($_FILES["images"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if(mysqli_num_rows($result_checkb)<1){
                echo "true";
            $check = getimagesize($_FILES["images"]["tmp_name"]);
            if ($check !== false) {
                if ($_FILES["images"]["size"] <= 50000000) {
                    $sql_themsp = "INSERT INTO tbl_banner(ten_banner,trang_thai,images) 
                                                VALUE ('$tensanpham','$trangthai','$hinhanh')";
                    $query_sp = mysqli_query($con, $sql_themsp);
                    if ($query_sp) {
                        $hinhanh_tmp = $_FILES['images']['tmp_name'];
                        move_uploaded_file($hinhanh_tmp, $target_file);
                        header("location:index.php?id=quanlybanner&&trangthai=themtk");
                    }
                }
            }
        else
         ?>
            <script>
                alert("Banner bị trùng");
                // history.go(-1);
            </script>
         <?php
        }
    }
    if ($action == 'sua') {
        $idsp = $_GET['id_banner'];
        $tensanpham = $_POST['ten_banner'];
        $hinhanh = $_FILES['images']['name'];

        $trangthai = $_POST['trangthai'];
        
        $path = '../upload/';

        $target_file = $path . basename($_FILES["images"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($hinhanh != '') {
            if (isset($_POST['submit'])) {
                $check = getimagesize($_FILES["images"]["tmp_name"]);
                if ($check !== false) {
                    if ($_FILES["images"]["size"] <= 500000) {
                        $sql_themsp = "UPDATE `tbl_banner` SET `ten_banner`='$tensanpham',`trangthai`='$trangthai',`images`='$hinhanh' WHERE id_banner = $idsp";
                        $query_sp = mysqli_query($con, $sql_themsp);
                        if ($query_sp) {
                            $hinhanh_tmp = $_FILES['images']['tmp_name'];
                            move_uploaded_file($hinhanh_tmp, $target_file);
                            header("location:index.php?id=quanlybanner&&trangthai=themtk");
                        }
                    }
                }
            }
        } else {
            $sql_themsp = "UPDATE `tbl_banner` SET `ten_banner`='$tensanpham',`trangthai`='$trangthai' WHERE id_banner = $idsp";
            $query_sp = mysqli_query($con, $sql_themsp);
            header("location:index.php?id=quanlysanpham&&trangthai=themtk");
        }
    }
    if ($action == 'boanh') {
        $idsp2 = $_GET['id_sanpham'];
        $sql_boanh = "SELECT images FROM tbl_sanpham WHERE id_sanpham = $idsp2";
        $query_boanh = mysqli_query($con, $sql_boanh);
        $data1 = mysqli_fetch_assoc($query_boanh);
        $anh = $data1['images'];
        unlink("../upload/$anh");
        $anh_tmp = "";
        $uboanh = "UPDATE `tbl_sanpham` SET `images`= '$anh_tmp' WHERE id_sanpham = $idsp2";
        $query_uboanh = mysqli_query($con, $uboanh);
        header("location:index.php?id=quanlysanpham&action=sua&id_sanpham=$idsp2");
    }
    if ($action == 'xoa') {
        $idsp1 = $_GET['id-user'];
        $sql_xoasp = "DELETE FROM `tbl_banner` WHERE id_banner = $idsp1";
        $query_xoasp = mysqli_query($con, $sql_xoasp);
        if ($query_xoasp) {
            header("location:index.php?id=quanlybanner&&trangthai=themtk");
        }
    }
}
