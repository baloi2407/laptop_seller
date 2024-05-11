
        function search() {
            // Ngăn chặn hành vi mặc định của form
            Event.preventDefault();

            // Lấy giá trị từ input
            var searchValue = form.elements["search"].value;

            // Tạo URL tùy chỉnh
            var customURL = "/search?query=" + encodeURIComponent(searchValue);

            alert(customURL);
            // Chuyển hướng tới URL tùy chỉnh
            // window.location.href = customURL;
        }
  