function showSingup() {
    document.getElementById("loginFrom").className = "d-none";
    document.getElementById("forgotPassword").className = "d-none";
    document.getElementById("enterOTP").className = "d-none";
    document.getElementById("newPassword").className = "d-none";
    document.getElementById("singupFrom").className = "row";
}

function showLogin() {
    document.getElementById("forgotPassword").className = "d-none";
    document.getElementById("singupFrom").className = "d-none";
    document.getElementById("enterOTP").className = "d-none";
    document.getElementById("newPassword").className = "d-none";
    document.getElementById("loginFrom").className = "row";
}

function showForgotPassword() {
    document.getElementById("singupFrom").className = "d-none";
    document.getElementById("loginFrom").className = "d-none";
    document.getElementById("enterOTP").className = "d-none";
    document.getElementById("newPassword").className = "d-none";
    document.getElementById("forgotPassword").className = "row";
}

function sendOTP() {
    document.getElementById("inputEmail3").value = document.getElementById("inputEmail1").value;
    document.getElementById("forgotPassword").className = "d-none";
    document.getElementById("singupFrom").className = "d-none";
    document.getElementById("loginFrom").className = "d-none";
    document.getElementById("newPassword").className = "d-none";
    document.getElementById("enterOTP").className = "row";
}

function enableEdit(i) {
    if (i == 1) {
        document.getElementById("update-btn").className = "col-12 mb-4 mt-5";
        document.getElementById("editPBtn").className = "d-none";
        document.getElementById("cBtn").className = "btn btn-dark";
        document.getElementById("fname").removeAttribute("disabled");
        document.getElementById("pn").removeAttribute("disabled");
        document.getElementById("lname").removeAttribute("disabled");
    } else {
        window.location.reload("my-profile.html");
    }
}

function showSpinners() {
    document.getElementById("loadingSpin").className = "d-flex justify-content-center align-items-center position-absolute w-100 h-100 spin";
}

function hideSpinners() {
    document.getElementById("loadingSpin").className = "d-none";
}

function uplodeImgModel() {

    new bootstrap.Modal(document.getElementById("UpDateImg")).show();

}

function addNewAddressModel() {
    new bootstrap.Modal(document.getElementById("AddNewAddress")).show();
}

function addNewCard() {
    new bootstrap.Modal(document.getElementById("addNewCard")).show();
}

function show(i) {

    const pi = document.getElementById("pi");
    const mo = document.getElementById("mo");
    const mw = document.getElementById("mw");
    const ma = document.getElementById("ma");
    const sc = document.getElementById("sc");
    const n = document.getElementById("n");
    const se = document.getElementById("se");

    if (i == 1) {
        pi.className = "col py-3";
        mo.className = "d-none";
        mw.className = "d-none";
        ma.className = "d-none";
        sc.className = "d-none";
        n.className = "d-none";
        se.className = "d-none";
    } else if (i == 2) {
        pi.className = "d-none";
        mo.className = "col py-3";
        mw.className = "d-none";
        ma.className = "d-none";
        sc.className = "d-none";
        n.className = "d-none";
        se.className = "d-none";
    } else if (i == 3) {
        pi.className = "d-none";
        mo.className = "d-none";
        mw.className = "col py-3";
        ma.className = "d-none";
        sc.className = "d-none";
        n.className = "d-none";
        se.className = "d-none";
    } else if (i == 4) {
        pi.className = "d-none";
        mo.className = "d-none";
        mw.className = "d-none";
        ma.className = "col py-3";
        sc.className = "d-none";
        n.className = "d-none";
        se.className = "d-none";
    } else if (i == 5) {
        pi.className = "d-none";
        mo.className = "d-none";
        mw.className = "d-none";
        ma.className = "d-none";
        sc.className = "col py-3";
        n.className = "d-none";
        se.className = "d-none";
    } else if (i == 6) {
        pi.className = "d-none";
        mo.className = "d-none";
        mw.className = "d-none";
        ma.className = "d-none";
        sc.className = "d-none";
        n.className = "col py-3";
        se.className = "d-none";
    } else if (i == 7) {
        pi.className = "d-none";
        mo.className = "d-none";
        mw.className = "d-none";
        ma.className = "d-none";
        sc.className = "d-none";
        n.className = "d-none";
        se.className = "col py-3";
    }

}

// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2030 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function () {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);

function change_image(image) {

    var container = document.getElementById("main-image");

    container.src = image.src;
}
document.addEventListener("DOMContentLoaded", function (event) {

});

$(document).ready(function () {

    var quantitiy = 0;
    $('.quantity-right-plus').click(function (e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);


        // Increment

    });

    $('.quantity-left-minus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if (quantity > 0) {
            $('#quantity').val(quantity - 1);
        }
    });

});

function showDi(i) {

    const des = document.getElementById('des');
    const addi = document.getElementById('addi');
    const cr = document.getElementById('cr');
    const ar = document.getElementById('ar');
    const dBtn = document.getElementById("d-btn");
    const aiBtn = document.getElementById("ai-btn");
    const reBtn = document.getElementById("re-btn");

    if (i == 1) {
        dBtn.className = 'btn btn-dark';
        aiBtn.className = 'btn border-bottom border-2';
        reBtn.className = 'btn border-bottom border-2';
        des.className = 'p-3 col-12';
        addi.className = 'd-none';
        cr.className = 'd-none';
        ar.className = 'd-none';
    } else if (i == 2) {
        dBtn.className = 'btn border-bottom border-2';
        aiBtn.className = 'btn btn-dark';
        reBtn.className = 'btn border-bottom border-2';
        des.className = 'd-none';
        addi.className = 'p-3 col-md-7';
        cr.className = 'd-none';
        ar.className = 'd-none';
    } else if (i == 3) {
        dBtn.className = 'btn border-bottom border-2';
        aiBtn.className = 'btn border-bottom border-2';
        reBtn.className = 'btn btn-dark';
        des.className = 'd-none';
        addi.className = 'd-none';
        cr.className = 'col-12 p-3 d-flex flex-column justify-content-start align-items-start';
        ar.className = 'col-md-8 d-flex mt-3 flex-column';
    }

}

function SingUp() {

    const fname = document.getElementById("inputFname").value;
    const lname = document.getElementById("inputLname").value;
    const Male = document.getElementById("gender1");
    const Female = document.getElementById("gender2");
    const email = document.getElementById("inputEmail2").value;
    const password = document.getElementById("inputPassword2").value;
    const mobile = document.getElementById("mobile1").value;

    const form = new FormData();
    form.append('fname', fname);
    form.append('lname', lname);

    if (Male.checked) {
        form.append('gender', Male.value);
    } else if (Female.checked) {
        form.append('gender', Female.value);
    }

    form.append('email', email);
    form.append('password', password);
    form.append('mobile', mobile);

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText !== "ok") {
                document.getElementById("error-text").innerHTML = request.responseText;
                new bootstrap.Modal(document.getElementById("error")).show();
            } else {
                document.getElementById("error-text").innerHTML = "Successfully registered! Plese login  to continue.";
                new bootstrap.Modal(document.getElementById("error")).show();
                showLogin();
            }
        }

    }

    request.open("POST", "signup-procces.php", true);
    request.send(form);

}

function Login() {


    const email = document.getElementById("inputEmail1").value;
    const password = document.getElementById("inputPassword1").value;
    const rememberMe = document.getElementById("r-me");

    const form = new FormData();
    form.append('email', email);
    form.append('password', password);

    if (rememberMe.checked) {
        form.append('remember', "1");
    } else {
        form.append('remember', "2");
    }

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText !== "ok") {
                document.getElementById("error-text").innerHTML = request.responseText;
                new bootstrap.Modal(document.getElementById("error")).show();
            } else {
                window.location.href = "index.php";
            }
        }

    }

    request.open("POST", "user-login-procces.php", true);
    request.send(form);

}

function sendOtpCode() {

    const email = document.getElementById("inputEmail3").value;

    const form = new FormData();
    form.append('email', email);

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText !== "ok") {
                document.getElementById("error-text").innerHTML = request.responseText;
                new bootstrap.Modal(document.getElementById("error")).show();
            } else {
                sendOTP();
            }
        }

    }

    request.open("POST", "send-otp.php", true);
    request.send(form);

}

function verifyCode() {

    const otp = document.getElementById("otp").value;

    const form = new FormData();
    form.append('otp', otp);

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText !== "ok") {
                document.getElementById("error-text").innerHTML = request.responseText;
                new bootstrap.Modal(document.getElementById("error")).show();
            } else {
                document.getElementById("loginFrom").className = "d-none";
                document.getElementById("forgotPassword").className = "d-none";
                document.getElementById("enterOTP").className = "d-none";
                document.getElementById("newPassword").className = "d-none";
                document.getElementById("singupFrom").className = "d-none";
                document.getElementById("newPassword").className = "row";
            }
        }

    }

    request.open("POST", "verify-procces.php", true);
    request.send(form);

}

function ResetPassword() {

    const newPassword = document.getElementById("newPasswordIn").value;
    const coPassword = document.getElementById("coPasswordIn").value;

    const form = new FormData();
    form.append('newPassword', newPassword);
    form.append('coPassword', coPassword);

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText !== "ok") {
                document.getElementById("error-text").innerHTML = request.responseText;
                new bootstrap.Modal(document.getElementById("error")).show();
            } else {
                document.getElementById("error-text").innerHTML = "Success!  Password reseted.";
                new bootstrap.Modal(document.getElementById("error")).show();
                showLogin();
            }
        }

    }

    request.open("POST", "rest-password-procces.php", true);
    request.send(form);

}

function getCitys() {
    const id = document.getElementById("ad_district").value;
    const ad_city = document.getElementById("ad_city");


    if (id !== 0) {
        const request = new XMLHttpRequest();

        request.onreadystatechange = function () {

            if (request.readyState == 4 && request.status == 200) {
                const data = JSON.parse(request.responseText);


                for (const index = 0; index < ad_city.length; index++) {
                    ad_city.remove(index);
                }

                for (const index = 0; index < data.length; index++) {
                    const getData = data[index];

                    const elementOption = document.createElement("option");
                    elementOption.setAttribute("value", getData.city_id);
                    elementOption.innerHTML = getData.city_name;
                    ad_city.appendChild(elementOption);
                }
            }

        }

        request.open('GET', 'get-citys.php?id=' + id, true);
        request.send();
    }

}

function AddNewAddress() {

    const name = document.getElementById("ad_name").value;
    const mobile = document.getElementById("ad_pn").value;
    const line1 = document.getElementById("ad_line1").value;
    const line2 = document.getElementById("ad_line2").value;
    const district = document.getElementById("ad_district").value;
    const city = document.getElementById("ad_city").value;
    const zip_pin = document.getElementById("zip_pin").value;
    const setDefault = document.getElementById("ad_default");

    const request = new XMLHttpRequest();

    const from = new FormData();

    from.append("name", name);
    from.append("mobile", mobile);
    from.append("line1", line1);
    from.append("line2", line2);
    from.append("district", district);
    from.append("city", city);
    from.append("zip_pin", zip_pin);

    if (setDefault.checked) {
        from.append("is_default", "2")
    } else {
        from.append("is_default", "3");
    }

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText !== "ok") {
                alert(request.responseText);

            } else {
                window.location.reload();
                show(4);
            }
        }

    }

    request.open('POST', 'add-new-address.php', true);
    request.send(from);

}

function saveCard() {

    const c_no = document.getElementById("c_no").value;
    const c_name = document.getElementById("c_name").value;
    const c_cvv = document.getElementById("c_cvv").value;
    const c_ed_m = document.getElementById("c_ed_m").value;
    const c_ed_y = document.getElementById("c_ed_y").value;

    const request = new XMLHttpRequest();

    const from = new FormData();
    from.append("cardNumber", c_no);
    from.append("holderName", c_name);
    from.append("cvv", c_cvv);
    from.append("month", c_ed_m);
    from.append("year", c_ed_y);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText !== "ok") {
                alert(request.responseText);
            } else {
                window.location.reload();
                show(5);
            }
        }

    }

    request.open('POST', 'add-new-card.php', true);
    request.send(from);

}

function deconsteCard(i) {

    const request = new XMLHttpRequest();

    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText == "ok") {
                window.location.reload();
                show(5);
            }
        }

    }

    request.open('POST', 'deconste-card.php', true);
    request.send(from);

}

function deconsteAddress(i) {
    const request = new XMLHttpRequest();

    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText == "ok") {
                window.location.reload();
                show(5);
            }
        }

    }

    request.open('POST', 'deconste-address.php', true);
    request.send(from);
}

function setDefaultAddress(i) {
    const request = new XMLHttpRequest();

    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText == "ok") {
                window.location.reload();
                show(5);
            }
        }

    }

    request.open('POST', 'set-default-address.php', true);
    request.send(from);
}

function updateProfile() {

    const fname = document.getElementById("fname").value;
    const lname = document.getElementById("lname").value;
    const pn = document.getElementById("pn").value;

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("fname", fname);
    from.append("lname", lname);
    from.append("pn", pn);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            if (request.responseText == "ok") {

                window.location.reload();
                show(1);
            } else {
                alert(request.responseText);
            }
        }

    }

    request.open('POST', 'update-profile.php', true);
    request.send(from);

}

function updateProfileImg(i) {

    const request = new XMLHttpRequest();
    const from = new FormData();

    if (i == "1") {
        const img = document.getElementById("new_img").files[0];
        from.append("file", img);
    }

    from.append("of", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            if (request.responseText != "") {
                window.location.reload();
            }

        }

    }

    request.open('POST', 'update-profile-img.php', true);
    request.send(from);

}

function deconsteWishiItems(i) {

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            if (request.responseText = "ok") {
                window.location.reload();
            }

        }

    }

    request.open('POST', 'deconste-wishi-item.php', true);
    request.send(from);

}

function Subscribe() {

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("email", document.getElementById("subscribe_email").value);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            document.getElementById("error-text").innerHTML = request.responseText;
            new bootstrap.Modal(document.getElementById("error")).show();

            document.getElementById("subscribe_email").value = "";

        }

    }

    request.open('POST', 'subscribe.php', true);
    request.send(from);

}

function addToCart(i) {

    const quantity = document.getElementById("quantity").value;

    const request = new XMLHttpRequest();
    const from = new FormData();

    from.append("qty", quantity);
    from.append("id", i);
    from.append("size_id", document.getElementById("size").value);

    request.onreadystatechange = function () {
        alert(request.responseText);

        if (request.readyState == "4" && request.status == "200") {

            document.getElementById("msg_l").innerHTML = request.responseText;

            const myToast = new bootstrap.Toast(document.getElementById('myToast'));
            myToast.show();

            setTimeout(function () {
                myToast.hide();
            }, 5000);

            if (request.responseText == "item add to  cart successfully!") {
                window.location.reload();
            }

        }
    }
    request.open('POST', 'add-to-cart.php', true);
    request.send(from);
}

function addToWishi(i) {

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            document.getElementById("msg_l").innerHTML = request.responseText;

            const myToast = new bootstrap.Toast(document.getElementById('myToast'));
            myToast.show();

            setTimeout(function () {
                myToast.hide();
            }, 5000);
        }
    }

    request.open('POST', 'add-to-wish-list.php', true);
    request.send(from);

}

function Logout() {
    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            window.location.href = "index.php";
        }
    }

    request.open('GET', 'logout.php', true);
    request.send();
}

function DeconsteCartItem(i) {

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            if (request.responseText == "ok") {
                window.location.reload();
            }
        }
    }

    request.open('POST', 'deconste-cart-item.php', true);
    request.send(from);

}

function saveRequest(i) {

    const msg = document.getElementById("msg");
    const type_id = document.getElementById("RequestType");

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("p_id", i);
    from.append("type_id", type_id.value);
    from.append("msg", msg.value);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            if (request.responseText == "Request saved!") {
                msg.value = "";
            }

            document.getElementById("msg_l").innerHTML = request.responseText;

            const myToast = new bootstrap.Toast(document.getElementById('myToast'));
            myToast.show();

            setTimeout(function () {
                myToast.hide();
            }, 5000);

        }

    }

    request.open('POST', 'save-request.php', true);
    request.send(from);

}

function ContactUsSend() {

    const fname = document.getElementById("fname").value;
    const lname = document.getElementById("lname").value;
    const mobile = document.getElementById("mobile").value;
    const email = document.getElementById("email").value;
    const msg = document.getElementById("msg").value;
    const rid = document.getElementById("rid").value;

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("msg", msg);
    from.append("rid", rid);
    from.append("fname", fname);
    from.append("lname", lname);
    from.append("mobile", mobile);
    from.append("email", email);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            if (request.responseText == "ok") {
                document.getElementById("msg").value = "";
            }

            document.getElementById("error-text").innerHTML = request.responseText;
            new bootstrap.Modal(document.getElementById("error")).show();

        }

    }

    request.open('POST', 'contact-us-procces.php', true);
    request.send(from);

}

function DiscountCodeCheck() {

    const DiscountCode = document.getElementById("DiscountCode").value;
    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("code", DiscountCode);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {

            document.getElementById("msg_l").innerHTML = request.responseText;

            const myToast = new bootstrap.Toast(document.getElementById('myToast'));
            myToast.show();

            setTimeout(function () {
                myToast.hide();
            }, 5000);

            if (request.responseText = "Discount added") {
                window.location.reload();
            }

        }

    }

    request.open('POST', 'discount-code-check.php', true);
    request.send(from);

}

function GoToCheckOut() {
    window.location.replace("checout.php");
}

function SelectShoppingAddress(i) {
    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {

        if (request.readyState == "4" && request.status == "200") {


            if (request.responseText == "ok") {
                window.location.reload();
            } else {
                alert("Can't find address!");
            }

        }

    }

    request.open('POST', 'save-shopping-address.php', true);
    request.send(from);
}

function methodShow() {
    document.getElementById("card-from").className = "w-100 mb-3";
}

function methodHide() {
    document.getElementById("card-from").className = "d-none";
}

function filCard(no, name, cvv, year, month) {

    document.getElementById("c_no").value = no;
    document.getElementById("c_name").value = name;
    document.getElementById("c_cvv").value = cvv;
    document.getElementById("c_ed_y").value = year;
    document.getElementById("c_ed_m").value = month;

}


function ViewOrder(id) {

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("order", id);

    showSpinners();

    request.onreadystatechange = function () {
        if (request.readyState == "4" && request.status == "200") {
            document.getElementById("orderid").innerHTML = "Order Id - " + id;
            document.getElementById("item-body").innerHTML = "";
            document.getElementById("item-body").innerHTML = request.responseText;
            hideSpinners();
            new bootstrap.Modal(document.getElementById("ViewOrderModle")).show();
        }
    }

    request.open('POST', 'get-invoice-item.php', true);
    request.send(from);

}

function CancelOrderModle(id) {
    new bootstrap.Modal(document.getElementById("CancelOrderModel")).show();
    document.getElementById("order-id").innerHTML = id;
}

function CancelOrder() {
    const id = document.getElementById("order-id").innerHTML;

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("id", id);

    request.onreadystatechange = function () {
        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText == "ok") {
                window.location.reload();
            }
        }
    }

    request.open('POST', 'cancel-order-procces.php', true);
    request.send(from);

}

function showfilter(i) {
    const filter = document.getElementById("filter");
    const onBtn = document.getElementById("onBtn");
    const offBtn = document.getElementById("offBtn");

    if (i == 1) {
        // Show the sidebar
        filter.classList.remove("d-none");
        setTimeout(() => filter.classList.add("show-sidebar"), 10);

        // Toggle button classes
        onBtn.classList.add("d-none");
        offBtn.classList.remove("d-none");
        offBtn.classList.add("btn", "bg-transparent", "fs-5", "bi", "bi-x-lg");
    } else {
        // Hide the sidebar
        filter.classList.remove("show-sidebar");

        // Toggle button classes
        onBtn.classList.remove("d-none");
        offBtn.classList.add("d-none");
        onBtn.classList.add("btn", "bg-transparent", "fs-5", "bi", "bi-funnel-fill");

        setTimeout(() => filter.classList.add("d-none"), 500);
    }
}

function searchProduct() {
    const request = new XMLHttpRequest();

    showSpinners();

    request.onreadystatechange = function () {
        if (request.readyState == "4" && request.status == "200") {
            document.getElementById("list-view").innerHTML = "";
            document.getElementById("list-view").innerHTML = request.responseText;
            showfilter(0);
            hideSpinners();
        }
    }

    request.open('GET', 'search_procces.php?text=' + document.getElementById("s_text").value, true);
    request.send();
}



function advancedSearchProduct() {

    const maxPrice = document.getElementById("maxPrice").value;
    const minPrice = document.getElementById("minPrice").value;
    const stayBy = document.getElementById("stay_by").value;
    const text = document.getElementById("s_text").value;

    let selectedSize = "";
    const sizeInputs = document.querySelectorAll('input[name="size"]');
    sizeInputs.forEach(input => {
        if (input.checked) {
            selectedSize = input.id.replace("size_", "");
        }
    });

    let selectedColor = "";
    const colorInputs = document.querySelectorAll('input[name="color"]');
    colorInputs.forEach(input => {
        if (input.checked) {
            selectedColor = input.id.replace("color_", "");
        }
    });

    let selectedCategory = "";
    const categoryInputs = document.querySelectorAll('input[name="categories"]');
    categoryInputs.forEach(input => {
        if (input.checked) {
            selectedCategory = input.id.replace("category_", "");
        }
    });

    let selectedBrand = "";
    const brandInputs = document.querySelectorAll('input[name="brand"]');
    brandInputs.forEach(input => {
        if (input.checked) {
            selectedBrand = input.id.replace("brand_", "");
        }
    });

    // alert(selectedSize);
    // alert(selectedColor);
    // alert(selectedCategory);
    // alert(stayBy);
    // alert(minPrice);
    // alert(maxPrice);


    const request = new XMLHttpRequest();

    const param = `text=${text}&category=${selectedCategory}&brand=${selectedBrand}&color=${selectedColor}&size=${selectedSize}&stay=${stayBy}&minPrice=${minPrice}&maxPrice=${maxPrice}`;

    request.onreadystatechange = function () {
        if (request.readyState == "4" && request.status == "200") {
            showfilter(0);
            document.getElementById("list-view").innerHTML = "";
            document.getElementById("list-view").innerHTML = request.responseText;

        }
    }

    request.open('GET', `advanced-search-process.php?${param}`, true);
    request.send();

}


function ClearFilters() {
    // Clear text input
    document.getElementById("s_text").value = "";

    // Clear category selection
    const categoryInputs = document.querySelectorAll('input[name="categories"]');
    categoryInputs.forEach(input => {
        input.checked = false;
    });

    // Clear brand selection
    const brandInputs = document.querySelectorAll('input[name="brand"]');
    brandInputs.forEach(input => {
        input.checked = false;
    });

    // Clear color selection
    const colorInputs = document.querySelectorAll('input[name="color"]');
    colorInputs.forEach(input => {
        input.checked = false;
    });

    // Clear size selection
    const sizeInputs = document.querySelectorAll('input[name="size"]');
    sizeInputs.forEach(input => {
        input.checked = false;
    });

    // Clear stay by selection
    document.getElementById("stay_by").selectedIndex = 0;

    // Clear min and max price inputs
    document.getElementById("minPrice").value = "";
    document.getElementById("maxPrice").value = "";

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == "4" && request.status == "200") {
            showfilter(0);
            document.getElementById("list-view").innerHTML = "";
            document.getElementById("list-view").innerHTML = request.responseText;

        }
    }

    request.open('GET', 'advanced-search-process.php', true);
    request.send();

}

function deleteWishiItems(i) {

    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("id", i);

    request.onreadystatechange = function () {
        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText == "ok") {
                window.location.reload();
            }
        }
    }

    request.open('POST', 'delete-wishi-item.php', true);
    request.send(from);
}

function DeleteCartItem(id) {
    const request = new XMLHttpRequest();
    const from = new FormData();
    from.append("id", id);

    alert(id);

    request.onreadystatechange = function () {
        if (request.readyState == "4" && request.status == "200") {
            if (request.responseText == "ok") {
                alert(request.responseText);
                window.location.reload();
            }
        }
    }

    request.open('POST', 'delete-cart-item.php', true);
    request.send(from);
}

function UpdateCart(id) {
    
    

}




