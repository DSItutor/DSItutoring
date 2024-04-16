<?php
session_start();
include('database/config.php');

if(isset($_POST['signin'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    $sql_student = "SELECT * FROM Students WHERE Email = ? AND Password = ?";
    $sql_admin = "SELECT * FROM admin WHERE Email = ? AND Password = ?";

    // Check if it's an admin
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("ss", $email, $password);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    // Check if it's a student
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("ss", $email, $password);
    $stmt_student->execute();
    $result_student = $stmt_student->get_result();

    if ($result_admin->num_rows > 0) {
        $row_admin = $result_admin->fetch_assoc();
        $_SESSION['user_id'] = $row_admin['id'];
        header("location: adminDash.php");
        exit; // Add exit after header to prevent further execution
        // } elseif ($result_student->num_rows > 0) {
        //     // $row_student = $result_student->fetch_assoc();
        //     // $_SESSION['user_id'] = $row_student['StudentID'];
        //     header("location: information.php");
        //     exit; // Add exit after header to prevent further execution
        // } else {
        //     echo "Invalid email or password";
        // }
    } else{
        header("location: information.php");
        exit;
    }

    $stmt_admin->close();
    // $stmt_student->close();
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DSI Tutoring | Login</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="home.page.pic/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="home.page.pic/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="home.page.pic/logo.png">

    <!-- Mobile Specific Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
    <link rel="stylesheet" href="indexstyle.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    <style>
        body {
            background-color: #000000;
        }

        header {
            background-color: rgb(0, 0, 0);
            height: 80px;
        }

        header img {
            position: relative;
            padding-top: 15px;
        }

        /* Icon styles */
        .password-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            position: absolute;
            padding-right:90px;
            top: 50%;
           
            color:black;

        }
    </style>
</head>

<body class="login-page">
    <header>
        <div class="logo">
            <img src="home.page.pic\logo.png" alt="Logo">
        </div>
        <button onclick="window.location.href='index.php'">HOME</button>
    </header>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="home.page.pic/PEOPLE.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-dark">Welcome To DSI Tutoring</h2>
                        </div>
                        <form name="signin" method="post">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Email ID"
                                    name="username" id="username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-user-circle"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    name="password" id="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                            <a  class="password-btn" onclick="togglePasswordVisibility()">
                                        <i class="dw dw-eye"></i>
    </a>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="forgot-password"><a href="information.php">Forgot Password?</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-dark btn-lg btn-block" name="signin" id="signin"
                                            type="submit" value="Sign In">
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="forgot-password"
                                        style="float: left;margin-top: 19px;padding-left: 25px;">
                                        <a href="register.php" target="_self"><i class="fa fa-user-plus"
                                                aria-hidden="true"></i> Apply now</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>

</html>
