function check() {
    var dem = 0;
    var kiemTra = false;
    //regex
    var Ruser = /^([A-Z][a-z]+[ ]?)+$/;
    var Rpass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var Rrepass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var Remail = /^[A-Za-z0-9\.\_]+@[A-Za-z0-9\.]+$/;
    var RsdtU = /^(\+84|0)[0-9]{9}$/;
    //test
    var resultuser = Ruser.test(user);
    var resultpass = Rpass.test(pass);
    var resultrepass = Rrepass.test(repass);
    var resultemail = Remail.test(email);
    var resultsdtU = RsdtU.test(sdtU);
    //Lấy hết giá trị về
    var user = document.getElementById("user").value;
    var pass = document.getElementById("PasswordU").value;
    var repass = document.getElementById("rePasswordU").value;
    var email = document.getElementById("EmailU").value;
    var sdtU = document.getElementById("SdtU").value;
    var diachi = document.getElementById("DiaChiU");
    //Lấy hết thẻ lỗi về
    var userErr = document.getElementById("err-user");
    var passErr = document.getElementById("err-pass");
    var repassErr = document.getElementById("err-re-PasswordU");
    var emailErr = document.getElementById("err-EmailU");
    var sdtUErr = document.getElementById("err-SdtU");
    var diachiErr = document.getElementById("err-DiaChiU");
    //Kiểm tra điều kiện
    //user
    if (resultuser) {
        userErr.innerHTML = "";
        dem++;
    } else {
        erruser.innerHTML = "Tên user không đúng";
    }

    //pass
    if (resultpass) {
        if (pass == repass) {
            passErr.innerHTML = "";
            repassErr.innerHTML = "";
            dem++;
        } else {
            passErr.innerHTML = "Mật khẩu không trùng khớp";
            repassErr.innerHTML = "Mật khẩu không trùng khớp";
        }
    } else {
        passErr.innerHTML = "Ít nhất 8 ký tự";
    }
    //email
    if (resultemail) {
        emailErr.innerHTML = "";
        dem++;
    } else {
        emailErr.innerHTML = "Email không hợp lệ";
    }
    //sdt
    if (num === "") {
        sdtUErr.innerHTML = "Nhập SĐT";
    } else {
        if (resultnum) {
            sdtUErr.innerHTML = "";
            dem++;
        } else {
            sdtUErr.innerHTML = "SĐT không hợp lệ";
        }
    }
    //diachi
    if (diachi === "") {
        diachiErr.innerHTML = "Nhập địa chỉ";
    } else {
        if (resultdiachi) {
            diachiErr.innerHTML = "";
            dem++;
        } else {
            diachiErr.innerHTML = "Địa chỉ không đúng";
        }
    }
    return kiemTra;
}