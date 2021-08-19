var val1 = val2 = val3 = null;

function menuBr(i) {
    S1 = document.getElementById("s1");

    buller = document.getElementById("buller");
    S2 = document.getElementById("s2");

    if (i == 1) {

        S2.style.right = 0 + "px";
        buller.style.display = "block";
        S1.style.display = "none";

    } else if (i == 0) {
        S2.style.right = -100 + "%";
        buller.style.display = "none";
        S1.style.display = "block";
    }
}

function showpassword(y) {
    var x = document.getElementById(y);

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";

    }

}



function ValPassword() {
    var error = document.getElementById("error");

    var password1 = document.getElementById("password").value;
    var password2 = document.getElementById("c_password").value;
    if (password1 != password2) {
        error.style.display = "block";
        error.innerHTML = "confirm password is different";
        val1 = 0;
        return false;

    } else if (password1 == password2) {
        error.style.display = "none";
        error.innerHTML = "";
        document.getElementById("PMtch").innerHTML = "password matched";
        val1 = 1;
        return true;
    }
}


function imgVal() {
    var error = document.getElementById("error");

    var fileInput = document.getElementById('img-f');
    var filePath = fileInput.value;

    // Allowing file type
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
        error.style.display = "block";
        error.innerHTML = "invalid file type";
        document.getElementById('imagePreview').style.color = "red";
        document.getElementById('imagePreview').innerHTML = "invalid file type";
        val2 = 0;
        fileInput.value = '';
        return false;
    } else {

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML =
                    '<img src="' + e.target.result + '"/>';
                document.getElementById('imgconfirm').innerHTML = "image preview";
                error.style.display = "none";
                error.innerHTML = "";

            };
            val2 = 1;
            reader.readAsDataURL(fileInput.files[0]);
            return true;
        }
    }
}

function FormVal() {


    if (val1 == 1 && val2 == 1 &&
        document.getElementById("error").innerHTML == "") {

        return true;
    } else return false;

}