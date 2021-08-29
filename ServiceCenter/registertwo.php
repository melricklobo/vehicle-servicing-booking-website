<?php

// session_start();

require 'config/connect.php';

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
    <script src="js/vehRegistration.js"></script>


    <title>Animation</title>
</head>

<body>

    <div class="register_container">
        <div class="register_image">

        </div>
        <div class="register_contents">
            <div class="reg_head">
                Vehicle Details
            </div>
            <div class="welcommsg" id="wcmsg"></div>
            <form id="veh_form">
                <div class="form-group">
                    <input type="text" class="form-control" id="vehicle_model" placeholder="Vehicle Model" name="vehicle-model" required />
                    <span id="modelError"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="vehicle_reg_number" placeholder="Vehicle Registration Number " name="vehicle-reg-number" required />
                    <span id="regnumError" style="color:black">(eg GA/03/AE/1783)</span>
                </div>

                <button type="submit" class="btn btn-block btn-success btn-lg" name="" id="submit">Submit!</button>
            </form>
            <div id="formErr" style="color:white"></div>

        </div>

    </div>


</body>

</html>