<?php
include "config/config.php";
$con = connectToDatabase();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'themtk';


//them tk mới

if ($action == 'themtk') {
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $username = $_POST['tendn'];
    $password = $_POST['password'];
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql_themtk = "INSERT INTO tbl_user(hoten,sdt,email,user_name,password) 
                        VALUE ('{$hoten}','{$sdt}','{$email}','{$username}','{$pass}')";
    $query = mysqli_query($con, $sql_themtk);
    if ($query) {
        header('location:index.php?id=quanlyuser&&trangthai=themtk');
    }
}
//Đặt lại mật khẩu

if ($action == 'repass') {
    $passwordneedrepass = $_POST['password'];
    $id_user = $_GET['id-user'];
    $repass = password_hash($passwordneedrepass, PASSWORD_DEFAULT);
    $sql_repass = "UPDATE `tbl_user` SET `password` = '$repass' WHERE `tbl_user`.`id_user` = $id_user;";
    $query_repass = mysqli_query($con, $sql_repass);
    if ($query_repass) {
        header('location:index.php?id=quanlyuser&&trangthai=themtk');
    }
}

//Xoa 

if ($action == 'xoa') {
    $id_user = $_GET['id-user'];
    $sql_xoa = "DELETE FROM tbl_user WHERE id_user = $id_user";
    $query = mysqli_query($con, $sql_xoa);
    if ($query) {
        header('location:index.php?id=quanlyuser&&trangthai=themtk');
    }
}

//Sua 

if ($action == 'sua') {
    $id_user2 = $_GET['id-user'];
    $hoten2 = $_POST['hoten'];
    $email2 = $_POST['email'];
    $tendn2 = $_POST['tendn'];
    $sdt2 = $_POST['sdt'];

    $sql_sua = "UPDATE `tbl_user` SET `hoten` = '$hoten2' ,`email` = '$email2',`user_name` = '$tendn2',`sdt` = '$sdt2' WHERE `tbl_user`.`id_user` = $id_user2;";
    $query_sua = mysqli_query($con, $sql_sua);
    if ($query_sua) {
        header('location:index.php?id=quanlyuser&&trangthai=themtk');
    }
}
