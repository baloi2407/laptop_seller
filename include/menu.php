<?php
$sql_loaisp = "SELECT * FROM tbl_phanloaisp ORDER BY id_loaisp ";
$query = mysqli_query($con, $sql_loaisp);
$sql_banner = "SELECT * FROM tbl_banner WHERE trang_thai = 'Hoạt động' ORDER BY id_banner DESC LIMIT 3";
$query_banner = mysqli_query($con,$sql_banner);
?>

<script>
  function phanloai(loaisp, page) {
    $.ajax({
      url: "hienthi-sp-ajax-phanloai.php",
      type: "GET",
      cache: false,
      data: {
        page_no: page,
        loaisp: loaisp
      },
      beforeSend: function() {
        $("#overlay").show();
        $("#main").hide();
      },
      success: function(response) {
        $("#data").html(response);
        setInterval(function() {
          $("#overlay").hide();
        }, 500);
      }
    });
    $(document).on("click", ".page-link", function(e) {
      e.preventDefault();
      var pageId = $(this).attr("id");
      phanloai(loaisp, pageId);
    });
  }
</script>

<div class="banner">
  <div class="container flex-container">
    <div class="menu">
          <div class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle show" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="true">
              Danh mục sản phẩm
          </button>
            <ul class="dropdown-menu show" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 40px, 0px);" data-popper-placement="bottom-start">
              <?php
              while ($row_title = mysqli_fetch_array($query)) { ?>
                <li>
                  <a class="dropdown-item" id="loaisp" onclick="phanloai(<?php echo $row_title['id_loaisp'] ?>,1)">
                    <?php echo $row_title['ten_loaisp']; ?>
                  </a>
                </li>
              <?php
              }
              ?>
            </ul>
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
  </div>
</div>

