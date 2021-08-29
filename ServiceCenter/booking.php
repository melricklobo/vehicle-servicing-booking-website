<?php

session_start();

require 'config/connect.php';

$email = $_SESSION['email'];
$cust_sql = mysqli_query($connect, "select * from customers where customer_email = '$email'");
$cust_data = mysqli_fetch_assoc($cust_sql);
$cid = $cust_data['customer_id'];

$veh_sql = mysqli_query($connect, "select * from vehicles where customer_id = '$cid'");
$veh_data = mysqli_fetch_assoc($veh_sql);

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



    <title>Booking</title>
</head>

<body>
    <div id="email" hidden=true><?php echo $_SESSION['email']; ?></div>
    <div class="container">
        <form id="" method="post" class="form-appt">

            <div class="form-section">
                <input type="text" name="name" id="name" autocomplete="off" value="<?php echo $cust_data['customer_name'] ?>" required />
                <label for="name" class="label-name">
                    <span class="content-name">Name</span>
                </label>

            </div>
            <span class="errmsg" id="ername"></span>
            <br>
            <br>

            <div class="form-section">
                <input type="tel" name="contact" id="contact" value="<?php echo $cust_data['customer_phno'] ?>" required />
                <label for="contact" class="label-name">
                    <span class="content-name">Contact</span>
                </label>

            </div>
            <span class="errmsg" id="ercontact"></span>
            <br>
            <br>

            <div class="form-section">
                <input type="text" name="address" id="address" value="<?php echo $cust_data['customer_address'] ?>" required />
                <label for="address" class="label-name">
                    <span class="content-name">Address</span>
                </label>

            </div>
            <span class="errmsg" id="eraddress"></span>
            <br>
            <br>

            <div class="form-section">
                <input type="email" name="email" id="email" value="<?php echo $cust_data['customer_email'] ?>" required />
                <label for="email" class="label-name">
                    <span class="content-name">Email Address</span>
                </label>

            </div>
            <span class="errmsg" id="eremail"></span>
            <br>
            <br>

            <div class="form-section">
                <input type="text" name="model" id="model" value="<?php echo $veh_data['vehicle_model'] ?>" required />
                <label for="model" class="label-name">
                    <span class="content-name">Vehicle Model</span>
                </label>

            </div>
            <span class="errmsg" id="ermodel"></span>
            <br>
            <br>

            <div class="form-section">
                <input type="text" name="reg" id="reg" value="<?php echo $veh_data['vehicle_registration_no'] ?>" required />
                <label for="reg" class="label-name">
                    <span class="content-name">Vehicle Registration</span>
                </label>

            </div>
            <span class="errmsg" id="erreg"></span>
            <br>
            <br>

            <div class="form-section">
                <input type="number" name="distance" id="distance" required />
                <label for="distance" class="label-name">
                    <span class="content-name">Total Kilometers</span>
                </label>

            </div>
            <span class="errmsg" id="erdistance"></span>
            <br>
            <br>

            <div class="form-section">
                <input type="text" id="datepick" required />
                <label for=" date" class="label-name">
                    <span class="content-name">Appointment Date</span>
                </label>

            </div>
            <span class="errmsg" id="erdatepick"></span>
            <br>
            <br>


            <div class="form-group">
                <label>Services:</label>
                <ul class="list-group">
                    <?php
                    $sql = "SELECT DISTINCT service_name FROM services_offered ORDER BY service_name";
                    $result = $connect->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['service_name']; ?>" name="service_name" id="service_name"><?= $row['service_name']; ?>

                                </label>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>
            <br>
            <br>

            <div class="form-group">
                <label for="desc">Specific Request:</label>
                <br>
                <br>
                <textarea rows="6" cols="89" name="desc" id="desc" required autocomplete="off"></textarea>
            </div>
            <span class="chars_left" id="charsleft"></span>
            <span class="errmsg" id="erdesc"></span>
            <br>
            <br>

            <button type="submit" class="btn btn-block btn-success btn-lg" name="addAppt" id="submit">Place Appointment</button>

        </form>

        <br>
        <br>
        <br>
    </div>

    <script src="js/jquery_1.js"></script>
    <script src="js/jquery_ui.js"></script>
    <script src="js/booking.js"></script>


</body>




</html>