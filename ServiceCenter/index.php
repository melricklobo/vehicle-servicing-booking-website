<?php

session_start();
// session_destroy();

if (isset($_SESSION['email'])) {
  if ($_SESSION['type'] == 'admin') {
    header('location:adminProfile.php');
  } else if ($_SESSION['type'] == 'employee') {
    header('location:empProfile.php');
  } else if ($_SESSION['type'] == 'customer') {
    // public
    header('location:custProfile.php');
  }
} else {

  require_once 'config/connect.php';
  if (isset($_POST['login_button'])) {

    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $sql_check1a = mysqli_query($connect, "select * from users where email='$userEmail'");
    $sql_check1b = mysqli_query($connect, "select * from users where email='$userEmail' and password='$userPassword'");

    if ((mysqli_num_rows($sql_check1a) > 0)) {
      if (mysqli_num_rows($sql_check1b) > 0) {

        // successful
        $user_data = mysqli_fetch_assoc($sql_check1b);

        $_SESSION['email'] = $userEmail;
        $_SESSION['type'] = $user_data['type'];

        if ($user_data['type'] == 'admin') {
          header('location:adminProfile.php');
        } else if ($user_data['type'] == 'employee') {
          header('location:empProfile.php');
        } else if ($user_data['type'] == 'customer') {
          header('location:custProfile.php');
        }
      } else {
        $msg = '<div class="alert alert-danger mt-5" role="alert">
          Oops looks like we cannot identify this password. Try entering another password.
          </div>';
      }
    } else {
      $msg = '<div class="alert alert-danger mt-5" role="alert">
        <i class="fas fa-times-circle"></i> Oops looks like this email is not registered. Try registering first.
        </div>';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Form</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- Css and bootstrap Stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/40419ae504.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- Bootstrap Scripts -->
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/login.js"></script>



  <title>Animation</title>
</head>

<body>

  <div class="login_container ">

    <div class="login_fields">
      <div class="login_head">Login</div>
      <form action="" method="POST">
        <div class="form-group">
          <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
          <span id="loginEmailError" class=""></span>
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="password" autocomplete="on">
          <span id="loginPasswordError" class=""></span>
        </div>

        <button type="submit" class="btn btn-block btn-success btn-lg " id="loginButton" name="login_button">Login</button>

      </form>

      <span class="new_user"><a href="registerone.php">New Here? Click to register!</a></span>
      </br>

      <span class="red" id="loginerrmsg"><?php echo @$msg; ?></span>

    </div>
    <div class="register_img">

    </div>

  </div>

</body>

</html>