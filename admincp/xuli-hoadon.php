<?php 
    include "config/config.php";
    $con = connectToDatabase();
    if(isset($_POST['tinhtrang'])){
        $trangthai = $_POST['tinhtrang'];
        $idhd = $_POST['id-hoadon'];
        $sql = "UPDATE `tbl_hoadon` SET trangthai = '$trangthai' WHERE id_hoadon = $idhd";
        $query = mysqli_query($con,$sql);
        if($query){
            header("location:index.php?id=quanlyhoadon&&trangthai=themtk");
        }
    }
