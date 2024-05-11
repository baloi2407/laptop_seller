<?php
include "config/config.php";
$con = connectToDatabase();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'themtk';


//them tk mới

if ($action == 'themtk') {
    $ten = $_POST['ten'];
    $username = $_POST['tendn'];
    $password = $_POST['password'];
    $number = $_POST['numbers'];
    $email = $_POST['email']; 
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql_themtk = "INSERT INTO tbl_admin(name,user_name,password,numbers,email) 
                        VALUE ('{$ten}','{$username}','{$pass}','{$number}','{$email}')";
    $sql_thempermiss = "INSERT INTO tbl_permission(name) 
         VALUE ('{$ten}')";
    $query_permiss = mysqli_query($con, $sql_thempermiss);
    $query = mysqli_query($con, $sql_themtk);
    if ($query) {
        header('location:index.php?id=quanlyadmin&&trangthai=themtk');
    }
}
//Đặt lại mật khẩu

if ($action == 'repass') {
    $passwordneedrepass = $_POST['password'];
    $id_user = $_GET['id-user'];
    $repass = password_hash($passwordneedrepass, PASSWORD_DEFAULT);
    $sql_repass = "UPDATE `tbl_admin` SET `password` = '$repass' WHERE `tbl_admin`.`id_admin` = $id_user";
    $query_repass = mysqli_query($con, $sql_repass);
    if ($query_repass) {
        header('location:index.php?id=quanlyadmin&&trangthai=themtk');
    }
}

//Xoa 

if ($action == 'xoa') {
    $id_user = $_GET['id-admin'];
    $sql_xoa = "DELETE FROM tbl_admin WHERE id_admin = $id_user";
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
if ($action == 'setquyen') {

    $name = $_POST['name'];

    $qladmin = "";
    $qluser = "";
    $qlsp = "";
    $qlhd = "";
    $qldm = "";
    $qlbn = "";
    $qlncc = "";
    $qlnh = "";

    //quản lý admin
    $qladx = (isset($_POST['qladx'])) ? $_POST['qladx'] : '';
    $qladt = (isset($_POST['qladt'])) ? $_POST['qladt'] : '';
    $qladrp = (isset($_POST['qladrp'])) ? $_POST['qladrp'] : '';
    $qladd = (isset($_POST['qladd'])) ? $_POST['qladd'] : '';
    $qladsq = (isset($_POST['qladsq'])) ? $_POST['qladsq'] : '';

    if ($qladx != '') {
        $qladmin .= "$qladx,";
    }
    if ($qladt != '') {
        $qladmin .= "$qladt,";
    }
    if ($qladrp != '') {
        $qladmin .= "$qladrp,";
    }
    if ($qladd != '') {
        $qladmin .= "$qladd,";
    }
    if ($qladsq != '') {
        $qladmin .= "$qladsq,";
    }

    //quản lý khách hàng
    $qlkhx = (isset($_POST['qlkhx'])) ? $_POST['qlkhx'] : '';
    $qlkhth = (isset($_POST['qlkht'])) ? $_POST['qlkht'] : '';
    $qlkhrp = (isset($_POST['qlkhrp'])) ? $_POST['qlkhrp'] : '';
    $qlkhs = (isset($_POST['qlkhs'])) ? $_POST['qlkhs'] : '';

    if ($qlkhx != '') {
        $qluser .= "$qlkhx,";
    }
    if ($qlkhth != '') {
        $qluser .= "$qlkhth,";
    }
    if ($qlkhrp != '') {
        $qluser .= "$qlkhrp,";
    }
    if ($qlkhs != '') {
        $qluser .= "$qlkhs,";
    }

    //quản lý sản phẩm
    $qlspx = (isset($_POST['qlspx'])) ? $_POST['qlspx'] : '';
    $qlspt = (isset($_POST['qlspt'])) ? $_POST['qlspt'] : '';
    $qlspd = (isset($_POST['qlspd'])) ? $_POST['qlspd'] : '';
    $qlsps = (isset($_POST['qlsps'])) ? $_POST['qlsps'] : '';

    if ($qlspx != '') {
        $qlsp .= "$qlspx,";
    }
    if ($qlspt != '') {
        $qlsp .= "$qlspt,";
    }
    if ($qlspd != '') {
        $qlsp .= "$qlspd,";
    }
    if ($qlsps != '') {
        $qlsp .= "$qlsps,";
    }

    //quản lý hóa đơn
    $qlhdx = (isset($_POST['qlhdx'])) ? $_POST['qlhdx'] : '';
    $qlhdxl = (isset($_POST['qlhdxl'])) ? $_POST['qlhdxl'] : '';

    if ($qlhdx != '') {
        $qlhd .= "$qlhdx,";
    }
    if ($qlhdxl != '') {
        $qlhd .= "$qlhdxl,";
    }

    //quản lý danh mục
    $qldmx = (isset($_POST['qldmx'])) ? $_POST['qldmx'] : '';
    $qldmt = (isset($_POST['qldmt'])) ? $_POST['qldmt'] : '';
    $qldmd = (isset($_POST['qldmd'])) ? $_POST['qldmd'] : '';
    $qldms = (isset($_POST['qldms'])) ? $_POST['qldms'] : '';

    if ($qldmx != '') {
        $qldm .= "$qldmx,";
    }
    if ($qldmt != '') {
        $qldm .= "$qldmt,";
    }
    if ($qldmd != '') {
        $qldm .= "$qldmd,";
    }
    if ($qldms != '') {
        $qldm .= "$qldms,";
    }

    //quản lý banner
    $qlbnx = (isset($_POST['qlbnx'])) ? $_POST['qlbnx'] : '';
    $qlbnt = (isset($_POST['qldmt'])) ? $_POST['qldmt'] : '';
    $qlbnd = (isset($_POST['qlbnd'])) ? $_POST['qlbnd'] : '';
    $qlbns = (isset($_POST['qlbns'])) ? $_POST['qlbns'] : '';

    if ($qlbnx != '') {
        $qlbn .= "$qlbnx,";
    }
    if ($qlbnt != '') {
        $qlbn .= "$qlbnt,";
    }
    if ($qlbnd != '') {
        $qlbn .= "$qlbnd,";
    }
    if ($qlbns != '') {
        $qlbn .= "$qlbns,";
    }

    //quản lý nhà cung cấp
    $qlnccx = (isset($_POST['qlnccx'])) ? $_POST['qlnccx'] : '';
    $qlncct = (isset($_POST['qlncct'])) ? $_POST['qlncct'] : '';
    $qlnccd = (isset($_POST['qlnccd'])) ? $_POST['qlnccd'] : '';
    $qlnccs = (isset($_POST['qlnccs'])) ? $_POST['qlnccs'] : '';

    if ($qlnccx != '') {
        $qlncc .= "$qlnccx,";
    }
    if ($qlncct != '') {
        $qlncc .= "$qlncct,";
    }
    if ($qlnccd != '') {
        $qlncc .= "$qlnccd,";
    }
    if ($qlnccs != '') {
        $qlncc .= "$qlnccs,";
    }

    //quản lý nhập hàng
    $qlnhx = (isset($_POST['qlnhx'])) ? $_POST['qlnhx'] : '';
    $qlnht = (isset($_POST['qlnht'])) ? $_POST['qlnht'] : '';
    $qlnhd = (isset($_POST['qlnhd'])) ? $_POST['qlnhd'] : '';
    $qlnhs = (isset($_POST['qlnhs'])) ? $_POST['qlnhs'] : '';

    if ($qlnhx != '') {
        $qlnh .= "$qlnhx,";
    }
    if ($qlnht != '') {
        $qlnh .= "$qlnht,";
    }
    if ($qlnhd != '') {
        $qlnh .= "$qlnhd,";
    }
    if ($qlnhs != '') {
        $qlnh .= "$qlnhs,";
    }


    $sql_check = "SELECT * FROM tbl_permission WHERE name = '$name'";
    $query_check = mysqli_query($con, $sql_check);
    if ($query_check) {
        $sql_setquyen = "UPDATE `tbl_permission` SET `qladmin`='$qladmin',`qluser`='$qluser',`qlhd`='$qlhd',`qlsp`='$qlsp',`qlcate`='$qldm',`qlncc`='$qlncc',`qlbanner`='$qlbn',`qlnhaphang`='$qlnh'  WHERE name = '$name'";
        $query_setquyen = mysqli_query($con, $sql_setquyen);
        header('location:index.php?id=quanlyadmin&&trangthai=themtk');
    } else {
        $sql_setquyen = "INSERT INTO `tbl_permission`(`name`, `qladmin`, `qluser`, `qlhd`, `qlsp`, `qlcate`, `qlbanner`, `qlncc`, `qlnhahang`) VALUES ('$name','$qladmin','$qluser','$qlhd','$qlsp','$qldm','$qlbn','$qlncc','$qlnh')";
        $query_setquyen = mysqli_query($con, $sql_setquyen);
        header('location:index.php?id=quanlyadmin&&trangthai=themtk');
    }
}
