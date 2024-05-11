<?php
include "admincp/config/config.php";
$con = connectToDatabase();
session_start();
if ($_SESSION['user']) {

    $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
    $soluong = (isset($_GET['soluong'])) ? $_GET['soluong'] : 1;


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            $product = mysqli_fetch_assoc($query);
        }
        $item = [
            'id' => $product['id_sanpham'],
            'name' => $product['ten_sanpham'],
            'images' => $product['images'],
            'price' => $product['gia'],
            'soluong-max' => $product['soluong'],
            'soluong' => $soluong
        ];
    }
    if ($action == 'update') {
        $_SESSION['cart'][$id]['soluong'] = $soluong;
        header('location:index.php?id=shop-cart');
    }
    //them san pham vao gio hang
    if ($action == 'add') {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['soluong'] += $soluong;
            ?><script>history.back(-1)</script><?php
        } else {
            $_SESSION['cart'][$id] = $item;
            ?><script>history.back(-1)</script><?php
        }
    }
    //them ngay
    if ($action == 'addnow') {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['soluong'] += $soluong;
            header('location:index.php?id=shop-cart');
        } else {
            $_SESSION['cart'][$id] = $item;
            header('location:index.php?id=shop-cart');
        }
    }
    //xoa gio hang khoi gio hang
    if ($action == 'delete') {
        unset($_SESSION['cart'][$id]);    
        header('location: index.php?id=shop-cart');
    }
    if ($action == 'thanhtoan') {
        $tongtien = $_POST['tongtien'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $pttt = $_POST['pttt'];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("y-m-d");
        $time = date("y-m-d h:i:s A");
        $diachi = strip_tags($diachi);
        $diachi = addslashes($diachi);
        $sdt = strip_tags($sdt);
        $sdt = addslashes($sdt);
        $pttt = strip_tags($pttt);
        $pttt = addslashes($pttt);
        $id_user = $_SESSION['user']['id_user'];
        $trangthai = "Chưa xử lí";


        $sql = ("INSERT INTO tbl_hoadon(id_user,diachi,tong_tien,sdt,date,pptt,trangthai,time) 
            VALUES ('{$id_user}','{$diachi}','{$tongtien}','{$sdt}','{$date}','{$pttt}','{$trangthai}','{$time}')");
        $query = mysqli_query($con, $sql);

        if ($query) {

            $sql4 = "SELECT id_hoadon FROM tbl_hoadon WHERE time = '{$time}'";
            $query3 = mysqli_query($con, $sql4);
            $hoadon = mysqli_fetch_assoc($query3);
            $cart = $_SESSION['cart'];
            $id_hoadon = $hoadon['id_hoadon'];
            foreach ($cart as $key => $value) {
                $id_sanpham = $value['id'];
                $soluongsp = $value['soluong'];
                $soluongspconlai = $value['soluong-max'] - $value['soluong'];
                $sql_cthd = ("INSERT INTO tbl_chitiethoadon(id_hoadon,id_sanpham,soluongsp)
                                        VALUES ('{$id_hoadon}','{$id_sanpham}','{$soluongsp}')");
                $query1 = mysqli_query($con, $sql_cthd);
                $sql_slgh = ("UPDATE tbl_sanpham SET `soluong` = $soluongspconlai WHERE id_sanpham = $id_sanpham");
                $query2 = mysqli_query($con, $sql_slgh);
            }
            $_SESSION['cart'] = null;
            header('location: index.php?id=quanlytaikhoan&action=showhoadon');
        }
    }
} else {
    header('location: index.php?id=signin');
}
