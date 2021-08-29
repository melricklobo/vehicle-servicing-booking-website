<?php

session_start();

require 'config/connect.php';

$email = $_SESSION['email'];
$type = $_SESSION['type'];

$chk_sql = mysqli_query($connect, "select * from users where email = '$email' and type = '$type'");
$chk_data = mysqli_fetch_assoc($chk_sql);
if ($chk_data['type'] == "customer") {
  $cust_sql = mysqli_query($connect, "select * from customers where customer_email = '$email'");
  $data = mysqli_fetch_assoc($cust_sql);
  $cid = $data['customer_id'];
  $cname = $data['customer_name'];
  $app_sql = mysqli_query($connect, "select * from appointment where customer_id = '$cid'");
} else {
  $app_sql = mysqli_query($connect, "select * from appointment");
  $cust_sql = mysqli_query($connect, "select * from employee where employee_email = '$email'");
  $data = mysqli_fetch_assoc($cust_sql);
  $cid = $data['employee_id'];
  $cname = $data['employee_name'];
}

// }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Customer Appointments</title>

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
  <script src="js/appointment.js"></script>

</head>

<body>

  <section id="title">

    <div class="containers-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-light  ">
        <a class="navbar-brand" href="" id="username" value="<?php echo $cid; ?>">
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
            <th>Date<i class="fas fa-calendar-day" style="margin-left: 5px;margin-top: 5px;"></i></th>
            <th>Vehicle<i class="fas fa-motorcycle" style="margin-left: 5px;margin-top: 5px;"></i></th>
            <th>Details<i class="fas fa-info-circle" style="margin-left: 5px;margin-top: 5px;"></i></th>
            <th>Re-Schedule<i class="fas fa-calendar-alt" style="margin-left: 5px;margin-top: 5px;"></i></th>
            <th>Cancel<i class="fas fa-window-close" style="margin-left: 5px;margin-top: 5px;"></i></th>
          </tr>
          <?php
          while ($app_data = mysqli_fetch_array($app_sql)) {
            $appid = $app_data['appointment_id'];
            $vehid = $app_data['vehicle_id'];
            $veh_sql = mysqli_query($connect, "select * from vehicles where vehicle_id = '$vehid'");
            $veh_data = mysqli_fetch_assoc($veh_sql);
          ?>
            <tr>
              <td><?php echo $app_data['date_booking']; ?></td>
              <td><?php echo $veh_data['vehicle_model']; ?></td>
              <td><button type="button" class="btn btn-dark btn-md details_button" style="margin-top: 3%;" data-toggle="modal" data-target="#detailsModal" id="details_button" value="<?php echo $appid; ?>">View Details<i class="fas fa-info-circle fa-lg" style="margin-left: 5px;margin-top: 5px;"></i></button></td>
              <td><button type="button" class="btn btn-dark btn-md reschedule_button" style="margin-top: 3%;" data-toggle="modal" data-target="#rescheduleModal" id="reschedule_button" value="<?php echo $appid; ?>">Re-Schedule<i class="fas fa-calendar-alt" style="margin-left: 5px;margin-top: 5px;"></i></button></td>
              <td><button type="button" class="btn btn-dark btn-md cancel_button" style="margin-top: 3%;" id="cancel_button" value="<?php echo $appid; ?>">Cancel<i class="fas fa-window-close" style="margin-left: 5px;margin-top: 5px;"></i></button></td>
            </tr>
          <?php
          }
          ?>
        </table>

        <button type="button" class="btn btn-dark btn-lg" style="margin-top: 3%;" id="book_appointment"><i class="fas fa-tools" style="margin-right: 4px;"></i> Book Appointment</button>

      </div>
    </div>
  </section>


</body>

</html>


<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Appointment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="det">
        <div class="label">Vehicle Model </div>
        <div class="detail"><?php echo $veh_data['vehicle_model']; ?></div>
        <div class="label">Vehicle Registration Model </div>
        <div class="detail"><?php echo $veh_data['vehicle_registration_no']; ?></div>
      </div>
      <div class="modal-body" id="modal_body"></div>
    </div>
  </div>
</div>


<!-- Details Modal -->
<div class="modal fade" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Appointment Reschedule To :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="re-schedule">
        <div class="form-section">
          <input type="text" id="datepick" required />
          <label for=" date" class="label-name">
            <span class="content-name">Appointment Date</span>
          </label>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="rescheduleButton">Reschedule</button>
      </div>
    </div>
  </div>
</div>