<?php

session_start();
if(isset($_SESSION['email'])){
  if($_SESSION['type']=='admin'){
    header('location:adminProfile.php');
  }else if($_SESSION['type']=='customer'){
    // public
    header('location:custProfile.php');
  }
}else if(!(isset($_SESSION['email']))){
    header('location:index.php');
}

if (isset($_GET['logout'])) {
    $_SESSION['email']='';
    $_SESSION['type']='';
    session_destroy();
    header('location:index.php');
}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Servicing</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">

  <!-- Css and bootstrap Stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/profile.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/40419ae504.js" crossorigin="anonymous"></script>

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

  <section id="title">

    <div class="containers-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-light  ">
        <a class="navbar-brand" href="#">Service</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">View Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="appointments.php">Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listservices.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empProfile.php?logout=true">Logout</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="row">
        <div class="col-lg-6">
          <h1 class="big-heading">Do your Vechicle require a Checkup?</h1>
          <button type="button" class="btn btn-dark btn-lg" style="margin-top: 3%;"><i class="fas fa-tools" style="margin-right: 4px;"></i> Book Appointment</button>
        </div>

        <div class="col-lg-6 col-sm-12">
          <img class="title-image" src="img/tools1.png" alt="service-logo">
        </div>
      </div>
    </div>
  </section>


</body>

</html>
