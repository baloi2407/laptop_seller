function ktdangnhap() {
  var tk = document.getElementById("username").value;
  var ps = document.getElementById("password").value;
  if (tk == "" || ps == "") {
    alert("Xin nhập đầy đủ thông tin");
    return false;
  }
}
function popup() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
function popup1() {
  var popup = document.getElementById("myPopup1");
  popup.classList.toggle("show");
}

function popup2() {
  var popup = document.getElementById("myPopup2");
  popup.classList.toggle("show");
}

function popup3() {
  var popup = document.getElementById("myPopup3");
  popup.classList.toggle("show");
}

function popup4() {
  var popup = document.getElementById("myPopup4");
  popup.classList.toggle("show");
}

function popup5() {
  var popup = document.getElementById("myPopup5");
  popup.classList.toggle("show");
}


function ktdangky() {
  var tk = document.getElementById("username").value;
  var ps = document.getElementById("password").value;
  var rps = document.getElementById("rpassword").value;
  var email = document.getElementById("email").value;
  var paterntk = new RegExp(["^[a-z0-9_-]{3,16}$", "g"]);
  var paternps = new RegExp(["^[a-z0-9_-]{6,18}$", "g"]);
  var paternemail = new RegExp(["^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$", "g"]);
  var hoten = new RegExp("[a-zA-ZAÁÀẢÃẠÂẤẦẨẪẬĂẮẰẲẴẶEÉÈẺẼẸÊẾỀỂỄỆIÍÌỈĨỊOÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢUÚÙỦŨỤƯỨỪỬỮỰYÝỲỶỸỴĐaáàảãạâấầẩẫậăắằẳẵặeéèẻẽẹêếềểễệiíìỉĩịoóòỏõọôốồổỗộơớờởỡợuúùủũụưứừửữựyýỳỷỹỵđ]{1,55}", "g");

}

function capnhat() {
  var soluong = document.getElementById("soluong").value;


}
function checksoluong(value, soluong) {
  if (value > soluong) {
    alert("Không đủ số lượng hàng! Mời nhập lại sô lượng mới.");
    document.getElementById("soluong").value = 0;

  }
}
function checksoluonggiohang(value, soluong, soluonggoc) {
  if (value > soluong) {
    alert("Không đủ số lượng hàng");
    document.getElementById("soluong").value = soluonggoc;
  }
}
function addnow() {
  var action = "addnow";
  document.getElementById("action").value = action;
}
function Xoagiohang(id) {
  if (confirm("Bạn có muốn xóa hay không?")) {
    location.href = "cart.php?id=" + id + "&action=delete";
    
  }
}
function XoaHD(id) {
  if (confirm("Bạn có muốn hủy đơn hàng hay không?")) {
    location.href = "xuli-user.php?action=huydonhang&idhd=" + id;
  }
}

function ktdangnhap() {
  var tk = document.getElementById("username").value;
  var ps = document.getElementById("password").value;
  if (tk == "" || ps == "") {
    alert("Xin nhập đầy đủ thông tin");
    return false;
  }
}

function checkdangnhap() {
  var tendn = document.getElementById("username").value;

  function check(tendn) {
    $.ajax({
      url: "checktendn.php",
      type: "GET",
      cache: false,
      data: { tendn: tendn },
      success: function (data) {
        $("#tendn").html(data);
      }
    });
  };
  check(tendn);
}


function capnhat(id) {
  var soluong = document.getElementById.value();
  $.ajax({
    url: "cart.php",
    type: "GET",
    cache: false,
    data: { id: id, soluong: soluong },
    success: function () {

    }
  })
}
