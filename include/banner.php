<?php 
    $sql_banner = "SELECT * FROM tbl_banner WHERE trang_thai = 'Hoạt động' ORDER BY id_banner DESC LIMIT 3";
    $query_banner = mysqli_query($con,$sql_banner);
    // $data_banner = mysqli_fetch_assoc($query_banner);
    // var_dump(mysqli_fetch_assoc($query_banner));

?>
<div class="sidebar">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <!-- <div class="carousel-item active">
                <img class="d-block w-100" src="images/banner1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/Banner2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/Banner3.jpg" alt="Third slide">
            </div> -->

            <?php $i = 1;
                while($data_banner = mysqli_fetch_assoc($query_banner)){?>
                    <div class="carousel-item <?php if($i==1){echo "active"; $i = 0;} ?>">
                        <img class="d-block w-100" src="upload/<?php echo $data_banner['images']?>" alt="<?php echo $data_banner['ten_banner']?>">
                    </div>

            <?php } ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"> </span>
        </a>
    </div>
</div>


<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
  
    <!-- The slideshow/carousel -->
    <!-- <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/banner1.png" alt="Los Angeles" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="./images/Banner2.png" alt="Chicago" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="./images/Banner3.jpg" alt="New York" class="d-block w-100">
      </div>
    </div> -->
  
    <?php $i = 1;
                while($data_banner = mysqli_fetch_assoc($query_banner)){?>
                    <div class="carousel-item <?php if($i==1){echo "active"; $i = 0;} ?>">
                        <img class="d-block w-100" src="upload/<?php echo $data_banner['images']?>" alt="<?php echo $data_banner['ten_banner']?>">
                    </div>

            <?php } ?>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>