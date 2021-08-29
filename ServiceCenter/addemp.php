<?php

session_start();

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
    <script src="js/admin.js"></script>



    <title>Animation</title>
</head>

<body>

    <div class="box">

        <h5>Employee Registeration</h5>
        <form id="emp_reg_form">

            <div class="form-group">
                <input type="text" class="form-control" id="employee_name" placeholder="Name" name="employee-name" required />
                <span id="nameError"></span>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" id="employee_contact" placeholder="Mobile Number" name="employee-contact" required />
                <span id="contactError"></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="employee_email" placeholder="Email" name="employee-email" required />
                <span id="emailError"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="employee_password" placeholder="Password" name="employee-password" autocomplete="on" required />
                <span id="passwordError"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="employee_address" placeholder="Address" name="employee-address" required />
                <span id="addressError"></span>
            </div>

            <button type="submit" class="btn btn-block btn-success btn-lg" name="" id="reg_emp">Submit!</button>

        </form>

    </div>


</body>

</html>