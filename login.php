
<?php 

session_start();

if (isset($_SESSION["user"])) {
  header("Location: http://localhost/MyShop/index.php");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome to Krist</title>
  <link rel="icon" href="resources/image/Logo.png" />
  <link rel="stylesheet" href="bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

<?php 
include "spinners.php";
?>

  <div class="container-fluid">

    <!-- login from -->
    <div class="row" id="loginFrom">
      <div class="col-6 img-div vh-100 d-none d-lg-block">
        <a href="index.php"><img src="resources/image/Logo.png" class="m-3" /></a>
      </div>
      <div class="col-12 d-block d-lg-none">
        <a href="index.php"><img src="resources/image/Logo.png" class="mx-1 mt-1 logo-sm" /></a>
      </div>
      <div class="col-12 col-lg-6 vh-100 d-flex flex-column justify-content-center align-items-center px-5">
        <div class="d-flex flex-column w-75">
          <h3 class="jost-bold">Welcome 👋 </h3>
          <label class="text-secondary jost-normal">Please login here</label>
        </div>
        <div class="mb-3 mt-3 w-75">
          <label for="inputEmail1" class="col-sm-2 col-form-label text-black">Email</label>
          <input type="email" class="form-control" id="inputEmail1" required>
        </div>
        <div class="mb-3 mt-3 w-75">
          <label for="inputPassword1" class="col-sm-2 col-form-label text-black">Password</label>
          <div class="">
            <input type="password" class="form-control" id="inputPassword1" required>
          </div>
        </div>
        <div class="w-75 d-flex justify-content-between align-items-center mb-3">
          <div>
            <input type="checkbox" id="r-me" class="form-check-input bg-black" checked required />
            <label for="r-me">Remember Me</label>
          </div>
          <button class="btn bg-transparent border-0" onclick="showForgotPassword();">Forgot Password?</button>
        </div>
        <div class="w-75 mt-4">
          <button type="submit" class="btn btn-dark w-100 fs-6 py-2" onclick="Login();">Login</button>
          <button type="submit" class="btn bg-transparent w-100 fs-6 py-2 mt-1 border-0" onclick="showSingup();">New
            user ? sign up</button>
        </div>

      </div>
    </div>
    <!-- login from -->

    <!-- sign up from -->
    <div class="row d-none" id="singupFrom">
      <div class="col-6 img-div2 min-vh-100 d-none d-lg-block">
        <a href="index.php"><img src="resources/image/Logo.png" class="m-3" /></a>
      </div>
      <div class="col-12 d-block d-lg-none">
        <a href="index.php"><img src="resources/image/Logo.png" class="mx-1 mt-1 logo-sm" /></a>
      </div>
      <div class="col-12 col-lg-6 vh-100 d-flex flex-column justify-content-center align-items-center px-5">
        <div class="d-flex flex-column w-75 mt-4">
          <h3 class="jost-bold">Create New Account</h3>
          <label class="text-secondary jost-normal">Please enter details</label>
        </div>
        <div class="mb-1  w-75">
          <label for="inputfname" class="col-sm-2 col-form-label text-black">First Name<small
              class="text-danger">*</small></label>
          <input type="text" class="form-control" id="inputFname" required>
        </div>
        <div class="mb-1 mt-1 w-75">
          <label for="inputlname" class="col-sm-2 col-form-label text-black">Last Name<small
              class="text-danger">*</small></label>
          <input type="text" class="form-control" id="inputLname" required>
        </div>

        <div class=" d-flex justify-content-start flex-column w-75">
          <label for="inputlname" class="col-sm-2 col-form-label text-black">Gender<small
              class="text-danger">*</small></label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender1" value="1" checked>
            <label class="form-check-label" >
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender2" value="2"/>
            <label class="form-check-label">
              Female
            </label>
          </div>
        </div>

        <div class="mb-1 w-75">
          <label for="inputEmail2" class="col-sm-2 col-form-label text-black">Email<small
              class="text-danger">*</small></label>
          <input type="email" class="form-control" id="inputEmail2" required>
        </div>
        <div class="mb-3 mt-3 w-75">
          <label for="inputEmail2" class="col-sm-2 col-form-label text-black">Mobile<small
              class="text-danger">*</small></label>
          <input type="email" class="form-control" id="mobile1" required>
        </div>
        <div class="mb-1 w-75">
          <label for="inputPassword2" class="col-sm-2 col-form-label text-black">Password<small
              class="text-danger">*</small></label>
          <div class="">
            <input type="password" class="form-control" id="inputPassword2" required>
          </div>
        </div>
        <div class="w-75 d-flex justify-content-between align-items-center mb-3">
          <div>
            <input type="checkbox" id="tc" class="form-check-input bg-black" checked required />
            <label for="tc">I agree to the <a href="" class="text-black text-decoration-none fw-bold">Terms &
                Conditions</a></label>
          </div>
        </div>
        <div class="w-75 ">
          <button type="submit" class="btn btn-dark w-100 fs-6 py-2" onclick="SingUp();">Signup</button>
          <button type="submit" class="btn bg-transparent w-100 fs-6 py-2 mt-1 border-0" onclick="showLogin();">You have
            a account? Login</button>
        </div>

      </div>
    </div>
    <!-- sign up from -->

    <!-- Forgot Password -->
    <div class="row d-none" id="forgotPassword">
      <div class="col-6 img-div3 min-vh-100 d-none d-lg-block">
        <a href="index.php"><img src="resources/image/Logo.png" class="m-3" /></a>
      </div>
      <div class="col-12 d-block d-lg-none">
        <a href="index.php"><img src="resources/image/Logo.png" class="mx-1 mt-1 logo-sm" /></a>
      </div>
      <div class="col-12 col-lg-6 vh-100 d-flex flex-column justify-content-center align-items-center px-5">

        <div class="w-75">
          <button class="btn border-0 fs-3" onclick="showLogin();">&#8249; <small class="fs-5">Back</small></button>
        </div>

        <div class="d-flex flex-column w-75">
          <h3 class="jost-bold mt-1">Forgot Password</h3>
          <label class="text-secondary jost-normal">Enter your registered email address. we’ll send you a code to reset
            your password.</label>
        </div>

        <div class="mb-3 mt-3 w-75">
          <label for="inputEmail2" class="col-sm-2 col-form-label text-black">Email<small
              class="text-danger">*</small></label>
          <input type="email" class="form-control" id="inputEmail3" required>
        </div>

        <div class="w-75 mt-3">
          <button type="submit" class="btn btn-dark w-100 fs-6 py-2" onclick="sendOtpCode();">Send OTP</button>
        </div>

      </div>
    </div>
    <!-- Forgot Password -->

    <!-- Enter OTP -->
    <div class="row d-none" id="enterOTP">
      <div class="col-6 img-div4 min-vh-100 d-none d-lg-block">
        <a href="index.php"><img src="resources/image/Logo.png" class="m-3" /></a>
      </div>
      <div class="col-12 d-block d-lg-none">
        <a href="index.php"><img src="resources/image/Logo.png" class="mx-1 mt-1 logo-sm" /></a>
      </div>
      <div class="col-12 col-lg-6 vh-100 d-flex flex-column justify-content-center align-items-center px-5">

        <div class="w-75">
          <button class="btn border-0 fs-3" onclick="showLogin();">&#8249; <small class="fs-5">Back</small></button>
        </div>

        <div class="d-flex flex-column w-75">
          <h3 class="jost-bold mt-1">Enter OTP</h3>
          <label class="text-secondary jost-normal">We have share a code of your registered email address
            <?php echo($_COOKIE["otp_mail"]);?></label>
        </div>

        <div class="mb-3 mt-3 w-75">
          <label for="otp" class="col-sm-2 col-form-label text-black">OTP<small class="text-danger">*</small></label>
          <input type="text" class="form-control" id="otp" required>
        </div>

        <div class="w-75 mt-3">
          <button type="submit" class="btn btn-dark w-100 fs-6 py-2" onclick="verifyCode();">Verify</button>
        </div>

      </div>
    </div>
    <!-- Enter OTP -->

    <!-- Enter New Password -->
    <div class="row d-none" id="newPassword">
      <div class="col-6 img-div4 min-vh-100 d-none d-lg-block">
        <a href="index.php"><img src="resources/image/Logo.png" class="m-3" /></a>
      </div>
      <div class="col-12 d-block d-lg-none">
        <a href="index.php"><img src="resources/image/Logo.png" class="mx-1 mt-1 logo-sm" /></a>
      </div>
      <div class="col-12 col-lg-6 vh-100 d-flex flex-column justify-content-center align-items-center px-5">

        <div class="w-75">
          <button class="btn border-0 fs-3" onclick="showLogin();">&#8249; <small class="fs-5">Back</small></button>
        </div>

        <div class="d-flex flex-column w-75">
          <h3 class="jost-bold mt-1">Enter New Password</h3>
          <label class="text-secondary jost-normal">Reset your password</label>
        </div>

        <div class="mb-3 mt-3 w-75">
          <label for="otp" class="col-form-label text-black">New Password<small class="text-danger">*</small></label>
          <input type="password" class="form-control" id="newPasswordIn" required>
        </div>

        <div class="mb-3 mt-3 w-75">
          <label for="otp" class="col-form-label text-black">Confirm Password<small
              class="text-danger">*</small></label>
          <input type="password" class="form-control" id="coPasswordIn" required>
        </div>

        <div class="w-75 mt-3">
          <button type="submit" class="btn btn-dark w-100 fs-6 py-2" onclick="ResetPassword();">Reset Password</button>
        </div>

      </div>
    </div>
    <!-- Enter New Password -->
  </div>

<!-- Modal -->
<div class="modal fade" id="error" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label class="fs-5"  id="error-text"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>