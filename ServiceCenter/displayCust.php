<?php

session_start();

require 'config/connect.php';

$email = $_SESSION['email'];
$type = $_SESSION['type'];

$chk_sql = mysqli_query($connect, "select * from customers");

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
    <script src="js/admin.js"></script>

</head>

<body>

    <section id="title">

        <div class="containers-fluid">
            <!-- Nav Bar -->
            <nav class="navbar navbar-expand-lg navbar-light  ">
                <a class="navbar-brand" href="" id="username" value="">
                    <?php
                    echo $_SESSION['email'];
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="adminProfile.php" id="back">Back</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="row">
                <table class="user-details">
                    <tr>
                        <th>Name<i class="fa fa-user " style="margin-left: 5px;margin-top: 5px;"></i></th>
                        <th>Contact<i class="fas fa-phone-square-alt" style="margin-left: 5px;margin-top: 5px;"></i></th>
                        <th>Email<i class="fas fas fa-envelope-square" style="margin-left: 5px;margin-top: 5px;"></i></th>
                        <th>Address<i class="fas fa-address-card" style="margin-left: 5px;margin-top: 5px;"></i></th>

                    </tr>
                    <?php
                    while ($cus_data = mysqli_fetch_array($chk_sql)) {
                        $cusname = $cus_data['customer_name'];
                        $cuscontno = $cus_data['customer_phno'];
                        $cusemail = $cus_data['customer_email'];
                        $cusaddress = $cus_data['customer_address'];
                    ?>
                        <tr>
                            <td><?php echo $cusname; ?></td>
                            <td><?php echo $cuscontno; ?></td>
                            <td><?php echo $cusemail; ?></td>
                            <td><?php echo $cusaddress; ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>
    </section>


</body>

</html>