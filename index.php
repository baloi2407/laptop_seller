<?php
session_start();
include "./admincp/config/config.php";
$con = connectToDatabase();
include "./include/card.php";
// session_destroy();
if (isset($_GET['id'])) {
    $temp = $_GET['id'];
    if ($temp == "out") {
        session_destroy();
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    


    <link rel="stylesheet" href="./css/new-css.css">
    <script src="js/myjs.js" type="text/javascript"></script>
    <!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
    <title>Ai shop</title>
</head>

<body>
    <div class="wrapper">
        <div id="overlay">
            <div><img src="images/loading.gif" width="64px" height="64px" /></div>
        </div>
        <?php include "include/topbar.php"; ?>
        <?php include "include/header.php"; ?>
        <?php 
            // include "include/menu.php"; 
        ?>
        <div class="flex-container" id="data">
        </div>
        <div id="main">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                if ($id == 'chitiet-sp') {
                    include "include/chitiet-sp.php";
                }
                if ($id == 'quanlytaikhoan') {
                    include "include/quanlytaikhoan.php";
                }
                if ($id == 'signin') {
                    include "include/sign-in.php";
                }
                if ($id == 'signup') {
                    include "include/sign-up.php";
                }
                if ($id == 'shop-cart') {
                    include "include/shop-cart.php";
                }
            } else 
                if (isset($_GET['search'])) {
                include "include/hienthi-sp.php";
            } else {
                // include "include/banner.php";
                include "include/menu.php";
                include "include/sp-tieubieu.php";
            }
            ?>
            <div class="clear">
            </div>
        </div>

        <?php include "include/footer.php"; ?>
    </div>
</body>

</html>