<?php 
    function Card($name, $image, $price, $id) {
        $string = '<div class="card">';
        $string .= '<div class="card-container">';
        $string .= '<div class="card-top">';
        $string .= '<img src="upload/' . $image . '" alt="Avatar" class="images">';
        $string .= '</div>';
        $string .= '<div class="card-midle">';
        $string .= '<div><a href="cart.php?id=' . $id . '&action=add">Thêm vào giỏ</a></div>';
        $string .= '<div><a href="index.php?id=chitiet-sp&sp=' . $id . '">Chi tiết</a></div>';
        $string .= '</div>';
        $string .= '<div class="card-bottom">';
        $string .= '<h6><b>' . $name . '</b></h6>';
        $string .= '<p>' . number_format($price) . ' đ</p>';
        $string .= '</div>';
        $string .= '</div>';
        $string .= '</div>';
        return $string;
    }

?>