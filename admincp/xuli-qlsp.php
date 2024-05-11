<?php
include "config/config.php";
$con = connectToDatabase();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'themsp') {
        $tensanpham = $_POST['tensp'];

        $hinhanh = $_FILES['images']['name'];

        $trangthai = $_POST['trangthai'];
        $soluong = $_POST['soluong'];
        $gia = $_POST['gia'];
        $loaisp = $_POST['loaisp'];
        $mota = $_POST['mota'];
        $path = '../upload/';

        $sql_checksp = "Select * from tbl_sanpham where ten_sanpham =  '$tensanpham' ";
        
        $result_check = mysqli_query($con,$sql_checksp);
        if(mysqli_num_rows($result_check)>0){
            echo "true";
        }else{echo "false";}
       

        $target_file = $path . basename($_FILES["images"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST['submit'])) {
            if(mysqli_num_rows($result_check)<1){
            $check = getimagesize($_FILES["images"]["tmp_name"]);
            if ($check !== false) {
                if ($_FILES["images"]["size"] <= 500000) {
                    $sql_themsp = "INSERT INTO tbl_sanpham(ten_sanpham,loaisp,mota,gia,trangthai,soluong,images) 
                                                VALUE ('$tensanpham','$loaisp','$mota','$gia','$trangthai','$soluong','$hinhanh')";
                    $query_sp = mysqli_query($con, $sql_themsp);
                    if ($query_sp) {
                        $hinhanh_tmp = $_FILES['images']['tmp_name'];
                        move_uploaded_file($hinhanh_tmp, $target_file);
                        header("location:index.php?id=quanlysanpham&&trangthai=themtk");
                    }
                }
            }
        }else
         ?>
            <script>
                alert("Sản phẩm bị trùng");
                history.go(-1);
            </script>
         <?php
        }
    }
    if ($action == 'sua') {
        $idsp = $_GET['id_sanpham'];
        $tensanpham = $_POST['tensp'];
        $hinhanh = $_FILES['images']['name'];

        $trangthai = $_POST['trangthai'];
        $soluong = $_POST['soluong'];
        $gia = $_POST['gia'];
        $loaisp = $_POST['loaisp'];
        $mota = $_POST['mota'];
        $path = '../upload/';

        $target_file = $path . basename($_FILES["images"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($hinhanh != '') {
            if (isset($_POST['submit'])) {
                $check = getimagesize($_FILES["images"]["tmp_name"]);
                if ($check !== false) {
                    if ($_FILES["images"]["size"] <= 500000) {
                        $sql_themsp = "UPDATE `tbl_sanpham` SET `ten_sanpham`='$tensanpham',`loaisp`='$loaisp',`mota`='$mota',`gia`='$gia',`trangthai`='$trangthai',`soluong`='$soluong',`images`='$hinhanh' WHERE id_sanpham = $idsp";
                        $query_sp = mysqli_query($con, $sql_themsp);
                        if ($query_sp) {
                            $hinhanh_tmp = $_FILES['images']['tmp_name'];
                            move_uploaded_file($hinhanh_tmp, $target_file);
                            header("location:index.php?id=quanlysanpham&&trangthai=themtk");
                        }
                    }
                }
            }
        } else {
            $sql_themsp = "UPDATE `tbl_sanpham` SET `ten_sanpham`='$tensanpham',`loaisp`='$loaisp',`mota`='$mota',`gia`='$gia',`trangthai`='$trangthai',`soluong`='$soluong' WHERE id_sanpham = $idsp";
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
        $idsp1 = $_GET['id_sanpham'];
        $sql_xoasp = "DELETE FROM `tbl_sanpham` WHERE id_sanpham = $idsp1";
        $query_xoasp = mysqli_query($con, $sql_xoasp);
        if ($query_xoasp) {
            // header("location:index.php?id=quanlysanpham&&trangthai=themtk");
        }
    }
}
