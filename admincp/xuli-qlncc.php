<?php
include "config/config.php";
$con = connectToDatabase();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'themtk';


//them tk mới

if ($action == 'themtk') {
    $hoten = $_POST['ten_loaisp'];
    $sql_themtk = "INSERT INTO tbl_nhacungcap(ten_ncc) 
                        VALUE ('{$hoten}')";
    $query = mysqli_query($con, $sql_themtk);
    if ($query) {
        header('location:index.php?id=quanlydanhmuc');
    }
}
// //Đặt lại mật khẩu

// if ($action == 'repass') {
//     $passwordneedrepass = $_POST['password'];
//     $id_user = $_GET['id-user'];
//     $repass = password_hash($passwordneedrepass, PASSWORD_DEFAULT);
//     $sql_repass = "UPDATE `tbl_user` SET `password` = '$repass' WHERE `tbl_user`.`id_user` = $id_user;";
//     $query_repass = mysqli_query($con, $sql_repass);
//     if ($query_repass) {
//         header('location:index.php?id=quanlyuser&&trangthai=themtk');
//     }
// }

//Xoa 
// Chỉ có thể xóa khi không có sản phẩm nào thuộc loại 

if ($action == 'xoa') {
    $id_user = $_GET['id-user'];
    $checkSP = "Select * from tbl_sanpham WHERE loaisp = $id_user"; 
    $sql_xoa = "DELETE FROM tbl_phanloaisp WHERE id_loaisp = $id_user";
    $checkSP_query = mysqli_query($con, $checkSP);
    // $query = mysqli_query($con, $sql_xoa);
    if ($checkSP_query) {
        $affectedRows = mysqli_affected_rows($con);
        if($affectedRows > 0){
            header('location:index.php?id=quanlydanhmuc&status=errDelete');
        }
        else{
            $query = mysqli_query($con, $sql_xoa);
            header('location:index.php?id=quanlydanhmuc');
        }
        // header('location:index.php?id=quanlydanhmuc&&trangthai=themtk');
        
    }else{
        echo "Query failed: " . mysqli_error($con);
    }
}

//Sua 

if ($action == 'sua') {
    $id_user2 = $_GET['id-user'];
    $hoten2 = $_POST['ten_loaisp'];


    $sql_sua = "UPDATE `tbl_phanloaisp` SET `ten_loaisp` = '$hoten2' WHERE `tbl_phanloaisp`.`id_loaisp` = $id_user2;";
    $query_sua = mysqli_query($con, $sql_sua);
    if ($query_sua) {
        // header('location:index.php?id=quanlydanhmuc&&trangthai=themtk');
        header('location:index.php?id=quanlydanhmuc');
    }
}
