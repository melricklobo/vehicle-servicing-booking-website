<?php

session_start();

require 'config/connect.php';

$email = $_SESSION['email'];
$type = $_SESSION['type'];

$chk_sql = mysqli_query($connect, "select * from users where email = '$email' and type = '$type'");
$chk_data = mysqli_fetch_assoc($chk_sql);
$cust_sql = mysqli_query($connect, "select * from employee where employee_email = '$email'");
$data = mysqli_fetch_assoc($cust_sql);
$cid = $data['employee_id'];
$cname = $data['employee_name'];
//if($chk_data['type'] == "cutomer"){
// $app_sql = mysqli_query($connect,"select * from appointment where customer_id = '$cid'");
//}
//else{
$serv_sql = mysqli_query($connect, "select * from services_offered");
//}

// }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Client Offered Services</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">

  <!-- Css and bootstrap Stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/40419ae504.js" crossorigin="anonymous"></script>

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script src="js/jquery_1.js"></script>
  <script src="js/jquery_ui.js"></script>
  <script src="js/clientservices.js"></script>

</head>

<body>

  <section id="title">

    <div class="containers-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-light  ">
        <a class="navbar-brand" href="">
          <?php
          echo $cname;
          ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="custProfile.php" id="back">Back</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="row">
        <table class="user-details">
          <tr>
            <th>Service Name<i class="fas fa-calendar-day" style="margin-left: 5px;margin-top: 5px;"></i></th>
            <th>Price<i class="fas fa-motorcycle" style="margin-left: 5px;margin-top: 5px;"></i></th>
            <th>Change Price<i class="fas fa-calendar-alt" style="margin-left: 5px;margin-top: 5px;"></i></th>
            <th>Cancel<i class="fas fa-window-close" style="margin-left: 5px;margin-top: 5px;"></i></th>
          </tr>
          <?php
          while ($serv_data = mysqli_fetch_array($serv_sql)) {
            $servid = $serv_data['service_id']
          ?>
            <tr>
              <td><?php echo $serv_data['service_name']; ?></td>
              <td><?php echo $serv_data['service_price']; ?></td>
              <td><button type="button" class="btn btn-dark btn-md changebutton" style="margin-top: 3%;" data-toggle="modal" data-target="#changeModal" id="change_button" value="<?php echo $servid; ?>">Change Price<i class="fas fa-calendar-alt" style="margin-left: 5px;margin-top: 5px;"></i></button></td>
              <td><button type="button" class="btn btn-dark btn-md cancel_button" style="margin-top: 3%;" id="cancelservice_button" value="<?php echo $servid; ?>">Cancel<i class="fas fa-window-close" style="margin-left: 5px;margin-top: 5px;"></i></button></td>
            </tr>
          <?php
          }
          ?>
        </table>

        <button type="button" class="btn btn-dark btn-lg" style="margin-top: 3%;" id="add_service"><i class="fas fa-tools" style="margin-right: 4px;"></i> Add Service</button>

      </div>
    </div>
  </section>


</body>

</html>



<!-- Change Modal -->
<div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Price To :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="preice-change">
        <div class="form-section">
          <input type="text" id="pricechange" required />
          <label for=" date" class="label-name">
            <span class="content-name">New Price</span>
          </label>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="changeButton">Change</button>
      </div>
    </div>
  </div>
</div>