function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signUp() {

    var f = document.getElementById("f");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("m");
    var g = document.getElementById("g");
    var a = document.getElementById("a");


    var form = new FormData;
    form.append("f", f.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);
    form.append("a", a.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");


    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

function changeProductImage() {
    var image = document.getElementById("imageuploader");

    image.onchange = function() {

        var file_count = image.files.length;

        if (file_count <= 5) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }

        } else {
            alert("Please select 5 or less than 5 images.");
        }

    }
}

function addProduct() {
    var daddress = document.getElementById("da");
    var dtime = document.getElementById("dt");
    var note = document.getElementById("not");

    var image = document.getElementById("imageuploader");

    var f = new FormData();

    f.append("da", daddress.value);
    f.append("dt", dtime.value);
    f.append("n", note.value);


    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {

        f.append("image" + x, image.files[x]);

    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Product images saved successfully") {
                window.location = "home.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "addProcess.php", true);
    r.send(f);

}

function loadMainImg(id) {
    var sample_img = document.getElementById("productImg" + id).src;
    var main_img = document.getElementById("mainImg");

    main_img.style.backgroundImage = "url(" + sample_img + ")";

}

function check_value(qty) {

    var input = document.getElementById("qty_input");

    if (input.value <= 0) {
        alert("Quantity must be 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Insufficient Quantity.");
        input.value = qty;
    }

}

function qty_inc(qty) {

    var input = document.getElementById("qty_input");

    if (input.value < qty) {

        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();

    } else {

        alert("Maximum quantity has achieved");
        input.value = qty;

    }

}

function qty_dec() {

    var input = document.getElementById("qty_input");

    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
    } else {
        alert("Minimum quantity has achieved");
        input.value = 1;
    }



}

function changeBalanseStatus(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("pb" + id).innerHTML = "order Conform";
                document.getElementById("pb" + id).classList = "btn btn-success disabled";
                alert("success");
                window.location = "add.php";
            } else if (txt == "unblocked") {
                document.getElementById("pb" + id).innerHTML = "order";
                document.getElementById("pb" + id).classList = "btn btn-primary";
            } else {
                alert(txt);
            }
        }
    }
    request.open("GET", "changeBalanseStatusProcess.php?id=" + id, true);
    request.send();


}


function blockorder(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "blocked") {
                document.getElementById("pb" + id).innerHTML = "Reject Conforme";
                document.getElementById("pb" + id).classList = "btn btn-primary disabled";
                window.location.reload();
            } else if (txt == "unblocked") {
                document.getElementById("pb" + id).innerHTML = "order";
                document.getElementById("pb" + id).classList = "btn btn-primary";
            } else {
                alert(txt);
            }
        }
    }
    request.open("GET", "productBlockProcess.php?id=" + id, true);
    request.send();



}

function sendemail(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Send email");
                window.location = "admin.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendEmailProcess.php", true);
    r.send();
}