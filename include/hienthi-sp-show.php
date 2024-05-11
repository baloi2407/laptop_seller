<?php ?>

<script type="text/javascript">
    $(document).ready(function() {
        loadData();

        function loadData(page) {
            $.ajax({
                url: "hienthi-sp-ajax.php",
                type: "POST",
                cache: false,
                data: {
                    page_no: page
                },
                beforeSend: function() {
                    $("#overlay").show();
                },
                success: function(response) {
                    $("#data").html(response);
                    setInterval(function() {
                        $("#overlay").hide();
                    }, 500);
                }
            });
        }
        $(document).on("click", ".pagination li a", function(e) {
            e.preventDefault();
            var pageId = $(this).attr("id");
            loadData(pageId);
        });
    });
</script>
<div id="overlay">
    <div><img src="images/loading.gif" width="64px" height="64px" /></div>
</div>
<div class="hot_deal">
    <div class="conteiner" id="data">
    </div>