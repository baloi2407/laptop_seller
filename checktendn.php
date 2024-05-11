<?php 
    include "admincp/config/config.php";
    $con = connectToDatabase();
        $output ="";
        if(isset($_GET['tendn'])){
           
            $tendn = $_GET['tendn'];
            $query_check = mysqli_query($con,"SELECT user_name FROM tbl_user WHERE user_name = '$tendn'");
            $data = mysqli_fetch_assoc($query_check);
            if($data != null){
               $output .="<span>Tên đăng nhập đã tồn tại</span>"; 
            }
            else if($data == null){
                $output ="";
            }
        } 
         echo $output;
